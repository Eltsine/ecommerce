<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/','ClientController@home');
Route::get('/shop', 'ClientController@shop');
Route::get('/panier', 'ClientController@panier');
Route::get('/client_login', 'ClientController@client_login');
Route::get('/signup', 'ClientController@signup');
Route::get('/paiement', 'ClientController@paiement');

/*
Route::get('/', function () {
    return '<h1>Bienvenue dans cette formation</h1>';
    //return view('welcome');
});
*/
/*
Route::get('/','PagesController@home');*/

Route::get('/apropos', 'PagesController@apropos');

Route::get('/services','PagesController@services');
 
Route::get('/show/{id}','PagesController@show');

Route::get('/create','PagesController@ajouterproduit');

Route::post('/saveproduct','PagesController@saveproduct');

Route::get('/edit/{id}','PagesController@edit');

Route::post('/modifierproduct','PagesController@modifierproduct');

Route::get('/delete/{id}','PagesController@delete');

Route:: resource('/products','ProductController');


