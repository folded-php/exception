<?php

declare(strict_types = 1);

use Folded\Exceptions\NotAFolderException;

it("should set the not a folder exception folder", function (): void {
    $folder = __DIR__ . "/not-found";

    try {
        throw (new NotAFolderException("$folder is not a folder"))->setFolder($folder);
    } catch (NotAFolderException $exception) {
        expect($exception->getFolder())->toBe($folder);
    }
});
