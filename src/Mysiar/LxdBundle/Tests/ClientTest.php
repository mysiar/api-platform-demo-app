<?php
declare(strict_types=1);

/**
 * (c) Piotr Synowiec <psynowiec@gmail.com>
 *
 * 21/10/2017 07:55
 */

namespace Mysiar\LxdBundle\Tests;

require_once(__DIR__ . "/../../../../app/AppKernel.php");

use Mysiar\LxdBundle\Client;
use Mysiar\LxdBundle\Model\Containers\Containers;
use Mysiar\LxdBundle\Model\Info\Info;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    /** @var Client  */
    private $client;

    public function __construct()
    {
        $kernel = new \AppKernel("test", true);
        $kernel->boot();
        $container = $kernel->getContainer();
        $this->client = $container->get(Client::class);
        parent::__construct();
    }

    public function testGetInfoOld(): void
    {
        $json = $this->client->getInfoJson();
        $array = json_decode($json, true);

        $this->assertEquals(200, $array['status_code']);
        $this->assertEquals('1.0', $array['metadata']['api_version']);
    }

    public function testGetInfo(): void
    {
        /** @var Info $data */
        $data = $this->client->getInfo();
        $this->assertInstanceOf(Info::class, $data);
        $this->assertEquals(200, $data->getStatusCode());
    }

    public function testGetContainers(): void
    {
        /** @var Containers $data */
        $data = $this->client->getContainers();
        $this->assertInstanceOf(Containers::class, $data);
        $this->assertEquals(200, $data->getStatusCode());
    }
}
