<?php

namespace Sfneal\LaravelCustomCasts\Tests\Support\Models;

use Sfneal\LaravelCustomCasts\Tests\Support\CustomCasts\Base64Cast;

class ModelWithNullableValueForCustomCasts extends ModelWithCustomCasts
{
    protected $table = 'table_c';

    protected $casts = [
        'col_1' => Base64Cast::class,
    ];
}
