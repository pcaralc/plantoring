<?php

use App\Http\Controllers\ContactoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\PlantaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TerrenoController;
use App\Http\Controllers\UserController;
use App\Mail\Contacto;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Mail
Route::post('/enviar', [ContactoController::class, 'enviarCorreo']);




Route::get('/', [EmpresaController::class, 'create'])->name('home');

//Ver terreno
Route::get('/terreno/{empresa}/{terreno}', [TerrenoController::class, 'index']);
Route::get('/terreno/{empresa}/plantacion/{planta}', [PlantaController::class, 'index']);
Route::get('/empresa/{empresa}', [EmpresaController::class, 'empresa']);



Route::middleware(['auth', 'rol:admin'])->group(function () {

    //Empresas
    Route::get('/admin', [UserController::class, 'index'])->name('admin');
    Route::get('/admin/empresa/add', [EmpresaController::class, 'add']);
    Route::post('/admin/add/empresa', [EmpresaController::class, 'store']);
    Route::get('/admin/consultar/{empresa}', [EmpresaController::class, 'show'])->name('terrenos');
    Route::get('/admin/empresa/{empresa}', [EmpresaController::class, 'informacion']);
    Route::get('/admin/editar/empresa/{empresa}', [EmpresaController::class, 'edit']);
    Route::put('/admin/update/empresa/{empresa}', [EmpresaController::class, 'update']);
    Route::get('/admin/delete/empresa/{empresa}', [EmpresaController::class, 'destroy']);

    //Terrenos
    Route::get('/admin/terreno/{terreno}', [TerrenoController::class, 'show'])->name('plantas');
    Route::get('/admin/terreno/add/{empresa}', [TerrenoController::class, 'add']);
    Route::post('/admin/add/terreno/{empresa}', [TerrenoController::class, 'store']);
    Route::get('/admin/editar/terreno/{terreno}', [TerrenoController::class, 'edit']);
    Route::put('/admin/update/terreno/{terreno}', [TerrenoController::class, 'update']);
    Route::get('/admin/delete/terreno/{terreno}', [TerrenoController::class, 'destroy']);

    //Plantaciones
    Route::get('/admin/plantacion/{planta}', [PlantaController::class, 'show'])->name('planta');
    Route::get('/admin/plantacion/add/{terreno}', [PlantaController::class, 'add']);
    Route::post('/admin/add/plantacion/{terreno}', [PlantaController::class, 'store']);
    Route::get('/admin/editar/plantacion/{planta}', [PlantaController::class, 'edit']);
    Route::put('/admin/update/plantacion/{planta}', [PlantaController::class, 'update']);
    Route::get('/admin/delete/plantacion/{planta}', [PlantaController::class, 'destroy']);
});

Route::middleware(['auth', 'rol:gestor'])->group(function () {
    //Empresas
    Route::get('/gestor', [UserController::class, 'indexGestor'])->name('gestor');
    Route::get('/gestor/empresa/{empresa}', [EmpresaController::class, 'informacionGestor'])->name('empresa');
    Route::get('/gestor/editar/empresa/{empresa}', [EmpresaController::class, 'editGestor']);
    Route::put('/gestor/update/empresa/{empresa}', [EmpresaController::class, 'updateGestor']);

    //Terrenos
    Route::get('/gestor/empresa/{empresa}/terrenos', [EmpresaController::class, 'showGestor'])->name('terrenosGestor');
    Route::get('/gestor/terreno/{terreno}', [TerrenoController::class, 'showGestor'])->name('terreno');
    Route::get('/gestor/editar/terreno/{terreno}', [TerrenoController::class, 'editGestor']);
    Route::put('/gestor/update/terreno/{terreno}', [TerrenoController::class, 'updateGestor']);
    Route::get('/gestor/terreno/add/{empresa}', [TerrenoController::class, 'addGestor']);
    Route::post('/gestor/add/terreno/{empresa}', [TerrenoController::class, 'storeGestor']);
    Route::get('/gestor/delete/terreno/{terreno}', [TerrenoController::class, 'destroyGestor']);

    //Plantacion
    Route::get('/gestor/plantacion/{planta}', [PlantaController::class, 'showGestor'])->name('plantacion');
    Route::get('/gestor/editar/plantacion/{planta}', [PlantaController::class, 'editGestor']);
    Route::put('/gestor/update/plantacion/{planta}', [PlantaController::class, 'updateGestor']);
    Route::get('/gestor/plantacion/add/{terreno}', [PlantaController::class, 'addGestor']);
    Route::post('/gestor/add/plantacion/{terreno}', [PlantaController::class, 'storeGestor']);
    Route::get('/gestor/delete/plantacion/{planta}', [PlantaController::class, 'destroyGestor']);

        //buscador
    Route::get('/gestor/buscador', [PlantaController::class, 'buscador']);
    Route::post('/gestor/buscar', [PlantaController::class, 'buscar']);

});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Route::get('/dashboard', function () {
//     return view('admin/index');
// })->middleware(['auth', 'verified'])->name('dashboard');