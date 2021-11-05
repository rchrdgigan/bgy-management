<?php

namespace App\Http\Controllers;
use App\Models\Resident;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resident = Resident::get();
        return view('list-residents',compact('resident'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            $path = $request->file('image')->storeAs('public/resident_image',$fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'noimage.png';
        }
        $resident = Resident::create([
            'fname' => $request->fname,
            'mname' => $request->mname,
            'lname' => $request->lname,
            'nname' => $request->nickname,
            'gender'=> $request->gender,
            'civil_status'=> $request->civil_status,
            'age'=> $request->age,
            'bday'=> $request->birthdate,
            'bplace'=> $request->bplace,
            'cnumber'=> $request->contact_number,
            'email'=> $request->email,
            'street'=> $request->street,
            'purok'=> $request->purok,
            'citizenship'=> $request->citizenship,
            'ddperson'=> $request->disabled_person,
            'religion'=> $request->religion,
            'occupation'=> $request->occupation,
            'status'=> $request->status,
            'image'=> $fileNameToStore,
        ]);
        return redirect()->route('list.residents')->with('sucess_message','Successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //View Profile
        $resident = Resident::findOrFail($id);
        $resident->first();
        $case = Resident::where('id',$id)->get();
        $case->map(function($item){
            $assign_resident_record = $item->assign_resident_record;
            $assign_resident_record->map(function ($itemRecord){
                $item_record = Record::findorfail($itemRecord->record_id);
                $itemRecord->status_case = $item_record->status;
                $itemRecord->remarks = $item_record->remarks;
                $itemRecord->type_incident = $item_record->type_incident;
                $itemRecord->date_time_reported = $item_record->date_time_reported;
                $itemRecord->date_time_incident = $item_record->date_time_incident;
            });
        });
        return view('resident-profile',compact('resident','case'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //Show Profile to Edit
         $resident = Resident::findOrFail($id);
         $resident->first();
         return view('edit-residents',compact('resident'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'image'         => 'nullable|image|file|max:5000',
        ]);
        $resident = Resident::findOrFail($id);
        $resident->fname = $request->fname;
        $resident->mname = $request->mname;
        $resident->lname = $request->lname;
        $resident->nname = $request->nickname;
        $resident->gender = $request->gender;
        $resident->civil_status = $request->civil_status;
        $resident->age = $request->age;
        $resident->bday = $request->birthdate;
        $resident->bplace = $request->bplace;
        $resident->cnumber = $request->contact_number;
        $resident->email = $request->email;
        $resident->street = $request->street;
        $resident->purok = $request->purok;
        $resident->citizenship = $request->citizenship;
        $resident->ddperson = $request->disabled_person;
        $resident->religion = $request->religion;
        $resident->occupation = $request->occupation;
        $resident->status = $request->status;
        if($request->hasFile('image'))
        {
            $location = 'public/resident_image'.$resident->image;
            if(File::exists($location))
            {
                File::delete($location);
            }
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/resident_image',$fileNameToStore);
            $resident->image = $fileNameToStore;
        }
        $resident->update();
        return redirect()->route('list.residents')->with('sucess_message','Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $resident = Resident::findOrFail($request->id);
        $resident->delete();
        return redirect()->route('list.residents')->with('delete_message', 'Deleted data!');
    }
}
