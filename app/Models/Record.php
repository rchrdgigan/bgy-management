<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'complianant_name',
        'complianant_statement',
        'respondent_name',
        'location_incident',
        'type_incident',
        'date_time_reported',
        'date_time_incident',
        'status',
        'remarks',
        'action_taken',
    ];

    public function assign_resident_record()
    {
        return $this->hasMany(AssignResidentRecord::class);
    }

}
