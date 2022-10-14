<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    use Uuids;

    protected $connection = 'mongodb';
    protected $collection = 'companies';

    protected $primaryKey = '_id';

    protected $fillable = [
        '_id',
        'name',
        'code',
        'isActive',
    ];
}
