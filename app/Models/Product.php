<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillabel = ['title', 'flag', 'price', 'description', 'image'];

    public function categories(){
        $this->belongsToMany(Category::class);
    }
}
