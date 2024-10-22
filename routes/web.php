<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\Guest\MainController;
use App\Http\Controllers\Admin\PastaController;

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

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/chi-siamo', [MainController::class, 'about'])->name('about');


/*

Se la mia tabella è 'my_resources':
- il singolare (quindi la mia risorsa) è 'my_resource'
- il pascal case è 'MyResources'
- lo snake case è 'my_resources'
- il model si chiamerà 'MyResource' perché laravel DI DEFAULT va a cercare nel DB una tabella che si chiama come lo snake case AL PLURALE del nome del model
- il controller si chiamerà 'MyResourceController' PER BEST PRACTICE

*/

// Route::get('/pastas', [PastaController::class, 'index'])->name('pastas.index');
// Route::get('/pastas/create', [PastaController::class, 'create'])->name('pastas.create');
// Route::post('/pastas', [PastaController::class, 'store'])->name('pastas.store');
// Route::get('/pastas/{id}', [PastaController::class, 'show'])->name('pastas.show');
// Route::get('/pastas/{id}/edit', [PastaController::class, 'edit'])->name('pastas.edit');
// Route::put('/pastas/{id}', [PastaController::class, 'update'])->name('pastas.update');
// Route::delete('/pastas/{id}', [PastaController::class, 'destroy'])->name('pastas.destroy');

Route::resource('pastas', PastaController::class);








// Route::get('/pasta/read/global', [PastaController::class, 'index'])->name('pastas');
// // Route::get('/pasta/read/global', [PastaController::class, 'index'])->name('pastasglobal');
// // Route::get('/treni/read/global', [TrainController::class, 'index'])->name('trains');
// // Route::get('/treni/read/global', [TrainController::class, 'index'])->name('trainsglobal');

// Route::get('/pasta/read/PARAMETRO', [PastaController::class, 'show'])->name('singlepasta');

// Route::get/post('/pasta/create', [PastaController::class, 'create'])->name('createpasta');

// Route::post('/pasta/create/save', [PastaController::class, 'submit'])->name('submitpasta');

/*

DEVO GESTIRE LE PASTE
- Controller: CrudController / PastaController -> Messo nella cartella: app/Http/Controllers/Admin
- Quanti URL devo esporre per l'operazione R (READ)? -> 2, quali sono? /pasta/read/PARAMETRO, /pasta/read/global
- Quanti URL devo esporre per l'operazione C (CREATE)? -> 2, quali sono? /pasta/create (per il form), /pasta/create/save (per la gestione della sottomissione del form)

*/
