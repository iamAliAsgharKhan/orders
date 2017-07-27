<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = [];

    public function supplier()
    {
    	return $this->belongsToMany(Supplier::class);
    }

    public function order()
    {
    	return $this->belongsTo(Order::class);
    } 

    public function orderlines()
    {
    	return $this->hasMany(Orderlines::class);
    } 
}
