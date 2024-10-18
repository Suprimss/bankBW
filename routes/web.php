<?php


use App\Http\Controllers\ProfileController;

use App\Http\Controllers\adminController;
use App\Http\Controllers\UserContoller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});







Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[UserContoller::class, 'Dashboard'])->name('dashboard');
    Route::get('history',[UserContoller::class, 'History'])->name('history');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');   
    Route::get('adminrecipt/{id}',[UserContoller::class,'struk'])->name('admin.recipt');
});
Route::middleware(['admin','admin'])->group(function(){
        //view
        Route::get('admin/dashboard',[adminController::class, 'dashboard'])->name('admin.dashboard');
        //acc
        Route::get('admin/account',[adminController::class, 'account'])->name('admin.account');
        Route::get('admin/searchAccount',[adminController::class, 'searchAccount'])->name('admin.searchAccount');
        Route::get('admin/createAcc',[adminController::class, 'createAcc'])->name('admin.createAcc');
        Route::post('admin/createAcc',[adminController::class, 'storeAcc'])->name('admin.storeAcc');
        Route::post('admin/account/{id}',[adminController::class, 'delleteAcc'])->name('admin.delleteAcc');
        Route::get('admin/edit{id}',[adminController::class, 'editAcc'])->name('admin.editAcc');
        Route::post('admin/edit',[adminController::class, 'updateAcc'])->name('admin.updtAcc');
        //transaction
        Route::get('admin/transactionsSearch',[adminController::class, 'searchtransactions'])->name('admin.searchTransactions');
        Route::get('admin/transactions',[adminController::class, 'transactions'])->name('admin.transactions');
        Route::get('admin/historytransaction',[adminController::class,'HistoryTransactions'])->name('admin.HistoryTransactions');
        Route::get('admin/{id}{action}',[adminController::class, 'formTransaction'])->name('admin.storeTransactions');
        Route::post('admin/TransactionAction',[adminController::class, 'TransactionAction'])->name('admin.TransactionAction');
    });
require __DIR__.'/auth.php';





