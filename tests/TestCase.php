<?php

namespace Vkovic\LaravelCustomCasts\Test;

use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as OrchestraTestCase;
use Vkovic\LaravelCustomCasts\Test\Support\CustomCasts\Base64Cast;

use function Vkovic\LaravelCustomCasts\package_path;

class TestCase extends OrchestraTestCase
{
    /**
     * Setup the test environment.
     *
     * @throws \Exception
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(package_path('tests/database/migrations'));
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
            'driver'   => 'sqlite',
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
     * @throws \ReflectionException
     *
     * @return mixed
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
