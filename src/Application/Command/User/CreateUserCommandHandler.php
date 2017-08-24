<?php
/**
 * Created by PhpStorm.
 * User: amor
 * Date: 16/08/17
 * Time: 17:36
 */

namespace Application\Command\User;

use Domain\User\User;
use Domain\User\UserRepositoryInterface;

class CreateUserCommandHandler
{
    private  $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle($command)
    {
        if(!$command instanceof CreateUserCommand) {
            throw new \Exception("CreateUserHandle can only handle CreateUserCommand");
        }

        $user = new User;
        $user->firstname = $command->getFirstname();
        $user->lastname = $command->getLastname();

        $this->userRepository->save($user);
    }
}
