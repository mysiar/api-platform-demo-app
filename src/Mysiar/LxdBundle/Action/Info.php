<?php
declare(strict_types=1);

/**
 * (c) Piotr Synowiec <psynowiec@gmail.com>
 *
 * 21/10/2017 09:05
 */

namespace Mysiar\LxdBundle\Action;

use Mysiar\LxdBundle\Client;
use Mysiar\LxdBundle\LxdInterface;

class Info
{
    /** @var  Client */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function __invoke(): LxdInterface
    {
        return $this->client->getInfo();
    }
}
