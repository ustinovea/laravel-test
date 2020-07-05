<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Exceptions\NotFoundGeneratorTypeException;
use App\Http\Requests\IndicatorRequest;
use App\Services\IndicatorGeneratorService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 * Class IndicatorController
 */
class IndicatorController extends Controller
{
    /**
     * Indicator generate service
     *
     * @var IndicatorGeneratorService
     */
    private $indicatorGeneratorService;

    /**
     * IndicatorController constructor.
     *
     * @param IndicatorGeneratorService $indicatorGeneratorService
     */
    public function __construct(IndicatorGeneratorService $indicatorGeneratorService)
    {
        $this->indicatorGeneratorService = $indicatorGeneratorService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(int $id): JsonResponse
    {
        $indicator = $this->indicatorGeneratorService->findIndicator($id);

        return response()->json($indicator);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Http\Requests\IndicatorRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws NotFoundGeneratorTypeException
     */
    public function create(IndicatorRequest $request): JsonResponse
    {
        $type      = $request->get('type');
        $indicator = $this->indicatorGeneratorService->generateIndicator($type);

        return response()->json($indicator);
    }
}
