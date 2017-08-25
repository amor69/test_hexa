<?php
/**
 * Created by PhpStorm.
 * User: amor3
 * Date: 22/08/17
 * Time: 11:49
 */

namespace Application\Command\User;

class EditUserCommand
{
    private $userId;
    private $firstname;
    private $lastname;

    public function __construct($userId, $firstname, $lastname)
    {
        $this->userId = $userId;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     * @return EditUserCommand
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     * @return EditUserCommand
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }




}