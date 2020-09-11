<?php

declare(strict_types = 1);

namespace Folded\Exceptions;

use Throwable;
use OutOfRangeException;

/**
 * Represents an error when an index in the Browser History modelized back-end side is not found.
 *
 * @since 0.1.1
 * @see https://github.com/folded-php/history For an example of package that deals with the concept of browser history on the back-end.
 */
class HistoryNotFoundException extends OutOfRangeException
{
    /**
     * Stores the index of the history.
     *
     * @since 0.1.1
     */
    private int $index;

    /**
     * Constructor.
     *
     * @since 0.1.1
     *
     * @example
     * $exception = new HistoryNotFoundException("index 1 not found");
     */
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        $this->index = 0;

        parent::__construct($message, $code, $previous);
    }

    /**
     * Get the index that is not found in the history.
     *
     * @since 0.1.1
     *
     * @example
     * $exception = new HistoryNotFoundException("history 1 not found")->setIndex(1);
     *
     * echo $exception->getIndex();
     */
    public function getIndex(): int
    {
        return $this->index;
    }

    /**
     * Set the index that is not found in the history.
     *
     * @since 0.1.1
     *
     * @example
     * $exception = new HistoryNotFoundException("index 1 not found")->setIndex(1);
     */
    public function setIndex(int $index): self
    {
        $this->index = $index;

        return $this;
    }
}
