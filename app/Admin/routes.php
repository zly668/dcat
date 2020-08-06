<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Dcat\Admin\Admin;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('demo', DemoController::class);
     $router->resource('work', WorkController::class);
     //网站banner管理
     $router->resource('banner', BannerController::class);
     
     //站点管理
     $router->resource('config', ConfigController::class);
    // $router->get('demo', 'DemoController@index');
    
    //友情链接
     $router->resource('link', LinkController::class);
     
     //合作伙伴
     $router->resource('partner', PartnerController::class);
     
     //预约
     $router->resource('subscribe', SubscribeController::class);
     
     //关于我们
     $router->resource('about', AboutController::class);

});
