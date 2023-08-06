<?php

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\teacher\dashboard\StudentController;
use App\Http\Controllers\teacher\dashboard\QuizzController;
use App\Http\Controllers\teacher\dashboard\QuestionController;
use App\Http\Controllers\teacher\dashboard\OnlineZoomClassesController;
use App\Http\Controllers\teacher\dashboard\ProfileController;




/*
|--------------------------------------------------------------------------
| student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ], function () {

    //==============================dashboard============================
    Route::get('/teacher/dashboard', function () {

        $ids = Teacher::findOrFail(auth()->user()->id)->Sections()->pluck('section_id');
        $data['count_sections']= $ids->count();
        $data['count_students']= Student::whereIn('section_id',$ids)->count();
        return view('pages.Teachers.dashboard.dashboard',$data);

    });


    Route::get('student',[StudentController::class,'index'])->name('student.index');

    Route::get('sections',[StudentController::class,'sections'])->name('sections');
    Route::post('attendance',[StudentController::class,'attendance'])->name('attendance');
    Route::get('sections',[StudentController::class,'sections'])->name('sections');
    Route::get('attendance_report',[StudentController::class,'attendanceReport'])->name('attendance.report');
    Route::post('attendance_report',[StudentController::class,'attendanceSearch'])->name('attendance.search');

    Route::resource('quizzes', QuizzController::class);
    Route::get('/Get_classrooms/{id}', [QuizzController::class,'getClassrooms']);
    Route::get('/Get_Sections/{id}', [QuizzController::class,'Get_Sections']);

    Route::resource('questions', QuestionController::class);
    Route::resource('online_zoom_classes', OnlineZoomClassesController::class);
    Route::get('/indirect', [OnlineZoomClassesController::class,'indirectCreate'])->name('indirect.teacher.create');
    Route::post('/indirect', [OnlineZoomClassesController::class,'storeIndirect'])->name('indirect.teacher.store');

    Route::get('profile', [ProfileController::class,'index'])->name('profile.show');
    Route::post('profile/{id}', [ProfileController::class,'update'])->name('profile.update');
    Route::get('student_quizze/{id}',[QuizzController::class,'student_quizze'])->name('student.quizze');
    Route::post('repeat_quizze', [QuizzController::class,'repeat_quizze'])->name('repeat.quizze');

});   
