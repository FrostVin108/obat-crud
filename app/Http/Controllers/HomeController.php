<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Auth;

class HomeController extends Controller
{   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('store');
    }


    public function register(Request $request){
        $this->validate($request, [
            'name'       => 'required',
            'email'      => 'required',
            'password'   => 'required|min:6',
            
        ]);

            User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            
            'password' => Hash::make($request->newPassword)

        ]);
        return redirect()->route('obat.login');
    }

    public function login()
    {  
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(User::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('/store')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

    }

}
