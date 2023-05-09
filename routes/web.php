<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;

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

Route::get('/', function () {
    return view('register');
});

Route::group(['controller' => AjaxController::class, 'as' => 'student.'], function () {
    Route::post('save-data', 'saveData')->name('save');
    Route::get('student-list', 'studentList');
});

// Route::name('student.')->controller(StudentController::class)->group(function () {
//     Route::post('/save-data', 'saveData')->name('save');
// });
