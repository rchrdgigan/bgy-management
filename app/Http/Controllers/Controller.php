<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use RealRashid\SweetAlert\Facades\Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        $this->middleware(function($request, $next){
            if(session('sucess_message')) {
                Alert::success('Success!', session('sucess_message'));
            }
            if(session('delete_message')) {
                Alert::info('Delete!', session('delete_message'));
            }
            if(session('warning_message')) {
                Alert::warning('No Data Found!', session('warning_message'));
            }
            if(session('sent_message')) {
                Alert::success('Message Sent!', session('sent_message'));
            }
            if(session('not_sent')) {
                Alert::error('Message Not Sent!', session('not_sent'));
            }
            return $next($request);
        });
    }
}
