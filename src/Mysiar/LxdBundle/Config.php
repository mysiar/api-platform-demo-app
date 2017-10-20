<?php
declare(strict_types=1);

/**
 * (c) Piotr Synowiec <psynowiec@gmail.com>
 *
 * 20/10/2017 18:17
 */

namespace Mysiar\LxdBundle;


class Config
{
    /** @var  string */
    private $url;

    /** @var  string */
    private $cert;

    /** @var  string */
    private $key;

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Config
     */
    public function setUrl(string $url): Config
    {
        $this->url = $url;
        return $this;
    }

    public function getCert(): string
    {
        return $this->cert;
    }

    public function setCert(string $cert): Config
    {
        $this->cert = $cert;
        return $this;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): Config
    {
        $this->key = $key;
        return $this;
    }
}
