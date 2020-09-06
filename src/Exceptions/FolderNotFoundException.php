<?php

declare(strict_types = 1);

namespace Folded\Exceptions;

use Exception;

/**
 * Represent an error when a folder is not found.
 *
 * @since 0.1.0
 */
class FolderNotFoundException extends Exception
{
    /**
     * The path to the folder.
     *
     * @since 0.1.0
     */
    private string $folder;

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
     * $exception = new FolderNotFoundException("folder foo not found");
     */
    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        $this->folder = "";

        parent::__construct($message, $code, $previous);
    }

    /**
     * Get the path to the folder not found.
     *
     * @since 0.1.0
     *
     * @example
     * $exception = new FolderNotFoundException("folder foo not found");
     *
     * $exception->setFolder("foo");
     *
     * $folder = $exception->getFolder();
     */
    public function getFolder(): string
    {
        return $this->folder;
    }

    /**
     * Set the path to the folder not found.
     *
     * @param string $folder The path to the folder not found.
     *
     * @since 0.1.0
     *
     * @example
     * $exception = new FolderNotFoundException("folder foo not found");
     *
     * $exception->setFolderPath("foo");
     */
    public function setFolder(string $folder): self
    {
        $this->folder = $folder;

        return $this;
    }
}
