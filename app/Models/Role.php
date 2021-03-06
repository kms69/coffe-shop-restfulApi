<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'role'
    ];
    public function userrole()
    {
        return $this->hasOne(User_Role::class);
    }
}
