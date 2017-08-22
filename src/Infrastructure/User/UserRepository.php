<?php
/**
 * Created by PhpStorm.
 * User: amor
 * Date: 17/08/17
 * Time: 09:23
 */

namespace Infrastructure\User;


use Domain\User\User;
use Domain\User\UserRepositoryInterface;
use Infrastructure\Common\Doctrine\ORM\Repository\AbstractORMDoctrineRepository;

class UserRepository extends AbstractORMDoctrineRepository implements UserRepositoryInterface
{
    public function save(User $user)
    {
        $this->getManager()->persist($user);
        $this->getManager()->flush($user);
    }

    public function remove(User $user)
    {
        $this->getManager()->remove($user);
    }

    public function findOneById($id)
    {
        return $this->getRepository()->findOneBy(['id' => $id]);
    }

    public function findAll()
    {
        return $this->getRepository()->findAll();
    }
}