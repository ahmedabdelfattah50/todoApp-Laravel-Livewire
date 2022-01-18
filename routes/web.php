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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/','TodosController@index');

Route::group(['prefix' => 'todos' ],function(){
    // show all items route
    Route::get('/','TodosController@index')->name('allTodos');

    // create & store route
    Route::get('/create','TodosController@create')->name('createNewTodo');
    Route::post('/create','TodosController@store')->name('storeNewTodo');

    // edit & update route
    Route::get('/edit/{todo}','TodosController@edit')->name('editTodo');
    Route::post('/{todo}','TodosController@update')->name('updateTodo');

    // delete one item route
    Route::get('/delete/{todo}','TodosController@destroy')->name('deleteTodo');

    // show one item route
    Route::get('/{todo}','TodosController@show')->name('todoItem');

     // show complete todo route
     Route::get('/complete/{todo}','TodosController@complete')->name('todoComplete');
});


