<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Adoption;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        Carbon::setLocale('id');

        View::composer('*', function ($view) {
            if (Auth::check()) {
                $adoptions = Adoption::with('cat')
                    ->where('applicant_id', Auth::id())
                    ->whereIn('status', ['approved', 'rejected'])
                    ->latest()
                    ->get();
            } else {
                $adoptions = collect(); // kosongkan kalau belum login
            }

            $view->with('adoptions', $adoptions);
        });
    }
}
