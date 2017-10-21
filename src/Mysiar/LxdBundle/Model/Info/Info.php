<?php
declare(strict_types=1);

/**
 * (c) Piotr Synowiec <psynowiec@gmail.com>
 *
 * 21/10/2017 09:42
 */

namespace Mysiar\LxdBundle\Model\Info;

use JMS\Serializer\Annotation as Serializer;
use Mysiar\LxdBundle\LxdInterface;

class Info implements LxdInterface
{
    /**
     * @Serializer\Type("string")
     * @var  string
     */
    private $type;

    /**
     * @Serializer\Type("string")
     * @var  string
     */
    private $status;

    /**
     * @Serializer\SerializedName("status_code")
     * @Serializer\Type("int")
     * @var  int
     */
    private $statusCode;

    /**
     * @Serializer\Type("string")
     * @var  string
     */
    private $operation;

    /**
     * @Serializer\SerializedName("error_code")
     * @Serializer\Type("int")
     * @var  int
     */
    private $errorCode;

    /**
     * @Serializer\Type("string")
     * @var  string
     */
    private $error;

    /**
     * @Serializer\Type("Mysiar\LxdBundle\Model\Info\InfoMetadata")
     * @var  InfoMetadata
     */
    private $metadata;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): Info
    {
        $this->type = $type;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): Info
    {
        $this->status = $status;
        return $this;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode): Info
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function getOperation(): string
    {
        return $this->operation;
    }

    public function setOperation(string $operation): Info
    {
        $this->operation = $operation;
        return $this;
    }

    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

    public function setErrorCode(int $errorCode): Info
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    public function getError(): string
    {
        return $this->error;
    }

    public function setError(string $error): Info
    {
        $this->error = $error;
        return $this;
    }

    public function getMetadata(): InfoMetadata
    {
        return $this->metadata;
    }

    public function setMetadata(InfoMetadata $metadata): Info
    {
        $this->metadata = $metadata;
        return $this;
    }
}
