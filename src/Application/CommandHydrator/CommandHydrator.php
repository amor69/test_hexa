<?php
/**
 * Created by PhpStorm.
 * User: amor3
 * Date: 23/08/17
 * Time: 09:56
 */

namespace Application\CommandHydrator;


use Application\Command\HydratableCommandInterface;
use Domain\RegistryInterface;

class CommandHydrator
{
    private $resourceId;
    private $registry;

    public function __construct(RegistryInterface $registry, string $resourceId)
    {
        $this->resourceId = $resourceId;
        $this->registry = $registry;
    }

    public function hydrateCommand(HydratableCommandInterface $command)
    {
        if (!$this->registry->has($this->resourceId)) {
            return;
        }

        $data = $this->registry->get($this->resourceId);

        if (!$command->support(get_class($data))) {
            return;
        }

        return $command->hydrate($data);
    }
}