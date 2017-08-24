<?php
/**
 * Created by PhpStorm.
 * User: amor
 * Date: 16/08/17
 * Time: 17:36
 */

namespace Application\Command\User;

use Domain\User\User;
use Application\Command\CommandInterface;
use Domain\User\UserRepositoryInterface;

class CreateUserCommandHandler
{
    private  $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(CommandInterface $command)
    {
        if(!$command instanceof CreateUserCommand) {
            throw new \Exception("CreateUserHandle can only handle CreateUserCommand");
        }

        $user = new User;
        $user->id = uniqid(); // Sort de l'aléatoire = collision avec user.orm.yml
        $user->firstname = $command->getFirstname();
        $user->lastname = $command->getLastname();

        $this->userRepository->save($user);
    }
}
