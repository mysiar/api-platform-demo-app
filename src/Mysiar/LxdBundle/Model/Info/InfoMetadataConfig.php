<?php
declare(strict_types=1);

/**
 * (c) Piotr Synowiec <psynowiec@gmail.com>
 *
 * 21/10/2017 11:31
 */

namespace Mysiar\LxdBundle\Model\Info;

use JMS\Serializer\Annotation as Serializer;

class InfoMetadataConfig
{
    /**
     * @Serializer\SerializedName("core.https_address")
     * @Serializer\Type("string")
     * @var  string
     */
    private $coreHttpsAddress;

    /**
     * @Serializer\SerializedName("core.https_allowed_headers")
     * @Serializer\Type("string")
     * @var  string
     */
    private $coreHttpsAllowedHeaders;

    /**
     * @Serializer\SerializedName("core.https_allowed_methods")
     * @Serializer\Type("string")
     * @var  string
     */
    private $coreHttpsAllowedMethods;

    /**
     * @Serializer\SerializedName("core.https_allowed_origin")
     * @Serializer\Type("string")
     * @var  string
     */
    private $coreHttpsAllowedOrigin;

    /**
     * @Serializer\SerializedName("core.trust_password")
     * @Serializer\Type("boolean")
     * @var  bool
     */
    private $coreTrustPassword;

    public function getCoreHttpsAddress(): string
    {
        return $this->coreHttpsAddress;
    }

    public function setCoreHttpsAddress(string $coreHttpsAddress): InfoMetadataConfig
    {
        $this->coreHttpsAddress = $coreHttpsAddress;
        return $this;
    }

    public function getCoreHttpsAllowedHeaders(): string
    {
        return $this->coreHttpsAllowedHeaders;
    }

    public function setCoreHttpsAllowedHeaders(string $coreHttpsAllowedHeaders): InfoMetadataConfig
    {
        $this->coreHttpsAllowedHeaders = $coreHttpsAllowedHeaders;
        return $this;
    }

    public function getCoreHttpsAllowedMethods(): string
    {
        return $this->coreHttpsAllowedMethods;
    }

    public function setCoreHttpsAllowedMethods(string $coreHttpsAllowedMethods): InfoMetadataConfig
    {
        $this->coreHttpsAllowedMethods = $coreHttpsAllowedMethods;
        return $this;
    }

    public function getCoreHttpsAllowedOrigin(): string
    {
        return $this->coreHttpsAllowedOrigin;
    }

    public function setCoreHttpsAllowedOrigin(string $coreHttpsAllowedOrigin): InfoMetadataConfig
    {
        $this->coreHttpsAllowedOrigin = $coreHttpsAllowedOrigin;
        return $this;
    }

    public function getCoreTrustPassword()
    {
        return $this->coreTrustPassword;
    }

    public function setCoreTrustPassword($coreTrustPassword)
    {
        $this->coreTrustPassword = $coreTrustPassword;
        return $this;
    }
}
