<?php

namespace Tests\Unit;

use App\Http\Middleware\JsonResponse;
use PHPUnit\Framework\TestCase;
use Illuminate\Http\Request;

class JsonResponseMiddlewareTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testChangeHeader()
    {
        $request = new Request();

        $middleware = new JsonResponse();

        $middleware->handle($request, function ($request) {
            $this->assertEquals('application/json', $request->headers->get('Accept'));
        });
    }
}
