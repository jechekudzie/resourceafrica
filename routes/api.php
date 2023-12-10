<?php

use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/administration/organization-types', [App\Http\Controllers\API\ApiController::class, 'fetchOrganizationTypes']);
Route::get('/administration/organization-types/{id}/fields', [App\Http\Controllers\API\ApiController::class, 'fetchOrganizationTypeFields']);
Route::get('/administration/organizations/get-children/{id}', [App\Http\Controllers\API\ApiController::class, 'fetchOrganizationTypeChildren']);

//post routes
Route::post('/api/administration/organizations/store', [App\Http\Controllers\API\ApiController::class, 'addNewOrganization']);


