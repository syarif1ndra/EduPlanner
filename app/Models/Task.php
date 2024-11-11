<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    protected $fillable = [
        'title',           // Izinkan mass assignment untuk title
        'description',
        'deadline',
        'is_completed',
        'user_id',         // Kolom user_id untuk relasi dengan User
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessor untuk menghitung waktu yang tersisa
    public function getTimeRemainingAttribute()
    {
        $now = Carbon::now();
        $deadline = Carbon::parse($this->deadline);

        if ($deadline->isPast()) {
            return 'Deadline has passed';
        }

        return $deadline->diffForHumans($now, true); // Menampilkan perbedaan waktu secara singkat
    }
}
