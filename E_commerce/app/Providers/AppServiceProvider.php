<?php

namespace App\Providers;
use View;
use App\categories;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //view::share('name','arun');
        view::composer('admin.category.addcategory',function($abc){
            $cate = categories::Where('pstatus',1)->get();
            $abc->with('cat',$cate);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
