<?php

namespace app\routes;

class Routes
{
    public static function get()
    {
        return [
            'get' => [
                '/' => 'site\HomeController@show',
                '/product' => 'site\ProductController@index',
                '/product/filter' => 'site\ProductController@filterByCategoryJson',
                '/product/search' => 'site\ProductController@searchJson',
                '/agendamentos/create' => 'site\AgendamentoController@create',
                '/login' => 'site\UserController@login',
                '/register' => 'site\UserController@register',
                '/services' => 'site\ServiceController@show',
                '/admin/agendamentos/edit/[0-9]+' => 'admin\AdminAgendamentoController@edit',
                '/admin/agendamentos' => 'admin\AdminAgendamentoController@show',
                '/admin' => 'admin\AdminController@show',


                '/admin/products' => 'admin\AdminProductController@index',
                '/admin/products/create' => 'admin\AdminProductController@create',
                '/admin/products/edit/[0-9]+' => 'admin\AdminProductController@edit',
            ],
            'post' => [
                '/agendamentos/store' => 'site\AgendamentoController@store',
                '/login' => 'site\UserController@login',
                '/register' => 'site\UserController@register',
                '/admin/agendamentos/update/[0-9]+' => 'admin\AdminAgendamentoController@update',


                '/admin/products/store' => 'admin\AdminProductController@store',
                '/admin/products/update/[0-9]+' => 'admin\AdminProductController@update',
                '/admin/products/delete/[0-9]+' => 'admin\AdminProductController@delete',
            ],
        ];
    }
}
