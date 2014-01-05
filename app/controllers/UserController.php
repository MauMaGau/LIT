<?php

class UserController extends BaseController
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getLogin()
    {
        $email = Input::get('email');

        return View::make('user/login', compact('email'));
    }

    public function postLogin()
    {
        if(Auth::attempt(['email'=>Input::get('email'), 'password'=>Input::get('password'), 'active'=>'y'], Input::get('remember')==='true' )){
            return Redirect::intended('/');
        }

        return Redirect::route('user.login')->withErrors(['valid'=>'fail']);
    }

    public function logout()
    {
        Auth::logout();

        return Redirect::route('home');
    }

    public function getRegister()
    {
        $email = Input::get('email');

        return View::make('user.register', compact('email'));
    }

    public function postRegister()
    {
        $input = Input::all();
        $validation = Validator::make($input, User::rules());

        if ($validation->passes())
        {
            $input['active'] = true;
            $user = $this->user->create($input);

            Auth::login($user);

            return Redirect::route('home');
        }

        return Redirect::route('user.register.post')
            ->withInput(Input::except('password'))
            ->withErrors($validation)
            ->with('error', 'There were validation errors.');
    }

}
