<?php

namespace Sfneal\LaravelCustomCasts\Tests\Support\Models;

use Illuminate\Database\Eloquent\Model;
use Sfneal\LaravelCustomCasts\HasCustomCasts;
use Sfneal\LaravelCustomCasts\Tests\Support\CustomCasts\Base64Cast;

class ModelWithDefaultValueForCustomCasts extends Model
{
    use HasCustomCasts;

    protected $guarded = [];
    protected $table = 'table_b';

    protected $casts = [
        'col_1' => Base64Cast::class,
    ];
}
