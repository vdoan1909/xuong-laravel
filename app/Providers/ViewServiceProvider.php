<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Catalogue;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('admin.layout.side-bar', function ($view) {
            $data = Catalogue::with('children')->whereNull('parent_id')->get();
            $view->with('data', $data);
        });
    }
}
