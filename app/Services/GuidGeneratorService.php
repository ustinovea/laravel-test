<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Str;

/**
 * Class GuidGeneratorService
 */
class GuidGeneratorService implements InterfaceGeneratorService
{
    /**
     * {@inheritDoc}
     */
    public function generate(): string
    {
        /** @var string $uuid */
        $uuid = Str::uuid()->toString();

        return $uuid;
    }
}
