<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
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
        'bday',
        'bplace',
        'cnumber',
        'email',
        'street',
        'purok',
        'citizenship',
        'ddperson',
        'religion',
        'occupation',
        'status',
        'image',
    ];

    public function assign_resident_record()
    {
        return $this->hasMany(AssignResidentRecord::class);
    }
   
}
