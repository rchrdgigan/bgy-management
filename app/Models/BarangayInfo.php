<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangayInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'barangay',
        'municipality',
        'province',
        'contact',
        'email',
        'logo',
    ];
}
