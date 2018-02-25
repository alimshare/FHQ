<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CrudServiceProvider extends ServiceProvider{
 
    public function register() {

        $this->app->bind('App\Repositories\IInfaqRepository',  'App\Repositories\impl\InfaqRepository');
        $this->app->bind('App\Repositories\IKelasRepository',  'App\Repositories\impl\KelasRepository');
        $this->app->bind('App\Repositories\ILevelRepository',  'App\Repositories\impl\LevelRepository');
        $this->app->bind('App\Repositories\IPengajarRepository',  'App\Repositories\impl\PengajarRepository');
        $this->app->bind('App\Repositories\IPesertaRepository',  'App\Repositories\impl\PesertaRepository');
        $this->app->bind('App\Repositories\ISantriRepository',  'App\Repositories\impl\SantriRepository');
        $this->app->bind('App\Repositories\ISemesterRepository',  'App\Repositories\impl\SemesterRepository');
        $this->app->bind('App\Repositories\ISaranRepository',  'App\Repositories\impl\SaranRepository');
        $this->app->bind('App\Repositories\ITestimoniRepository',  'App\Repositories\impl\TestimoniRepository');
        $this->app->bind('App\Repositories\IBukuRepository',  'App\Repositories\impl\BukuRepository');
        $this->app->bind('App\Repositories\IUserRepository',  'App\Repositories\impl\UserRepository');
        
    }
    
}   