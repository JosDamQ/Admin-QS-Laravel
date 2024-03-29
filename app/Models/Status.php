<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory;

    protected $table = 'statuses';

    protected $guarded = ['id'];

    protected $fillable = ['name', 'description', 'order'];

    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
