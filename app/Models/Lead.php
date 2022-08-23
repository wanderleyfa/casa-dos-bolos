<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'id' => 'int',
        'name' => 'string',
        'email' => 'string',
        'created_at' => 'datetime:d/m/Y h:m',
        'updated_at' => 'datetime:d/m/Y h:m',
        'deleted_at' => 'datetime:d/m/Y h:m',
    ];

    protected $fillable = [
        'name',
        'email',
        'cakes_id'
    ];
}
