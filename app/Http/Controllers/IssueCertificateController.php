<?php

namespace App\Http\Controllers;
use App\Models\Resident;
use App\Models\IssueCertificate;
use App\Models\ResidentIssueCertificate;
use App\Models\Official;
use Carbon\Carbon;

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
        $issue_all = IssueCertificate::get();
        $issue_all->map(function($item){
            $resident_issue_certificate = $item->resident_issue_certificate;
            $resident_issue_certificate->map(function ($listIssue){
                $item_resident_issue = Resident::findorfail($listIssue->resident_issue_id);
                $listIssue->fname = $item_resident_issue->fname;
                $listIssue->mname = $item_resident_issue->mname;
                $listIssue->lname = $item_resident_issue->lname;
                $listIssue->purok = $item_resident_issue->purok;
                $listIssue->street = $item_resident_issue->street;
                $listIssue->bday = $item_resident_issue->bday;
                $listIssue->bplace = $item_resident_issue->bplace;
            });
        });
        $issue_clearance = IssueCertificate::where('generated_type', 'Clearance')->get();
        $issue_clearance->map(function($item){
            $resident_issue_certificate = $item->resident_issue_certificate;
            $resident_issue_certificate->map(function ($listIssue){
                $item_resident_issue = Resident::findorfail($listIssue->resident_issue_id);
                $listIssue->fname = $item_resident_issue->fname;
                $listIssue->mname = $item_resident_issue->mname;
                $listIssue->lname = $item_resident_issue->lname;
                $listIssue->purok = $item_resident_issue->purok;
                $listIssue->street = $item_resident_issue->street;
                $listIssue->bday = $item_resident_issue->bday;
                $listIssue->bplace = $item_resident_issue->bplace;
            });
        });
        $issue_business = IssueCertificate::where('generated_type', 'Business Permit')->get();
        $issue_business->map(function($item){
            $resident_issue_certificate = $item->resident_issue_certificate;
            $resident_issue_certificate->map(function ($listIssue){
                $item_resident_issue = Resident::findorfail($listIssue->resident_issue_id);
                $listIssue->fname = $item_resident_issue->fname;
                $listIssue->mname = $item_resident_issue->mname;
                $listIssue->lname = $item_resident_issue->lname;
                $listIssue->purok = $item_resident_issue->purok;
                $listIssue->street = $item_resident_issue->street;
                $listIssue->bday = $item_resident_issue->bday;
                $listIssue->bplace = $item_resident_issue->bplace;
            });
        });
        $issue_indigency = IssueCertificate::where('generated_type', 'Indigency')->get();
        $issue_indigency->map(function($item){
            $resident_issue_certificate = $item->resident_issue_certificate;
            $resident_issue_certificate->map(function ($listIssue){
                $item_resident_issue = Resident::findorfail($listIssue->resident_issue_id);
                $listIssue->fname = $item_resident_issue->fname;
                $listIssue->mname = $item_resident_issue->mname;
                $listIssue->lname = $item_resident_issue->lname;
                $listIssue->purok = $item_resident_issue->purok;
                $listIssue->street = $item_resident_issue->street;
                $listIssue->bday = $item_resident_issue->bday;
                $listIssue->bplace = $item_resident_issue->bplace;
            });
        });
        return view('list-generate-certificate', compact('issue_all','issue_clearance','issue_business','issue_indigency'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'purpose'           => 'required',
            'or_number'         => 'nullable',
        ]);

        $certificate = IssueCertificate::create([
            'purpose' => $request->purpose,
            'or_number' => $request->or_number,
            'generated_type' => $request->generated_type,
            'date_issue' => $request->date_issue,
            'date_expire' => $request->date_expire,
        ]);

        $resident_issue = ResidentIssueCertificate::create([
            'issue_certificate_id' => $certificate->id,
            'resident_issue_id' => $request->resident_id,
        ]);

        return redirect()->route('gen.certificate')->with('sucess_message','Successfully added!');
    }

    public function printClearance($id)
    {
        $issue_clearance = IssueCertificate::where('generated_type', 'Clearance')->where('id', $id)->get();
        $issue_clearance->map(function($item){
            $item->purpose = nl2br(html_entity_decode($item->purpose));
            $resident_issue_certificate = $item->resident_issue_certificate;
            $resident_issue_certificate->map(function ($listIssue){
                $item_resident_issue = Resident::findorfail($listIssue->resident_issue_id);
                $listIssue->fname = $item_resident_issue->fname;
                $listIssue->mname = $item_resident_issue->mname;
                $listIssue->lname = $item_resident_issue->lname;
                $listIssue->status_p = ($item_resident_issue->status == 'Alive')? 'Active' : '';
                $listIssue->purok = $item_resident_issue->purok;
                $listIssue->street = $item_resident_issue->street;
                $listIssue->bday = $item_resident_issue->bday;
                $listIssue->bplace = $item_resident_issue->bplace;
            });
        });
        $dateNow = Carbon::now();
        $officials = Official::where('position', 'Punong Barangay')->where("to", ">=", $dateNow->toDateString())->get();
        return view('clearance-print',compact('issue_clearance','officials'));
    }

    public function printBusiness(){
        return view('business-print');
    }

    public function printIndigency(){
        return view('indigency-print');
    }
}
