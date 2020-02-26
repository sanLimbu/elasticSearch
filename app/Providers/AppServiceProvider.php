<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Scout\EngineManager;
use App\Search\Engines\ElasticSearchEngine;
use Elasticsearch\ClientBuilder;

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
        $this->app->singleton('elasticsearch', function(){
          return ClientBuilder::create()
                  ->setHosts([
                      'elastic.test:9200'
                    ])
                  ->build();
        });

        resolve(EngineManager::class)->extend('elasticsearch', function(){
          return new ElasticSearchEngine(
            app('elasticsearch')
          );
        });
    }
}
