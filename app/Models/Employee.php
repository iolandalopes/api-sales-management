<?php

namespace App\Models;

use App\Models\User;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    use Uuids;

    protected $connection = 'mongodb';
    protected $collection = 'employees';

    protected $primaryKey = '_id';

    protected $fillable = [
        '_id',
        'name',
        'email',
        'cpf',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', '_id');
    }
}
