<?php

namespace Tests\Unit\Services;

use App\Models\Company;
use App\Models\Product;
use App\Services\ProductService;
use Tests\TestCase as TestsTestCase;

class ProductServiceTest extends TestsTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->service = app(ProductService::class);
        $this->companyId = Company::factory()->create()['_id'];
    }

    public function testWhenCallToCreateMethodFromProductService(): void
    {
        $data = [
            'name' => 'New Product',
            'description' => 'description description',
            'price' => 12.00,
        ];

        $this->service->create($data, $this->companyId);

        $this->assertDatabaseHas('products', $data);
    }

    public function testWhenCallToUpdateMethodFromProductService(): void
    {
        $product = Product::factory()->create();

        $data = ['name' => 'Update New Product'];

        $this->assertTrue($this->service->update($product, $data));
        $this->assertDatabaseHas('products', $data);
    }

    public function testWhenCallToDeleteMethodFromProductService(): void
    {
        $product = Product::factory()->create();

        $this->assertDatabaseHas('products', ['_id' => $product->id]);

        $this->assertTrue($this->service->delete($product));
        $this->assertDatabaseMissing('products', ['_id' => $product->id]);
    }

    public function testWhenCallToShowMethodFromProductService(): void
    {
        $product = Product::factory()->create([
            'name' => 'New Product',
            'description' => 'description description',
            'price' => 12.00,
            'companyId' => $this->companyId ,
        ]);

        $this->assertEquals($product->toArray(), $this->service->show($this->companyId , $product->id)->toArray());
    }
}
