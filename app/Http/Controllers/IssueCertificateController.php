<?php

namespace App\Http\Controllers;
use App\Models\Resident;
use App\Models\IssueCertificate;
use App\Models\ResidentIssueCertificate;
use App\Models\Official;
use Carbon\Carbon;
use Alert;

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
            'cedula'         => 'nullable',
        ]);

        $certificate = IssueCertificate::create([
            'purpose' => $request->purpose,
            'or_number' => $request->or_number,
            'cedula' => $request->cedula,
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
                $listIssue->married_to = $item_resident_issue->married_to;
                $listIssue->civil_status = $item_resident_issue->civil_status;
            });
        });
        $dateNow = Carbon::now();
        $officials = Official::where('position', 'Punong Barangay')->where("to", ">=", $dateNow->toDateString())->first();
        if($officials == null){
            return redirect()->route('gen.certificate')->with('warning_message','Brgy. captain not found! Please set captain information.');
        }else{
            return view('clearance-print',compact('issue_clearance','officials'));
        }
    }

    public function printBusiness($id)
    {
        $issue_business = IssueCertificate::where('generated_type', 'Business Permit')->where('id', $id)->get();
        $issue_business->map(function($item){
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
                $listIssue->married_to = $item_resident_issue->married_to;
                $listIssue->civil_status = $item_resident_issue->civil_status;
            });
        });
        $dateNow = Carbon::now();
        $brgyCaptain = Official::where('position', 'Punong Barangay')->where("to", ">=", $dateNow->toDateString())->first();
        $brgySecretary = Official::where('position', 'Brgy. Secretary')->where("to", ">=", $dateNow->toDateString())->first();
        if($brgyCaptain == null || $brgySecretary == null ){
            return redirect()->route('gen.certificate')->with('warning_message','Brgy. captain and secretary not found! Please set captain and secretary information.');
        }else{
            return view('business-print',compact('issue_business','brgyCaptain','brgySecretary'));
        }
    }

    public function printIndigency($id)
    {
        $issue_indigency = IssueCertificate::where('generated_type', 'Indigency')->where('id', $id)->get();
        $issue_indigency->map(function($item){
            $item->purpose = filter_var(nl2br(html_entity_decode($item->purpose)), FILTER_SANITIZE_STRING);
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
                $listIssue->age = Carbon::now()->format('Y') - Carbon::parse($item_resident_issue->bday)->format('Y');
                $listIssue->bplace = $item_resident_issue->bplace;
                $listIssue->married_to = $item_resident_issue->married_to;
                $listIssue->civil_status = $item_resident_issue->civil_status;
            });
        });
        $dateNow = Carbon::now();
        $brgyCaptain = Official::where('position', 'Punong Barangay')->where("to", ">=", $dateNow->toDateString())->first();
        $brgySecretary = Official::where('position', 'Brgy. Secretary')->where("to", ">=", $dateNow->toDateString())->first();
        return view('indigency-print',compact('issue_indigency','brgyCaptain','brgySecretary'));
    }
}
