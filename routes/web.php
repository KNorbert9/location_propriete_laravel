<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Backend\AmenetiesController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\PropertyController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('home.index');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//pour l'admin (Pour avoir accèes à ces route il faut d'abord s'authentifier et être admin)
Route::middleware('auth', 'role:admin')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');

    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');

    Route::post('/admin/profile/store', [AdminController::class, 'adminProfileStore'])->name('admin.profile.store');

    Route::get('/admin/profile/password', [AdminController::class, 'adminProfilePassword'])->name('admin.profile.password');

    Route::post('/admin/password/store', [AdminController::class, 'adminPasswordUpdate'])->name('admin.password.update');



    //Types de propriétés
    //Placé ici car seul l'admin peut creer des type de propriété
    Route::controller(PropertyTypeController::class)->group(function () {
        Route::get('/all/type', 'allType')->name('all.type');
        Route::get('/add/propertyType', 'addPropertyType')->name('add.property.type');
        Route::post('/store/propertyType', 'StorePropertyType')->name('store.property.type');
        Route::get('/update/propertyType/{id}', 'UpdatePropertyType')->name('update.property.type');
        Route::post('/update/propertyType/store', 'UpdateValidPropertyType')->name('update.valid.property.type');
        Route::get('/delete/propertyType/{id}', 'DeletePropertyType')->name('delete.property.type');
    });


    //Ameneties
    Route::controller(AmenetiesController::class)->group(function () {
        Route::get('/all/ameneties', 'allAmeneties')->name('all.ameneties');
        Route::get('/add/ameneties', 'addAmeneties')->name('add.ameneties');
        Route::post('/store/ameneties', 'StoreAmeneties')->name('store.ameneties');
        Route::get('/update/ameneties/{id}', 'UpdateAmeneties')->name('update.ameneties');
        Route::post('/update/ameneties/valide', 'UpdateValidAmeneties')->name('update.valid.ameneties');
        Route::get('/delete/ameneties/{id}', 'DeleteAmeneties')->name('delete.ameneties');
    });


    //Properties
    Route::controller(PropertyController::class)->group(function () {
        Route::get('/all/properties', 'allProperties')->name('all.properties');
        Route::get('/add/properties', 'addProperties')->name('add.properties');
        Route::post('/store/properties', 'StoreProperties')->name('store.properties');
        Route::get('/update/properties/{id}', 'UpdateProperties')->name('update.properties');
        Route::post('/update/properties/valid', 'UpdateValidProperties')->name('update.valid.properties');
        Route::get('/delete/properties/{id}', 'DeleteProperties')->name('delete.properties');
    });
});



//pour l'agent
Route::middleware('auth', 'role:agent')->group(function () {

    Route::get('/agent/dashboard', [AgentController::class, 'agentDashboard'])->name('agent.dashboard');
});



//pour le login dans l'admin(route mise à part car pas besoin d'authentification)
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');








require __DIR__ . '/auth.php';
