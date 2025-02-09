<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'flag_id',
        'address'
    ];

    public function flag()
    {
        return $this->belongsTo(Flag::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
