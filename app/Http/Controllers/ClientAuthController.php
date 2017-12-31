<?php
namespace App\Http\Controllers;
use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Account;


class ClientAuthController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    public function getClientLogin()
    {
        
        if (auth()->guard('client')->user()) return redirect()->route('dashboard');
        return view('clients/login');
    }
    public function clientAuth(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (auth()->guard('client')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            \Session::put('success','Successfully Logged In');
            return redirect()->route('home');
        }else{
            \Session::put('error','Incorrect Credentials');
            return redirect()->route('login');
            
        }
    }
    public function getClientRegister()
    {
        if (auth()->guard('client')->user()) return redirect()->route('dashboard');
        return view('clients/register');
    }
    public function clientRegister(Request $request)
    {
        $this->validate($request, [
            'names'=>'required',
            'contact'=>'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $client = Client::create(request(['names', 'contact','email', 'password']));
        $account = new Account();
        $account->client_id=$client->id;
        $account->balance=0.00;
        $account->save();
        
        auth()->login($client);
        \Session::put('success','Successfylly Registered');
        return redirect()->route('home');
    }
    public function logout()
    {
        Auth::guard('client')->logout();
        return redirect()->route('login');
    }

}