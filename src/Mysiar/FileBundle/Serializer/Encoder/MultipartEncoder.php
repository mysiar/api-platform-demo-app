<?php
declare(strict_types=1);

/**
 * (c) Piotr Synowiec <psynowiec@gmail.com>
 *
 * 15/10/2017 19:11
 */

namespace Mysiar\FileBundle\Serializer\Encoder;

use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\Encoder\EncoderInterface;

class MultipartEncoder implements EncoderInterface, DecoderInterface
{
    private const FORMAT = 'multipart';

    /**
     * {@inheritdoc}
     */
    public function encode($data, $format, array $context = array())
    {
    }

    /**
     * {@inheritdoc}
     */
    public function decode($data, $format, array $context = array())
    {
    }

    /**
     * {@inheritdoc}
     */
    public function supportsEncoding($format)
    {
        return self::FORMAT === $format;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDecoding($format)
    {
        return self::FORMAT === $format;
    }
}
