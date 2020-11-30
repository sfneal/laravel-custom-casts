<?php

namespace Sfneal\LaravelCustomCasts\Tests\Support\Models;

use Illuminate\Database\Eloquent\Model;
use Sfneal\LaravelCustomCasts\HasCustomCasts;

class ModelWithDefaultValue extends Model
{
    use HasCustomCasts;

    protected $guarded = [];
    protected $table = 'table_b';
}
