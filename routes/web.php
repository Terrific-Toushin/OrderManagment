<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
require __DIR__.'/auth.php';
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::get('/', function () {
    // $tblRestName_data = DB::connection('sqlsrv')->table('tblRestName')->orderBy('ResName')->get();
    // return view('login',compact('tblRestName_data'));
    return redirect('/login');
});

//Route::get('/login', function () {
//    return view('login');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Start Group Admin Middleware
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name ('admin.dashboard');
    Route::get('/admin/kotCancelList', [AdminController::class, 'KOTCancelList'])->name ('admin.kotCancelList');
    Route::get('/admin/kotCancelRevers', [AdminController::class, 'KOTCancelRevers'])->name ('admin.kotCancelRevers');
    Route::get('/admin/billAuto', [AdminController::class, 'BillAuto'])->name ('admin.billAuto');
    Route::get('/admin/billAutoUpdate', [AdminController::class, 'BillAutoUpdate'])->name ('admin.billAutoUpdate');
    Route::get('/admin/userList', [AdminController::class, 'AdminUserList'])->name ('admin.userList');
    Route::get('/admin/createUser', [AdminController::class, 'AdminCreateUser'])->name ('admin.createUser');
    Route::get('/admin/editUser', [AdminController::class, 'AdminEditUser'])->name ('admin.editUser');
    Route::post('/admin/createUserSave', [AdminController::class, 'NewUsreSave'])->name ('admin.createUserSave');
    Route::post('/admin/userUpdate', [AdminController::class, 'UsreUpdate'])->name ('admin.userUpdate');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name ('admin.profile');
    Route::post('/admin/profileUpdateSave', [AdminController::class, 'ProfileUpdateSave'])->name ('admin.profileUpdateSave');
    Route::get('/admin/changePassword', [AdminController::class, 'AdminChangePassword'])->name ('admin.changePassword');
    Route::post('/admin/changePasswordSave', [AdminController::class, 'ChangePasswordSave'])->name ('admin.changePasswordSave');
}); // End Group Admin Middleware

// Start Group Operator Middleware
Route::middleware(['auth','role:operator'])->group(function(){
    Route::get('/operator/outlet', [OperatorController::class, 'OperatorOutlets'])->name ('operator.outlets');
    Route::get('/operator/select-outlet/{uotlet}', [OperatorController::class, 'OperatorSetOutlets'])->name ('operator.selectOutlets');
    Route::get('/operator/dashboard', [OperatorController::class, 'OperatorDashboard'])->name ('operator.dashboard');
    Route::get('/operator/profile', [OperatorController::class, 'OperatorProfile'])->name ('operator.profile');
    Route::post('/operator/profileUpdateSave', [OperatorController::class, 'ProfileUpdateSave'])->name ('operator.profileUpdateSave');
    Route::get('/operator/changePassword', [OperatorController::class, 'OperatorChangePassword'])->name ('operator.changePassword');
    Route::post('/operator/changePasswordSave', [OperatorController::class, 'ChangePasswordSave'])->name ('operator.changePasswordSave');
    Route::get('/operator/newOrder', [OperatorController::class, 'NewOrder'])->name ('operator.newOrder');
    Route::post('/operator/newOrderItem', [OperatorController::class, 'NewOrderItem'])->name ('operator.newOrderItem');
    Route::get('/operator/tableExist', [OperatorController::class, 'TableExist'])->name ('operator.tableExist');
    Route::get('/operator/roomExist', [OperatorController::class, 'RoomExist'])->name ('operator.roomExist');
    Route::post('/operator/newOrderItemSave', [OperatorController::class, 'NewOrderItemSave'])->name ('operator.newOrderItemSave');
    Route::post('/operator/editOrderAddItemSave', [OperatorController::class, 'EditOrderAddItemSave'])->name ('operator.editOrderAddItemSave');
    Route::get('/operator/editOrderItem', [OperatorController::class, 'EditOrderItem'])->name ('operator.editOrderItem');
    Route::get('/operator/orderCancle', [OperatorController::class, 'OrderCancle'])->name ('operator.orderCancle');
    Route::get('/operator/itemCancle', [OperatorController::class, 'ItemCancle'])->name ('operator.itemCancle');
    Route::get('/operator/kotView', [OperatorController::class, 'OperatorKotView'])->name ('operator.kotView');
    Route::get('/operator/orderHistry', [OperatorController::class, 'OperatorOrderHistry'])->name ('operator.orderHistry');
    Route::get('/operator/sendToKOT', [OperatorController::class, 'OperatorSendToKOT'])->name ('operator.sendToKOT');
    Route::get('/operator/pendingKOT', [OperatorController::class, 'OperatorPendingKOT'])->name ('operator.pendingKOT');
    Route::get('/operator/kitchenCompleteKOTHistory', [OperatorController::class, 'KitchenCompleteKOTHistory'])->name ('operator.kitchenCompleteKOTHistory');
    Route::get('/operator/totalKOT', [OperatorController::class, 'OperatorTotalKOT'])->name ('operator.totalKOT');
    Route::get('/operator/cashPrint', [OperatorController::class, 'OperatorCashPrint'])->name ('operator.cashPrint');
}); // End Group Operator Middleware

// Start Group Operator Middleware
Route::middleware(['auth','role:kitchen'])->group(function(){
    Route::get('/kitchen/dashboard', [KitchenController::class, 'KitchenDashboard'])->name ('kitchen.dashboard');
    Route::get('/kitchen/profile', [KitchenController::class, 'KitchenProfile'])->name ('kitchen.profile');
    Route::post('/kitchen/profileUpdateSave', [KitchenController::class, 'KitchenProfileUpdateSave'])->name ('kitchen.profileUpdateSave');
    Route::get('/kitchen/changePassword', [KitchenController::class, 'KitchenChangePassword'])->name ('kitchen.changePassword');
    Route::post('/kitchen/changePasswordSave', [KitchenController::class, 'ChangePasswordSave'])->name ('kitchen.changePasswordSave');
    Route::get('/kitchen/kotView', [KitchenController::class, 'KitchenKOTView'])->name ('kitchen.kotView');
    Route::get('/kitchen/pendingKOT', [KitchenController::class, 'KitchenPendingKOT'])->name ('kitchen.KitchenPendingKOT');
    Route::get('/kitchen/kitchenCompleteKOTHistory', [KitchenController::class, 'KitchenCompleteKOTHistory'])->name ('kitchen.kitchenCompleteKOTHistory');
    Route::get('/kitchen/kitchenCompleteKOT:id', [KitchenController::class, 'KitchenCompleteKOT'])->name ('kitchen.kitchenCompleteKOT');
    }); // End Group Operator Middleware
