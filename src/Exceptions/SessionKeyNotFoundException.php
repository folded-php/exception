<?php

declare(strict_types = 1);

namespace Folded\Exceptions;

use Throwable;
use OutOfRangeException;

/**
 * Represents an error when a key is not found in a session array.
 *
 * @since 0.3.0
 */
class SessionKeyNotFoundException extends OutOfRangeException
{
    /**
     * The key name that is not found in the session.
     *
     * @since 0.3.0
     */
    private string $key;

    /**
     * Constructor.
     *
     * @param null|mixed $message  The error message.
     * @param int        $code     The error code.
     * @param Exception  $previous The exception that have produced this exception.
     *
     * @since 0.3.0
     *
     * @example
     * $exception = new FolderNotFoundException("folder foo not found");
     */
    public function __construct($message = null, $code = 0, ?Throwable $previous = null)
    {
        $this->key = "";

        parent::__construct($message, $code, $previous);
    }

    /**
     * Get the key name that is not found in the session.
     *
     * @since 0.3.0
     *
     * @example
     * $exception = new SessionKeyNotFoundException("key foo not found");
     *
     * $exception->setKey("foo");
     *
     * echo $exception->getKey();
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * Set the key that is not found in the session.
     *
     * @param string $name The name of the key that is not found.
     *
     * @since 0.3.0
     *
     * @example
     * $exception = new SessionKeyNotFoundException("key foo not found");
     *
     * $exception->setKey("foo");
     */
    public function setKey(string $name): self
    {
        $this->key = $name;

        return $this;
    }
}
