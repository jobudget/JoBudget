<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'description',
        'saving_date',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'saving_date' => 'date',
    ];
}