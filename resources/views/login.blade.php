<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <link rel="stylesheet" href="{{ asset('css/login.css')}}" />
</head>

<body>
    <div class="container">
    <nav>
    @include('components/header')
    </nav>

    <div class="login_div">
    <h1>Авторизация</h1>
    <form action="{{ route('user_login') }}" method="post">
        @csrf
        <div class="input_item">
            <input type="text" name="login" placeholder="Логин">
        </div>
        @error('login')
        <p>{{ $message }}</p>
        @enderror
        <div class="input_item">
            <input type="password" name="password" placeholder="Пароль">
        </div>
        @error('password')
        <p>{{ $message }}</p>
        @enderror
        <button class="auth_button" type="submit">Войти</button>
        
    </form>
     <button class="register_button"><a href="{{ route('register') }}">Регистрация</a><button>
    </div>
    </div>
</body>

</html>
