<?php

namespace App\Http\Controllers;
use App\Models\Resident;
use Illuminate\Http\Request;

class IssueCertificateController extends Controller
{
    public function index()
    {
        $resident = Resident::get();
        return view('list-issue-certificate', compact('resident'));
    }

    public function listGenCertificate()
    {
        return view('list-generate-certificate');
    }
}
