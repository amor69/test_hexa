<?php
/**
 * Created by PhpStorm.
 * User: amor
 * Date: 16/08/17
 * Time: 17:34
 */

namespace Application\Command\User;


use Application\Command\CommandInterface;

class CreateUserCommand implements CommandInterface
{
    private $firstname;
    private $lastname;

    public function __construct($firstname, $lastname)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $firstname
     * @return CreateUserCommand
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * @param mixed $lastname
     * @return CreateUserCommand
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }
}