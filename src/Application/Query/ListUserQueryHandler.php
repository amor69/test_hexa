<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 18/08/2017
 * Time: 15:33
 */

namespace Application\Query;


use Domain\User\UserRepositoryInterface;

class ListUserQueryHandler
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * ListUserQueryHandler constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(ListUserQuery $query)
    {
        if (!$query instanceof ListUserQuery) {
            throw new \Exception("ListUserQueryHandler can only handle ListUserQuery");
        }
        return $this->userRepository->findAll();
    }
}