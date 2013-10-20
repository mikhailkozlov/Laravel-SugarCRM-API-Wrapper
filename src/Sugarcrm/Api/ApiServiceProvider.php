<?php namespace Sugarcrm\Api;


use Illuminate\Support\ServiceProvider;
use Config;

class ApiServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('sugarcrm/api');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
        $app = $this->app;

        $this->app['sugarapi'] = $this->app->share(function ($app) {

            $connector = new Rest;

            $connector->setUrl($app['config']->get('api::config.url', 'http://localhost/service/v4_1/rest.php')); //'http://localhost/service/v4_1/rest.php';
            $connector->setUsername($app['config']->get('api::config.user', 'use'));
            $connector->setPassword($app['config']->get('api::config.password', 'password'));

            return $connector;
        });

        $this->app->booting(function () {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('SugarApi', 'Sugarcrm\Api\Facades\SugarApi');
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

}