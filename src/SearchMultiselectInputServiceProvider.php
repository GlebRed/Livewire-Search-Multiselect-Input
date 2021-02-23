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
    $this->loadViewsFrom(__DIR__.'/../resources/views', 'search_multiselect');
  }

}