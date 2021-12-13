<?php

namespace YasinKose\ApiResponder\Tests;

use YasinKose\ApiResponder\Facades\ApiResponder;
use YasinKose\ApiResponder\ServiceProvider;
use Orchestra\Testbench\TestCase;

class ApiResponderTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'api-responder' => ApiResponder::class,
        ];
    }

    public function testExample()
    {
        $this->assertEquals(1, 1);
    }
}
