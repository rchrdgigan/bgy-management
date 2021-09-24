<?php

namespace App\Http\Controllers;
use App\Models\Resident;

use Illuminate\Http\Request;

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
        return back()->with('message', 'Successfully Added!');
      
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
        return view('resident-profile',compact('resident'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
