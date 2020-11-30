<?php

namespace Sfneal\LaravelCustomCasts\Tests\Support\Models;

class ModelWithAliasedCustomCasts extends ModelWithCustomCasts
{
    protected $casts = [
        'col_1' => 'base64',
    ];
}
