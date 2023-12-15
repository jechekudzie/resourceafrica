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
Route::get('/administration/organizations/instances', [App\Http\Controllers\API\ApiController::class, 'fetchOrganizationInstances']);
Route::get('/administration/organizations/get-children/{id}', [App\Http\Controllers\API\ApiController::class, 'fetchOrganizationTypeChildren']);
Route::get('/administration/roles/{id}/{type}', [App\Http\Controllers\API\ApiController::class, 'fetchOrganizationRoles']);

//post routes
Route::post('/administration/organizations/store', [App\Http\Controllers\API\ApiController::class, 'addNewOrganization']);
Route::post('/administration/organizations/fields/store', [App\Http\Controllers\API\ApiController::class, 'saveOrganizationFieldValues']);
Route::post('/administration/organization-types/fields', [App\Http\Controllers\API\ApiController::class, 'fetchOrganizationTypeFieldsForm']);

