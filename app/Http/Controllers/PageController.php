<?php

namespace App\Http\Controllers;
use App\Models\BarangayInfo;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function showInfo()
    {
        $data = BarangayInfo::first();
        return view('brgy-info',compact('data'));
    }

    public function updateInfo(Request $request)
    {
        $validated = $request->validate([
            'logo'         => 'nullable',
        ]);
                
        $brgy_info = BarangayInfo::first();
        if($brgy_info == null){
            if($request->hasFile('image'))
            {
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('image')->storeAs('public/bgry_logo',$fileNameToStore);
            }
            else
            {
                $fileNameToStore = 'noimage.png';
            }
            BarangayInfo::create([
                'barangay' => $request->bname,
                'municipality'=> $request->municipality,
                'province'=> $request->provice,
                'contact'=> $request->cpnumber,
                'email'=> $request->email,
                'logo'=> $fileNameToStore,
            ]);
    
            return redirect()->route('brgy.info')->with('sucess_message','Successfully Updated!');
        }else{
            $data = BarangayInfo::find($brgy_info->id);
            $data->barangay = $request->bname;
            $data->municipality = $request->municipality;
            $data->province = $request->provice;
            $data->contact = $request->cpnumber;
            $data->email = $request->email;
            if($request->hasFile('image'))
            {
                $location = 'public/bgry_logo'.$data->image;
                if(File::exists($location))
                {
                    File::delete($location);
                }
                $filenameWithExt = $request->file('image')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $path = $request->file('image')->storeAs('public/bgry_logo',$fileNameToStore);
                $data->logo = $fileNameToStore;
            }
            $data->update();

            return redirect()->route('brgy.info')->with('sucess_message','Successfully Updated!');

        }
        
    }
}
