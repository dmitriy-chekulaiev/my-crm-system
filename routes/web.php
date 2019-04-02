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

//Route::get('/', function () {
//    return redirect()->intended('dashboard');
//});

Auth::routes();

Route::get('/', function () {

    if (Auth::check()) {
        return view('home');
    } else {
        return view('welcome');
    }

});

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

// Profile Routes
Route::get('/profile', 'ProfileController@my')->name('profile.my')->middleware('auth');
Route::get('/profile/{profile}', 'ProfileController@show')->name('profile.show')->middleware('auth');

Route::post('/profile', 'ProfileController@update')->name('profile.edit')->middleware('auth');

// Projects
Route::resource('projects', 'ProjectController', [
    'names' => [
        'projects' => 'projects.index',
        '/projects/{project}' => 'projects.show',
        '/projects/create' => 'projects.store',
        '/projects/edit' => 'projects.edit',
        'projects/{project}/delete' => 'projects.destroy',
    ],
])->middleware('auth');

// Clients
Route::resource('clients', 'ClientController', [
    'names' => [
        'clients' => 'clients.index',
        '/projects/{client}' => 'clients.show',
        '/clients/create' => 'clients.store',
        '/clients/edit' => 'clients.edit',
        'clients/{client}/delete' => 'clients.destroy',
    ],
])->middleware('auth');


Route::get('/teams/invite', 'TeamController@invite')->name('teams.invite');
Route::post('/teams/invite', 'TeamController@sendInvite')->name('teams.sendInvite');
Route::post('/teams/{user}/remove', 'TeamController@removeUser');
Route::post('/teams/{team}/leave', 'TeamController@leaveTeam');


Route::resource('teams', 'TeamController', [
    'names' => [
        'teams' => 'teams.index',
        '/teams/{team}' => 'teams.show',
    ],
])->middleware('auth');


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'isAdmin'], function () {
    Route::get('/', 'HomeController@index');
});
