<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', "PagesController@getIndex");

Route::auth();

Route::resource('university', 'UniversitiesController',
    ['except' =>
        [
            'create', 'show'
        ]
    ]);

Route::resource('faculty', 'FacultiesController',
    ['except' =>
        [
            'create', 'show'
        ]
    ]);

Route::resource('branch', 'BranchesController',
    ['except' =>
        [
            'create', 'show'
        ]
    ]);

Route::resource('student', 'StudentsController',
    ['except' =>
        [
            'create', 'show'
        ]
    ]);