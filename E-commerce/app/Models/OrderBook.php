<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderBook extends Model
{
    protected $table = "orders_books";

    protected $fillable = ['order_id', 'book_id', 'quantity', 'total'];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }
}
