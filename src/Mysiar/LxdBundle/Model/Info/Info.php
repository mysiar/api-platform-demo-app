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
use Mysiar\LxdBundle\Model\LxdResponse;


class Info implements LxdInterface
{
    use LxdResponse;

    /**
     * @Serializer\Type("Mysiar\LxdBundle\Model\Info\InfoMetadata")
     * @var  InfoMetadata
     */
    private $metadata;


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
