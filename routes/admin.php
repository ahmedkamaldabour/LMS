<?php

use App\Http\Controllers\Admin\{AuthController,
    BlogCategoryController,
    CategoryController,
    CommentController,
    CourseController,
    ExamController,
    ExamQuestionsController,
    HomeController,
    LessonController,
    PostController,
    ProfileController,
    QuestionAnswerController};
use App\Http\Controllers\CKEditorController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),

        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () { //...
        Route::group([
            'prefix' => 'admin/auth', 'as' => 'admin.',
            "middleware" => "guest"
        ], function () {
            Route::get('/', [AuthController::class, "index"])->name('auth.index');
            Route::post('login', [AuthController::class, "login"])->name('auth.login');
        });


        Route::group([
            'prefix' => 'admin', 'as' => 'admin.',
            "middleware" => ["isAdmin", "prevent-back-history"]
        ], function () {
            Route::get('/', [HomeController::class, 'index'])->name('index');
            Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


            Route::group([
                'prefix' => 'category',
                'as' => 'category.',
                'controller' => CategoryController::class
            ], function () {
                Route::get('index', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::get('edit/{category}', 'edit')->name('edit');
                Route::put('update/{category}', 'update')->name('update');
                Route::delete('delete/{category}', 'delete')->name('delete');
            });


            Route::group([
                'prefix' => 'blog_category',
                'as' => 'blog_category.',
                'controller' => BlogCategoryController::class
            ], function () {
                Route::get('index', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::get('edit/{category}', 'edit')->name('edit');
                Route::put('update/{category}', 'update')->name('update');
                Route::delete('delete/{category}', 'delete')->name('delete');
            });

            // Courses Routes
            Route::group([
                'prefix' => 'courses',
                'as' => 'courses.',
                'controller' => CourseController::class
            ], function () {
                Route::get('/', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::get('show/{course}', 'show')->name('show');
                Route::post('store', 'store')->name('store');
                Route::get('edit/{course}', 'edit')->name('edit');
                Route::put('update/{course}', 'update')->name('update');
                Route::delete('delete/{course}', 'destroy')->name('delete');
            });


            // lessons Routes
            Route::group([
                'controller' => LessonController::class,
                'prefix' => 'lessons', 'as' => 'lessons.',
                'middleware' => 'prevent-back-history',

            ], function () {
                Route::get('index', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::get('edit/{lesson}', 'edit')->name('edit');
                Route::put('update/{lesson}', 'update')->name('update');
                Route::delete('delete/{lesson}', 'delete')->name('delete');
            });

            // route group ckeditor.upload
            Route::group([
                'prefix' => 'ckeditor',
                'as' => 'ckeditor.'
            ], function () {
                Route::post('upload', [CKEditorController::class, 'upload'])->name('upload');
            });


            // posts
            Route::group(['prefix' => 'posts', 'as' => 'posts.', 'controller' => PostController::class], function () {
                Route::get('index', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::get('edit/{post}', 'edit')->name('edit');
                Route::put('update/{post}', 'update')->name('update');
                Route::get('show/{post}', 'show')->name('show');
                Route::delete('delete/{post}', 'delete')->name('delete');
                Route::put('update_status/{comment}', 'update_status')->name('update_status');
            });

            // comments routes
            Route::group([
                'controller' => CommentController::class,
                'prefix' => 'comments',
                'as' => 'comments.'
            ], function () {
                Route::get('/', 'index')->name('index');
                Route::get('show/{comment}', 'show')->name('show');
                Route::put('change_status/{comment}', 'changeStatus')->name('change_status');
                Route::delete('destroy/{comment}', 'destroy')->name('destroy');
            });


        // Exam Section
        //Question Answer routes
        Route::group([
            'prefix' => 'question_answer',
            'as' => 'question_answer.',
            'controller' => QuestionAnswerController::class
        ], function () {
            Route::get('index', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('edit/{answer}', 'edit')->name('edit');
            Route::put('update/{answer}', 'update')->name('update');
            Route::delete('delete/{answer}', 'delete')->name('delete');
        });

            // Exams Routes
            Route::group([
                'prefix' => 'exams',
                'as' => 'exams.',
                'controller' => ExamController::class
            ], function () {
                Route::get('/', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::get('show/{exam}', 'show')->name('show');
                Route::post('store', 'store')->name('store');
                Route::get('edit/{exam}', 'edit')->name('edit');
                Route::put('update/{exam}', 'update')->name('update');
                Route::delete('delete/{exam}', 'destroy')->name('delete');
                Route::post('activation/{exam}', 'changeActivation')->name('change_activation');
                Route::post('status/{exam}', 'changeStatusClosedOrOpened')->name('change_status');

            });


            // examQuestions
            Route::group(
                [
                    'prefix' => 'examQuestions',
                    'controller' => ExamQuestionsController::class,
                ], function () {
                Route::get('/', 'index')->name('examQuestions.index');
                Route::get('/create', 'create')->name('examQuestions.create');
                Route::post('/store', 'store')->name('examQuestions.store');
                Route::get('/{examQuestion}/show', 'show')->name('examQuestions.show');
                Route::get('/{examQuestion}/edit', 'edit')->name('examQuestions.edit');
                Route::put('/{examQuestion}/update', 'update')->name('examQuestions.update');
                Route::delete('/{examQuestion}/destroy', 'destroy')->name('examQuestions.destroy');
            });



        });
        // profile
        Route::group([
            'prefix' => 'profile', 'as' => 'profile.'
        ], function () {
            Route::get('create', [ProfileController::class, 'create'])->name('create');
            Route::post('store', [ProfileController::class, 'store'])->name('store');

            Route::get('change_password', [ProfileController::class, 'change_password'])->name('change_password');
            Route::post('update_password', [ProfileController::class, 'update_password'])->name('update_password');

            Route::get('/edit/{profile}', [ProfileController::class, 'edit'])->name('edit');
            Route::post('/update/{profile}', [ProfileController::class, 'update'])->name('update');
        });


    });







