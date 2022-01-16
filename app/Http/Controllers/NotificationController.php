<?php

namespace App\Http\Controllers;
use App\Models\Resident;
use App\Models\Official;
use Carbon\Carbon;
use App\Models\DisasterNofication;
use App\Models\MeetingNotification;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $meeting = MeetingNotification::get();
        $resident = Resident::get();
        $disaster = DisasterNofication::get();
        return view('list-notification',compact('resident','disaster','meeting'),['metaTitle'=>'SMS Notification | Admin Panel',
        'metaHeader'=>'SMS Notification']);
    }

    public function floodNotif()
    {
        function itexmo($number,$message,$apicode,$passwd){
            $ch = curl_init();
            $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
            curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, 
                    http_build_query($itexmo));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            return curl_exec ($ch);
            curl_close ($ch);
        }
        $resident = Resident::get();
        if(!$resident->isEmpty()){

            foreach($resident as $data2)
            {
                $msg = $_POST['msg'];
                $number = $data2->cnumber;
                //Attach the API
                $api = "TR-DRAHC845673_IPPCB";
                $api_pass = "g8g)$!b8](";

                if(!empty($_POST['msg']))
                {               
                    $result = itexmo($number,$msg,$api,$api_pass);
                    if ($result == ""){
                        return redirect()->route('list.notif')->with('not_sent','iTexMo: No response from server!!!
                        Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
                        Please CONTACT US for help.');
                    }else if ($result == 0){
                        DisasterNofication::create([
                            'type' => "Flood Alert",
                            'purok_street' => "All",
                        ]);
                        return redirect()->route('list.notif')->with('sent_message','Flood notification was sent!');
                    }
                    else{	
                        return redirect()->route('list.notif')->with('warning_message','Error Num '. $result .' was encountered!');
                    }
                }
            }
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
        return view('fire-notification-form',['metaTitle'=>'SMS Notification | Admin Panel',
        'metaHeader'=>'SMS Notification']);
    }

    public function fireNotif(Request $request)
    {
        function itexmo($number,$message,$apicode,$passwd){
            $ch = curl_init();
            $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
            curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, 
                    http_build_query($itexmo));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            return curl_exec ($ch);
            curl_close ($ch);
        }
        $resident = Resident::where('purok',$request->purok)->get();
        if($resident->isEmpty()){
            return back()->with('warning_message','Please type specific location in purok Ex: 1, 2, 3 etc.!');
        }else{
            foreach($resident as $data2)
            {
                $msg = $_POST['msg'];
                $number = $data2->cnumber;
                //Attach the API
                $api = "TR-DRAHC845673_IPPCB";
                $api_pass = "g8g)$!b8](";

                if(!empty($_POST['msg']))
                {               
                    $result = itexmo($number,$msg,$api,$api_pass);
                    if ($result == ""){
                        return redirect()->route('list.notif')->with('not_sent','iTexMo: No response from server!!!
                        Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
                        Please CONTACT US for help.');
                    }else if ($result == 0){
                        DisasterNofication::create([
                            'type' => "Fire Alert",
                            'purok_street' => $request->purok,
                        ]);
                        return redirect()->route('list.notif')->with('sent_message','Fire notification was sent!');
                    }
                    else{
                        return redirect()->route('list.notif')->with('warning_message','Error Num '. $result .' was encountered!');
                    }
                }
            }
        }
    }

    public function officialNotif(Request $request)
    {
        function itexmo($number,$message,$apicode,$passwd){
            $ch = curl_init();
            $itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
            curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, 
                    http_build_query($itexmo));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            return curl_exec ($ch);
            curl_close ($ch);
        }
        $dateNow = Carbon::now();
        $official = Official::where('position',$request->position)->where("to", ">=", $dateNow->toDateString())->get();
        if($official->isEmpty()){
            return back()->with('warning_message','Officials not found! Please set officials position to be notified.');
        }else{
            foreach($official as $data2)
            {
                $msg = $_POST['msg'];
                $number = $data2->cnumber;
                //Attach the API
                $api = "TR-DRAHC845673_IPPCB";
                $api_pass = "g8g)$!b8](";

                if(!empty($_POST['msg']))
                {               
                    $result = itexmo($number,$msg,$api,$api_pass);
                    if ($result == ""){
                        return redirect()->route('list.notif')->with('not_sent','iTexMo: No response from server!!!
                        Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
                        Please CONTACT US for help.');
                    }else if ($result == 0){
                        MeetingNotification::create([
                            'type' => $request->meeting,
                            'whos' => $request->position,
                            'message' => $request->msg,
                        ]);
                        return redirect()->route('list.notif')->with('sent_message','Metting notification was sent!');
                    }
                    else{
                        return redirect()->route('list.notif')->with('warning_message','Error Num '. $result .' was encountered!');
                    }
                }
            }
        }
    }

    public function destroyMeeting($id)
    {
        $meeting = MeetingNotification::find($id);
        $meeting->delete();
        return redirect()->route('list.notif')->with('delete_message', 'Deleted data!');
    }
}
