<?php

namespace Sfneal\LaravelCustomCasts\Tests;

use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Sfneal\LaravelCustomCasts\Tests\Support\CustomCasts\Base64Cast;

class TestCase extends OrchestraTestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     * @throws \Exception
     */
    public function setUp(): void
    {
        parent::setUp();

        include_once __DIR__.'/database/migrations/0000_00_00_000000_create_package_test_tables.php';

        (new \CreatePackageTestTables())->up();
    }

    /**
     * Define environment setup.
     *
     * @param Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
        ]);

        $app['config']->set('custom_casts.base64', Base64Cast::class);
    }

    /**
     * Call protected or private method on object.
     *
     * @param object $object
     * @param string $methodName
     * @param mixed  $args
     *
     * @return mixed
     *
     * @throws \ReflectionException
     */
    protected static function callProtectedMethod($object, $methodName, $args)
    {
        $class = new \ReflectionClass($object);
        $method = $class->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, (array) $args);
    }

    /**
     * Get protected or private property of an object.
     *
     * @param object $object
     * @param string $property
     *
     * @return mixed
     */
    protected static function getProtectedProperty($object, $property)
    {
        $reflection = new \ReflectionObject($object);
        $property = $reflection->getProperty($property);
        $property->setAccessible(true);

        return $property->getValue($object);
    }
}
