<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseDetailController;
use App\Http\Controllers\SupplierController;

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

Route::get('/', fn () => redirect()->route('login'));

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group([
'middleware' => 'auth',
'prefix' => '/master'
], function () {
    Route::get('/category/data', [CategoryController::class, 'data'])
        ->name('category.data');
    Route::resource('/category', CategoryController::class);

    Route::get('/product/data', [ProductController::class, 'data'])
        ->name('product.data');
    Route::post('/product/delete-selected', [ProductController::class, 'deleteSelected'])
        ->name('product.delete_selected');
    Route::post('/product/print-barcode', [ProductController::class, 'printBarcode'])
        ->name('product.print_barcode');
    Route::resource('/product', ProductController::class);

    Route::get('/member/data', [MemberController::class, 'data'])
        ->name('member.data');
    Route::post('/member/print-card', [MemberController::class, 'printCard'])
        ->name('member.print_card');
    Route::resource('/member', MemberController::class);
    
    Route::get('/supplier/data', [SupplierController::class, 'data'])
        ->name('supplier.data');
    Route::resource('/supplier', SupplierController::class);
});

Route::group([
    'middleware' => 'auth',
    'prefix' => '/transaction'
    ], function () {
        Route::get('/expenditure/data', [ExpenditureController::class, 'data'])
            ->name('expenditure.data');
        Route::resource('/expenditure', ExpenditureController::class);

        Route::get('/purchase/data', [PurchaseController::class, 'data'])
            ->name('purchase.data');
        Route::get('/purchase/{id}/create', [PurchaseController::class, 'create'])
            ->name('purchase.create');
        Route::resource('/purchase', PurchaseController::class)
            ->except('create');
            
        Route::get('/purchase_detail/{id}/data', [PurchaseDetailController::class, 'data'])->name('purchase_detail.data');
        // Route::get('/purchase_detail/{id}/create', [PurchaseDetailController::class, 'create'])
        //     ->name('purchase_detail.create');
        // Route::get('/purchase_detail/loadform/{diskon}/{total}', [PurchaseDetailController::class, 'loadForm'])->name('purchase_detail.load_form');
        Route::resource('/purchase_detail', PurchaseDetailController::class)
            ->except('create', 'show', 'edit');
});