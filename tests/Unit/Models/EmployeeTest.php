<?php

namespace Tests\Unit;

use App\Models\Employee;
use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCheckIfEmployeeColumnsIsCorrect(): void
    {
        $employee = new Employee();

        $expected = [
            '_id',
            'name',
            'email',
            'cpf',
            'user_id',
        ];

        $arrayCompared = array_diff($expected, $employee->getFillable());

        $this->assertEquals(0, count($arrayCompared));
    }
}
