<?php
/**
 * Created by PhpStorm.
 * User: amor3
 * Date: 23/08/17
 * Time: 09:45
 */

namespace Domain;


interface RegistryInterface
{
    /**
     * @param string $key
     * @return bool
     */
    public function has(string $key): bool;

    /**
     * @param string $key
     * @return \Serializable
     */
    public function get(string $key): \Serializable;

    /**
     * @param string $key
     * @param \Serializable $resource
     */
    public function set(string $key, \Serializable $resource);
}