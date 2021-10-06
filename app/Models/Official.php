<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'mname',
        'lname',
        'nname',
        'gender',
        'civil_status',
        'age',
        'from',
        'to',
        'cnumber',
        'bday',
        'bplace',
        'email',
        'street',
        'purok',
        'citizenship',
        'religion',
        'position',
        'status',
        'image',
    ];
}
