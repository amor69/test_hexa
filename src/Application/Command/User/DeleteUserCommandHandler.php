<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 22/08/2017
 * Time: 09:47
 */

namespace Application\Command\User;
use Domain\User\UserRepositoryInterface;

class DeleteUserCommandHandler
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle($command)
    {
        if(!$command instanceof DeleteUserCommand) {
            throw new \Exception("DeleteUserHandler can only handle DeleteUserCommand");
        }

        $userId = $this->userRepository->findOneById(['id' => $command->getUserId()]);

        $this->userRepository->remove($userId);
    }
}