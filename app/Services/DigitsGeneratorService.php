<?php

declare(strict_types=1);

namespace App\Services;

/**
 * Class DigitsGeneratorService
 */
class DigitsGeneratorService implements InterfaceGeneratorService
{
    /**
     * {@inheritDoc}
     */
    public function generate(): string
    {
        /** @var string $digits */
        $digits = (string) rand();

        return $digits;
    }
}
