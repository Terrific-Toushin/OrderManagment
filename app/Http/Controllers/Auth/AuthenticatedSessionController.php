<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use DB;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        // return view('auth.login');
//        $tblRestName_data = DB::connection('sqlsrv')->table('tblRestName')->orderBy('ResName')->get();
        $tblRestName_data = DB::connection('mysql')->table('rest_fortis.tblrestname')->orderBy('ResName')->get();
//        $tblRestName_data = '';
        return view('login',compact('tblRestName_data'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $url = '/login';
        if($request->user()->role === 'admin'){
            $url = '/admin/dashboard';
        } elseif($request->user()->role === 'operator'){
            $url = '/operator/outlet';
        }elseif($request->user()->role === 'kitchen'){
            $url = '/kitchen/dashboard';
        }else{
            $url = '/login';
        }

        return redirect()->intended($url);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
