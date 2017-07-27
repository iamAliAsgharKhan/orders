<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderlines extends Model
{
	protected $guarded = [];
	
    public function orders()
    {
    	return $this->belongsTo(Order::class);
    } 

    public function item()
    {
    	return $this->hasOne(Item::class);
    } 
}
