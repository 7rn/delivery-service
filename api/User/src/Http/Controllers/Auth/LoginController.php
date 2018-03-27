<?php
/**
 * LoginController.php
 * Created by rn on 11/10/2017 7:58 AM.
 */

namespace Api\User\Http\Controllers\Auth;


use Illuminate\Http\Request;
use Api\User\Requests\LoginRequest;
use Api\User\Http\Controllers\Controller;
use Api\User\Services\LoginService;

class LoginController extends Controller
{
    private $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function login(LoginRequest $request)
    {
        $email    = $request->input('phone');
        $password = $request->input('password');

        return $this->response($this->loginService->attemptLogin($email, $password));
    }

    public function refresh(Request $request)
    {
        return $this->response($this->loginService->attemptRefresh());
    }

    public function logout()
    {
        $this->loginService->logout();

        return $this->response(null, 204);
    }
}