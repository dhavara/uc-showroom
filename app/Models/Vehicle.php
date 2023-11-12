<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model {
    use HasFactory;

    protected $guarded = ['id'];

    public function orders() {
        return $this->belongsToMany(Order::class, 'order_vechicles');
    }

    public function type() {
        return $this->morphTo();
    }

    public function bike() {
        return $this->hasOne(Bike::class);
    }

    public function truck() {
        return $this->hasOne(Truck::class);
    }

    public function car() {
        return $this->hasOne(Car::class);
    }
}
