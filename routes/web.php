<?php
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VuesyController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MiembrosController;
use App\Http\Controllers\FamiliaProductoController;
use App\Http\Controllers\NombreProductoController;
use App\Http\Controllers\AlmacenesController;
use App\Http\Controllers\RacksController;
use App\Http\Controllers\EstantesController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ReceptoresController;
use App\Http\Controllers\EmisoresController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\SolicitudAdmisionController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\AnomaliaController;
use App\Http\Controllers\ProductoPedidoController;

use App\Models\User;
use Spatie\Permission\Models\Role;
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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    
    Route::get('users', [UserController::class, 'index'])->name('users-index');   
    Route::get('get-users', [UserController::class, 'get'])->name('get-users');
    Route::get('delete-users/{id}', [UserController::class, 'destroy'])->name('delete-user');   
    Route::get('users-edit/{id}', [UserController::class, 'edit'])->name('users-edit');   
    Route::post('users-update/{id}', [UserController::class, 'update'])->name('user-update');   
    Route::post('get-productos-pedido-days-user', [UserController::class, 'getByDateRange'])->name('get-productos-pedido-days-user');
    //Route::get('roles', [RoleController::class, 'index'])->name('show-roles');  
    
    
    Route::get('roles-create', [RoleController::class, 'create'])->name('create-roles'); 
    Route::get('get-roles', [RoleController::class, 'get'])->name('get-roles');   
    Route::get('get-rol/{id}', [RoleController::class, 'get'])->name('get-rol');   
    Route::get('get-permisos', [RoleController::class, 'permisos'])->name('get-permisos');       
    Route::post('store-roles', [RoleController::class, 'store'])->name('store-roles');   
    Route::put('edit-role/{id}', [RoleController::class, 'edit'])->name('edit-role');   
    Route::post('update-role/{id}', [RoleController::class, 'update'])->name('roles.update');   
    Route::delete('delete-role/{id}', [RoleController::class, 'destroy'])->name('roles.destroy'); 
    Route::post('default-role/{id}', [RoleController::class, 'default'])->name('default-role'); 
   

    Route::get('get-familia-producto', [FamiliaProductoController::class, 'get'])->name('get-familia-producto');
    Route::post('add-familia-producto', [FamiliaProductoController::class, 'store'])->name('add-familia-producto');
    Route::delete('delete-familia-producto/{id}', [FamiliaProductoController::class, 'delete'])->name('delete-familia-producto');
    Route::put('edit-familia-producto/{id}', [FamiliaProductoController::class, 'update'])->name('edit-familia-producto');

    Route::get('get-nombre-producto', [NombreProductoController::class, 'get'])->name('get-nombre-producto');
    Route::post('add-nombre-producto', [NombreProductoController::class, 'store'])->name('add-nombre-producto');
    Route::delete('delete-nombre-producto/{id}', [NombreProductoController::class, 'delete'])->name('delete-nombre-producto');
    Route::put('edit-nombre-producto/{id}', [NombreProductoController::class, 'update'])->name('edit-nombre-producto');

    Route::get('get-almacenes', [AlmacenesController::class, 'get'])->name('get-almacenes');
    Route::get('get-almacen/{id}', [AlmacenesController::class, 'get'])->name('get-almacen');
    Route::post('add-almacenes', [AlmacenesController::class, 'store'])->name('add-almacenes');
    Route::delete('delete-almacenes/{id}', [AlmacenesController::class, 'delete'])->name('delete-almacenes');
    Route::put('edit-almacenes/{id}', [AlmacenesController::class, 'update'])->name('edit-almacenes');

    Route::get('get-racks', [RacksController::class, 'get'])->name('get-racks');
    Route::post('add-racks', [RacksController::class, 'store'])->name('add-racks');
    Route::delete('delete-racks/{id}', [RacksController::class, 'delete'])->name('delete-racks');
    Route::put('edit-racks/{id}', [RacksController::class, 'update'])->name('edit-racks');

    Route::get('get-estados', [EstadosController::class, 'get'])->name('get-estados');
    Route::post('add-estados', [EstadosController::class, 'store'])->name('add-estados');
    Route::delete('delete-estados/{id}', [EstadosController::class, 'delete'])->name('delete-estados');
    Route::put('edit-estados/{id}', [EstadosController::class, 'update'])->name('edit-estados');

    Route::get('get-estantes', [EstantesController::class, 'get'])->name('get-estantes');
    Route::post('add-estantes', [EstantesController::class, 'store'])->name('add-estantes');
    Route::delete('delete-estantes/{id}', [EstantesController::class, 'delete'])->name('delete-estantes');
    Route::put('edit-estantes/{id}', [EstantesController::class, 'update'])->name('edit-estantes');
    
    Route::get('get-emisores', [EmisoresController::class, 'get'])->name('get-emisores');
    Route::post('add-emisores', [EmisoresController::class, 'store'])->name('add-emisores');
    Route::delete('delete-emisores/{id}', [EmisoresController::class, 'delete'])->name('delete-emisores');
    Route::put('edit-emisores/{id}', [EmisoresController::class, 'update'])->name('edit-emisores');

    Route::get('get-receptores', [ReceptoresController::class, 'get'])->name('get-receptores');
    Route::post('add-receptores', [ReceptoresController::class, 'store'])->name('add-receptores');
    Route::delete('delete-receptores/{id}', [ReceptoresController::class, 'delete'])->name('delete-receptores');
    Route::put('edit-receptores/{id}', [ReceptoresController::class, 'update'])->name('edit-receptores');

    Route::get('get-proveedores', [ProveedoresController::class, 'get'])->name('get-proveedores');
    Route::post('add-proveedores', [ProveedoresController::class, 'store'])->name('add-proveedores');
    Route::delete('delete-proveedores/{id}', [ProveedoresController::class, 'delete'])->name('delete-proveedores');
    Route::put('edit-proveedores/{id}', [ProveedoresController::class, 'update'])->name('edit-proveedores');

    Route::get('get-anomalias', [AnomaliaController::class, 'get'])->name('get-anomalias');

    Route::get('get-productos', [ProductoController::class, 'get'])->name('get-productos');
    Route::get('get-producto/{id}', [ProductoController::class, 'get'])->name('get-producto');
   // En routes/api.php
Route::get('get-producto-ean/{ean}', [ProductoController::class, 'get_ean'])->name('get-producto-ean');

Route::get('get-productos-pedido', [ProductoPedidoController::class, 'get'])->name('get-productos-pedido');
Route::post('get-productos-pedido-days', [ProductoPedidoController::class, 'getByDateRange'])->name('get-productos-pedido-days');
Route::get('get-producto-pedido/{id}', [ProductoPedidoController::class, 'get'])->name('get-producto-pedido');
Route::put('edit-producto-pedido/{id}', [ProductoPedidoController::class, 'edit'])->name('edit-producto-pedido');

    Route::post('add-productos', [ProductoController::class, 'store'])->name('add-productos');

    Route::get('get-pedidos', [PedidoController::class, 'get'])->name('get-pedidos');
    Route::get('get-pedido/{id}', [PedidoController::class, 'get'])->name('get-pedido');
    Route::post('add-pedidos', [PedidoController::class, 'store'])->name('add-pedidos');


    Route::get('/crear-producto', function () { return view('crear-producto'); })->middleware('permission:crear-producto');
    Route::get('/productos-recibidos', function () { return view('productos-recibidos'); })->middleware('permission:productos-recibidos');
    Route::get('/almacenes', function () { return view('almacenes'); })->middleware('permission:almacenes');
    Route::get('/historial', function () { return view('historial'); })->middleware('permission:historial');
    Route::get('/miembros', [MiembrosController::class, 'index'])->middleware('permission:miembros');
    Route::get('/historial-pedidos', function () { return view('historial-pedidos'); })->middleware('permission:historial-pedidos');
   
    Route::get('/admision', function () { return view('admision'); })->middleware('permission:admision');
    Route::get('/crear-pedido', function () {
        // Obtener los productos desde la base de datos
        $productos = DB::table('productos')->get(); // Ajusta la consulta según tus necesidades
    
        // Pasar los productos a la vista
        return view('crear-pedido', compact('productos'));
    })->name('crear-pedido')->middleware('permission:crear-pedido');


    Route::get('perfil/{id}', [PerfilController::class, 'index'])->name('perfil');
    Route::put('/perfil/set-role', [RoleController::class, 'set'])->name('perfil.set-role');
    Route::put('/perfil/edit-user', [UserController::class, 'edit'])->name('perfil.edit-user');
    Route::post('/perfil/set-user-img', [UserController::class, 'set_img'])->name('perfil.set-user-img');
    Route::get('/roles', function () { return view('roles'); });

    Route::get('get-solicitud-admision', [SolicitudAdmisionController::class, 'get'])->name('get-solicitud-admision');
    Route::delete('delete-solicitud-admision/{id}', [SolicitudAdmisionController::class, 'delete'])->name('delete-solicitud-admision');
    Route::put('edit-solicitud-admision/{id}', [SolicitudAdmisionController::class, 'update'])->name('edit-solicitud-admision');
    Route::put('aceptar-solicitud-admision/{id}', [SolicitudAdmisionController::class, 'aceptar'])->name('aceptar-solicitud-admision');
    Route::get('{any}', [App\Http\Controllers\VuesyController::class, 'index'])->name('index');
});


    Route::post('add-solicitud-admision', [SolicitudAdmisionController::class, 'store'])->name('add-solicitud-admision');
    
    