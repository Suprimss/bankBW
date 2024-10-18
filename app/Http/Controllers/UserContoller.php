<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserContoller extends Controller
{
    public function Dashboard(){
        return view('user.dashboard');
    }
    public function History(){
        $Log=transaction::where('userId', Auth::user()->id)->latest()->paginate(10);
        return view('admin.transactionsLog',compact('Log'));

    }
    public function struk(Request $request){
        $transaction=transaction::where('id', $request->id )->first();
        // dd($transaction);
        return view('admin.recipt',compact('transaction'));
    }
}
