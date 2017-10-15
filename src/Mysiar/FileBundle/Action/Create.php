<?php
declare(strict_types=1);

/**
 * (c) Piotr Synowiec <psynowiec@gmail.com>
 *
 * 15/10/2017 18:56
 */

namespace Mysiar\FileBundle\Action;

use Mysiar\FileBundle\Entity\Document;
use Symfony\Component\HttpFoundation\Request;

class Create
{
    public function __invoke(Request $request): Document
    {
        $document = new Document();

        $request->request->has('description')
            ? $document->setDescription($request->request->get('description'))
            : null;

        $document->setFile($request->files->get('file'));

        return $document;
    }
}
