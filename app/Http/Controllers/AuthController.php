<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Show Login Form
     */

    public function index()
    {
        return view('Auth.login');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Show Registration Form
     */

    public function registration()
    {
        return view('Auth.registration');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Login User
     */

    public function postLogin(Request $request)
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('user-dashboard');
        }
        return Redirect::to(route('login'))->with('credentials','Oppes! You have entered invalid credentials');
    }

    /**
     * @param Request $request
     * @return mixed
     * Register User
     */

    public function postRegistration(Request $request)
    {
        $rules = [
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'regex:/^(?=.{6,}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9]).*$/'
            ],
            'country' =>'required',
            'gender' =>'required',
            'terms' => 'accepted'
        ];

        $massages = [

            'username.required' => 'Username Required',
            'email.required' => 'Email Required',
            'email.email' => 'Email Format Not Correct',
            'password.required' => 'Password Required',
            'password.regex' => 'At least 8 Characters 1 uppercase ,1 lowercase ,1 number',
            'country.required' =>'Country Required',
            'gender.required' =>'Gender Required',


        ];

        $this->validate($request,$rules,$massages);
        $data= $request->except('terms');
        $user = $this->create($data);
        Auth::login($user);
        return redirect()->to(route('dashboard'));

    }

    public function dashboard()
    {

        if (\auth()->check())
        {
            return view('Auth.dashboard');
        }

        return Redirect::to("login")->with('error','Opps! You do not have access');
    }

    public function create(array $data)
    {

        if (!isset($data['name']))
        {
            $data['name'] = Null;
        }


        return User::create($data);
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
