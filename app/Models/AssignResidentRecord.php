<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignResidentRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'record_id',
        'resident_id',
    ];

    public function record()
    {
        return $this->belongsTo(Record::class);
    }

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }
}
