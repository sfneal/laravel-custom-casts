<?php

namespace Sfneal\LaravelCustomCasts\Tests\Integration;

use DB;
use Sfneal\LaravelCustomCasts\Tests\Support\Models\ModelWithDefaultValueForCustomCasts;
use Sfneal\LaravelCustomCasts\Tests\TestCase;

class ModelWithDefaultValueForCustomCastFieldTest extends TestCase
{
    /**
     * @test
     */
    public function default_custom_cast_field_will_remain_default_when_field_not_present()
    {
        $model = new ModelWithDefaultValueForCustomCasts;
        $model->save(); // Save with default value (defined in migrations)

        $tableRow = DB::table('table_b')->first();

        $this->assertSame('col_1_value', base64_decode($tableRow->col_1));
    }
}
