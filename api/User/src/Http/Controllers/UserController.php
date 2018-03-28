<?php

namespace Api\User\Http\Controllers;

use Api\User\Services\UserService;
use Api\User\Http\Controllers\Controller as BaseController;
use Api\User\Requests\UserRegisterRequest;

class UserController extends BaseController
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(UserRegisterRequest $request)
    {
        try {
            $record = $this->userService->register($request);
        }
        catch (\Exception $error) {
            self::logMessage($error);

            return response()
                ->error($error->getMessage(), $error->getCode(), $error->getTraceAsString())
                ->setStatusCode(500);
        }

        $records = (!$record)
            ? response()->fail([
                'result'  => $record,
                'message' => 'User failed to register',
            ])
            : response()->success([
                'result'  => $record,
                'message' => 'User successfully registered',
            ]);

        return $records;
    }

    public function welcome()
    {
        return view('welcome');
    }
}
