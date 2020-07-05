<?php

namespace Tests\Unit;

use App\Services\InterfaceGeneratorService;
use App\Services\StringGeneratorService;
use PHPUnit\Framework\TestCase;

class StringGeneratorServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGenerate()
    {
        /** @var InterfaceGeneratorService $digitsGeneratorService */
        $digitsGeneratorService = resolve(StringGeneratorService::class);

        $string = $digitsGeneratorService->generate();

        $this->assertTrue(!empty($string));
        $this->assertTrue((bool) preg_match("/^[a-zA-Z]+$/", $string));
    }
}
