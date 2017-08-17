<?php
/**
 * Created by PhpStorm.
 * User: amor
 * Date: 16/08/17
 * Time: 17:38
 */

namespace Application\Command;


interface CommandHandlerInterface
{
    public function handle(CommandInterface $command);
}