<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Str;

/**
 * Class StringGeneratorService
 */
class StringGeneratorService implements InterfaceGeneratorService
{
    /**
     * Digit list
     */
    const DIGITS = ['0','1','2','3','4','5','6','7','8','9'];

    /**
     * {@inheritDoc}
     */
    public function generate(): string
    {
        $string = Str::random();
        $string = str_replace(self::DIGITS, '', $string);

        return $string;
    }
}
