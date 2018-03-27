<?php
/**
 * UserRepository.php
 * Created by @anonymoussc on 03/25/2018 9:10 PM.
 */

namespace Api\User\Repositories\Users;

use Api\User\Models\User;
use Api\User\Repositories\Repository;
use Api\User\Repositories\UserRepositoryInterface;

class UserRepository extends Repository implements UserRepositoryInterface
{
    private $userCfg;

    /**
     * @return mixed
     */
    protected function getModel()
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
        // TODO: Implement update() method.
    }
}