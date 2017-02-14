<?php
if(Auth::guest()){
$usernamecms='Guest';
} else {
$usernamecms=Auth::user()->name;
}
return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'These credentials do not match our records.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',
    'reg' => 'Register',
    'name' => 'Name',
    'username' => $usernamecms,
    'mail' => 'E-Mail Address',
    'pass' => 'Password',
    'confpass' => 'Confirm Password',
    'login' => 'Login',
    'logout' => 'Logout',
    'forpass' => 'Forgot Your Password?',
    'remme' => 'Remember Me',
    'respass' => 'Reset Password',
    'respassmail' => 'Send Password Reset Link',
    'dash' => 'Dashboard',
    'hello' => 'You are logged in!'
];