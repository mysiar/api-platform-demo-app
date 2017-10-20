<?php
declare(strict_types=1);

/**
 * (c) Piotr Synowiec <psynowiec@gmail.com>
 *
 * 20/10/2017 18:57
 */

namespace Mysiar\LxdBundle;

use Symfony\Component\DependencyInjection\ContainerInterface;

class ConfigFactory
{
    public static function createConfig(ContainerInterface $container): Config
    {
        $config = new Config();
        $config->setUrl($container->getParameter('lxd1')['url']);
        $config->setCert($container->getParameter('lxd1')['cert']);
        $config->setKey($container->getParameter('lxd1')['key']);

        return $config;
    }
}
