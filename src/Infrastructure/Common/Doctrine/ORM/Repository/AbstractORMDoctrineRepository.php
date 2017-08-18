<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 18/08/2017
 * Time: 14:48
 */

namespace Infrastructure\Common\Doctrine\ORM\Repository;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Infrastructure\Common\Doctrine\ManagerRegistryFacade;

abstract class AbstractORMDoctrineRepository
{
    /**
     * @var string
     */
    protected $modelClass;

    /**
     * @var ManagerRegistryFacade
     */
    private $registryFacade;

    /**
     * AbstractORMDoctrineRepository constructor.
     * @param ManagerRegistryFacade $registryFacade
     * @param $modelClass
     */
    public function __construct(ManagerRegistryFacade $registryFacade, $modelClass)
    {
        $this->registryFacade = $registryFacade;
        $this->modelClass = $modelClass;
    }

    public function findAll()
    {
        return $this->getRepository()->findAll();
    }

    public function getRepository() : EntityRepository
    {
        return $this->getManager()->getRepository($this->modelClass);
    }

    public function getManager() : EntityManager
    {
        /**
         * @var EntityManager $manager
         */
        $manager = $this->registryFacade->getManagerForClass($this->modelClass);

        return $manager;
    }
}