<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 22/08/2017
 * Time: 09:45
 */

namespace Application\Command\User;

class DeleteUserCommand
{
    private $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function getUserId()
    {
        return $this->userId;
    }
}