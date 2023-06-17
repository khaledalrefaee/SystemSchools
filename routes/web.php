<?php


use App\Http\Controllers\Classrooms\ClassroomController;
use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Student\PromotionController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\teacher\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\GraduatedController;
use App\Http\Controllers\Student\FeesController;
use App\Http\Controllers\Student\FeesInvoicesController;




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



Auth::routes();

Route::group(['middleware'=>['guest']], function () {

    Route::get('/', function () {
        return view('auth.login');
    });
});

    Route::group(
        [
            'prefix' => LaravelLocalization::setLocale(),
            'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
        ],
        function () {
            /*   Route::get('/',function (){
                   return view('dashboard');
               });
       */
            //==============================Grades============================

            Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
            Route::resource('/Grades',GradeController::class);

            //==============================Classromms============================

            Route::resource('/Classrooms',ClassroomController::class);

            Route::post('delete_all', [ClassroomController::class,'delete_all'])->name('delete_all');

            Route::post('Filter_Classes', [ClassroomController::class,'Filter_Classes'])->name('Filter_Classes');

            //==============================Sections============================

                Route::resource('Sections', SectionController::class);

                Route::get('/classes/{id}', [SectionController::class,'getclasses']);


             //==============================parents============================

            Route::view('add_parent','livewire.show_Form');


                //==============================Teachers============================

                 Route::resource('/Teachers', TeacherController::class);

            //==============================Student============================
            Route::resource('/Students',StudentController::class);
            Route::post('/Upload_attachment',[StudentController::class,'Upload_attachment'])->name('Upload_attachment');
            Route::get('/Download_attachment/{studentsname}/{filename}',[StudentController::class,'Download_attachment']);
            Route::post('Delete_attachment', [StudentController::class,'Delete_attachment'])->name('Delete_attachment');
            Route::get('/Get_classrooms/{id}', [StudentController::class,'Get_classrooms']);
            Route::get('/Get_Sections/{id}', [StudentController::class,'Get_Sections']);
            
             //==============================Promotion Students ============================

            Route::resource('Promotion', PromotionController::class);

            Route::resource('Fees_Invoices', FeesInvoicesController::class);

            Route::resource('Graduate', GraduatedController::class);
            Route::resource('Fees', FeesController::class);

            
        });
  







