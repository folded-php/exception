<?php

declare(strict_types = 1);

namespace Folded\Exceptions;

use Exception;

/**
 * Represents an HTTP 405 method not allowed error.
 *
 * @since 0.1.0
 */
class MethodNotAllowedException extends Exception
{
    /**
     * The HTTP method that are allowed.
     *
     * @since 0.1.0
     */
    private array $allowedMethods;

    /**
     * The method that is not allowed.
     *
     * @since 0.1.0
     */
    private string $methodNotAllowed;

    /**
     * The URL from where the method is not allowed
     */
    private string $url;

    /**
     * Constructor.
     *
     * @param null|mixed $message  The error message.
     * @param int        $code     The error code.
     * @param Exception  $previous The exception that have produced this exception.
     *
     * @since 0.1.0
     *
     * @example
     * $exception = new MethodNotAllowedException("method GET not allowed");
     */
    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        $this->allowedMethods = [];
        $this->methodNotAllowed = "";
        $this->url = "";

        parent::__construct($message, $code, $previous);
    }

    /**
     * Get the allowed HTTP methods.
     *
     * @since 0.1.0
     *
     * @example
     * $exception = new MethodNotAllowedException("method GET not allowed");
     *
     * $exception->setAllowedMethods(["POST", "DELETE"]);
     *
     * $allowedMethods = $exception->getAllowedMethods();
     *
     * foreach ($allowedMethods as $allowedMethod) {
     *  echo "allowed method: $allowedMethod";
     * }
     */
    public function getAllowedMethods(): array
    {
        return $this->allowedMethods;
    }

    /**
     * Get the HTTP method that is not allowed.
     *
     * @since 0.1.0
     *
     * @example
     * $exception = new MethodNotAllowedException("method GET not allowed");
     *
     * $exception->setMethodNotAllowed("GET");
     *
     * echo $exception->getMethodNowAllowed();
     */
    public function getMethodNotAllowed(): string
    {
        return $this->methodNotAllowed;
    }

    /**
     * Get the URL from where the method is not allowed
     *
     * @example
     * $exception = new MethodNotAllowedException("method GET not allowed");
     *
     * $exception->setUrl("/");
     *
     * $exception->getUrl();
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Set the allowed HTTP methods.
     *
     * @since 0.1.0
     *
     * @example
     * $exception = new MethodNotAllowedException("method GET not allowed");
     *
     * $exception->setAllowedMethods(["POST", "DELETE"]);
     */
    public function setAllowedMethods(array $methods): self
    {
        $this->allowedMethods = $methods;

        return $this;
    }

    /**
     * Set the HTTP method that is not allowed.
     *
     * @since 0.1.0
     *
     * @example
     * $exception = new MethodNotAllowedException("method GET not allowed");
     *
     * $exception->setMethodNotAllowed("GET");
     */
    public function setMethodNotAllowed(string $method): self
    {
        $this->methodNotAllowed = $method;

        return $this;
    }

    /**
     * Set the URL from where the method is not allowed
     *
     * @example
     * $exception = new MethodNotAllowedException("method GET not allowed");
     *
     * $exception->setUrl("/");
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }
}
