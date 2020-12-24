<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/login', 'LoginController@login')->name('login');
    Route::post('/login', 'LoginController@postLogin')->name('postLogin');
    Route::get('logout', 'LoginController@logout')->name('postLogout');

    Route::get('/forgot-password', 'LoginController@getForgotPassword')->name('getForgotPassword');
    Route::post('/forgot-password', 'LoginController@postForgotPassword')->name('postForgotPassword');
    Route::get('/recovery-password/{code}', 'LoginController@getRecoveryPassword')->name('getRecoveryPassword');
    Route::post('/recovery-password', 'LoginController@postRecoveryPassword')->name('postRecoveryPassword');
});


Route::group([
    'namespace' => 'App\Http\Controllers', 'middleware' => ['auth']
], function () {

    /** For Testing Only **/
    Route::get('/test/map', 'TestController@map')->name('map');
    Route::get('/test/layering', 'TestController@map3')->name('map3');
    Route::get('/test/map4', 'TestController@map4')->name('map4');
    Route::get('/test/map5', 'TestController@map5')->name('map5');
    Route::get('/test/map6', 'TestController@map6')->name('map6');


    /** End For Testing Only **/

    Route::get('drawing/map', 'DrawingMapController@drawingMap')->name('drawing.map');
    Route::get('polygon/ajax', 'DrawingMapController@getPolygon')->name('polygon.ajax');
    Route::get('polyline/ajax', 'DrawingMapController@getPolyline')->name('polyline.ajax');
    Route::get('marker/ajax', 'DrawingMapController@getMarker')->name('marker.ajax');
    Route::get('delete/shape/ajax', 'DrawingMapController@deleteShape')->name('delete.shape.ajax');
    Route::get('update/shape/ajax', 'DrawingMapController@updateShape')->name('update.shape.ajax');
    Route::get('public/marker/ajax', 'DrawingMapController@getPublicMarker')->name('public.marker.ajax');
   
    Route::get('myaccount', 'UserController@getAccount')->name('myaccount');

    // config
    Route::group(['prefix' => 'config'], function () {
        Route::post('/store', 'ConfigurationController@store')->name('configuration.save');
        Route::get('/form', 'ConfigurationController@form')->name('configuration.form');
        Route::put('/update/{id}', 'ConfigurationController@update')->name('configuration.update');
    });

    // role
    Route::group(['prefix' => 'role'], function () {
        Route::get('/', 'RoleController@index')->name('role.index');
        Route::post('/store', 'RoleController@store')->name('role.save');
        Route::get('/form/{_id?}', 'RoleController@form')->name('role.form');
        Route::put('/update/{id}', 'RoleController@update')->name('role.update');
        Route::get('/destroy/{id}', 'RoleController@destroy')->name('role.destroy');
    });

    // permission
    Route::group(['prefix' => 'permission'], function () {
        Route::get('/', 'PermissionController@index')->name('permission.index');
        Route::post('/store', 'PermissionController@store')->name('permission.save');
        Route::get('/form/{_id?}', 'PermissionController@form')->name('permission.form');
        Route::post('/update/{id}', 'PermissionController@update')->name('permission.update');
        Route::get('/destroy/{id}', 'PermissionController@destroy')->name('permission.destroy');
    });

    Route::group(['prefix' => 'bulk'], function () {
        Route::get('/', 'BulkController@index')->name('bulk.index');
        Route::post('/postCSV', 'BulkController@uploadCSV')->name('bulk.save');
        Route::get('/form/', 'BulkController@form')->name('bulk.form');
    });

    // user
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'UserController@index')->name('user.index');
        Route::post('/store', 'UserController@store')->name('user.save');
        Route::get('/form/{_id?}', 'UserController@form')->name('user.form');
        Route::put('/update/{id}', 'UserController@update')->name('user.update');
        Route::get('/destroy/{id}', 'UserController@destroy')->name('user.destroy');
        Route::post('/disable/{id}', 'UserController@disable')->name('user.disable');
    });

    // project
    Route::group(['prefix' => 'project'], function () {
        Route::get('/', 'ProjectController@index')->name('project.index');
        Route::post('/store', 'ProjectController@store')->name('project.save');
        Route::get('/form/{_id?}',  'ProjectController@form')->name('project.form');
        Route::put('/update/{id}', 'ProjectController@update')->name('project.update');
        Route::get('/destroy/{id}', 'ProjectController@destroy')->name('project.destroy');
        
        Route::get('{id}/drawing', 'ProjectController@drawing')->name('project.drawing');
        Route::get('{id}/map/view', 'ProjectController@mapViewOnly')->name('project.map.view');

        Route::get('{id_project}/drawing/list', 'DrawingMapController@index')->name('drawing.index');
        Route::post('{id_project}/drawing/store', 'DrawingMapController@store')->name('drawing.save');
        Route::get('{id_project}/drawing/form/{_id?}',  'DrawingMapController@form')->name('drawing.form');
        Route::put('{id_project}/drawing/update/{id}', 'DrawingMapController@update')->name('drawing.update');
        Route::get('{id_project}/drawing/destroy/{id}', 'DrawingMapController@destroy')->name('drawing.destroy');
    });

    // project
    Route::group(['prefix' => 'object'], function () {
        Route::get('/', 'ObjectMapController@index')->name('object.index');
        Route::post('/store', 'ObjectMapController@store')->name('object.save');
        Route::get('/form/{_id?}',  'ObjectMapController@form')->name('object.form');
        Route::put('/update/{id}', 'ObjectMapController@update')->name('object.update');
        Route::get('/destroy/{id}', 'ObjectMapController@destroy')->name('object.destroy');
    });


    Route::get('/', 'MainController@index')->name('landing');
    Route::get('/pencarian', 'MainController@getSearch')->name('pencarian');
    Route::get('/marker/result/ajax', 'MainController@getSearchObject')->name('marker.ajax.search');
    Route::get('/ajaxmap', 'MainController@ajaxmaps')->name('mapajax');
});