<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/table', [AdminController::class, 'table']);
Route::get('/admin/form', [AdminController::class, 'form']);
Route::get('/admin/pickers', [AdminController::class, 'pickers']);
Route::get('/admin/profile', [AdminController::class, 'profile']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//organization controller and methods here
    Route::get('/administration/organizations', [OrganizationController::class, 'index'])->name('organizations.index');
    Route::get('/administration/organizations/add', [OrganizationController::class, 'addOrganisation'])->name('organizations.add');
    Route::get('/administration/organizations/parameters', [OrganizationController::class, 'parameters'])->name('organisations.parameters');
    Route::get('/administration/organizations/roles', [OrganizationController::class, 'roles'])->name('organisations.roles');
    Route::get('/administration/organizations/accounts', [OrganizationController::class, 'userAccounts'])->name('organisations.accounts');
    Route::post('/administration/organizations/parameters', [OrganizationController::class, 'saveOrgType'])->name('organisations.create');

//admin.parameters.store route
    Route::post('/administration/parameters', [OrganizationController::class, 'storeFieldType'])->name('admin.parameters.store');
});

require __DIR__ . '/auth.php';


