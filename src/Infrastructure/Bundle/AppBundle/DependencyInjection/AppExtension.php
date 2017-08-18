<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 17/08/2017
 * Time: 21:53
 */

namespace Infrastructure\Bundle\AppBundle\DependencyInjection;


use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Loader\DelegatingLoader;
use Symfony\Component\Config\Loader\LoaderResolver;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\DirectoryLoader;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

final class AppExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $locator = new FileLocator(__DIR__.'/../Resources/config');
        $loader = new DelegatingLoader(new LoaderResolver([
            new YamlFileLoader($container, $locator),
            new DirectoryLoader($container, $locator)
        ]));

        $loader->load('services.yml');
    }
}