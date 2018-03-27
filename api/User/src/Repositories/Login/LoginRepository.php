<?php
/**
 * LoginRepository.php
 * Created by @anonymoussc on 03/25/2018 9:09 PM.
 */

namespace Api\User\Repositories\Login;

use Api\User\Models\User;
use Api\User\Repositories\Repository;
use Api\User\Repositories\LoginRepositoryInterface;

class LoginRepository extends Repository implements LoginRepositoryInterface
{
    private $userCfg;

    public function getModel()
    {
        $this->userCfg = config('auth.providers.apis.model');

        return new $this->userCfg;
    }

    public function create(array $data)
    {
        $user = $this->getModel();

        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        $user->fill($data);
        $user->save();

        return $user;
    }

    public function update(User $user, array $data)
    {
        $user->fill($data);

        $user->save();

        return $user;
    }
}