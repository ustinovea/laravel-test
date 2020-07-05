<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Indicator
 */
class Indicator extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'type', 'value',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Timestamps
     *
     * @var bool
     */
    public $timestamps = false;
}
