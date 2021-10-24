<?php

namespace Nima\Crud;

use Illuminate\Support\ServiceProvider;


class CrudServiceProvider extends ServiceProvider {
  /**
   * Register services.
   *
   * @return void
   */
  public function register () {
//    $this->mergeConfigFrom (
//        __DIR__ . "/config/corud.php" , "crud"
//    );
  }
  
  /**
   * Bootstrap services.
   *
   * @return void
   */
  public function boot () {
    $this->loadMigrationsFrom (__DIR__ . "/database/migrations");
    $this->publishes ([
      realpath (__DIR__ . "/database/migrations") => database_path ("migrations")
    ] , 'migrations');
    
    
    $this->loadRoutesFrom (__DIR__ . "/routes/routes.php");
    $this->publishes ([
      __DIR__ . "/routes" => base_path ("/routes/Crud")
    ] , 'Crud');
    
    
    $this->loadViewsFrom (__DIR__ . "/views" , "Crud");
    $this->publishes ([
      __DIR__ . "/views" => base_path ("resources/views/Nima/Crud")
    ] , 'Crud');
    
    
    $this->publishes ([
      __DIR__ . "/config/crud.php" => config_path ("crud.php")
    ] , 'Crud');
    
    $this->publishes ([
      __DIR__ . "/database/migrations" => database_path ("/migrations")
    ] , "Crud");
    
    
    $this->loadTranslationsFrom (__DIR__ . "/lang/fa" , "Crud");
    $this->publishes ([
      __DIR__ . "/lang/fa" => resource_path ("lang/vandor/Crud")
    ] , "Crud");
    
    
//انتشار فایل های css و js درون پوشه assets در پکیج خودمان
    $this->publishes ([
      __DIR__ . "/path/to/assets" => public_path ("vandor/Crud")
    ] , "public");
    
    
    /*
      $this->loadViewComponentsAs("CrudApi" , [
          Alert::class ,
          Button::class
      ]);
    */
    
//دستورزیربرای اجراومعرفی فایل هایی که دستورات پوسته یا Commands های آرتیزان است
    /*
    if($this->app->runningInConsole ()) {
      $this->commands ([
        CrudCommands::class ,
        MyTestCommands::class ,
      ]);
    }
    */
    
  }
}
