<?php
/**
 * LoginRepositoryInterface.php
 * Created by @anonymoussc on 03/25/2018 9:06 PM.
 */

namespace Api\User\Repositories;

use Api\User\Models\User;

interface LoginRepositoryInterface
{
    public function create(array $data);

    public function update(User $user, array $data);
}