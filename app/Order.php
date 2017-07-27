<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function supplier()
    {
    	return $this->belongsTo(Supplier::class);
    }

    public function items()
     {
     	return $this->hasMany(Item::class);
     }  

    public function orderlines()
    {
    	return $this->hasMany(Orderlines::class);
    }
}
