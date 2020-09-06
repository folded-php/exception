<?php

declare(strict_types = 1);

use Folded\Exceptions\FolderNotFoundException;

it("should set the folder", function (): void {
    $folder = __DIR__ . "/not-found";

    try {
        throw (new FolderNotFoundException("folder $folder not found"))->setFolder($folder);
    } catch (FolderNotFoundException $exception) {
        expect($exception->getFolder())->toBe($folder);
    }
});
