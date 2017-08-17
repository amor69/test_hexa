<?php
/**
 * Created by PhpStorm.
 * User: amor
 * Date: 17/08/17
 * Time: 09:23
 */

namespace Infrastructure\User;


use Domain\User\User;
use Domain\User\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public $users = [];

    public function create(User $user)
    {
        $this->users[] = $user;
    }
}