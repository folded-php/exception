<?php

declare(strict_types = 1);

use Folded\Exceptions\UrlNotFoundException;

it("should set the url", function (): void {
    $url = "/about-us";

    try {
        throw (new UrlNotFoundException("url $url not found"))->setUrl($url);
    } catch (UrlNotFoundException $exception) {
        expect($exception->getUrl())->toBe($url);
    }
});
