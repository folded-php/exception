<?php

declare(strict_types = 1);

namespace Folded\Exceptions;

use Exception;
use Throwable;

/**
 * Represents an error when a route (used from a router) is not found by its name.
 *
 * @since 0.2.0
 */
class RouteNotFoundException extends Exception
{
    /**
     * The route name.
     *
     * @since 0.2.0
     */
    private string $route;

    /**
     * Constructor.
     *
     * @param null|mixed $message  The error message.
     * @param int        $code     The error code.
     * @param Exception  $previous The exception that have produced this exception.
     *
     * @since 0.2.0
     *
     * @example
     * $exception = new FolderNotFoundException("folder foo not found");
     */
    public function __construct($message = null, $code = 0, ?Throwable $previous = null)
    {
        $this->route = "";

        parent::__construct($message, $code, $previous);
    }

    /**
     * Get the route name that is not found.
     *
     * @since 0.2.0
     *
     * @example
     * $exception = new RouteNotFoundException("route foo not found");
     * $exception->setRoute("foo");
     *
     * echo $exception->getRoute();
     */
    public function getRoute(): string
    {
        return $this->route;
    }

    /**
     * Set the route name that is not found.
     *
     * @param string $route The route name that is not found;
     *
     * @since 0.2.0
     *
     * @example
     * $exception = new RouteNotFoundException("route foo not found");
     * $exception->setRoute("foo");
     */
    public function setRoute(string $route): self
    {
        $this->route = $route;

        return $this;
    }
}
