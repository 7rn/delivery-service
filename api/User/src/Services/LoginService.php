<?php
/**
 * LoginService.php
 * Created by @anonymoussc on 03/25/2018 9:02 PM.
 */

namespace Api\User\Services;

use Illuminate\Foundation\Application;
use Api\User\Exceptions\InvalidCredentialsException;
use Api\User\Repositories\LoginRepositoryInterface;

class LoginService
{
    const REFRESH_TOKEN = 'refreshToken';

    private $apiConsumer;

    private $auth;

    private $cookie;

    private $db;

    private $request;

    private $loginRepository;

    public function __construct(Application $app, LoginRepositoryInterface $loginRepository)
    {
        $this->loginRepository = $loginRepository;

        $this->apiConsumer = $app->make('apiconsumer');
        $this->auth        = $app->make('auth');
        $this->cookie      = $app->make('cookie');
        $this->db          = $app->make('db');
        $this->request     = $app->make('request');
    }

    /**
     * Attempt to create an access token using user credentials
     *
     * @param integer $phone
     * @param string  $password
     *
     * @return array
     */
    public function attemptLogin($phone, $password)
    {
        $user = $this->loginRepository->getWhere('phone', $phone)->first();

        if (!is_null($user)) {
            return $this->proxy('password', [
                'username' => $phone,
                'password' => $password,
            ]);
        }

        throw new InvalidCredentialsException();
    }

    /**
     * Attempt to refresh the access token used a refresh token that
     * has been saved in a cookie
     */
    public function attemptRefresh()
    {
        $refreshToken = $this->request->cookie(self::REFRESH_TOKEN);

        return $this->proxy('refresh_token', [
            'refresh_token' => $refreshToken,
        ]);
    }

    /**
     * Proxy a request to the OAuth server.
     *
     * @param string $grantType what type of grant type should be proxied
     * @param array  $data      the data to send to the server
     *
     * @return array
     */
    public function proxy($grantType, array $data = [])
    {
        $data = array_merge($data, [
            'client_id'     => env('PASSWORD_CLIENT_ID'),
            'client_secret' => env('PASSWORD_CLIENT_SECRET'),
            'grant_type'    => $grantType,
        ]);

        $response = $this->apiConsumer->post('/oauth/token', $data);

        if (!$response->isSuccessful()) {
            throw new InvalidCredentialsException();
        }

        $data = json_decode($response->getContent());

        // Create a refresh token cookie
        $this->cookie->queue(
            self::REFRESH_TOKEN,
            $data->refresh_token,
            864000, // 10 days
            null,
            null,
            false,
            true // HttpOnly
        );

        return [
            'access_token' => $data->access_token,
            'expires_in'   => $data->expires_in,
        ];
    }

    /**
     * Logs out the user. We revoke access token and refresh token.
     * Also instruct the client to forget the refresh cookie.
     */
    public function logout()
    {
        $accessToken = $this->auth->user()->token();

        $refreshToken = $this->db
            ->table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true,
            ]);

        $accessToken->revoke();

        $this->cookie->queue($this->cookie->forget(self::REFRESH_TOKEN));
    }
}