<?php
/**
 * Created by PhpStorm.
 * User: amor
 * Date: 17/08/17
 * Time: 09:10
 */

namespace UserTestHaha\Infrastructure\CommandBus;


use UserTestHaha\Application\Command\CommandBusInterface;
use UserTestHaha\Application\Command\CommandHandlerInterface;
use UserTestHaha\Application\Command\CommandInterface;
use Symfony\Component\Config\Definition\Exception\Exception;

class SynchronousCommandBus implements CommandBusInterface
{
    /**
     * @var CommandBusInterface[]
     */
  private $handlers = [];

  public function execute(CommandInterface $command)
  {
      $commandName = get_class($command);

      if(!array_key_exists($commandName, $this->handlers)) {
          throw new Exception("{$commandName} is not supported by the synchronousCommandBus.");
      }

      return $this->handlers[$commandName]->handle($command);
  }

  public function register($commandName, CommandHandlerInterface $command)
  {
      $this->handlers[$commandName] = $handler;

      return $this;
  }
}