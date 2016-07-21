<?php

namespace App\Http\Controllers\Auth;

use App\Model\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AdminAuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logoutAndRedirect']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'password' => 'required|min:3',
        ]);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function loginOrBack(Request $request)
    {
        $name = $request->input('name');
        $password = $request->input('password');
        $remember = $request->has('remember');
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        if (!Auth::attempt(array('name' => $name,'password' => $password)))
        return redirect()->back()
                    ->withInput()
                    ->withErrors(array('password' => 'Invalid password or account.'),$remember);

        $user = Auth::user();
        dump($user);
    }

    public function logoutAndRedirect()
    {
        Auth::logout();
        return redirect()->to('/');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    /*protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
        ]);
    }*/
}
