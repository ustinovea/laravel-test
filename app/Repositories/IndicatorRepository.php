<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Indicator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class IndicatorRepository
 */
class IndicatorRepository
{
    /**
     * Find by id
     *
     * @param int $id
     *
     * @return Indicator
     *
     * @throws ModelNotFoundException
     */
    public function findById(int $id): Indicator
    {
        /** @var Indicator $indicator */
        $indicator = Indicator::findOrFail($id);

        return $indicator;
    }

    /**
     * Store new indicator
     *
     * @param string $type
     * @param string $value
     *
     * @return Indicator
     */
    public function store(string $type, string $value): Indicator
    {
        $indicator        = new Indicator();
        $indicator->type  = $type;
        $indicator->value = $value;

        $indicator->save();

        return $indicator;
    }
}
