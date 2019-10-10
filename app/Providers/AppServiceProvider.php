<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;

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
        Blade::directive('role_color', function($role) {

            $valid = "<?php ";
            $valid .= " if($role == 1){ echo 'class=\"label bg-red\"';}";
            $valid .= " elseif($role == 2){ echo 'class=\"label bg-green\"';}";
            $valid .= " elseif($role == 3){ echo 'class=\"label bg-yellow\"';}";
            $valid .= " elseif($role == 4){ echo 'class=\"label bg-blue\"';}";
            $valid .= "?>";

            return $valid;

        });

        Blade::directive('status', function($status) {

            $valid = "<?php ";
            $valid .= " if($status == 1){ echo 'Pendiente';}";
            $valid .= " elseif($status == 2){ echo 'En Curso';}";
            $valid .= " elseif($status == 3){ echo 'Resuelto';}";
            $valid .= "?>";

            return $valid;

        });

        Blade::if('superadmin', function () {
            return auth()->check() && auth()->user()->isSuperAdmin();
        });

        Blade::if('isNotTechnical', function () {
            return auth()->check() && auth()->user()->role_id != 2;
        });
    }
}
