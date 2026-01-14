<?php

namespace Alamindev27\ApiResponder\Tests;

use Alamindev27\ApiResponder\ApiResponder;
use Orchestra\Testbench\TestCase;

class ApiResponderTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \Alamindev27\ApiResponder\ApiResponderServiceProvider::class,
        ];
    }

    public function test_success_response()
    {
        $responder = new ApiResponder();
        $response = $responder->success(['name' => 'Amin']);
        $this->assertArrayHasKey('status', $response->getData(true));
    }

    public function test_error_response()
    {
        $responder = new ApiResponder();
        $response = $responder->error('Error occurred');
        $this->assertEquals(false, $response->getData(true)['status']);
    }
}
