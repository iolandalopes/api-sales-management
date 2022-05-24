<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';

    protected $collection = 'employees';

    protected $fillable = [
        '_id',
        'name',
        'email',
        'cpf',
    ];
}
