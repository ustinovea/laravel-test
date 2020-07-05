<?php

declare(strict_types=1);

namespace App\Services;
use Illuminate\Support\Str;

/**
 * Class SymbolsAndDigitsGeneratorService
 */
class SymbolsAndDigitsGeneratorService implements InterfaceGeneratorService
{
    /**
     * {@inheritDoc}
     */
    public function generate(): string
    {
        /** @var string $string */
        $string = Str::random();

        return $string;
    }
}
