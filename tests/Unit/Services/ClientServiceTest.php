<?php

namespace Tests\Unit\Services;

use App\Models\Client;
use App\Models\Company;
use App\Models\User;
use App\Services\ClientService;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase as TestsTestCase;

class ClientServiceTest extends TestsTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->service = app(ClientService::class);

        $this->company = Company::factory()->create([
            'name' => 'company',
            'isActive' => true,
        ]);
    }

    public function testWhenCallToCreateMethodFromClientService(): void
    {
        Sanctum::actingAs(
            User::factory()->create()
        );

        $data = [
            'name' => 'Name',
            'email' => 'email@email.com',
            'cpf' => '12334567890',
            'userId' => auth()->user()->id,
            'companyId' => $this->company->id,
        ];

        $this->service->create($data, $this->company->id);

        $this->assertDatabaseHas('clients', $data);
    }

    public function testWhenCallToUpdateMethodFromClientService(): void
    {
        Sanctum::actingAs(
            User::factory()->create()
        );

        $client = Client::factory()->create([
            'userId' => auth()->user()->id,
            'companyId' => $this->company->id,
        ]);

        $data = ['name' => 'Update Name'];

        $this->assertTrue($this->service->update($client, $data));
    }

    public function testWhenCallToDeleteMethodFromClientService(): void
    {
        Sanctum::actingAs(
            User::factory()->create()
        );

        $client = Client::factory()->create([
            'userId' => auth()->user()->id,
            'companyId' => $this->company->id,
        ]);

        $this->assertTrue($this->service->delete($client));
        $this->assertDatabaseMissing('clients', $client->toArray());
    }
}
