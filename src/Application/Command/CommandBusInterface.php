<?php
/**
 * Created by PhpStorm.
 * User: amor
 * Date: 16/08/17
 * Time: 17:37
 */

namespace Application\Command;


interface CommandBusInterface
{
    public function execute(CommandInterface $command);
}