<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'Pop Smart',

    'title_prefix' => '',

    'title_postfix' => ' -- 内容管理系统',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b><img src="/images/logo.png" style="width: 50%;">Pop</b>Smart',

    'logo_mini' => '<b>P</b>ST',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'blue',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'admin',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        [
            'text'        => '欢迎页',
            'url'         => 'admin',
            'icon'        => 'dashboard',
            'active' => ['欢迎页', '/admin'],
        ],
        [
            'text'    => '首页',
            'icon'    => 'home',
            'active' => ['首页', '/admin/home/*'],
            'submenu' => [
                [
                    'text' => '轮播图',
                    'url'  => '/admin/home/banner',
                    'icon' => 'image',
                    'active' => ['首页', '轮播图', '/admin/home/banner/*'],
                ],
            ],
        ],
        [
            'text'    => '新闻',
            'icon'    => 'newspaper-o',
            'submenu' => [
                [
                    'text' => '列表',
                    'route' => 'admin.news.index',
                    'icon' => 'feed',
                    'active' => ['新闻', '列表', '/admin/news*'],
                ],
            ],
        ],
        [
            'text'    => '产品',
            'icon'    => 'plane',
            'submenu' => [
                [
                    'text' => '列表',
                    'route' => 'admin.product.index',
                    'icon' => 'paper-plane',
                    'active' => ['产品', '列表', '/admin/product*'],
                ],
                [
                    'text'    => '系列',
                    'route'   => 'admin.series.index',
                    'icon'    => 'cog',
                    'active'  => ['产品', '系列', '/admin/series*'],
                ],
            ],
        ],
        [
            'text'    => '案例',
            'icon'    => 'cogs',
            'submenu' => [
                [
                    'text' => '列表',
                    'route'=> 'admin.cases.index',
                    'icon' => 'file',
                    'active' => ['案例', '列表', '/admin/case*'],
                ],
                [
                    'text'    => '分类',
                    'route'   => 'admin.category.index',
                    'icon'    => 'cog',
                    'active'  => ['案例', '分类', '/admin/category*'],
                ],
            ],
        ],
        [
            'text'    => '服务',
            'icon'    => 'tags',
            'submenu' => [
                [
                    'text' => '列表',
                    'route' => 'admin.service.index',
                    'icon' => 'tag',
                    'active' =>['服务', '列表', '/admin/service*'],
                ],
                [
                    'text'    => '模块',
                    'route'   => 'admin.module.index',
                    'icon'    => 'cog',
                    'active'  => ['服务', '模块', '/admin/module*'],
                ],
            ],
        ],
        [
            'text'    => '关于',
            'icon'    => 'question',
            'submenu' => [
                [
                    'text' => '我们',
                    'url'  => '/admin/article/1',
                    'icon' => 'users',
                    'active'  => ['关于', '我们', '/admin/article/1*'],
                ],
                [
                    'text'    => '加入',
                    'icon'    => 'odnoklassniki',
                    'submenu' => [
                        [
                            'text' => '职位',
                            'route'  => 'admin.job.index',
                            'icon' => 'list',
                            'active'  => ['关于', '加入', '职位', '/admin/job*'],
                        ],
                        [
                            'text' => '部门',
                            'route'  => 'admin.department.index',
                            'icon' => 'users',
                            'active'  => ['关于', '加入', '部门', '/admin/department*'],
                        ],
                        [
                            'text'    => '标签',
                            'route'   => 'admin.tag.index',
                            'icon'    => 'tags',
                            'active'  => ['关于', '加入', '标签', '/admin/tag*'],
                        ],
                    ],
                ],
                [
                    'text' => '联系',
                    'url'  => '/admin/article/2',
                    'icon' => 'mobile',
                    'active'  => ['关于', '联系', '/admin/article/2*'],
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
