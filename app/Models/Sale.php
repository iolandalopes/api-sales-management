<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    use Uuids;

    protected $connection = 'mongodb';
    protected $collection = 'sales';

    protected $primaryKey = '_id';

    protected $fillable = [
        '_id',
        'companyId',
        'clientId',
        'userId',
        'products',
        'total'
    ];
}
