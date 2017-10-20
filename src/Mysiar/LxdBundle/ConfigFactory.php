<?php
declare(strict_types=1);

/**
 * (c) Piotr Synowiec <psynowiec@gmail.com>
 *
 * 20/10/2017 18:57
 */

namespace Mysiar\LxdBundle;

class ConfigFactory
{
    /**
     * @param string[] $params
     * @return Config
     */
    public static function createConfig(array $params): Config
    {
        $config = new Config();
        $config->setUrl($params['url']);
        $config->setCert($params['cert']);
        $config->setKey($params['key']);

        return $config;
    }
}
