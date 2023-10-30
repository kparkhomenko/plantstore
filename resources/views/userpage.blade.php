<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ Auth::user()->login }}</title>
</head>

<body>
    <h1>Привет, {{ Auth::user()->login}}</h1>
</body>
</html>
