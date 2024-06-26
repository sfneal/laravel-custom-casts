<?php

namespace Vkovic\LaravelCustomCasts\Test\Support\Models;

use Illuminate\Database\Eloquent\Model;
use Vkovic\LaravelCustomCasts\HasCustomCasts;
use Vkovic\LaravelCustomCasts\Test\Support\CustomCasts\Base64Cast;

class ModelWithDefaultValueForCustomCasts extends Model
{
    use HasCustomCasts;

    protected $guarded = [];
    protected $table = 'table_b';

    protected $casts = [
        'col_1' => Base64Cast::class,
    ];
}
