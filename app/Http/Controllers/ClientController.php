<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Account;
use App\Transaction;
use App\Client;


class ClientController extends Controller
{
   
    public function dashboard(){
        $client = auth()->guard('client')->user();
        $transactions=Transaction::where('client_id',$client->id)->take(5)->get();
        $acc_balance=Account::where('client_id',$client->id)->first();
        return view('clients/dashboard',compact('acc_balance','transactions'));
        // dd($user);
    }
    public function getProfile()
    {
        $client = auth()->guard('client')->user();
        $acc_balance=Account::where('client_id',$client->id)->first();
        return view('clients/profile',compact('acc_balance','client'));
    }
} 