<?php

namespace App\Providers;

use App\Http\Interfaces\Admin\AuthInterface;
use App\Http\Interfaces\Admin\BlogCategoryInterface;
use App\Http\Interfaces\Admin\CategoryInterface;
use App\Http\Interfaces\Admin\CommentInterface;
use App\Http\Interfaces\Admin\CourseInterface;
use App\Http\Interfaces\Admin\ExamInterface;
use App\Http\Interfaces\Admin\ExamQuestionsInterface;
use App\Http\Interfaces\Admin\HomeInterface;
use App\Http\Interfaces\Admin\LessonInterface;

use App\Http\Interfaces\Admin\PostInterface;
use App\Http\Interfaces\Admin\ProfileInterface;
use App\Http\Interfaces\Admin\QuestionAnswerInterface;
use App\Http\Repositories\Admin\AuthRepository;
use App\Http\Repositories\Admin\BlogCategoryRepository;
use App\Http\Repositories\Admin\CategoryRepository;
use App\Http\Repositories\Admin\CommentRepository;
use App\Http\Repositories\Admin\CourseRepository;
use App\Http\Repositories\Admin\ExamRepository;
use App\Http\Repositories\Admin\ExamQuestionsRepository;
use App\Http\Repositories\Admin\HomeRepository;
use App\Http\Repositories\Admin\LessonRepository;
use App\Http\Repositories\Admin\PostRepository;
use App\Http\Repositories\Admin\ProfileRepository;
use App\Http\Repositories\Admin\QuestionAnswerRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            HomeInterface::class,
            HomeRepository::class
        );
        $this->app->bind(
            CategoryInterface::class,
            CategoryRepository::class,
        );

        $this->app->bind(
            LessonInterface::class,
            LessonRepository::class
        );
        $this->app->bind(
            PostInterface::class,
            PostRepository::class
        );

        ########## Admin ###########
        // auth

        $this->app->bind(
            AuthInterface::class,
            AuthRepository::class

        );

        $this->app->bind(
            CourseInterface::class,
            CourseRepository::class
        );

        $this->app->bind(
            ProfileInterface::class,
            ProfileRepository::class
        );

        $this->app->bind(
            BlogCategoryInterface::class,
            BlogCategoryRepository::class,
        );

        $this->app->bind(
            CommentInterface::class,
            CommentRepository::class
        );

        $this->app->bind(
            ExamInterface::class,
            ExamRepository::class
        );

        // examQuestions
        $this->app->bind(
            ExamQuestionsInterface::class,
            ExamQuestionsRepository::class
        );
        $this->app->bind(
            QuestionAnswerInterface::class,
            QuestionAnswerRepository::class,
        );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
