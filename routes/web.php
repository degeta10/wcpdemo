<?php

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

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('home/index', 'HomeController@index');
Route::get('home/samples', 'HomeController@samples');
Route::get('home/printersinfo', 'HomeController@printersinfo');
Route::get('DemoPrintFile', 'DemoPrintFileController@index');
Route::get('DemoPrintFileController', 'DemoPrintFileController@printFile');
Route::get('DemoPrintFilePDF', 'DemoPrintFilePDFController@index');
Route::get('DemoPrintFilePDFController', 'DemoPrintFilePDFController@printFile');
Route::get('DemoPrintCommands', 'DemoPrintCommandsController@index');
Route::get('DemoPrintCommandsController', 'DemoPrintCommandsController@printCommands');
Route::any('WebClientPrintController', 'WebClientPrintController@processRequest');