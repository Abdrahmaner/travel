<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;

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
    return view('welcome');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/espace_admin', function () {
        return view('Index');
    });
    // //** for login page & logout */
    Route::get('/login', [AuthController::class, 'connexion'])->name('admin.login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    //** for admin page */
    Route::get('/Admins', [AdminController::class, 'index'])->name('displayAdmin');
    Route::get('/showAdmins', [AdminController::class, 'showAdmins'])->name('showAdmins');
    Route::get('/editAdmin/{id}', [AdminController::class, 'editAdmin'])->name('editAdmin');
    Route::post('/modifierAdmin/{id}', [AdminController::class, 'modifierAdmin'])->name('modifierAdmin');
    Route::delete('/deleteAdmins/{id}', [AdminController::class, 'deleteAdmin'])->name('deleteAdmins');
    Route::post('/newAdmin', [AdminController::class, 'AddAdmin'])->name('storeAdmin');
    //*** categorie routes */
    Route::get('/categories', [CategorieController::class, 'index'])->name('categorie');
    Route::post('/Categories/store', [CategorieController::class, 'store'])->name('storeCategorie');
    Route::get('/Categories/show', [CategorieController::class, 'display'])->name('showCategorie');
    Route::get('/Categories/show/{id}', [CategorieController::class, 'show'])->name('detailCategorie');
    Route::post('/Categories/modifier/{id}', [CategorieController::class, 'modifier'])->name('modifierCategorie');
    Route::delete('/Categories/delete/{id}', [CategorieController::class, 'delete'])->name('deleteCategorie');
    //*** products routes */
    Route::get('/produits', [ProduitController::class, 'index'])->name('produit');
    Route::post('/produits/add', [ProduitController::class, 'store'])->name('produitStore');
    Route::get('/produits/all', [ProduitController::class, 'create']);
    Route::delete('/produits/delete/{id}', [ProduitController::class, 'destroy']);
    Route::get('/produits/show/{id}', [ProduitController::class, 'show']);
    Route::post('/produits/modifier/{id}', [ProduitController::class, 'modifier'])->name('modifierProduit');


});