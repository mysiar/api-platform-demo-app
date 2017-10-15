<?php
declare(strict_types=1);

/**
 * (c) Piotr Synowiec <psynowiec@gmail.com>
 *
 * 15/10/2017 18:58
 */

namespace Mysiar\FileBundle\Action;

use DateTime;
use Mysiar\FileBundle\Entity\Document;
use Symfony\Component\HttpFoundation\Request;

class Update
{
    public function __invoke(Request $request): Document
    {
        /** @var Document $document */
        $document = $request->attributes->get('data');
        $document->setFile($request->files->get('file'));
        $document->setUpdatedAt(new DateTime());
        $request->request->has('description')
            ? $document->setDescription($request->request->get('description'))
            : null;

        return $document;
    }
}
