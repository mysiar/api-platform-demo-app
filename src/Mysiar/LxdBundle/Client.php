<?php
declare(strict_types=1);

/**
 * (c) Piotr Synowiec <psynowiec@gmail.com>
 *
 * 21/10/2017 07:26
 */

namespace Mysiar\LxdBundle;

use GuzzleHttp\Psr7\Request;
use Http\Client\Curl\Client as CurlClient;
use Http\Discovery\MessageFactoryDiscovery;
use Http\Discovery\StreamFactoryDiscovery;
use JMS\Serializer\SerializerInterface;
use JMS\Serializer\SerializerBuilder;
use Mysiar\LxdBundle\Model\Containers\Containers;
use Mysiar\LxdBundle\Model\Info\Info;
use Psr\Http\Message\RequestInterface;

class Client
{

    /** @var  string[] */
    private $clientOptions;

    /** @var Config */
    private $config;

    /** @var  CurlClient */
    private $client;

    /** @var SerializerInterface */
    private $serializer;

    public function __construct(Config $config)
    {
        $this->config = $config;

        $this->clientOptions = [
            CURLOPT_CONNECTTIMEOUT => 20,
            CURLOPT_SSLCERT => $this->config->getCert(),
            CURLOPT_SSLKEY => $this->config->getKey(),
            CURLOPT_SSL_VERIFYHOST => false, // for self signed certificate
            CURLOPT_SSL_VERIFYPEER => false  // for self signed certificate
        ];
    }

    private function createClient(): CurlClient
    {
        return new CurlClient(MessageFactoryDiscovery::find(), StreamFactoryDiscovery::find(), $this->clientOptions);
    }

    private function getClient(): CurlClient
    {
        return
            empty($this->client)
                ? ($this->client = $this->createClient())
                : $this->client;
    }

    private function createRequest(string $method, string $command): Request
    {
        $uri = rtrim($this->config->getUrl() . '/' . LxdInterface::LXD_API_VER . '/' . $command, '/');

        return new Request($method, $uri);
    }


    private function getJsonResponse(RequestInterface $request): string
    {
        $response = $this->getClient()->sendRequest($request);

        return $response->getBody()->getContents();
    }

    public function getInfoJson(): string
    {
        $request = $this->createRequest('GET', '');

        return $this->getJsonResponse($request);
    }

    public function getInfo(): LxdInterface
    {
        $request = $this->createRequest('GET', '');

        $response =  $this->getJsonResponse($request);

        return $this->deserialize($response, Info::class);
    }

    public function getContainers(): LxdInterface
    {
        $request = $this->createRequest('GET', LxdInterface::LXD_COMMAND_CONTAINERS);

        $response =  $this->getJsonResponse($request);
        $array = json_decode($response, true);

        $object = $this->deserialize($response, Containers::class);
        $array['metadata'] ? $object->setMetadata($array['metadata']) : null;

        return $object;
    }


    /*
     * SERIALIZER
     */

    private function createSerializer(): SerializerInterface
    {
        return SerializerBuilder::create()->build();
    }

    public function getSerializer(): SerializerInterface
    {
        return
            empty($this->serializer)
                ? ($this->serializer = $this->createSerializer())
                : $this->serializer;
    }

    private function deserialize(string $content, string $class): LxdInterface
    {
        /** @var LxdInterface $response */
        $response = $this->getSerializer()->deserialize($content, $class, 'json');
        return $response;
    }
}
