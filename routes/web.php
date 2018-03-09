<?php

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

Route::get('/', function () {
    return view('auth.login');
});

// Route::resource('/product','ProductController');
//Route::resource('/state','StateController');

Route::group(['middleware' => 'auth'], function() {

Route::resource('/tablep','ProductController');
Route::get('/product/tablep', ['middleware' => ['permission:bodega_productos_read'], 'as'=> 'product.show', 'uses'=> 'ProductController@show' ] );
Route::get('/product/new', ['middleware' => ['permission:bodega_productos_create'],'as'=> 'product.create', 'uses'=> 'ProductController@create' ] );
Route::post('/product/store', ['middleware' => ['permission:bodega_productos_create'],'as'=> 'product.store', 'uses'=> 'ProductController@store' ] );
Route::get('/product/delete/{idproduct}', ['middleware' => ['permission:bodega_productos_delete'],'as'=> 'product.destroy', 'uses'=> 'ProductController@destroy' ] );
Route::get('/product/edit/{idproduct}', ['middleware' => ['permission:bodega_productos_update'],'as'=> 'product.edit', 'uses'=> 'ProductController@edit' ] );
Route::post('/product/update/{idproduct}', ['middleware' => ['permission:bodega_productos_update'],'as'=> 'product.update', 'uses'=> 'ProductController@update' ] );
Route::get('/product/see/{idproduct}', ['middleware' => ['permission:bodega_productos_read'],'as'=> 'product.see', 'uses'=> 'ProductController@see' ] );
Route::get('/product/retraso', ['as'=> 'product.index', 'uses'=> 'ProductController@index' ] );
Route::get('/product/pdf', ['as'=> 'product.pdf', 'uses'=> 'ProductController@pdf' ] );
Route::get('/product/reporte', ['as'=> 'product.reportever', 'uses'=> 'ProductController@reportever' ] );
Route::get('/product/reporte/product/{idproduct}', ['as'=> 'product.pdfProductos', 'uses'=> 'ProductController@pdfProductos' ] );




Route::resource('/tableu','UserController');
Route::get('/user/tableu', ['middleware' => ['permission:admin_usuarios_read'], 'as'=> 'user.index', 'uses'=> 'UserController@index' ] );
Route::get('/user/new', ['middleware' => ['permission:admin_usuarios_create'],'as'=> 'user.create', 'uses'=> 'UserController@create' ] );
Route::post('/user/store', ['middleware' => ['permission:admin_usuarios_create'],'as'=> 'user.store', 'uses'=> 'UserController@store' ] );
Route::get('/user/delete/{id}', ['middleware' => ['permission:admin_usuarios_delete'],'as'=> 'user.destroy', 'uses'=> 'UserController@destroy' ] );
Route::get('/user/edit/{id}', ['middleware' => ['permission:admin_usuarios_update'],'as'=> 'user.edit', 'uses'=> 'UserController@edit' ] );
Route::post('/user/update/{id}', ['middleware' => ['permission:admin_usuarios_update'],'as'=> 'user.update', 'uses'=> 'UserController@update' ] );
// Route::resource('user','UserController');edit
// Route::resource('/showuser','UserController@show');


Route::resource('/salida','OutputrecordController');
Route::get('/output/table', ['middleware' => ['permission:bodega_disponibles_read'],'as'=> 'output.index', 'uses'=> 'OutputrecordController@index' ] );
Route::get('/output/new/{idproduct}', ['middleware' => ['permission:bodega_disponibles_create'],'as'=> 'output.show', 'uses'=> 'OutputrecordController@show' ] );
Route::post('/output/store', ['middleware' => ['permission:bodega_disponibles_create'],'as'=> 'output.store', 'uses'=> 'OutputrecordController@store' ] );
Route::get('/output/see/{idproduct}', ['middleware' => ['permission:bodega_disponibles_read'],'as'=> 'output.see', 'uses'=> 'OutputrecordController@see' ] );
Route::get('/output/retraso/{idproduct}', ['as'=> 'output.retraso', 'uses'=> 'OutputrecordController@retraso' ] );

Route::resource('/entrada','InputrecordController');
Route::get('/input/table', ['middleware' => ['permission:bodega_prestados_read'],'as'=> 'input.index', 'uses'=> 'InputrecordController@index' ] );
Route::get('/input/new/{idproduct}', ['middleware' => ['permission:bodega_prestados_create'],'as'=> 'input.show', 'uses'=> 'InputrecordController@show' ] );
Route::post('/input/store', ['middleware' => ['permission:bodega_prestados_create'],'as'=> 'input.store', 'uses'=> 'InputrecordController@store' ] );
Route::get('/input/see/{idproduct}', ['middleware' => ['permission:bodega_prestados_read'],'as'=> 'input.see', 'uses'=> 'InputrecordController@see' ] );



Route::get(		'/admin/roles',['middleware' => ['permission:admin_roles_read'], 					'as' => 'admin.role._', 		'uses' 	=> 'RoleController@show'		]);
Route::get(		'/admin/roles/listRoles',['middleware' => ['permission:admin_roles_read'], 			'as' => 'admin.role.index', 	'uses' 	=> 'RoleController@show'		]);
Route::get(		'/admin/roles/editRoles',['middleware' => ['permission:admin_roles_create'], 			'as' => 'admin.role.create', 	'uses' 	=> 'RoleController@create', 	]);
Route::post(	'/admin/roles/deleteRoles',['middleware' => ['permission:admin_roles_create'], 		'as' => 'admin.role.store', 	'uses' 	=> 'RoleController@store',	]);
Route::get(		'/admin/roles/editRoles/{id}',['middleware' => ['permission:admin_roles_update'], 	'as' => 'admin.role.edit', 		'uses' 	=> 'RoleController@edit', 	]);
Route::post(	'/admin/roles/updateRoles/{id}',['middleware' => ['permission:admin_roles_update'], 	'as' => 'admin.role.update', 	'uses' 	=> 'RoleController@update',	]);
Route::post(	'/admin/roles/deleteRoles/{id}',['middleware' => ['permission:admin_roles_delete'], 	'as' => 'admin.role.delete', 	'uses' 	=> 'RoleController@destroy',	]);


});

Auth::routes();

Route::get('/home', 'ProductController@index')->name('home');



