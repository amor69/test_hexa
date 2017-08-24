<?php
/**
 * Created by PhpStorm.
 * User: amor3
 * Date: 22/08/17
 * Time: 11:49
 */

namespace Application\Command\User;

use Application\Command\CommandInterface;
use Domain\User\UserRepositoryInterface;

class EditUserCommandHandler
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(CommandInterface $command)
    {
         if(!$command instanceof EditUserCommand) {
             throw new \Exception("Edit can only handle EditUserCommand");

         }

         $user = $this->userRepository->findOneById(['id' => $command->getUserId()]);
         $user->firstname = $command->getFirstname();
         $user->lastname = $command->getLastname();

         $this->userRepository->edit($user);
    }
}
