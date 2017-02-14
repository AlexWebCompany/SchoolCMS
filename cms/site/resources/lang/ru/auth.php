<?php
if(Auth::guest()){
$usernamecms='Гость';
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

    'failed' => 'Эти учетные данные не соответствуют нашим данным.',
    'throttle' => 'Слишком много попыток входа в систему. Пожалуйста, повторите попытку :seconds секунд.',
    'reg' => 'Регистрация',
    'name' => 'Логин',
    'username' => $usernamecms,
    'mail' => 'Электронная почта',
    'pass' => 'Пароль',
    'confpass' => 'Повторите пароль',
    'login' => 'Войти',
    'logout' => 'Выйти',
    'forpass' => 'Забыли пароль?',
    'remme' => 'Запомнить',
    'respass' => 'Сброс пароля',
    'respassmail' => 'Отправить ссылку сброса пароля',
    'dash' => 'Управление',
    'hello' => 'Вы вошли!'
];
