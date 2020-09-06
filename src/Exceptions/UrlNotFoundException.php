<?php

declare(strict_types = 1);

namespace Folded\Exceptions;

use Exception;

/**
 * Represents an HTTP 404 url not found error.
 *
 * @since 0.1.0
 */
class UrlNotFoundException extends Exception
{
    /**
     * The url that is not found.
     *
     * @since 0.1.0
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
     * $exception = new UrlNotFoundException("url /about-us not found");
     */
    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        $this->url = "";

        parent::__construct($message, $code, $previous);
    }

    /**
     * Get the url that is not found.
     *
     * @since 0.1.0
     *
     * @example
     * $exception = new UrlNotFoundException("url /about-us not found");
     *
     * $exception->setUrl("/about-us");
     *
     * echo $exception->getUrl();
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Set the url that is not found.
     *
     * @since 0.1.0
     *
     * @example
     * $exception = new UrlNotFoundException("url /about-us not found");
     *
     * $exception->setUrl("/about-us");
     */
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }
}
