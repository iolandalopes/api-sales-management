<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;

class CompanyService
{
    public function create(array $data): Model
    {
        return Company::create($data);
    }

    public function update(Company $company, array $data): bool
    {
        return $company->update($data);
    }

    public function delete(Company $company): ?bool
    {
        return $company->delete();
    }
}
