<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=[];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function orderitems(){
        return $this->hasMany(OrderItem::class);
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }
    
}
