<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 18/08/2017
 * Time: 14:48
 */

namespace Infrastructure\Common\Doctrine\ORM\Repository;

use Domain\User\User;
use Infrastructure\Common\Doctrine\ManagerRegistryFacade;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

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
        $this->modelClass = $modelClass;
        $this->registryFacade = $registryFacade;
    }

    public function find($id)
    {
        return $this->getRepository()->find($id);
    }

    public function findAll()
    {
        return $this->getRepository()->findAll();
    }

    protected function getRepository() : EntityRepository
    {
        return $this->getManager()->getRepository($this->modelClass);
    }

    protected function getManager() : EntityManager
    {
        /**
         * @var EntityManager $manager
         */
        $manager = $this->registryFacade->getManagerForClass($this->modelClass);

        return $manager;
    }
}