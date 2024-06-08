<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    // Get Session
    public function getSessionData(Request $request){
        if($request->session()->has('uotlet')){
            return $request->session()->get('uotlet');
        }else{
            return 'Session has no value';
        }
    }

    public function storeSessionData(Request $request){
        $request->session()->put('uotlet','Web');
        return 'Velue successfully added to the session';
    }

    public function destroySessionData(Request $request){
        $request->session()->forget('uotlet');
        return 'Session velue successfully destroy';
    }
}
