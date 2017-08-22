<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 22/08/2017
 * Time: 11:44
 */

namespace Application\Query;


class ShowUserQuery
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