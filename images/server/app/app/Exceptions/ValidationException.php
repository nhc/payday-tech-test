<?php
namespace App\Exceptions;
use Exception;


/**
 * Indicates that a validation check has failed.
 * This could apply to internal functions handling internal data, or
 *  it could be reported by a controller handling an API.
 */
class ValidationException extends Exception
{
    /**
     * Name of the property or parameter etc which failed validation.
     * This will be an empty string if it is not applicable.
     *
     * @var string
     */
    protected $property = '';

    /**
     * Construct a new ValidationException instance.
     *
     * @param string $message A message describing what has gone wrong.
     * @param string $property Name of the property or parameter etc. which failed validation.
     * @param Exception $previous The previous exception if the exceptions are nested. Null if not applicable.
     */
    public function __construct(string $message, string $property = '', Exception $previous = null)
    {
        $this->property = $property;
        parent::__construct($message, 0, $previous);
    }

    /**
     * Get a string representation of this exception.
     *
     * @return string
     */
    public function __toString()
    {
        return __CLASS__ . ": [{$this->property}]: {$this->message}\n";
    }
}
