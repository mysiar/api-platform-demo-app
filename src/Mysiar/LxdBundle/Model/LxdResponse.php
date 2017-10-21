<?php
declare(strict_types=1);

/**
 * (c) Piotr Synowiec <psynowiec@gmail.com>
 *
 * 21/10/2017 11:53
 */

namespace Mysiar\LxdBundle\Model;

use JMS\Serializer\Annotation as Serializer;

trait LxdResponse
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

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function getOperation(): string
    {
        return $this->operation;
    }

    public function setOperation(string $operation): self
    {
        $this->operation = $operation;
        return $this;
    }

    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

    public function setErrorCode(int $errorCode): self
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    public function getError(): string
    {
        return $this->error;
    }

    public function setError(string $error): self
    {
        $this->error = $error;
        return $this;
    }
}
