<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->hasMany(Category::class);
    }
    public function orderDetails()
    {
        return $this->hasMany(Order_Detail::class);
    }
}
