<?php

namespace Sfneal\LaravelCustomCasts\Tests\Support\CustomCasts;

use Sfneal\LaravelCustomCasts\CustomCastBase;

class Base64Cast extends CustomCastBase
{
    public function setAttribute($value)
    {
        return base64_encode($value);
    }

    public function castAttribute($value)
    {
        return $value !== null
            ? base64_decode($value)
            : null;
    }
}
