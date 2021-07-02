<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Language;
use App\Models\Currency;
use DB;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $settings = DB::table('settings')->get()->first();

        if (Schema::hasTable('languages')) {
            $languages = Language::query()
                ->where('is_active', Language::STATUS_ACTIVE)
                ->orderBy('is_default', 'desc')
                ->get();

            $language_default = Language::query()
                ->where('is_default', Language::IS_DEFAULT)
                ->first();
        } else {
            $languages = [];
        }
        
        View::composer('*', function ($view) {

        if(session()->has('currId')){
            $currentCurrency = Currency::where('id', session()->get('currId'))->first();
            $view->with('currentCurrency', $currentCurrency);
        }else{
            $currentCurrency = Currency::where('is_default', 1)->first();
            $view->with('currentCurrency', $currentCurrency);
        }


        $currencies = Currency::all();
        $view->with('currencies', $currencies );
    });

        View::share([
            'settings' => $settings,
            'languages' => $languages,
            'language_default' => $language_default,]);
    }

    
}
