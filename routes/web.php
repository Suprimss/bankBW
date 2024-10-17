<?php


use App\Http\Controllers\ProfileController;

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');





Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');   
});
Route::middleware(['admin','admin'])->group(function(){
        //view
        Route::get('admin/dashboard',[adminController::class, 'dashboard'])->name('admin.dashboard');
        //acc
        Route::get('admin/account',[adminController::class, 'account'])->name('admin.account');
        Route::get('admin/createAcc',[adminController::class, 'createAcc'])->name('admin.createAcc');
        Route::post('admin/createAcc',[adminController::class, 'storeAcc'])->name('admin.storeAcc');
        Route::post('admin/account/{id}',[adminController::class, 'delleteAcc'])->name('admin.delleteAcc');
        Route::get('admin/edit{id}',[adminController::class, 'editAcc'])->name('admin.editAcc');
        Route::post('admin/edit',[adminController::class, 'updateAcc'])->name('admin.updtAcc');
        //transaction
        Route::get('admin/transactions',[adminController::class, 'transactions'])->name('admin.transactions');
        Route::get('admin/historytransaction',[adminController::class,'HistoryTransactions'])->name('admin.HistoryTransactions');
        Route::get('admin/{id}{action}',[adminController::class, 'formTransaction'])->name('admin.storeTransactions');
        Route::get('adminrecipt/{id}',[adminController::class,'struk'])->name('admin.recipt');
        Route::post('admin/TransactionAction',[adminController::class, 'TransactionAction'])->name('admin.TransactionAction');
    });
require __DIR__.'/auth.php';





