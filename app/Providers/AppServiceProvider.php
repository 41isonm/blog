<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Post;
use App\Models\User;
use App\Models\PostReaction;
use App\Models\Comments;


use App\Providers\Service\Post\PostService;
use App\Providers\Service\User\UserService;
use App\Providers\Service\Post\PostReactionService;
use App\Providers\Service\Comments\CommentsService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(PostService::class, function ($app) {
            return new PostService(new Post());
        });

        $this->app->singleton(UserService::class, function ($app) {
            return new UserService(new User());
        });

        $this->app->singleton(PostReactionService::class, function ($app) {
            return new PostReactionService(new PostReaction());
        });



        $this->app->singleton(CommentsService::class, function ($app) {
            return new CommentsService(new Comments());
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
