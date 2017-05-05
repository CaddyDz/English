<?php

/*
|--------------------------------------------------------------------------
| CrudMaker Config
|--------------------------------------------------------------------------
|
| WARNING! do not change any thing that starts and ends with _
|
*/

return [

    'template_source'            => app()->basePath().'/resources/crudmaker/crud',

    /*
    |--------------------------------------------------------------------------
    | Single CRUD
    |--------------------------------------------------------------------------
    | The config for CRUDs which which are simple tables:
    | roles, settings etc.
    */

    'single' => [
        '_path_facade_'              => app()->path().'/Facades',
        '_path_service_'             => app()->path().'/Services',
        '_path_model_'               => app()->path().'/Models',
        '_path_controller_'          => app()->path().'/Http/Controllers/',
        '_path_api_controller_'      => app()->path().'/Http/Controllers/Api',
        '_path_views_'               => app()->basePath().'/resources/views',
        '_path_tests_'               => app()->basePath().'/tests',
        '_path_request_'             => app()->path().'/Http/Requests/',
        '_path_routes_'              => app()->basePath().'/routes/web.php',
        '_path_api_routes_'          => app()->basePath().'/routes/api.php',
        'routes_prefix'              => '',
        'routes_suffix'              => '',
        '_app_namespace_'            => app_namespace(),
        '_namespace_services_'       => app_namespace().'Services',
        '_namespace_facade_'         => app_namespace().'Facades',
        '_namespace_model_'          => app_namespace().'Models',
        '_namespace_controller_'     => app_namespace().'Http\Controllers',
        '_namespace_api_controller_' => app_namespace().'Http\Controllers\Api',
        '_namespace_request_'        => app_namespace().'Http\Requests',
    ],

    /*
    |--------------------------------------------------------------------------
    | Sectioned CRUD
    |--------------------------------------------------------------------------
    | The config for CRUDs which are like as sections such as various admin tables:
    | admin_role, admin_settings etc.
    */
    'sectioned' => [
        '_path_facade_'              => app()->path().'/Facades',
        '_path_service_'             => app()->path().'/Services/_section_',
        '_path_model_'               => app()->path().'/Models/_section_',
        '_path_controller_'          => app()->path().'/Http/Controllers/_section_/',
        '_path_api_controller_'      => app()->path().'/Http/Controllers/Api/_section_/',
        '_path_views_'               => app()->basePath().'/resources/views/_sectionLowerCase_',
        '_path_tests_'               => app()->basePath().'/tests',
        '_path_request_'             => app()->path().'/Http/Requests/_section_',
        '_path_routes_'              => app()->basePath().'/routes/web.php',
        '_path_api_routes_'          => app()->basePath().'/routes/api.php',
        'routes_prefix'              => "\n\nRoute::group(['namespace' => '_section_', 'prefix' => '_sectionLowerCase_', 'as' => '_sectionLowerCase_', 'middleware' => ['web']], function () { \n",
        'routes_suffix'              => "\n});",
        '_app_namespace_'            => app_namespace(),
        '_namespace_services_'       => app_namespace().'Services',
        '_namespace_facade_'         => app_namespace().'Facades',
        '_namespace_model_'          => app_namespace().'Models\_section_',
        '_namespace_controller_'     => app_namespace().'Http\Controllers',
        '_namespace_api_controller_' => app_namespace().'Http\Controllers\Api',
        '_namespace_request_'        => app_namespace().'Http\Requests',
    ],

];
