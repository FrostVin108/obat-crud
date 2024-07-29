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

    public function login(Request $request)
    {
        // menangkap data pencarian
        $login = $request->login;
        
        // mengambil data dari table sesuai pencarian data
        $user = User::
        where('email',$login)
        ->get();
        $user = User::
        where('password',$login)
        ->get();

        return view('/loginOB', compact('user', 'login'));
        
    }

    // public function authenticate(Request $request)
    // {
    //     $credentials = $request->validate([ 
    //         'email' => 'required|email', 
    //         'password' => 'required', 
    //     ]); 
    //     if (User::attempt($credentials)) { 
    //         $request->session()->regenerate(); 
    //         return redirect()->intended('/'); 
    //     } 
    //     return back()->withErrors([ 
    //         'email' => 'Email and password combination does not match.', 
    //     ]); 
    // }

    // public function authenticate(Request $request) 
    // { 
    //     $credentials = $request->validate([ 
    //         'email' => 'required|email', 
    //         'password' => 'required', 
    //     ]); 
    //     if (User::attempt($credentials)) { 
    //         $request->session()->regenerate(); 
    //         return redirect()->intended('/'); 
    //     } 
    //     return back()->withErrors([ 
    //         'email' => 'Email and password combination does not match.', 
    //     ]); 
    // } 

    // public function authenticate(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);
        
    //     $data = User::all();
    //     if(Hash::check($data['password'], $request->password)){
    //         return redirect()->route('obat.');
            
    //     }
        
        // $credentials = $request->only('email', 'password');
        //     if ($request) {
        //         $data  = 
        //         User::where('email' = $request->email);
        //         User::where('password' = $request->password);

        //     }
  
    //     return redirect("obat.login")->withSuccess('Login details are not valid');
    // }

}
