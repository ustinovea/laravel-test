<?php

declare(strict_types=1);

namespace App\Services;

/**
 * Interface InterfaceGeneratorService
 */
interface InterfaceGeneratorService
{
    /**
     * Generate value
     *
     * @return string
     */
    public function generate(): string;
}
