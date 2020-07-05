<?php

namespace Tests\Unit;

use App\Models\Indicator;
use App\Repositories\IndicatorRepository;
use App\Services\IndicatorGeneratorService;
use App\Services\StringGeneratorService;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;

class IndicatorGeneratorServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testFindIndicator()
    {
        $indicatorMock        = new Indicator();
        $indicatorMock->id    = 1;
        $indicatorMock->type  = 'string';
        $indicatorMock->value = Str::random();

        $indicatorRepository = $this->getMockBuilder(IndicatorRepository::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();

        $indicatorRepository->method('findById')
            ->willReturn($indicatorMock);

        $indicatorGeneratorService = new IndicatorGeneratorService($indicatorRepository);

        /** @var Indicator $indicator */
        $indicator = $indicatorGeneratorService->findIndicator(1);

        $this->assertEquals(1, $indicator->id);
        $this->assertTrue(!empty($indicator->value));
    }

    public function testGenerateIndicator()
    {
        $indicatorMock        = new Indicator();
        $indicatorMock->id    = 1;
        $indicatorMock->type  = 'string';
        $indicatorMock->value = Str::random();

        $indicatorRepository = $this->getMockBuilder(IndicatorRepository::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();

        $indicatorRepository->method('store')
            ->willReturn($indicatorMock);

        $indicatorGeneratorService = new IndicatorGeneratorService($indicatorRepository);
        $stringGeneratorService    = resolve(StringGeneratorService::class);

        $indicatorGeneratorService->setGenerator('string', $stringGeneratorService);

        $indicator = $indicatorGeneratorService->generateIndicator('string');

        $this->assertEquals(1, $indicator->id);
        $this->assertTrue(!empty($indicator->value));
    }
}
