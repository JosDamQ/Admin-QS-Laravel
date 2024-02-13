<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    /*public function packages(): HasMany
    {
        return $this->hasMany(Package::class);
    }*/

    protected $fillable = [
        'name',
        'surname',
        'code',
        'email',
        'phone',
        'password',
    ];

    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
