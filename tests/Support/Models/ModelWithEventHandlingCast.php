<?php

namespace Sfneal\LaravelCustomCasts\Tests\Support\Models;

use Sfneal\LaravelCustomCasts\Tests\Support\CustomCasts\EventHandlingCast;

class ModelWithEventHandlingCast extends ModelWithCustomCasts
{
    protected $casts = [
        'col_1' => EventHandlingCast::class,
    ];
}
