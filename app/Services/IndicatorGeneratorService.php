<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\NotFoundGeneratorTypeException;
use App\Models\Indicator;
use App\Repositories\IndicatorRepository;

/**
 * Class IndicatorGeneratorService
 */
class IndicatorGeneratorService
{
    /**
     * Generator list
     *
     * @var InterfaceGeneratorService[]
     */
    private $generatorList = [];

    /**
     * Indicator repository
     *
     * @var IndicatorRepository
     */
    private $indicatorRepository;

    /**
     * IndicatorGeneratorService constructor.
     *
     * @param IndicatorRepository $indicatorRepository
     */
    public function __construct(IndicatorRepository $indicatorRepository)
    {
        $this->indicatorRepository = $indicatorRepository;
    }

    /**
     * Set generator
     *
     * @param string                    $tag
     * @param InterfaceGeneratorService $generatorService
     */
    public function setGenerator(string $tag, InterfaceGeneratorService $generatorService)
    {
        $this->generatorList[$tag] = $generatorService;
    }

    /**
     * Find indicator
     *
     * @param int $id
     *
     * @return Indicator
     */
    public function findIndicator(int $id): Indicator
    {
        /** @var Indicator $indicator */
        $indicator = $this->indicatorRepository->findById($id);

        return $indicator;
    }

    /**
     * Generate new indicator
     *
     * @param string $type
     *
     * @return Indicator
     *
     * @throws NotFoundGeneratorTypeException
     */
    public function generateIndicator(string $type): Indicator
    {
        if (!isset($this->generatorList[$type])) {
            throw new NotFoundGeneratorTypeException($type);
        }

        $value = $this->generatorList[$type]->generate();

        return $this->indicatorRepository->store($type, $value);
    }

}
