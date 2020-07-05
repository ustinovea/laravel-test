<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

/**
 * Class NotFoundGeneratorTypeException
 */
class NotFoundGeneratorTypeException extends Exception
{
    /**
     * NotFoundGeneratorTypeException constructor.
     *
     * @param string $type
     */
    public function __construct(string $type)
    {
        parent::__construct("Generator for type: {$type} not found");
    }
}
