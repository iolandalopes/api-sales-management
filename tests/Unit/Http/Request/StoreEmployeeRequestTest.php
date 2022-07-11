<?php

namespace Tests\Unit;

use App\Http\Requests\StoreEmployeeRequest;
use PHPUnit\Framework\TestCase;

class StoreEmployeeRequestTest extends TestCase
{
    public function testWhenCallToCreateMethodFromEmployeeService()
    {
        $this->assertEquals([
            'name'  => 'required|string',
            'email' => 'required|email|unique:employees,email',
            'cpf'   => 'required|integer',
        ], app(StoreEmployeeRequest::class)->rules());
    }
}
