<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use App\Models\User;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class adminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
    
    
    
    //acc
    
    public function editAcc(Request $request)
    {
        // dd(Hashids::decode($request->id));
        $acc = User::where('id',Hashids::decode($request->id))->first();
        // dd($acc);
        
        return view('admin.edit_account', compact('acc'));
    }
    
    public function account()
    {
        $users = User::all();
        return view('admin.account', compact('users'));
    }
    public function searchAccount(Request $request){
        $query = $request->input('query');;
        // dd($request->query());
        $searchBy = $request->input('search_by');
        $query = $request->input('query');
        
        $users = User::where($searchBy, 'LIKE', "%{$query}%")->get();
        return view('admin.account',compact('users'));
    }


    public function createAcc()
    {
        return view('admin.create_account');
    }
    
    public function storeAcc(Request $request)
    {
        $rule=[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:admin,user',
            'class' => 'required|in:tkj,mm,otkp,akl,other',
            'password' => 'required|string',

        ];
        $validator = Validator::make($request->all(), $rule);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $user= new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->class = $request->class;
        $user->password = Hash::make($request->password);
        $user->save();

        
        return redirect(route('admin.account'))->with('success', "account {$request->name}   berhasil dibuat!");
    }

    
    public function updateAcc(Request $request)
    {   
        
        $edit= User::where('id', $request->id )->first();
        
        $rule=[
            'name' => 'required',
            'email' => ['required',
                        'email',
                        Rule::unique('users')->ignore($edit->id)] ,
            'role' => 'required|in:admin,user',

        ];
        $validator = Validator::make($request->all(), $rule);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        $edit->name = $request->name;
        $edit->email = $request->email;
        $edit->role = $request->role;
        $edit->class = $request->class;
        $edit->save();
        return redirect(route('admin.account'))->with('success', "{$request->name} berhasil diupdate!");
    }

    
    public function delleteAcc(Request $request)
    {
        // $user = User::findOrFail($request);
        // DB::table('users')->where('id', $request->id)->delete();
        // $user->delete();
        User::destroy($request->id);
        // dd([$request->id,
        // Auth::user()->id]);
        

        if($request->id == Auth::user()->id){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');

        }
        return redirect(route('admin.account'))->with('success', "account berhasil didellete!");
    }




    //transaction
    
    public function HistoryTransactions(){
        $Log=transaction::latest()->get();
        // ->paginate(10);
        return view('admin.transactionsLog',compact('Log'));
    }

    public function searchtransactions(Request $request){
        $query = $request->input('query');;
        // dd($request->query());
        $searchBy = $request->input('search_by');
        $query = $request->input('query');
        
        $Log = transaction::where($searchBy, 'LIKE', "%{$query}%")->latest()->get();
        return view('admin.transactionsLog',compact('Log'));
    }

    public function transactions(){
        $users = User::where('role', 'user')->get();
        return view('admin.transactions', compact('users'));
    }
    
    public function formTransaction(Request $request){
        
        // $id=(decrypt($request->id)); 
        $acc=User::where('id', Hashids::decode($request->id))->first();
        
        // dd($acc);    
        $action=($request->action);
        return view('admin.transactionsForm',compact('action','acc'));
    }
 
    

    public function TransactionAction(Request $request){
        

        // $id=(decrypt($request->id));
        $action=(decrypt($request->action));
        $acc=User::where('id', decrypt($request->id) )->first();
        // dd($acc);
        // dd($request);
        $rule= ['amount' => 'required|numeric|min:1000',
                'Password' => 'required|string'
                ];
        $validator = Validator::make($request->all(), $rule);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        // dd($acc && Hash::check($request->password,$acc->password));
        // dd($request->Password);


        
        if($acc && Hash::check($request->Password,$acc->password)){

            if($action == 1){
                $total= $acc->balance + $request->amount;
                $transaction= new transaction;
                $transaction->userId = $acc->id;
                $transaction->name = $acc->name;
                $transaction->class = $acc->class;
                $transaction->admin = Auth::user()->name;
                $transaction->oldBalance = $acc->balance;
                $transaction->action = 'setor';
                $transaction->amount = $request->amount;
                $transaction->NewBalance = $total ;
                $acc->Balance = $total ;
                $transaction->save();
                $acc->save();
    
                $request->session()->forget('Password');
                return redirect(route('admin.recipt',$transaction->id))->with('success', "Transaksi Setor Berhasil Di Catat");  
            }else{
                if($request->amount <= $acc->balance){
                $total= $acc->balance - $request->amount;
                $transaction= new transaction;
                $transaction->userId = $acc->id;
                $transaction->name = $acc->name;
                $transaction->class = $acc->class;
                $transaction->admin = Auth::user()->name;
                $transaction->oldBalance = $acc->balance;
                $transaction->action = 'tarik';
                $transaction->amount = $request->amount;
                $transaction->NewBalance = $total ;
                $acc->Balance = $total ;
                $transaction->save();
                $acc->save();
                $request->session()->forget('Password');
                return redirect(route('admin.recipt',$transaction->id))->with('success', "Transaksi Penarikan Berhasil Di Catat");
                } else 
                return Redirect::back()->with('error','saldo tidak cukup')->withInput();
            };
        }else{
            return redirect()->back()->with('error', 'Password Tidak Sesuai.')->withInput();
        }
                

        
        
    }





}
