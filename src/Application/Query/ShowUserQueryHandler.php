<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 22/08/2017
 * Time: 11:45
 */

namespace Application\Query;


use Domain\User\UserRepositoryInterface;

class ShowUserQueryHandler
{
    /**
     * @var
     */
    private $userRepository;

    /**
     * ShowUserQueryHandler constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(ShowUserQuery $query)
    {
        if (!$query instanceof ShowUserQuery) {
            throw new \Exception("ShowUserQueryHandler can only handle ShowUserQuery");
        }

        return $this->userRepository->findOneById($query->getUserId());
    }
}