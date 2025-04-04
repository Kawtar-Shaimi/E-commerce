<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = ['client_id'];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function wishlistBooks(){
        return $this->hasMany(WishlistBook::class);
    }
}
