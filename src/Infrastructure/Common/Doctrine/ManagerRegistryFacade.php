<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 18/08/2017
 * Time: 14:37
 */

namespace Infrastructure\Common\Doctrine;


use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManagerInterface;

class ManagerRegistryFacade
{
    /**
     * @var ManagerRegistry
     */
    private $registry;

    /**
     * ManagerRegistryFacade constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * @param string|null $name Default manager if null
     *
     * @return ObjectManager
     */
    public function getManager($name = null)
    {
        $manager = $this->registry->getManager($name);

        //Reset Manager if closed
        if ($manager instanceof EntityManagerInterface && !$manager->isOpen()) {
            $this->registry->resetManager($name);
            $manager = $this->registry->getManager($name);
        }

        return $manager;
    }

    /**
     * @param string $modelClass
     *
     * @return ObjectManager
     */
    public function getManagerForClass($modelClass)
    {
        $manager = $this->registry->getManagerForClass($modelClass);

        //Reset Manager if closed
        if ($manager instanceof EntityManagerInterface && !$manager->isOpen()) {
            $managerName = array_search($manager, $this->registry->getManagers(), true) ?: null;
            $this->registry->resetManager($managerName);
            $manager = $this->registry->getManagerForClass($modelClass);
        }

        return $manager;
    }

    /**
     * @param string $modelClass
     *
     * @return ObjectRepository
     */
    protected function getRepository($modelClass)
    {
        return $this->getManagerForClass($modelClass)->getRepository($modelClass);
    }
}