<?php

use App\Http\Controllers\MailController;
use App\Mail\Email;
use App\Mail\WelcomeMail;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Mail;
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
//home//
Route::get('/', 'homeContents@opener') -> name('opener');
Route::get('/home', 'homeContents@landing') -> name('landing');
Route::get('/aboutus', 'homeContents@aboutus') -> name('aboutus');
Route::get('/appointment', 'homeContents@appointment') -> name('appointment');
//appointment//
Route::post('/appointment','RequestController@store') -> name('appointment.store');
Route::get('/guidlines', 'homeContents@guidlines') -> name('guidlines');
Route::get('/gallery', 'homeContents@gallery') -> name('gallery');
Route::get('/contactus', 'homeContents@contactus') -> name('contactus');
Route::get('/health', 'homeContents@health') -> name('health');

//ADMIN//
Route::get('/admin', 'DashboardController@index') -> name('admin');

//PENDING//
Route::get('admin/pending', 'RequestController@index') -> name('pending.index');
Route::post('admin/pending/confirm', 'ConfirmController@store') -> name('confirm.store');
Route::delete('admin/pending', 'RequestController@destroy') -> name('pending.destroy');


//pending table confirm button//
Route::get('admin/confirm', 'ConfirmController@index') -> name('confirm.index');
Route::delete('admin/confirm', 'ConfirmController@destroy') -> name('confirm.destroy');

/* Route::post('admin/confirmed', 'ConfirmedController@store') -> name('confirmed.store'); */



Route::get('admin/confirmed', 'ConfirmedController@index') -> name('confirmed.index');

//RECORDS----Medical---//
Route::get('admin/medical', 'MedicalController@index') -> name('medical.index');
Route::put('/medical/{id}', 'MedicalController@update')-> name('medical.update');
Route::post('admin/medical', 'MedicalController@store')-> name('medical.store');
Route::get('admin/medical/download', 'MedicalController@create')-> name('medical.create');


//RECORDS----Pdl---//
Route::get('admin/pdl', 'PdlController@index') -> name('pdl.index');
Route::put('/pdl/{id}', 'PdlController@update')-> name('pdl.update');
Route::post('admin/pdl', 'PdlController@store')-> name('pdl.store');
Route::get('admin/pdl/download', 'PdlController@create')-> name('pdl.create');
//

//RECYCLEBIN//
Route::get('admin/recyclebin/medical', 'MedicalRecyclebinController@index') -> name('medical.recyclebin.index');
Route::post('admin/recyclebin/medical', 'MedicalRecyclebinController@store') -> name('medical.recyclebin.store');

Route::get('admin/recyclebin/pdl', 'PdlRecyclebinController@index') -> name('pdl.recyclebin.index');
Route::post('admin/recyclebin/pdl', 'PdlRecyclebinController@store') -> name('pdl.recyclebin.store');


/* ATTENDAMCE */
Route::get('admin/attendance', 'AttendanceController@index') -> name('attendance.index');
Route::post('admin/Attendance', 'AttendanceController@store') -> name('attendance.store');

/* CONTACT US */
Route::get('admin/contact', 'ContactController@index') -> name('contact.index');
Route::post('admin/Contact', 'ContactController@store') -> name('contact.store');
Route::delete('admin/contact', 'ContactController@destroy') -> name('contact.destroy');


Route::get('admin/health', 'HealthController@index') -> name('health.index');
Route::post('admin/confirmed', 'ConfirmedController@store') -> name('confirmed.store');
Route::delete('admin/health', 'HealthController@destroy') -> name('health.destroy');


/* SCHEDULE */
Route::get('admin/paabot', 'PaabotController@index') -> name('paabot.index');
Route::put('/Paabot/{id}', 'PaabotController@update')-> name('paabot.update');

Route::get('admin/dalaw', 'DalawController@index') -> name('dalaw.index');
Route::put('/Dalaw/{id}', 'DalawController@update')-> name('dalaw.update');

Route::get('admin/tawag', 'TawagController@index') -> name('tawag.index');
Route::put('/Tawag/{id}', 'TawagController@update')-> name('tawag.update');

/* ANNOUNCEMENT */
Route::get('admin/announcement', 'AnnouncementController@index') -> name('announcement.index');
Route::put('/Announcement/{id}', 'AnnouncementController@update')-> name('announcement.update');

Route::get('/send-mail',[MailController::class,'sendmail']);




