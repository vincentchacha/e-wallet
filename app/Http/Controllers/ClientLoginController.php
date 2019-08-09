<?php
namespace App\Http\Controllers;
use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


class ClientLoginController extends Controller
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
    public function getClientRegister()
    {
        if (auth()->guard('client')->user()) return redirect()->route('dashboard');
        return view('clients/register');
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
            return redirect()->route('dashboard');
        }else{
            dd('your username and password are wrong.');
        }
    }
}