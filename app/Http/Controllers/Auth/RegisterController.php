<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/home';

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
            'username' => 'required|string|min:4|max:12',
            'mail' => 'required|string|email|min:4|max:50|unique:users',
            'password' => 'required|string|min:4|max:12|alpha_num|confirmed',
        ],[
            'required' => 'この項目は必須です',
            'min' => 'この項目は４文字以上です',
            'username.max' => '名前は１２文字以下です',
            'mail.max' => 'メールは５０文字以下です',
            'password.max' => 'パスワードは１２文字以下です',
            'email' => 'emailでないといけません',
            'unique' => 'このメールアドレスはすでに存在します',
            'alpha_num' => 'パスワードは半角英数字でないといけません',
            'confirmed' => '確認用のパスワードと一致しません',
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
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();

            $validator=$this->validator($data);
            if ($validator->fails()) {
                return redirect('/register')
                            ->withErrors($validator)
                            ->withInput();
            }else{
                $this->create($data);
                return redirect('added')->with('name',$data['username']);
            }
    
            
        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }
}
