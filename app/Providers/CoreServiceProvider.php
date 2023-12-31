<?php

namespace App\Providers;

use App\Core\Repositories\NoteRepository;
use App\Core\Repositories\NoteRepositoryInterface;
use App\Core\Services\NoteService;
use App\Core\Services\NoteServiceInterface;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NoteRepositoryInterface::class, NoteRepository::class);
        $this->app->bind(NoteServiceInterface::class, NoteService::class);
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
