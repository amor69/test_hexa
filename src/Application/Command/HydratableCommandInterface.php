<?php
/**
 * Created by PhpStorm.
 * User: amor3
 * Date: 23/08/17
 * Time: 09:52
 */

namespace Application\Command;


interface HydratableCommandInterface
{
    /**
     * @param object $data
     */
    public function hydrate($data);

    /**
     * @param string $class
     * @return bool
     */
    public function support(string $class): bool;
}