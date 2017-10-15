<?php
declare(strict_types=1);

/**
 * (c) Piotr Synowiec <psynowiec@gmail.com>
 *
 * 15/10/2017 18:58
 */

namespace Mysiar\FileBundle\Action;

use Mysiar\FileBundle\Entity\Document;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Vich\UploaderBundle\Handler\DownloadHandler;

class ReadItem
{
    /** @var  DownloadHandler */
    private $downloadHandler;

    public function __construct(DownloadHandler $downloadHandler)
    {
        $this->downloadHandler = $downloadHandler;
    }

    public function __invoke(Request $request): StreamedResponse
    {
        /** @var Document $document */
        $document = $request->attributes->get('data');

        $response = $this->downloadHandler->downloadObject(
            $document,
            'file',
            Document::class,
            true
        );

        $document->getMimeType()
            ? $response->headers->set('Content-Type', $document->getMimeType())
            : null;

        return $response;
    }
}
