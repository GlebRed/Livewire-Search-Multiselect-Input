<?php


namespace GlebRed\SearchMultiselectInput;
use Illuminate\Support\ServiceProvider;

class SearchMultiselectInputServiceProvider extends ServiceProvider
{
  public function register()
  {
    //
  }

  public function boot()
  {

    $this->loadViewsFrom(__DIR__.'/../resources/views', 'search-multiselect-input');

    if ($this->app->runningInConsole()) {
      // Publish views
      $this->publishes([
          __DIR__.'/../resources/views' => resource_path('views/vendor/search_multiselect_input'),
      ], 'views');

    }
  }

}