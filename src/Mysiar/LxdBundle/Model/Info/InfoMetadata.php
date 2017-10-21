<?php
declare(strict_types=1);

/**
 * (c) Piotr Synowiec <psynowiec@gmail.com>
 *
 * 21/10/2017 11:15
 */

namespace Mysiar\LxdBundle\Model\Info;

use JMS\Serializer\Annotation as Serializer;

class InfoMetadata
{
    /**
     * @Serializer\SerializedName("api_status")
     * @Serializer\Type("string")
     * @var  string
     */
    private $apiStatus;

    /**
     * @Serializer\SerializedName("api_version")
     * @Serializer\Type("string")
     * @var  string
     */
    private $apiVersion;

    /**
     * @Serializer\Type("string")
     * @var  string
     */
    private $auth;

    /**
     * @Serializer\Type("boolean")
     * @var  bool
     */
    private $public;

    /**
     * @Serializer\Type("Mysiar\LxdBundle\Model\Info\InfoMetadataConfig")
     * @var  InfoMetadataConfig
     */
    private $config;

    public function getApiStatus()
    {
        return $this->apiStatus;
    }

    public function setApiStatus($apiStatus)
    {
        $this->apiStatus = $apiStatus;
        return $this;
    }

    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }

    public function setApiVersion(string $apiVersion): InfoMetadata
    {
        $this->apiVersion = $apiVersion;
        return $this;
    }

    public function getConfig(): InfoMetadataConfig
    {
        return $this->config;
    }

    public function setConfig(InfoMetadataConfig $config): InfoMetadata
    {
        $this->config = $config;
        return $this;
    }

    public function getAuth(): string
    {
        return $this->auth;
    }

    public function setAuth(string $auth): InfoMetadata
    {
        $this->auth = $auth;
        return $this;
    }

    public function isPublic(): bool
    {
        return $this->public;
    }

    public function setPublic(bool $public): InfoMetadata
    {
        $this->public = $public;
        return $this;
    }
}
