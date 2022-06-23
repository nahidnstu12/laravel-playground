<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BookController;
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
    return view('welcome');
});

Route::get("/products", [ProductController::class, "index"]);
Route::post("/products", [ProductController::class, "create"]);
Route::get("/products/{id}", [ProductController::class, "single"]);
Route::put("/products/{id}", [ProductController::class, "update"]);
// Route::put("/products/{id}", [ProductController::class, "edit"]);
Route::delete("/products/{id}", [ProductController::class, "destroy"]);

Route::get("/crud", [ProductController::class, "index2"]);
Route::post("/crud", [ProductController::class, "create2"]);
Route::get("/crud/{id}", [ProductController::class, "single2"]);
Route::put("/crud/{id}", [ProductController::class, "update2"]);
// Route::put("/products/{id}", [ProductController::class, "edit"]);
Route::delete("/crud/{id}", [ProductController::class, "destroy2"]);

Route::resource("/books", BookController::class);
Route::get("/course-certificate", [ProductController::class, "courseCertificate"])->name("course.certificate");


Route::get('/pdf-create', function(){

    ini_set('max_execution_time', 600);

    $data = ['name' => 'Rahul Amin Hawladar',
        'certificate_text' => 'Course Certificate Khamaka',
        'small_text'=> 'Certificate To',
        'created_at' => '28th July,2021',
        'profile-pic' => 'certificate-demo-1.png',
        'text' => 'has successfully completed Fundamental Computer Course an online non-credit course authorized by SomeoneTraining Service'];
    $html = view('course-certificate', compact('data'))->render();

    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadHTML($html);
    $pdf->setPaper('A4', 'landscape');
    \Illuminate\Support\Facades\Storage::put('pdf/invoice.pdf', $pdf->output());
    $certificatePath = \Illuminate\Support\Facades\Storage::path('pdf/invoice.pdf');

    return "Done";

});

Route::get('/pdf-show', function(){



    $data = ['name' => 'Rahul Amin Hawladar',
        'certificate_text' => 'Course Certificate Assessment',
        'small_text'=> 'Certificate To',
        'created_at' => '28th July,2021',
        'profile-pic' => 'certificate-demo-1.png',
        'text' => 'has successfully completed Fundamental Computer Course an online non-credit course authorized by SomeoneTraining Service'];

    return view('course-certificate', compact('data'));



});


// testing code
Route::group(["prefix"=> "trainer"], function (){
    Route::group(["prefix"=> "/courses"], function (){
        Route::get('/', [\App\Http\Controllers\TrainerController::class, 'courses'])->name('course.index.trainer')->can('create-course');
        Route::get('/create', [\App\Http\Controllers\CourseController::class, 'create'])->name('course.trainer')->can('create-course');
        Route::post('/create', [\App\Http\Controllers\CourseController::class, 'store'])->name('course.trainer')->can('create-course');

    });
});

// job-circular routes
Route::prefix('admin')->name('admin.')
    ->middleware('auth')->group(function (){
        Route::prefix('employers')->name('employers.')
            ->group(function (){
                Route::prefix('jobs')->name('jobs.')
                    ->group(function (){
                        Route::get('/datatable', [\App\Http\Controllers\JobController::class, 'getDataTable'])
                            ->name('datatable');
                        Route::get('/status', [\App\Http\Controllers\JobController::class, 'jobStatus'])
                            ->name('status');

                    });
                Route::resource('jobs',\App\Http\Controllers\JobController::class);
            });
    });
