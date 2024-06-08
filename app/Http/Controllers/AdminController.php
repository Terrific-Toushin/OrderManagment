<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use DB;

class AdminController extends Controller
{
    public function AdminDashboard(){
        $id = Auth::user()->id;
        $profileData = User::find($id);

        date_default_timezone_set('Asia/Dhaka');

        $timestamp = time();
        $date = date("Y-m-d", $timestamp);

        $panding_kots_count = DB::table('order_kot')->where('status', '=', '1')->where('cancel', '=', 'N')->whereDate('date', '=', $date)->count();
        $kitchen_complete_kot_count = DB::table('order_kot')->where('status', '=', '3')->where('cancel', '=', 'N')->whereDate('date', '=', $date)->count();
        $total_kots_count = DB::table('order_kot')->where('cancel', '=', 'N')->whereDate('date', '=', $date)->count();
        $cash_print_count = DB::table('order_kot')->where('status', '=', '2')->where('cancel', '=', 'N')->whereDate('date', '=', $date)->count();
        $kot_cancel_count = DB::table('order_kot')->where('cancel', '=', 'Y')->whereDate('date', '=', $date)->count();

        return view('admin.adminDashboard',compact('profileData', 'panding_kots_count', 'kitchen_complete_kot_count', 'total_kots_count', 'cash_print_count', 'kot_cancel_count', 'date'));
    } // End Dashboard Method

    public function KOTCancelList(){
        $id = Auth::user()->id;
        $profileData = User::find($id);

        date_default_timezone_set('Asia/Dhaka');

        $timestamp = time();
        $date = date("Y-m-d", $timestamp);

        $kot_Cancel_List = DB::table('order_kot')->where('cancel', '=', 'Y')->whereDate('date', '=', $date)->get();

        return view('admin.adminKOTCancelList',compact('profileData', 'kot_Cancel_List'));
    } // End kotCancelList Method

    public function KOTCancelRevers(){
        $id = Auth::user()->id;
        $username = Auth::user()->username;
        $profileData = User::find($id);

        $password = Hash::make(request('password'));

        $updated_at=date("Y-m-d H:i:s");

        $billNo = request('billNo');

        $UpdateUserID = DB::table('order_kot')->where('billNo', $billNo)->update(['cancel' => 'N']);

        return redirect()->route('admin.kotCancelList');
    } // End KOTCancelRevers Method

    public function BillAuto(){
        $id = Auth::user()->id;
        $profileData = User::find($id);

        date_default_timezone_set('Asia/Dhaka');

        $timestamp = time();
        $date = date("Y-m-d", $timestamp);

        $billAuto = DB::table('billauto')->where('id', '=', '1')->get();

        return view('admin.adminBillAuto',compact('profileData', 'billAuto'));
    } // End BillAuto Method

    public function BillAutoUpdate(){
        $id = Auth::user()->id;
        $username = Auth::user()->username;
        $profileData = User::find($id);

        $password = Hash::make(request('password'));

        $updated_at=date("Y-m-d H:i:s");

        $billNoAuto = request('billNoAuto');

        $UpdateUserID = DB::table('billauto')->where('id', '1')->update(['auto' => $billNoAuto]);

        return redirect()->route('admin.billAuto');
    } // End BillAutoUpdate Method

    public function AdminUserList(){
        $id = Auth::user()->id;
        $profileData = User::find($id);


        $userLists = DB::table('users')->where('id', '!=', $id)->get();

        return view('admin.adminUserList',compact('profileData','userLists'));
    } // End AdminCreateUser Method

    public function AdminCreateUser(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $outlets = DB::connection('mysql')->table('rest_fortis.tblRestName')->orderBy('ResName')->get();
        $tblMenu_data = DB::connection('mysql')->table('rest_fortis.tblMenu')->orderBy('repname')->get();
        $kitchen = array();
        foreach($tblMenu_data as $kitchen_items){
            array_push($kitchen, $kitchen_items->kitchen);
        }
        $kitchen = array_unique($kitchen);

        $msg = '';
        if(session('msg')!=""){
            $msg = session('msg');
            session(['msg' => '']);
        }

        return view('admin.adminCreateUser',compact('profileData','msg','outlets','kitchen'));
    } // End AdminCreateUser Method

    public function NewUsreSave(Request $request){
        $id = Auth::user()->id;
        $cusername = Auth::user()->username;

        $name = request('name');
        $username = request('username');
        $email = request('email');
        $password = Hash::make(request('password'));
        $phone = request('phone');
        $address = request('address');
        $role = request('role');
        if ($role == 'operator')
            $outlets = json_encode(request('outlets'));
        elseif ($role == 'kitchen')
            $outlets = json_encode(request('kitchens'));
        else
            $outlets = '';

        if(DB::table('users')->where('username', $username)->exists()){
            session(['msg' => 'userH']);
        } elseif(DB::table('users')->where('email', $email)->exists()){
            session(['msg' => 'emailH']);
        } else{
            $image = $request->file('photo');
            $imageName = $image->getClientOriginalName();
            $directory = 'assets/user/';
            $image->move('public/'.$directory, $imageName);
            $imgUrl = $directory . $imageName;
            $InsertUserID = DB::insert('insert into users (name, username, email, password, photo, phone, address, role, outlets, createby) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$name, $username, $email, $password, $imgUrl, $phone, $address, $role, $outlets, $cusername]);
            session(['msg' => 'success']);
        }

        return redirect()->route('admin.createUser');

    } // End NewUsreSave Method

    public function AdminEditUser(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $outlets = DB::connection('mysql')->table('rest_fortis.tblRestName')->orderBy('ResName')->get();
        $tblMenu_data = DB::connection('mysql')->table('rest_fortis.tblMenu')->orderBy('repname')->get();
        $kitchen = array();
        foreach($tblMenu_data as $kitchen_items){
            array_push($kitchen, $kitchen_items->kitchen);
        }
        $kitchen = array_unique($kitchen);

        $msg = '';
        if(session('msg')!=""){
            $msg = session('msg');
            session(['msg' => '']);
        }

        $userId = request('userId');

        $name = '';
        $username = '';
        $email = '';
        $phone = '';
        $address = '';
        $role = '';
        $currentOutlets = '';


        $userDetails = DB::table('users')->where('id', '=', $userId)->get();

        if(!empty($userDetails)){
            foreach($userDetails as $userList){
               $name = $userList->name;
               $username = $userList->username;
               $email = $userList->email;
               $phone = $userList->phone;
               $address = $userList->address;
               $role = $userList->role;
               $currentOutlets = $userList->outlets;
            }
        }


        return view('admin.adminEditUser',compact('userId','name','username','email','phone','address','role','currentOutlets','outlets','msg','kitchen'));
    } // End AdminEditUser Method

    public function usreUpdate(Request $request){
        $id = Auth::user()->id;
        $cusername = Auth::user()->username;
        $profileData = User::find($id);

        $image = $request->file('photo');
        if ($image){
            $imageName = $image->getClientOriginalName();
            $directory = 'assets/frontend/images/masterPage/';
            $image->move('public/'.$directory, $imageName);
            $imgUrl = $directory . $imageName;
        }

        $userId = request('userEditID');
        $updatedUser = User::find($userId);
        if ($image){
            if(file_exists($updatedUser->photo)){
                unlink($updatedUser->photo);
            }
        }else{
            $imgUrl = $updatedUser->photo;
        }
        $name = request('name');
        $username = request('username');
        $email = request('email');
        $phone = request('phone');
        $address = request('address');
        $role = request('role');
        if ($role == 'operator')
            $outlets = json_encode(request('outlets'));
        elseif ($role == 'kitchen')
            $outlets = json_encode(request('kitchens'));
        else
            $outlets = '';

        $updated_at=date("Y-m-d H:i:s");

        if(DB::table('users')->where('username', $username)->exists()){
            $UpdateUserID = DB::table('users')->where('id', $userId)->update(['name' => $name, 'email' => $email, 'photo' => $imgUrl, 'phone' => $phone, 'address' => $address, 'role' => $role, 'outlets' => $outlets, 'updated_at' => $updated_at]);

            session(['msg' => 'success']);
        } elseif(DB::table('users')->where('email', $email)->exists()){
            $UpdateUserID = DB::table('users')->where('id', $userId)->update(['name' => $name, 'username' => $username, 'photo' => $imgUrl, 'phone' => $phone, 'address' => $address, 'role' => $role, 'outlets' => $outlets, 'updated_at' => $updated_at]);

            session(['msg' => 'success']);
        } else {

            $UpdateUserID = DB::table('users')->where('id', $userId)->update(['name' => $name, 'username' => $username, 'email' => $email, 'photo' => $imgUrl, 'phone' => $phone, 'address' => $address, 'role' => $role, 'outlets' => $outlets, 'updated_at' => $updated_at]);

            session(['msg' => 'success']);

        }

        return redirect()->route('admin.editUser',compact('userId'));

    } // End usreUpdate Method

    public function AdminProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);

        $msg = '';
        if(session('msg')!=""){
            $msg = session('msg');
            session(['msg' => '']);
        }

        return view('admin.adminProfile',compact('profileData','msg'));
    } // End Profile Method

    public function ProfileUpdateSave(){
        $id = Auth::user()->id;
        $username = Auth::user()->username;
        $profileData = User::find($id);

        $name = request('name');
        $email = request('email');
        $photo = request('photo');
        $phone = request('phone');
        $address = request('address');

        $updated_at=date("Y-m-d H:i:s");

        $UpdateUserID = DB::table('users')->where('id', $id)->update(['name' => $name, 'email' => $email, 'phone' => $phone, 'address' => $address, 'updated_at' => $updated_at]);

        // $msg = "Sec";

        session(['msg' => 'success']);

        return redirect()->route('admin.profile');

    } // End NewUsreSave Method

    public function AdminChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);

        $msg = '';
        if(session('msg')!=""){
            $msg = session('msg');
            session(['msg' => '']);
        }

        return view('admin.adminChangePassword',compact('profileData','msg'));
    } // End Change Password Method

    public function ChangePasswordSave(){
        $id = Auth::user()->id;
        $username = Auth::user()->username;
        $profileData = User::find($id);

        $password = Hash::make(request('password'));

        $updated_at=date("Y-m-d H:i:s");

        $UpdateUserID = DB::table('users')->where('id', $id)->update(['password' => $password, 'updated_at' => $updated_at]);

        session(['msg' => 'success']);

        return redirect()->route('admin.changePassword');

    } // End NewUsreSave Method
}
