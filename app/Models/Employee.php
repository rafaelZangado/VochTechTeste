<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
        'email',
        'position',
        'unit_id'
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
