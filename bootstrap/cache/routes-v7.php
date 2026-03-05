<?php

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/up' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ysXaXcwvWFTbtVAw',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/tentang-kami' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'about',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/layanan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'layanan.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/portfolio' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'portfolio.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/blog' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/kontak' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'contact',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'contact.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.login.post',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/layanan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.layanan.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.layanan.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/layanan/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.layanan.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/portfolio' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.portfolio.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.portfolio.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/portfolio/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.portfolio.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/blog' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.blog.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.blog.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/blog/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.blog.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/klien' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.klien.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.klien.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/klien/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.klien.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tim' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tim.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tim.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/tim/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tim.create',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/kontak' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.kontak.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/pengaturan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.pengaturan.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.pengaturan.update',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/la(?|yanan/([^/]++)(?|(*:30)|/download\\-proposal(*:56))|ng/([^/]++)(*:75))|/portfolio/([^/]++)(*:102)|/blog/([^/]++)(*:124)|/admin/(?|layanan/([^/]++)(?|/edit(*:166)|(*:174))|portfolio/([^/]++)(?|/edit(*:209)|(*:217))|blog/([^/]++)(?|/edit(*:247)|(*:255))|k(?|lien/([^/]++)(?|/edit(*:289)|(*:297))|ontak/([^/]++)(?|(*:323)|/read(*:336)|(*:344)))|tim/([^/]++)(?|/edit(*:374)|(*:382)))|/storage/(.*)(?|(*:408)))/?$}sDu',
    ),
    3 => 
    array (
      30 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'layanan.show',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      56 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'layanan.download-proposal',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      75 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'locale.switch',
          ),
          1 => 
          array (
            0 => 'locale',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      102 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'portfolio.show',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      124 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'blog.show',
          ),
          1 => 
          array (
            0 => 'slug',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      166 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.layanan.edit',
          ),
          1 => 
          array (
            0 => 'service',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      174 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.layanan.update',
          ),
          1 => 
          array (
            0 => 'service',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.layanan.destroy',
          ),
          1 => 
          array (
            0 => 'service',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      209 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.portfolio.edit',
          ),
          1 => 
          array (
            0 => 'portfolio',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      217 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.portfolio.update',
          ),
          1 => 
          array (
            0 => 'portfolio',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.portfolio.destroy',
          ),
          1 => 
          array (
            0 => 'portfolio',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      247 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.blog.edit',
          ),
          1 => 
          array (
            0 => 'blog',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      255 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.blog.update',
          ),
          1 => 
          array (
            0 => 'blog',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.blog.destroy',
          ),
          1 => 
          array (
            0 => 'blog',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      289 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.klien.edit',
          ),
          1 => 
          array (
            0 => 'client',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      297 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.klien.update',
          ),
          1 => 
          array (
            0 => 'client',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.klien.destroy',
          ),
          1 => 
          array (
            0 => 'client',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      323 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.kontak.show',
          ),
          1 => 
          array (
            0 => 'contact',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      336 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.kontak.read',
          ),
          1 => 
          array (
            0 => 'contact',
          ),
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      344 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.kontak.destroy',
          ),
          1 => 
          array (
            0 => 'contact',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      374 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tim.edit',
          ),
          1 => 
          array (
            0 => 'team',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      382 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tim.update',
          ),
          1 => 
          array (
            0 => 'team',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.tim.destroy',
          ),
          1 => 
          array (
            0 => 'team',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      408 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'storage.local',
          ),
          1 => 
          array (
            0 => 'path',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'storage.local.upload',
          ),
          1 => 
          array (
            0 => 'path',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'generated::ysXaXcwvWFTbtVAw' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'up',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:882:"function () {
                    $exception = null;

                    try {
                        \\Illuminate\\Support\\Facades\\Event::dispatch(new \\Illuminate\\Foundation\\Events\\DiagnosingHealth);
                    } catch (\\Throwable $e) {
                        if (app()->hasDebugModeEnabled()) {
                            throw $e;
                        }

                        report($e);

                        $exception = $e->getMessage();
                    }

                    return response(\\Illuminate\\Support\\Facades\\View::file(\'C:\\\\Users\\\\asus\\\\OneDrive\\\\Desktop\\\\PROJECT WEB\\\\WEB BANDUNGCODING\\\\BandungCoding\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Configuration\'.\'/../resources/health-up.blade.php\', [
                        \'exception\' => $exception,
                    ]), status: $exception ? 500 : 200);
                }";s:5:"scope";s:54:"Illuminate\\Foundation\\Configuration\\ApplicationBuilder";s:4:"this";N;s:4:"self";s:32:"000000000000034b0000000000000000";}}',
        'as' => 'generated::ysXaXcwvWFTbtVAw',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Application\\Web\\Controllers\\HomeController@__invoke',
        'controller' => 'App\\Application\\Web\\Controllers\\HomeController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'about' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'tentang-kami',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Application\\Web\\Controllers\\AboutController@__invoke',
        'controller' => 'App\\Application\\Web\\Controllers\\AboutController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'about',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'layanan.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'layanan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Application\\Web\\Controllers\\ServiceController@index',
        'controller' => 'App\\Application\\Web\\Controllers\\ServiceController@index',
        'as' => 'layanan.index',
        'namespace' => NULL,
        'prefix' => '/layanan',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'layanan.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'layanan/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Application\\Web\\Controllers\\ServiceController@show',
        'controller' => 'App\\Application\\Web\\Controllers\\ServiceController@show',
        'as' => 'layanan.show',
        'namespace' => NULL,
        'prefix' => '/layanan',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'layanan.download-proposal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'layanan/{slug}/download-proposal',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Application\\Web\\Controllers\\ServiceController@downloadProposal',
        'controller' => 'App\\Application\\Web\\Controllers\\ServiceController@downloadProposal',
        'as' => 'layanan.download-proposal',
        'namespace' => NULL,
        'prefix' => '/layanan',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'portfolio.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'portfolio',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Application\\Web\\Controllers\\PortfolioController@index',
        'controller' => 'App\\Application\\Web\\Controllers\\PortfolioController@index',
        'as' => 'portfolio.index',
        'namespace' => NULL,
        'prefix' => '/portfolio',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'portfolio.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'portfolio/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Application\\Web\\Controllers\\PortfolioController@show',
        'controller' => 'App\\Application\\Web\\Controllers\\PortfolioController@show',
        'as' => 'portfolio.show',
        'namespace' => NULL,
        'prefix' => '/portfolio',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'blog',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Application\\Web\\Controllers\\BlogController@index',
        'controller' => 'App\\Application\\Web\\Controllers\\BlogController@index',
        'as' => 'blog.index',
        'namespace' => NULL,
        'prefix' => '/blog',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'blog.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'blog/{slug}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Application\\Web\\Controllers\\BlogController@show',
        'controller' => 'App\\Application\\Web\\Controllers\\BlogController@show',
        'as' => 'blog.show',
        'namespace' => NULL,
        'prefix' => '/blog',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'kontak',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Application\\Web\\Controllers\\ContactController@index',
        'controller' => 'App\\Application\\Web\\Controllers\\ContactController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'contact',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'contact.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'kontak',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Application\\Web\\Controllers\\ContactController@store',
        'controller' => 'App\\Application\\Web\\Controllers\\ContactController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'contact.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'locale.switch' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'lang/{locale}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LocaleController@setLocale',
        'controller' => 'App\\Http\\Controllers\\LocaleController@setLocale',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'locale.switch',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\AdminLoginController@showLogin',
        'controller' => 'App\\Application\\Admin\\Controllers\\AdminLoginController@showLogin',
        'as' => 'admin.login',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.login.post' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\AdminLoginController@login',
        'controller' => 'App\\Application\\Admin\\Controllers\\AdminLoginController@login',
        'as' => 'admin.login.post',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\AdminLoginController@logout',
        'controller' => 'App\\Application\\Admin\\Controllers\\AdminLoginController@logout',
        'as' => 'admin.logout',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\DashboardController@__invoke',
        'controller' => 'App\\Application\\Admin\\Controllers\\DashboardController',
        'as' => 'admin.dashboard',
        'namespace' => NULL,
        'prefix' => 'admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.layanan.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/layanan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\ServiceAdminController@index',
        'controller' => 'App\\Application\\Admin\\Controllers\\ServiceAdminController@index',
        'as' => 'admin.layanan.index',
        'namespace' => NULL,
        'prefix' => 'admin/layanan',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.layanan.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/layanan/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\ServiceAdminController@create',
        'controller' => 'App\\Application\\Admin\\Controllers\\ServiceAdminController@create',
        'as' => 'admin.layanan.create',
        'namespace' => NULL,
        'prefix' => 'admin/layanan',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.layanan.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/layanan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\ServiceAdminController@store',
        'controller' => 'App\\Application\\Admin\\Controllers\\ServiceAdminController@store',
        'as' => 'admin.layanan.store',
        'namespace' => NULL,
        'prefix' => 'admin/layanan',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.layanan.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/layanan/{service}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\ServiceAdminController@edit',
        'controller' => 'App\\Application\\Admin\\Controllers\\ServiceAdminController@edit',
        'as' => 'admin.layanan.edit',
        'namespace' => NULL,
        'prefix' => 'admin/layanan',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'service' => 'slug',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.layanan.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/layanan/{service}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\ServiceAdminController@update',
        'controller' => 'App\\Application\\Admin\\Controllers\\ServiceAdminController@update',
        'as' => 'admin.layanan.update',
        'namespace' => NULL,
        'prefix' => 'admin/layanan',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'service' => 'slug',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.layanan.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/layanan/{service}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\ServiceAdminController@destroy',
        'controller' => 'App\\Application\\Admin\\Controllers\\ServiceAdminController@destroy',
        'as' => 'admin.layanan.destroy',
        'namespace' => NULL,
        'prefix' => 'admin/layanan',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'service' => 'slug',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.portfolio.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/portfolio',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\PortfolioAdminController@index',
        'controller' => 'App\\Application\\Admin\\Controllers\\PortfolioAdminController@index',
        'as' => 'admin.portfolio.index',
        'namespace' => NULL,
        'prefix' => 'admin/portfolio',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.portfolio.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/portfolio/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\PortfolioAdminController@create',
        'controller' => 'App\\Application\\Admin\\Controllers\\PortfolioAdminController@create',
        'as' => 'admin.portfolio.create',
        'namespace' => NULL,
        'prefix' => 'admin/portfolio',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.portfolio.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/portfolio',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\PortfolioAdminController@store',
        'controller' => 'App\\Application\\Admin\\Controllers\\PortfolioAdminController@store',
        'as' => 'admin.portfolio.store',
        'namespace' => NULL,
        'prefix' => 'admin/portfolio',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.portfolio.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/portfolio/{portfolio}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\PortfolioAdminController@edit',
        'controller' => 'App\\Application\\Admin\\Controllers\\PortfolioAdminController@edit',
        'as' => 'admin.portfolio.edit',
        'namespace' => NULL,
        'prefix' => 'admin/portfolio',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'portfolio' => 'slug',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.portfolio.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/portfolio/{portfolio}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\PortfolioAdminController@update',
        'controller' => 'App\\Application\\Admin\\Controllers\\PortfolioAdminController@update',
        'as' => 'admin.portfolio.update',
        'namespace' => NULL,
        'prefix' => 'admin/portfolio',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'portfolio' => 'slug',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.portfolio.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/portfolio/{portfolio}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\PortfolioAdminController@destroy',
        'controller' => 'App\\Application\\Admin\\Controllers\\PortfolioAdminController@destroy',
        'as' => 'admin.portfolio.destroy',
        'namespace' => NULL,
        'prefix' => 'admin/portfolio',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'portfolio' => 'slug',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.blog.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/blog',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\BlogAdminController@index',
        'controller' => 'App\\Application\\Admin\\Controllers\\BlogAdminController@index',
        'as' => 'admin.blog.index',
        'namespace' => NULL,
        'prefix' => 'admin/blog',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.blog.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/blog/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\BlogAdminController@create',
        'controller' => 'App\\Application\\Admin\\Controllers\\BlogAdminController@create',
        'as' => 'admin.blog.create',
        'namespace' => NULL,
        'prefix' => 'admin/blog',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.blog.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/blog',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\BlogAdminController@store',
        'controller' => 'App\\Application\\Admin\\Controllers\\BlogAdminController@store',
        'as' => 'admin.blog.store',
        'namespace' => NULL,
        'prefix' => 'admin/blog',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.blog.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/blog/{blog}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\BlogAdminController@edit',
        'controller' => 'App\\Application\\Admin\\Controllers\\BlogAdminController@edit',
        'as' => 'admin.blog.edit',
        'namespace' => NULL,
        'prefix' => 'admin/blog',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'blog' => 'slug',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.blog.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/blog/{blog}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\BlogAdminController@update',
        'controller' => 'App\\Application\\Admin\\Controllers\\BlogAdminController@update',
        'as' => 'admin.blog.update',
        'namespace' => NULL,
        'prefix' => 'admin/blog',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'blog' => 'slug',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.blog.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/blog/{blog}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\BlogAdminController@destroy',
        'controller' => 'App\\Application\\Admin\\Controllers\\BlogAdminController@destroy',
        'as' => 'admin.blog.destroy',
        'namespace' => NULL,
        'prefix' => 'admin/blog',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'blog' => 'slug',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.klien.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/klien',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\ClientAdminController@index',
        'controller' => 'App\\Application\\Admin\\Controllers\\ClientAdminController@index',
        'as' => 'admin.klien.index',
        'namespace' => NULL,
        'prefix' => 'admin/klien',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.klien.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/klien/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\ClientAdminController@create',
        'controller' => 'App\\Application\\Admin\\Controllers\\ClientAdminController@create',
        'as' => 'admin.klien.create',
        'namespace' => NULL,
        'prefix' => 'admin/klien',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.klien.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/klien',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\ClientAdminController@store',
        'controller' => 'App\\Application\\Admin\\Controllers\\ClientAdminController@store',
        'as' => 'admin.klien.store',
        'namespace' => NULL,
        'prefix' => 'admin/klien',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.klien.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/klien/{client}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\ClientAdminController@edit',
        'controller' => 'App\\Application\\Admin\\Controllers\\ClientAdminController@edit',
        'as' => 'admin.klien.edit',
        'namespace' => NULL,
        'prefix' => 'admin/klien',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'client' => 'slug',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.klien.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/klien/{client}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\ClientAdminController@update',
        'controller' => 'App\\Application\\Admin\\Controllers\\ClientAdminController@update',
        'as' => 'admin.klien.update',
        'namespace' => NULL,
        'prefix' => 'admin/klien',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'client' => 'slug',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.klien.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/klien/{client}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\ClientAdminController@destroy',
        'controller' => 'App\\Application\\Admin\\Controllers\\ClientAdminController@destroy',
        'as' => 'admin.klien.destroy',
        'namespace' => NULL,
        'prefix' => 'admin/klien',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
        'client' => 'slug',
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tim.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tim',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\TeamAdminController@index',
        'controller' => 'App\\Application\\Admin\\Controllers\\TeamAdminController@index',
        'as' => 'admin.tim.index',
        'namespace' => NULL,
        'prefix' => 'admin/tim',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tim.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tim/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\TeamAdminController@create',
        'controller' => 'App\\Application\\Admin\\Controllers\\TeamAdminController@create',
        'as' => 'admin.tim.create',
        'namespace' => NULL,
        'prefix' => 'admin/tim',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tim.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/tim',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\TeamAdminController@store',
        'controller' => 'App\\Application\\Admin\\Controllers\\TeamAdminController@store',
        'as' => 'admin.tim.store',
        'namespace' => NULL,
        'prefix' => 'admin/tim',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tim.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/tim/{team}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\TeamAdminController@edit',
        'controller' => 'App\\Application\\Admin\\Controllers\\TeamAdminController@edit',
        'as' => 'admin.tim.edit',
        'namespace' => NULL,
        'prefix' => 'admin/tim',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tim.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/tim/{team}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\TeamAdminController@update',
        'controller' => 'App\\Application\\Admin\\Controllers\\TeamAdminController@update',
        'as' => 'admin.tim.update',
        'namespace' => NULL,
        'prefix' => 'admin/tim',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.tim.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/tim/{team}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\TeamAdminController@destroy',
        'controller' => 'App\\Application\\Admin\\Controllers\\TeamAdminController@destroy',
        'as' => 'admin.tim.destroy',
        'namespace' => NULL,
        'prefix' => 'admin/tim',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.kontak.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/kontak',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\ContactAdminController@index',
        'controller' => 'App\\Application\\Admin\\Controllers\\ContactAdminController@index',
        'as' => 'admin.kontak.index',
        'namespace' => NULL,
        'prefix' => 'admin/kontak',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.kontak.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/kontak/{contact}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\ContactAdminController@show',
        'controller' => 'App\\Application\\Admin\\Controllers\\ContactAdminController@show',
        'as' => 'admin.kontak.show',
        'namespace' => NULL,
        'prefix' => 'admin/kontak',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.kontak.read' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'admin/kontak/{contact}/read',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\ContactAdminController@markAsRead',
        'controller' => 'App\\Application\\Admin\\Controllers\\ContactAdminController@markAsRead',
        'as' => 'admin.kontak.read',
        'namespace' => NULL,
        'prefix' => 'admin/kontak',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.kontak.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/kontak/{contact}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\ContactAdminController@destroy',
        'controller' => 'App\\Application\\Admin\\Controllers\\ContactAdminController@destroy',
        'as' => 'admin.kontak.destroy',
        'namespace' => NULL,
        'prefix' => 'admin/kontak',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.pengaturan.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/pengaturan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\SettingAdminController@index',
        'controller' => 'App\\Application\\Admin\\Controllers\\SettingAdminController@index',
        'as' => 'admin.pengaturan.index',
        'namespace' => NULL,
        'prefix' => 'admin/pengaturan',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.pengaturan.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/pengaturan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'admin.auth',
        ),
        'uses' => 'App\\Application\\Admin\\Controllers\\SettingAdminController@update',
        'controller' => 'App\\Application\\Admin\\Controllers\\SettingAdminController@update',
        'as' => 'admin.pengaturan.update',
        'namespace' => NULL,
        'prefix' => 'admin/pengaturan',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'storage.local' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'storage/{path}',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:3:{s:4:"disk";s:5:"local";s:6:"config";a:5:{s:6:"driver";s:5:"local";s:4:"root";s:94:"C:\\Users\\asus\\OneDrive\\Desktop\\PROJECT WEB\\WEB BANDUNGCODING\\BandungCoding\\storage\\app/private";s:5:"serve";b:1;s:5:"throw";b:0;s:6:"report";b:0;}s:12:"isProduction";b:0;}s:8:"function";s:323:"function (\\Illuminate\\Http\\Request $request, string $path) use ($disk, $config, $isProduction) {
                    return (new \\Illuminate\\Filesystem\\ServeFile(
                        $disk,
                        $config,
                        $isProduction
                    ))($request, $path);
                }";s:5:"scope";s:47:"Illuminate\\Filesystem\\FilesystemServiceProvider";s:4:"this";N;s:4:"self";s:32:"00000000000003420000000000000000";}}',
        'as' => 'storage.local',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'path' => '.*',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'storage.local.upload' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'storage/{path}',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:3:{s:4:"disk";s:5:"local";s:6:"config";a:5:{s:6:"driver";s:5:"local";s:4:"root";s:94:"C:\\Users\\asus\\OneDrive\\Desktop\\PROJECT WEB\\WEB BANDUNGCODING\\BandungCoding\\storage\\app/private";s:5:"serve";b:1;s:5:"throw";b:0;s:6:"report";b:0;}s:12:"isProduction";b:0;}s:8:"function";s:325:"function (\\Illuminate\\Http\\Request $request, string $path) use ($disk, $config, $isProduction) {
                    return (new \\Illuminate\\Filesystem\\ReceiveFile(
                        $disk,
                        $config,
                        $isProduction
                    ))($request, $path);
                }";s:5:"scope";s:47:"Illuminate\\Filesystem\\FilesystemServiceProvider";s:4:"this";N;s:4:"self";s:32:"00000000000003590000000000000000";}}',
        'as' => 'storage.local.upload',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'path' => '.*',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
