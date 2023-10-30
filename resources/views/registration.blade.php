<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <link rel="stylesheet" href="{{ asset('css/registration.css')}}" />
</head>

<body>
    <div class="container">
    <nav>
    @include('components/header')
    </nav>
    <div class="registration_div">
    <h1>Регистрация</h1>
    <form action="{{ route('user_register') }}" method="post">
        @csrf
        <div class="input_item">
        <input type="text" name="email" value="{{ old('email') }}" placeholder="Email">
        @error('email')
            <p class="error">{{ $message }}</p>
        @enderror
        </div>
        <div class="input_item">
        <input type="text" name="login" value="{{ old('login') }}" placeholder="Логин">
        @error('login')
            <p class="error">{{ $message }}</p>
        @enderror
        </div>
        <div class="input_item">
        <input type="password" name="password" placeholder="Пароль">
        @error('password')
            <p class="error">{{ $message }}</p>
        @enderror
        </div>
        <div class="input_item">
        <input type="password" name="password_r" placeholder="Подтвердите пароль">
        @error('password_r')
            <p class="error">{{ $message }}</p>
        @enderror
        </div>
        <div class="checkbox_div">
            <label>
            <input type="checkbox">
            </label>
            <p>Я согласен на обработку данных</p>
        </div>
        <button class="registration_button" type="submit">Регистрация</button>
    </form>
    <button class="auth_button"><a href="{{ route('login') }}">Авторизация</a></button>
    </div>
    </div>
</body>

</html>
