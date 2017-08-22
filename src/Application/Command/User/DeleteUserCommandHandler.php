<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 22/08/2017
 * Time: 09:47
 */

namespace Application\Command\User;


use Application\Command\CommandHandlerInterface;
use Application\Command\CommandInterface;
use Domain\User\UserRepositoryInterface;

class DeleteUserCommandHandler implements CommandHandlerInterface
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(CommandInterface $command)
    {
        if(!$command instanceof DeleteUserCommand) {
            throw new \Exception("DeleteUserHandler can only handle DeleteUserCommand");
        }

        $user = $this->userRepository->findOneById(['id' => $command->getUserId()]);

        $this->userRepository->remove($user);
    }


}