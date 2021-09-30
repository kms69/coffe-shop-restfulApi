<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;
    protected $fillable = ['price','quantity','order_status','order_id','product_id'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
