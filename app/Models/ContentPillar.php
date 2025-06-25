<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Impor model User

class ContentPillar extends Model
{
    protected $fillable = [
        'name',
        'description',
        'percentage',
        'color',
        'user_id', // Tambahkan user_id ke fillable untuk memungkinkan mass assignment
    ];

    // Definisikan relasi dengan User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}