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
Route::post('sources/region/store', 'SourceController@storeRegion');
Route::post('sources/domain/store', 'SourceController@storeDomain');
Route::post('sources/person/store', 'SourceController@storePerson');
Route::post('sources/group/store', 'SourceController@storeGroup');

Route::delete('sources/city/remove/{id}', 'SourceController@removeCity');
Route::delete('sources/region/remove/{id}', 'SourceController@removeRegion');
Route::delete('sources/domain/remove/{id}', 'SourceController@removeDomain');
Route::delete('sources/person/remove/{id}', 'SourceController@removePerson');
Route::delete('sources/group/remove/{id}', 'SourceController@removeGroup');

Route::post('cities/add', 'CityController@add');
Route::post('regions/add', 'RegionController@add');
Route::post('domains/add', 'DomainController@add');
Route::post('persons/add', 'PersonController@add');
Route::post('groups/add', 'GroupController@add');

Route::delete('cities/remove/{id}', 'CityController@remove');
Route::delete('regions/remove/{id}', 'RegionController@remove');
Route::delete('domains/remove/{id}', 'DomainController@remove');
Route::delete('persons/remove/{id}', 'PersonController@remove');
Route::delete('groups/remove/{id}', 'GroupController@remove');

Route::get('cities', 'CityController@index');
Route::get('domains', 'DomainController@index');
Route::get('industries', 'IndustryController@index');
Route::get('regions', 'RegionController@index');
Route::get('persons', 'PersonController@index');

Route::get('cities/counts', 'CityController@counts');
Route::get('persons/counts', 'PersonController@counts');
Route::get('domains/counts', 'DomainController@counts');
Route::get('groups/counts', 'GroupController@counts');
Route::get('matters/counts', 'MatterController@counts');
Route::get('regions/counts', 'RegionController@counts');

Route::get('persons/search/{search}', 'PersonController@search');
Route::get('groups/search/{search}', 'GroupController@search');
Route::get('matters/search/{search}', 'MatterController@search');
Route::get('cities/search/{search}', 'CityController@search');
Route::get('regions/search/{search}', 'RegionController@search');




