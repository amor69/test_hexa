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
    /**
     * @param User $user
     */
    public function save(User $user);

    /**
     * @param User $user
     * @return mixed
     */
    public function remove(User $user);

    /**
     * @param $id
     * @return mixed
     */
    public function findOneById($id);

    /**
     * @return mixed
     */
    public function findAll();

    /**
     * @param User $user
     * @return mixed
     */
    public function edit(User $user);
}