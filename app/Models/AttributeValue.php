<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;
    public function productattribute()
    {
        return $this->belongsTo(ProductAttribute::class);
    }
    public function attribute()
    {
        return $this->hasMany(Attribute::class);
    }
}
