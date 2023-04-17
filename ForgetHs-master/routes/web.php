<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\MountDynamicNavbar;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//ROTA LIBERADA PARA O PUBLICO

Route::middleware([MountDynamicNavbar::class])->group(function () {
    Route::prefix('')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::get('/',                                             'StoreController@index')->name('store-index');
        Route::get('/sobre',                                        'StoreController@showSobrePage')->name('store');
        Route::get('/contato',                                      'StoreController@showContatoPage')->name('store');
        Route::get('/produtos/{categoria}',                                  'StoreController@showProductsByCategoria')->name('store');
        // Route::get('/camisetas',                                    'StoreController@showCamisas')->name('store');
        // Route::get('/vidrarias',                                    'StoreController@showVidrarias')->name('store');
        // Route::get('/premium',                                      'StoreController@showPremium')->name('store');
        // Route::get('/contato',                                      'StoreController@showContato')->name('store');
    });
});

/* Auto-generated admin routes */
Route::prefix('produtos')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
    Route::get('/',                                             'ProdutoController@index')->name('index');
    Route::get('/{estoque}',                            'ProdutoController@getProduct')->name('store');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('admin-users')->name('admin-users/')->group(static function () {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('admin-users')->name('admin-users/')->group(static function () {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AdminUsersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('loja-locals')->name('loja-locals/')->group(static function () {
            Route::get('/',                                             'LojaLocalsController@index')->name('index');
            Route::get('/create',                                       'LojaLocalsController@create')->name('create');
            Route::post('/',                                            'LojaLocalsController@store')->name('store');
            Route::get('/{lojaLocal}/edit',                             'LojaLocalsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'LojaLocalsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{lojaLocal}',                                 'LojaLocalsController@update')->name('update');
            Route::delete('/{lojaLocal}',                               'LojaLocalsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('categorias')->name('categorias/')->group(static function () {
            Route::get('/',                                             'CategoriasController@index')->name('index');
            Route::get('/create',                                       'CategoriasController@create')->name('create');
            Route::post('/',                                            'CategoriasController@store')->name('store');
            Route::get('/{categorium}/edit',                            'CategoriasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CategoriasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{categorium}',                                'CategoriasController@update')->name('update');
            Route::delete('/{categorium}',                              'CategoriasController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('estoques')->name('estoques/')->group(static function () {
            Route::get('/',                                             'EstoqueController@index')->name('index');
            Route::get('/create',                                       'EstoqueController@create')->name('create');
            Route::post('/',                                            'EstoqueController@store')->name('store');
            Route::get('/{estoque}/edit',                               'EstoqueController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'EstoqueController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{estoque}',                                   'EstoqueController@update')->name('update');
            Route::delete('/{estoque}',                                 'EstoqueController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('ofertas')->name('ofertas/')->group(static function () {
            Route::get('/',                                             'OfertasController@index')->name('index');
            Route::get('/create',                                       'OfertasController@create')->name('create');
            Route::post('/',                                            'OfertasController@store')->name('store');
            Route::get('/{ofertum}/edit',                               'OfertasController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'OfertasController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{ofertum}',                                   'OfertasController@update')->name('update');
            Route::delete('/{ofertum}',                                 'OfertasController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('clientes')->name('clientes/')->group(static function() {
            Route::get('/',                                             'ClientesController@index')->name('index');
            Route::get('/create',                                       'ClientesController@create')->name('create');
            Route::post('/',                                            'ClientesController@store')->name('store');
            Route::get('/{cliente}/edit',                               'ClientesController@edit')->name('edit');
            Route::get('/{cliente}/historico-compras',                  'ClientesController@historicoCompras')->name('edit');
            Route::post('/bulk-destroy',                                'ClientesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{cliente}',                                   'ClientesController@update')->name('update');
            Route::delete('/{cliente}',                                 'ClientesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('nivel-clientes')->name('nivel-clientes/')->group(static function() {
            Route::get('/',                                             'NivelClientesController@index')->name('index');
            Route::get('/create',                                       'NivelClientesController@create')->name('create');
            Route::post('/',                                            'NivelClientesController@store')->name('store');
            Route::get('/{nivelCliente}/edit',                          'NivelClientesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'NivelClientesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{nivelCliente}',                              'NivelClientesController@update')->name('update');
            Route::delete('/{nivelCliente}',                            'NivelClientesController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('pedidos')->name('pedidos/')->group(static function() {
            Route::get('/',                                             'PedidosController@index')->name('index');
            // Route::get('/create',                                       'PedidosController@create')->name('create');
            // Route::post('/',                                            'PedidosController@store')->name('store');
            Route::get('/{pedido}/edit',                                'PedidosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PedidosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{pedido}',                                    'PedidosController@update')->name('update');
            Route::delete('/{pedido}',                                  'PedidosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tipo-pagamentos')->name('tipo-pagamentos/')->group(static function() {
            Route::get('/',                                             'TipoPagamentoController@index')->name('index');
            Route::get('/create',                                       'TipoPagamentoController@create')->name('create');
            Route::post('/',                                            'TipoPagamentoController@store')->name('store');
            Route::get('/{tipoPagamento}/edit',                         'TipoPagamentoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TipoPagamentoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tipoPagamento}',                             'TipoPagamentoController@update')->name('update');
            Route::delete('/{tipoPagamento}',                           'TipoPagamentoController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('pedidos')->name('pedidos/')->group(static function() {
            Route::get('/',                                             'PedidosController@index')->name('index');
            Route::get('/create',                                       'PedidosController@create')->name('create');
            Route::post('/',                                            'PedidosController@store')->name('store');
            Route::get('/{pedido}/edit',                                'PedidosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PedidosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{pedido}',                                    'PedidosController@update')->name('update');
            Route::delete('/{pedido}',                                  'PedidosController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('redes-sociais')->name('redes-sociais/')->group(static function() {
            Route::get('/',                                             'RedesSociaisController@index')->name('index');
            Route::get('/create',                                       'RedesSociaisController@create')->name('create');
            Route::post('/',                                            'RedesSociaisController@store')->name('store');
            Route::get('/{redesSociai}/edit',                           'RedesSociaisController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RedesSociaisController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{redesSociai}',                               'RedesSociaisController@update')->name('update');
            Route::delete('/{redesSociai}',                             'RedesSociaisController@destroy')->name('destroy');
        });
    });
});
