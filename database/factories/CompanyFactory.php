<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
       /**
     * @var string
     */
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            '_id' => $this->faker->uuid(),
            'name' => 'name',
            'code' => 00000000000,
        ];
    }
}
