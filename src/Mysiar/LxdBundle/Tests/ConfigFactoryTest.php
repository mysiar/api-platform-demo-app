<?php
declare(strict_types=1);

/**
 * (c) Piotr Synowiec <psynowiec@gmail.com>
 *
 * 20/10/2017 18:59
 */

namespace Mysiar\LxdBundle\Tests;

require_once(__DIR__ . "/../../../../app/AppKernel.php");

use Mysiar\LxdBundle\Config;
use PHPUnit\Framework\TestCase;

class ConfigFactoryTest extends TestCase
{
    private $container;

    public function __construct()
    {
        $kernel = new \AppKernel("test", true);
        $kernel->boot();
        $this->container = $kernel->getContainer();
        parent::__construct();
    }

    public function testConfig(): void
    {
        /** @var Config $config */
        $config = $this->container->get(Config::class);
        $this->assertInstanceOf(Config::class, $config);
        $this->assertFileExists($config->getCert());
        $this->assertFileExists($config->getKey());
    }
}
