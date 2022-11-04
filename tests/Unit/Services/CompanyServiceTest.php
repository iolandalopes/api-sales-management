<?php

namespace Tests\Unit\Services;

use App\Models\Company;
use App\Models\User;
use App\Services\CompanyService;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase as TestsTestCase;

class CompanyServiceTest extends TestsTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->service = app(CompanyService::class);
    }

    public function testWhenCallToCreateMethodFromCompanyService(): void
    {
        $data = [
            'name' => 'Company',
            'code' => '122222222223',
            'isActive' => true,
        ];

        $this->service->create($data);

        $this->assertDatabaseHas('companies', $data);
    }

    public function testWhenCallToUpdateMethodFromCompanyService(): void
    {
        $company = Company::factory()->create([
            'name' => 'New Company',
            'code' => '122222222224',
            'isActive' => true,
        ]);

        $data = ['name' => 'Update New Company'];

        $this->assertTrue($this->service->update($company, $data));
        $this->assertDatabaseHas('companies', $data);
    }

    public function testWhenCallToDeleteMethodFromCompanyService(): void
    {
        $company = Company::factory()->create([
            'name' => 'New Company',
            'code' => '122222222225',
            'isActive' => true,
        ]);

        $this->assertDatabaseHas('companies', ['_id' => $company->id]);

        $this->assertTrue($this->service->delete($company));
        $this->assertDatabaseMissing('companies', ['_id' => $company->id]);
    }
}
