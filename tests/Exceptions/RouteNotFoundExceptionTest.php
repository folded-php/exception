<?php

declare(strict_types = 1);

use Folded\Exceptions\RouteNotFoundException;

it("should set the route", function (): void {
    $route = "foo";

    try {
        throw (new RouteNotFoundException("route $route not found"))->setRoute($route);
    } catch (RouteNotFoundException $exception) {
        expect($exception->getRoute())->toBe($route);
    }
});
