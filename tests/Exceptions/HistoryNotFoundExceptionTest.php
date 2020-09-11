<?php

declare(strict_types = 1);

use Folded\Exceptions\HistoryNotFoundException;

it("should set the index", function (): void {
    $index = -1;

    try {
        throw (new HistoryNotFoundException("index $index not found in history"))->setIndex($index);
    } catch (HistoryNotFoundException $exception) {
        expect($exception->getIndex())->toBe($index);
    }
});
