<?php
declare(strict_types=1);

/**
 * (c) Piotr Synowiec <psynowiec@gmail.com>
 *
 * 21/10/2017 11:52
 */

namespace Mysiar\LxdBundle\Model\Containers;

use Mysiar\LxdBundle\LxdInterface;
use Mysiar\LxdBundle\Model\LxdResponse;
use JMS\Serializer\Annotation as Serializer;

/**
 * @Serializer\ExclusionPolicy("none")
 */
class Containers implements LxdInterface
{
    use LxdResponse;

    /**
     * @Serializer\Exclude
     * @var  string[]
     */
    private $metadata;

    /**
     * @return string[]
     */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    /**
     * @param string[] $metadata
     * @return Containers
     */
    public function setMetadata(?array $metadata): Containers
    {
        $this->metadata = $metadata;
        return $this;
    }
}
