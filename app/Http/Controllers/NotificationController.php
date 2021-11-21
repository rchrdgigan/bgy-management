<?php

namespace App\Http\Controllers;
use App\Models\Resident;
use App\Models\DisasterNofication;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $resident = Resident::get();
        $disaster = DisasterNofication::get();
        return view('list-notification',compact('resident','disaster'));
    }

    public function floodNotif()
    {
        $resident = Resident::get();
        if(!$resident->isEmpty()){
            DisasterNofication::create([
                'type' => "Flood Alert",
                'purok_street' => "All",
            ]);
            $disaster = DisasterNofication::get();
            return view('list-notification',compact('resident','disaster'));
        }else{
            return redirect()->route('list.notif')->with('warning_message','Resident not found! Please set residents information to be notified.');  
        }
    }

    public function destroy($id)
    {
        $disaster = DisasterNofication::find($id);
        $disaster->delete();
        return redirect()->route('list.notif')->with('delete_message', 'Deleted data!');
    }

    public function fireForm()
    {
        return view('fire-notification-form');
    }
}
