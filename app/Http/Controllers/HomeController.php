<?php

namespace App\Http\Controllers;
use App\Models\Official;
use App\Models\Resident;
use App\Models\IssueCertificate;
use App\Models\Record;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $officials = Official::get();
        $record = Record::count();
        $issue_all = IssueCertificate::count();
        $count_resident = Resident::count();
        $count_official = $officials->count();

        return view('home',compact('officials','count_official','count_resident','issue_all','record'));
    }
}
