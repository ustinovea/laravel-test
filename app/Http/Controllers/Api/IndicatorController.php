<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Requests\IndicatorRequest;
use App\Services\IndicatorGeneratorService;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

use Exception;

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
        try {
            $indicator = $this->indicatorGeneratorService->findIndicator($id);
            $response  = ['success' => true, 'result' => $indicator];
        } catch (ModelNotFoundException $exception) {
            $response = ['success' => false, 'error' => $exception->getMessage()];
        }

        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Http\Requests\IndicatorRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(IndicatorRequest $request): JsonResponse
    {
        $type = $request->get('type');
        try {
            $indicator = $this->indicatorGeneratorService->generateIndicator($type);
            $response  = ['success' => true, 'result' => $indicator];
        } catch (Exception $exception) {
            $response = ['success' => false, 'error' => $exception->getMessage()];
        }

        return response()->json($response);
    }
}
