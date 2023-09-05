<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

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
    return view('welcome');
})->name('welcome');

// Route::get('/order', function () {
//     return view('order.index');
// })->name('order');

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//////////////////Admin ////////////////
Route::get('/admin/logout', [AdminController::class, 'AdminDestory'])->name('admin.logout'); // Admin Logout






////////////// Categories  //////////////
Route::get('/all/category', [CategoryController::class, 'AllCategory'])->name('all.category');
Route::post('/add/category', [CategoryController::class, 'AddCategory'])->name('add.category'); // Add Category
Route::get('/edit/category/{id}', [CategoryController::class, 'EditCategory'])->name('edit.category'); // Edit Category
Route::post('/update/category', [CategoryController::class, 'UpdateCategory'])->name('update.category'); // Update Category
Route::get('/delete/category/{id}', [CategoryController::class, 'DeleteCategory'])->name('delete.category'); // Delete Category



/////////////// Menu /////////////////////
Route::get('/all/menu', [MenuController::class, 'AllMenu'])->name('all.menu'); // All Menu Page
Route::get('/add/menu', [MenuController::class, 'AddMenu'])->name('add.menu'); // Add Menu Page
Route::post('/store/menu', [MenuController::class, 'StoreMenu'])->name('store.menu'); // Store Menu Page
Route::get('/deit/menu/{id}', [MenuController::class, 'EditMenu'])->name('edit.menu'); // Edit Menu Page
Route::post('/update/menu', [MenuController::class, 'UpdateMenu'])->name('update.menu'); // Update Menu Page
Route::get('/delete/menu/{id}', [MenuController::class, 'DeleteMenu'])->name('delete.menu'); // Delete Menu Page

///////////////////Ajax///////////////////
Route::get('/get-menu-by-category/{categoryId}', [MenuController::class, 'GetMenuByCategory'])->name('get.menu.by.category'); // Get Menu By Category





/////////////////////////TABLES////////////////////////////////
Route::get('/all/tables', [TableController::class, 'AllTables'])->name('all.tables'); // All Tables Page
Route::post('/store/tables', [TableController::class, 'StoreTable'])->name('store.tables'); // Store Tables Page
Route::get('/edit/tables/{id}', [TableController::class, 'EditTable'])->name('edit.tables'); // Edit Tables Page
Route::post('/update/tables', [TableController::class, 'UpdateTable'])->name('update.tables'); // Update Tables Page
Route::get('/delete/tables/{id}', [TableController::class, 'DeleteTable'])->name('delete.tables'); // Delete Tables Page



/////////////////////////ORDERS//////////////////
Route::get('/order', [OrderController::class, 'Order'])->name('order'); // Order Page
Route::get('/add/order/{id} ', [OrderController::class, 'AddOrder'])->name('add.order'); // Add Order Page

/////////////////// WaiterCart////////////////
Route::post('/add/cart', [OrderController::class, 'AddCart'])->name('add.cart'); // Add Cart Page
Route::post('/cart/update/{menu_id}', [OrderController::class, 'UpdateCart'])->name('cart.update'); // Update Cart
Route::get('/cart/remove/{menu_id}', [OrderController::class, 'RemoveCart'])->name('cart.remove');



///////////////////////Kitchen Order ////////////////
Route::post('/kitchen/order',[OrderController::class,'KitchenOrder'])->name('add.kitchen.order');// Add Kitchen Order

require __DIR__ . '/auth.php';
