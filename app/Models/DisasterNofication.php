<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisasterNofication extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'purok_street',
    ];
}
