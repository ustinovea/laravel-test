<?php

namespace Tests\Unit;

use App\Services\InterfaceGeneratorService;
use App\Services\StringGeneratorService;
use App\Services\SymbolsAndDigitsGeneratorService;
use PHPUnit\Framework\TestCase;

class SymbolsAndDigitsGeneratorServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGenerate()
    {
        /** @var InterfaceGeneratorService $digitsGeneratorService */
        $digitsGeneratorService = resolve(SymbolsAndDigitsGeneratorService::class);

        $string = $digitsGeneratorService->generate();

        $this->assertTrue(!empty($string));
        $this->assertTrue((bool) preg_match("/^[a-zA-Z0-9]+$/", $string));
    }
}
