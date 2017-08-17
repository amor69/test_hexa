<?php
/**
 * Created by PhpStorm.
 * User: amor
 * Date: 16/08/17
 * Time: 17:24
 */

namespace Domain\User;


interface UserRepositoryInterface
{
    public function create(User $user);
}