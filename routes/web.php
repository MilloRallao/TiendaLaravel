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
use App\Carrito;

//Authentication Routes
Auth::routes();

//Inicio
Route::get('/', 'ArticuloController@index_inicio')->name('inicio');

//Contacto
Route::get('/contacto', function(){
    $carritos = Carrito::where('usuario_id', Auth::user()->id)->get();
    $carritos->toArray();
    return view('user.contacto', compact('carritos'));
})->name('contacto');

//Mostrar Articulo
Route::get('producto/{id_producto}', 'ArticuloController@show')->name('mostrar');

//Mostrar Marca
Route::get('marca/{id_marca}', 'MarcaController@show')->name('mostrar_marca');

//Mostrar Familia
Route::get('familia/{id_familia}', 'FamiliaController@show')->name('mostrar_familia');

//Mostrar Novedades, Ofertas u Outlet
Route::get('novedades/{id_condicion}', 'ArticuloController@show_condicion')->name('mostrar_condicion');

//Filtro Completo
Route::get('/articulos/{marca}/{familia}/{precio_min}/{precio_max}', 'ArticuloController@show_filtro');
//Filtro Marca o Familia
Route::get('/articulos/{marca}/{precio_min}/{precio_max}', 'ArticuloController@show_filtro_marca_familia');

View::composer('layouts.app', function ($view){
	$carritos = Carrito::where('usuario_id', Auth::id())->get();
	$view->with('layouts.app', $carritos);
});

//Añadir Deseo
Route::get('deseos/add_wish', 'DeseoController@store');
//Borrar Deseo
Route::get('deseos/delete_wish', 'DeseoController@delete_wish');

//Añadir a Carrito
Route::get('carrito/add_carrito', 'CarritoController@store');
//Borrar Carrito
Route::get('carrito/delete_carrito', 'CarritoController@delete_carrito');
//Actualizar Carrito
Route::get('carrito/update_carrito', 'CarritoController@update_carrito');

//Parte Cliente Registrado
Route::middleware(['auth'])->group(function () {
    //Mostrar Lista de Deseos
    Route::get('deseos', 'DeseoController@index');
    //Mostrar Carrito
    Route::get('carrito', 'CarritoController@index');
});

Route::middleware('can:accessAdminpanel')->group(function() {
    //Admin Page
    Route::get('admin', function () {
        return view('admin.dashboard');
    });
    //Marcas Admin
    Route::get('marcas', 'MarcaController@index')->name('marcas');
    //Marcas Admin(Update Individual)
    Route::get('marcas/update_marca', 'MarcaController@update_marca');
    //Marcas Admin(Delete)
    Route::get('marcas/delete_modal', 'MarcaController@delete_modal');
    //Marcas Admin(Create)
    Route::get('marcas/add', 'MarcaController@store');
    //Marcas Admin(Subir imagen)
    Route::put('marcas/imgs', 'MarcaController@imgs')->name('imgs_m');
    //Marcas Admin(borrar imagen)
    Route::get('marcas/img_del', 'MarcaController@img_delete');

    //Export and Import Marcas Admin
    Route::get('export_m', 'MarcaController@export')->name('export_m');
    Route::post('import_m', 'MarcaController@import')->name('import_m');

    //Familias Admin
    Route::get('familias', 'FamiliaController@index')->name('familias');
    //Familias Admin(Update Individual)
    Route::get('familias/update_family', 'FamiliaController@update_family');
    //Familias Admin(Delete)
    Route::get('familias/delete_modal', 'FamiliaController@delete_modal');
    //Familias Admin(Create)
    Route::get('familias/add', 'FamiliaController@store');
    //Familias Admin(Subir imagen)
    Route::put('familias/imgs', 'FamiliaController@imgs')->name('imgs_f');
    //Familias Admin(borrar imagen)
    Route::get('familias/img_del', 'FamiliaController@img_delete');

    //Export and Import Familias Admin
    Route::get('export_f', 'FamiliaController@export')->name('export_f');
    Route::post('import_f', 'FamiliaController@import')->name('import_f');

    //Articulos Admin
    Route::get('articulos', 'ArticuloController@index')->name('articulos');
    //Articulos Admin(Update Individual)
    Route::get('articulos/update_name', 'ArticuloController@update_name');
    Route::get('articulos/update_family', 'ArticuloController@update_family');
    Route::get('articulos/update_condicion', 'ArticuloController@update_condicion');
    Route::get('articulos/update_marca', 'ArticuloController@update_marca');
    Route::get('articulos/update_caract', 'ArticuloController@update_caract');
    Route::get('articulos/update_model', 'ArticuloController@update_model');
    Route::get('articulos/update_stock', 'ArticuloController@update_stock');
    Route::get('articulos/update_f_alta', 'ArticuloController@update_f_alta');
    Route::get('articulos/update_f_baja', 'ArticuloController@update_f_baja');
    Route::get('articulos/update_iva', 'ArticuloController@update_iva');
    //Articulos Admin(Delete)
    Route::get('articulos/delete_modal', 'ArticuloController@delete_modal');
    //Articulos Admin(Create)
    Route::get('articulos/add', 'ArticuloController@store');
    //Articulos Admin(Update General)
    Route::get('articulos/update_general', 'ArticuloController@update_general');
    //Articulos Admin(Subir imágenes)
    Route::post('articulos/imgs', 'ImagenController@imgs')->name('imgs');
    //Articulos Admin(borrar imágenes)
    Route::get('articulos/img_del', 'ImagenController@img_delete');

    //Export and Import Articulos Admin
    Route::get('export', 'ArticuloController@export')->name('export');
    Route::post('import', 'ArticuloController@import')->name('import');
});