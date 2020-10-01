<?php

declare(strict_types = 1);

use Folded\Exceptions\MethodNotAllowedException;

it("should set the allowed methods", function (): void {
    $allowedMethods = ["POST", "DELETE"];

    try {
        throw (new MethodNotAllowedException("method GET now allowed"))->setAllowedMethods($allowedMethods);
    } catch (MethodNotAllowedException $exception) {
        expect($exception->getAllowedMethods())->toBe($allowedMethods);
    }
});

it("should set the method not allowed", function (): void {
    $methodNotAllowed = "GET";

    try {
        throw (new MethodNotAllowedException("method $methodNotAllowed not allowed"))->setMethodNotAllowed($methodNotAllowed);
    } catch (MethodNotAllowedException $exception) {
        expect($exception->getMethodNotAllowed())->toBe($methodNotAllowed);
    }
});

it("should set the url from where is not allowed", function (): void {
    $url = "/";

    try {
        throw (new MethodNotAllowedException("method GET not allowed"))->setUrl($url);
    } catch (MethodNotAllowedException $exception) {
        expect($exception->getUrl())->toBe($url);
    }
});
