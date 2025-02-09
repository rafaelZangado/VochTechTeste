<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'economic_group_id'
    ];

    public function economicGroup()
    {
        return $this->belongsTo(EconomicGroup::class);
    }

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
