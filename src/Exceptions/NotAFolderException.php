<?php

declare(strict_types = 1);

namespace Folded\Exceptions;

use Exception;

/**
 * Represents an error when a path is not a folder.
 *
 * @since 0.1.0
 */
class NotAFolderException extends Exception
{
    /**
     * The path that is not a folder.
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
     * $exception = new NotAFolderException("src/Exceptions/NotAFolderException.php is not a folder");
     */
    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        $this->folder = "";

        parent::__construct($message, $code, $previous);
    }

    /**
     * Get the path that is not a folder.
     *
     * @since 0.1.0
     *
     * @example
     * $exception = new NotAFolderException("src/Exceptions/NotAFolderException.php is not a folder");
     *
     * $exception->setFolder("src/Exceptions/NotAFolderException.php");
     *
     * echo $exception->getFolder();
     */
    public function getFolder(): string
    {
        return $this->folder;
    }

    /**
     * Set the path that is not a folder.
     *
     * @since 0.1.0
     *
     * @example
     * $exception = new NotAFolderException("src/Exceptions/NotAFolderException.php is not a folder");
     *
     * $exception->setFolder("src/Exceptions/NotAFolderException.php");
     */
    public function setFolder(string $folder): self
    {
        $this->folder = $folder;

        return $this;
    }
}
