<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentIssueCertificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue_certificate_id',
        'resident_issue_id',
    ];

    public function issue_certificate()
    {
        return $this->belongsTo(IssueCertificate::class);
    }

}
