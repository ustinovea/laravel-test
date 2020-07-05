<?php

namespace Tests\Unit;

use App\Services\DigitsGeneratorService;
use App\Services\InterfaceGeneratorService;
use PHPUnit\Framework\TestCase;

class DigitsGeneratorServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGenerate()
    {
        /** @var InterfaceGeneratorService $digitsGeneratorService */
        $digitsGeneratorService = resolve(DigitsGeneratorService::class);

        $string = $digitsGeneratorService->generate();

        $this->assertTrue(!empty($string));
        $this->assertTrue((bool) preg_match("/\d/", $string));
    }
}
