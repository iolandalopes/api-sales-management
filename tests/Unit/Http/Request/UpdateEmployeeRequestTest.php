<?php

namespace Tests\Unit;

use App\Http\Requests\UpdateEmployeeRequest;
use PHPUnit\Framework\TestCase;

class UpdateEmployeeRequestTest extends TestCase
{
    public function testWhenCallToRulesMethod()
    {
        $this->assertEquals([
            'name'  => 'sometimes|string',
            'email' => 'sometimes|email',
            'cpf'   => 'sometimes|string',
        ], app(UpdateEmployeeRequest::class)->rules());
    }
}
