<?php

namespace App\Http\Controllers\Auth;

use Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::COMPANY;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $filename = time().'.'.request()->img->getClientOriginalExtension();
        request()->img->move(public_path('images/companies'), $filename);
        

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

            'surname' => $data['surname'],
            'category_id' => $data['category'],
            'company_name' => $data['company_name'],
            'slug' => str_slug($data['company_name']),
            'address' => $data['address'],
            'company_desc' => $data['desc'],
            'company_logo' => $filename,
            'mobile' => $data['mobile1'],
            'mobile2' => $data['mobile2'],
            'phone' => $data['phone'],
            'created_ip' => Request::ip(),
            'session_id' => Session::getId(),
            'created_date' => Now(),
        ]);
    }
}
