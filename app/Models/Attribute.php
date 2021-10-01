<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    public function attributevalue()
    {
        return $this->hasOne(AttributeValue::class);
    }
}
