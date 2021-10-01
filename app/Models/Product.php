<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','category_id','price','size','milk','shots','location'];


    public function orderDetails()
    {
        return $this->hasMany(Order_Detail::class,'product_id');
    }
    public function productattribute()
    {
        return $this->hasMany(ProductAttribute::class,'product_id' );
    }
}
