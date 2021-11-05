<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'purpose',
        'or_number',
        'generated_type',
        'date_issue',
        'date_expire',
    ];

    public function resident_issue_certificate()
    {
        return $this->hasMany(ResidentIssueCertificate::class);
    }

}
