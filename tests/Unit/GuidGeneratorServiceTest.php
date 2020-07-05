<?php

namespace Tests\Unit;

use App\Services\GuidGeneratorService;
use App\Services\InterfaceGeneratorService;
use PHPUnit\Framework\TestCase;

class GuidGeneratorServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testGenerate()
    {
        /** @var InterfaceGeneratorService $digitsGeneratorService */
        $digitsGeneratorService = resolve(GuidGeneratorService::class);

        $string = $digitsGeneratorService->generate();

        $this->assertTrue(!empty($string));
        $this->assertTrue((bool) preg_match("/[0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12}/", $string));
    }
}
