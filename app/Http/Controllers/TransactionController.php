<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Auth;
use App\Account;
use App\Client;

class TransactionController extends Controller
{
    public function getCardView()
    {
        return view('clients/cardview');
    }
    public function getTransactions()
    {
        $client = auth()->guard('client')->user();
        $transactions=Transaction::where('client_id',$client->id)->paginate(2);

        return view('clients.transaction',compact('transactions'));
    }
    public function getSend()
    {
        return view('clients.send');
    }
    public function postSend(Request $request)
    {
        $client = auth()->guard('client')->user();
        $sender_account=Account::where('client_id',$client->id)->first();
        $balance=$sender_account->balance;
        $balance=(float)$balance;

        $amount=$request->input('amount');
        $amount=(float)$amount;
        $remaining_balance=$balance-$amount;
        if($remaining_balance > 0){
            // dd($remaining_balance);
            $receiver_contact=$request->input('contact');
            $receiver=Client::where('contact',$receiver_contact)->first();
            $receiver_account=Account::where('client_id',$receiver->id)->first();
            $receiver_current_bal=$receiver_account->balance;
            $receiver_account->balance=$receiver_current_bal+$amount;
            $receiver_account->save();

            $transaction=new Transaction();
            $transaction->type='send';
            $transaction->trans_id=str_random(15);
            $transaction->amount=$amount;
            $transaction->currency='usd';
            $transaction->description=$request->input('description');
            $transaction->fee='0';
            $transaction->client_id=$id =auth()->guard('client')->user()->id;
            $transaction->sender=auth()->guard('client')->user()->names;
            $transaction->status='completed';
            $transaction->receiver=$receiver->names;
    
            $transaction->save();
            

            $sender_account=Account::where('client_id',$client->id)->first();
            $sender_account->balance=$remaining_balance;
            $sender_account->save();

            \Session::put('success','Funds sent successfully');
            return redirect()->route('home');
        }else
        {
            \Session::put('error','Insufficient funds');
            return redirect()->route('send');
        }


    }
    public function cardDeposit(Request $request)
    {
        \Stripe\Stripe::setApiKey("YOUR_STRIPE_API_KEY");

        try{
            
           $payment= \Stripe\Charge::create(array(
                "amount" => $request->input('card-amount'),
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Card Deposit to My-Wallet"
           ));
        $transaction=new Transaction();
        $transaction->type='card';
        $transaction->trans_id=$payment->id;
        $transaction->amount=$payment->amount;
        $transaction->currency=$payment->currency;
        $transaction->description=$payment->description;
        $transaction->fee='0';
        $transaction->client_id=$id =auth()->guard('client')->user()->id;
        $transaction->sender='Vincent Chacha';
        $transaction->status='completed';
        $transaction->receiver='Ibuild Technologies';

        $transaction->save();
        }
        catch(\Exception $ex){
            return redirect('/cardview')->with('error',$ex->getMessage());
        }
        return redirect()->back();

    }
}
