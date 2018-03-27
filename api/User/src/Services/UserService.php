<?php
/**
 * UserService.php
 * Created by @anonymoussc on 03/25/2018 9:04 PM.
 */

namespace Api\User\Services;

use Illuminate\Foundation\Application;
use Api\User\Exceptions\InvalidCredentialsException;
use Api\User\Repositories\UserRepositoryInterface;

class UserService
{
    private $userRepository;

    public function __construct(Application $app, UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register($req, array $param = [])
    {
        $data = ['name' => $req->name, 'email' => $req->email, 'phone' => $req->phone, 'password' => $req->password];

        return $this->userRepository->create($data);
    }
}