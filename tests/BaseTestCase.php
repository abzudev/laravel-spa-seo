<?php

namespace Abzudev\LaravelSpaSeo\Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Foundation\Application as ApplicationAlias;

class BaseTestCase extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            'Abzudev\LaravelSpaSeo\SpaSeoServiceProvider',
        ];
    }

    /**
     * @param ApplicationAlias $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }
}
