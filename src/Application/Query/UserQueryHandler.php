<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 18/08/2017
 * Time: 15:33
 */

namespace Application\Query;


use Domain\User\UserRepositoryInterface;

class UserQueryHandler
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserQueryHandler constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(UserQuery $query)
    {
        return $this->userRepository->findAll();
    }
}