<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['tracking', 'weight', 'description', 'customer_id', 'status_id'];

    use HasFactory;

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }
}


