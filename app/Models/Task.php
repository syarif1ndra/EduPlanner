<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',           // Izinkan mass assignment untuk title
        'description',
        'deadline',
        'is_completed',
        'user_id',         // Kolom user_id untuk relasi dengan User
    ];

    public function user(){
        return $this->hasMany(User::class);
    }
}
