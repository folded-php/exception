<?php

declare(strict_types = 1);

use Folded\Exceptions\SessionKeyNotFoundException;

it("should set the key when throwing a SessionKeyNotFoundException", function (): void {
    $key = "foo";

    try {
        throw (new SessionKeyNotFoundException("key $key not found"))->setKey($key);
    } catch (SessionKeyNotFoundException $exception) {
        expect($exception->getKey())->tobe($key);
    }
});
