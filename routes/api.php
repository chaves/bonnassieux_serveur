<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('sources', 'SourceController@index')->name('sources');
Route::get('sources/validated', 'SourceController@validated')->name('validated');

Route::post('sources/{id}/update', 'SourceController@update');
Route::post('sources/{id}/validate', 'SourceController@updateValid');
Route::post('sources/ref_id/{id}/update', 'SourceController@updateReference');

Route::post('sources/city/store', 'SourceController@storeCity');
Route::post('sources/domain/store', 'SourceController@storeDomain');
Route::post('sources/person/store', 'SourceController@storePerson');
Route::post('sources/group/store', 'SourceController@storeGroup');
Route::post('sources/matter/store', 'SourceController@storeMatter');

Route::get('domains', 'DomainController@index');
Route::get('industries', 'IndustryController@index');

Route::get('cities/counts', 'CityController@counts');
Route::get('persons/counts', 'PersonController@counts');
Route::get('domains/counts', 'DomainController@counts');
Route::get('groups/counts', 'GroupController@counts');
Route::get('matters/counts', 'MatterController@counts');

Route::get('persons/search/{search}', 'PersonController@search');
Route::get('groups/search/{search}', 'GroupController@search');
Route::get('matters/search/{search}', 'MatterController@search');
Route::get('cities/search/{search}', 'CityController@search');





