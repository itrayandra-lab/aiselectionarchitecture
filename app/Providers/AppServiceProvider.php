<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\ModelDeletionObserver;

// Import models yang ingin di-observe
use App\Models\User;
use App\Models\Posts;
use App\Models\Page;
use App\Models\PostCategory;
use App\Models\PostTags;
use App\Models\Album;
use App\Models\Video;
use App\Models\Information;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register ModelDeletionObserver for models
        User::observe(ModelDeletionObserver::class);
        Posts::observe(ModelDeletionObserver::class);
        Page::observe(ModelDeletionObserver::class);
        PostCategory::observe(ModelDeletionObserver::class);
        PostTags::observe(ModelDeletionObserver::class);
        Album::observe(ModelDeletionObserver::class);
        Video::observe(ModelDeletionObserver::class);
        Information::observe(ModelDeletionObserver::class);
    }
}
