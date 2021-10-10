<?php

use Illuminate\Support\Facades\Route; 
use App\Models\User;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmpController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

//Admin all route
Route::get('/admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');



Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::prefix('companies')->group(function(){

Route::get('/view', [CompanyController::class, 'ViewCompany'])->name('company-view');
Route::post('/add', [CompanyController::class, 'AddCompany'])->name('company-add');
Route::get('/edit/{id}', [CompanyController::class, 'EditCompany'])->name('company.edit');
Route::post('/update', [CompanyController::class, 'UpdateCompany'])->name('company-update');
Route::get('/delete/{id}', [CompanyController::class, 'DeleteCompany'])->name('company.delete');

});


Route::prefix('employee')->group(function(){

Route::get('/view', [EmpController::class, 'ViewEmploye'])->name('employies-view');
Route::post('/add', [EmpController::class, 'AddEmploye'])->name('employee-add');
Route::get('/edit/{id}', [EmpController::class, 'EditEmploye'])->name('employee.edit');
Route::post('/update', [EmpController::class, 'UpdateEmploye'])->name('employee-update');
Route::get('/delete/{id}', [EmpController::class, 'DeleteEmploye'])->name('employee.delete');


});