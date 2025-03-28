<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
        'category_id',
        'publisher_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cartProducts(){
        return $this->hasMany(CartProduct::class);
    }

    public function orderProducts(){
        return $this->hasMany(OrderProduct::class);
    }

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }
}
