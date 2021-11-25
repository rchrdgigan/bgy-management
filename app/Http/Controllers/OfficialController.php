<?php

namespace App\Http\Controllers;
use App\Models\Official;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class OfficialController extends Controller
{
    public function index()
    {
        $officials = Official::get();
        return view('brgy-manage-officials', compact('officials'),['metaTitle'=>'Baranagay Officials | Admin Panel',
        'metaHeader'=>'Baranagay Officials']);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image'         => 'nullable|image|file|max:5000',
        ]);

        if($request->hasFile('image'))
        {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/official_image',$fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.png';
        }
        $officials = Official::create([
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'nname' => $request->nickname,
            'gender'=> $request->gender,
            'civil_status'=> $request->civil_status,
            'age'=> $request->age,
            'from'=> $request->from,
            'to'=> $request->to,
            'cnumber'=> $request->contact_number,
            'bday'=> $request->birthdate,
            'bplace'=> $request->bplace,
            'email'=> $request->email,
            'street'=> $request->street,
            'purok'=> $request->purok,
            'citizenship'=> $request->citizenship,
            'religion'=> $request->religion,
            'position'=> $request->position,
            'status'=> $request->status,
            'image'=> $fileNameToStore,
        ]);
        return redirect()->route('brgy.manage-offcials')->with('sucess_message','Successfully added!');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'image'         => 'nullable|image|file|max:5000',
        ]);
        $officials = Official::findOrFail($request->id);
        $officials->fname = $request->fname;
        $officials->mname = $request->mname;
        $officials->lname = $request->lname;
        $officials->nname = $request->nickname;
        $officials->gender = $request->gender;
        $officials->civil_status = $request->civil_status;
        $officials->age = $request->age;
        $officials->from = $request->from;
        $officials->to = $request->to;
        $officials->cnumber = $request->contact_number;
        $officials->bday = $request->birthdate;
        $officials->bplace = $request->bplace;
        $officials->email = $request->email;
        $officials->street = $request->street;
        $officials->purok = $request->purok;
        $officials->citizenship = $request->citizenship;
        $officials->religion = $request->religion;
        $officials->position = $request->position;
        $officials->status = $request->status;
        if($request->hasFile('image'))
        {
            $location = 'public/official_image'.$officials->image;
            if(File::exists($location))
            {
                File::delete($location);
            }
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/official_image',$fileNameToStore);
            $officials->image = $fileNameToStore;
        }
        $officials->update();
        return redirect()->route('brgy.manage-offcials')->with('sucess_message','Successfully updated!');
    }

    public function destroy(Request $request)
    {
        $officials = Official::findOrFail($request->id);
        $officials->delete();
        return redirect()->route('brgy.manage-offcials')->with('delete_message', 'Deleted data!');
    }

    public function officialsTermList()
    {
        $dateNow = Carbon::now();
        $official = Official::where("to", ">=", $dateNow->toDateString())->get();
        return view('brgy-official', compact('official'),['metaTitle'=>'Baranagay Officials | Admin Panel',
        'metaHeader'=>'Baranagay Officials']);
    }

}
