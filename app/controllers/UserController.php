<?php

class UserController extends BaseController
{

    public function getLogin()
    {
        $email = Input::get('email');

        return View::make('user/login', compact('email'));
    }

    public function postLogin()
    {
        if(Auth::attempt(['email'=>Input::get('email'), 'password'=>Input::get('password'), 'active'=>'y'])){
            return Redirect::intended('/');
        }

        return Redirect::route('user.login')->withErrors(['valid'=>'fail']);
    }

    public function logout()
    {
        Auth::logout();

        return Redirect::route('home');
    }

}
