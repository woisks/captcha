<?php
declare(strict_types=1);


namespace Woisks\Captcha\Providers;


use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use Woisks\Captcha\Models\Services\DirectMailTransportSerivce;

/**
 * Class AppServiceProvider
 *
 * @package Woisks\Captcha\Providers
 *
 * @Author  Maple Grove  <bolelin@126.com> 2019/6/4 20:22
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * boot 2019/6/4 20:22
     *
     *
     * @return void
     */
    public function boot()
    {
        $this->app['swift.transport']->extend('directmail', function () {
            $config = $this->app['config']->get('services.directmail', []);

            return new DirectMailTransportSerivce(new Client($config), $config['key'], $config['secret'], $config);
        });
        $this->loadViewsFrom(__DIR__.'/../views', 'captcha');

        $this->loadRoutesFrom(__DIR__ . '/../routes.php');

    }
}