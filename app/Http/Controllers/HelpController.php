<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Help;

class HelpController extends Controller
{
    public function getHelp()
    {
        return view('clients.help');
    }
    public function postHelp(Request $request)
    {
        $help=new Help();
        $help->email=$request->input('email');
        $help->title=$request->input('title');
        $help->message=$request->input('message');

        if($help->save()){
            \Session::put('success','Message sent Successfully');
            return redirect()->route('dashboard',compact('message'));

        }else{
            \Session::put('error','Message not Sent. Try Again');
            return redirect()->route('help');
        }
        
        

        
    }
}
