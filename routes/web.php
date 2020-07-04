<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('login');
});

Auth::routes(['register' => false]);


Route::resource('roles','RoleController')->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');

// CourceController Routes
Route::get('all/cource','CourceController@index');
Route::get('add/cource','CourceController@create');
Route::post('store/cource','CourceController@store')->name('cource.store');
Route::get('view/cource/{cource_id}','CourceController@view');
Route::get('edit/cource/{cource_id}','CourceController@edit');
Route::post('update/cource','CourceController@update')->name('cource.update');
Route::get('delete/cource/{cource_id}','CourceController@destroy');

//BatchController Routes
Route::get('batch/all','BatchController@index');
Route::get('batch/add','BatchController@create');
Route::post('batch/store','BatchController@store')->name('batch.store');
Route::get('batch/edit/{batch_id}','BatchController@edit');
Route::post('batch/update','BatchController@update')->name('batch.update');
Route::get('batch/delete/{batch_id}','BatchController@destroy');
Route::get('batch/search/courcewise','BatchController@courceWishBatch');
Route::get('cource/{cource_id}/batch','BatchController@courceWishBatchList')->name('cource.wish.batch.list');

// StudentController Routes
Route::get('student/all','StudentController@index');
Route::get('student/add','StudentController@create');
Route::post('student/store','StudentController@store')->name('student.store');
Route::get('student/view/{student_id}','StudentController@view');
Route::get('student/edit/{student_id}','StudentController@edit');
Route::post('student/update','StudentController@update')->name('student.update');
Route::get('student/delete/{student_id}','StudentController@destroy');
Route::get('student/search/by/cource','StudentController@studentCourceWish')->name('student.cource.wise');
Route::get('student/search/by/cource/{cource_id}','StudentController@studentBatchWish')->name('student.batch.wish');
Route::get('student/search/by/batch/{batch_id}','StudentController@studentListByBatchWish')->name('student-list-by-batch');
Route::get('find/batch/{cource_id}','StudentController@findBatch');

// PaymentController Routes
Route::get('payment','PaymentController@getPayment')->name('payment');
Route::post('payment/add','PaymentController@addPayment')->name('payment.add');
Route::get('payment/search/by/cource','PaymentController@courceWisePayment')->name('payment-cource-wise');
Route::get('payment/all/{cource_id}','PaymentController@payment')->name('payment-all');
Route::get('payment/details/{student_id}','PaymentController@paymentDetails')->name('payment-details');

// AttendanceController Routes
Route::get('take/attendance','AttendanceController@showCources')->name('take-attendance');
Route::get('attendance/by/cource/{cource_id}','AttendanceController@showBatch')->name('take-attendance-by-cource');
Route::get('take/attendance/from/batch/{batch_id}','AttendanceController@takeAttendance')->name('take-attendance-from-batch');
Route::post('take/attendance/submit','AttendanceController@storeAttendance')->name('submit-attendance');
Route::get('all/attendance','AttendanceController@allAttendance')->name('all-attendance');
Route::get('all/attendance/by/cource/{cource_id}','AttendanceController@allAttendanceByCource')->name('all-attendance-by-cource');
Route::get('all/attendance/by/batch/{batch}','AttendanceController@allAttendanceByBatch')->name('all-attendance-by-batch');
Route::get('attendance/view/batch/{batch_id}/date/{date}','AttendanceController@attendanceView')->name('attendance-view');

// ExpenseController Routes
Route::get('expense/add','ExpenseController@addExpense')->name('expense-add');
Route::post('expense/add/post','ExpenseController@expenseStore')->name('expense-store');
Route::get('expense/today','ExpenseController@todayExpense')->name('expense-today');
Route::get('expense/show/{id}','ExpenseController@show')->name('expense-show');
Route::post('expense/update','ExpenseController@update')->name('expense-update');
Route::get('expense/delete/{id}','ExpenseController@destroy')->name('expense-delete');
Route::get('expense/Monthly','ExpenseController@monthlyExpense')->name('monthly-expense');
Route::get('expense/monthly/{month}','ExpenseController@month');

//UserController Routes
Route::get('user/all','UserController@index')->name('all-user');
Route::get('user/add','UserController@create')->name('add-user');
Route::post('user/add/post','UserController@store')->name('user-store');
Route::get('user/show/{id}','UserController@show')->name('user-show');
Route::get('user/delete/{id}','UserController@destroy')->name('user-delete');

//ProfileController Routes
Route::get('profile',"ProfileController@index")->name('profile');
Route::post('profile/update',"ProfileController@update")->name('profile.update');
Route::get('change/password',"ProfileController@changePassword")->name('change.password');
Route::post('profile/update/post',"ProfileController@passwordUpdate")->name('password.update');
