<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cake extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'id' => 'int',
        'name' => 'string',
        'weight' => 'int',
        'value' => 'double',
        'inventory' => 'int',
        'created_at' => 'datetime:d/m/Y h:m',
        'updated_at' => 'datetime:d/m/Y h:m',
        'deleted_at' => 'datetime:d/m/Y h:m',
    ];

    protected $fillable = [
        'name',
        'weight',
        'value',
        'inventory',
    ];

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
}
