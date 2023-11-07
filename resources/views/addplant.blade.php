<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить товар</title>
    <link rel="stylesheet" href="{{ asset('css/addplant.css')}}" />
</head>

<body>
    <div class="container">
    <nav>
    @include('components/header')        
    </nav>
    <div class="add_div">
    <h1>Добавление товара</h1>
    <form action="{{route('plant_upload')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input_item">
        <input type="text" name="name" placeholder="Название товара">
        @error('name')
            <p>{{ $message }}</p>
        @enderror
        </div>
        <div class="input_item">
        <input type="file" name="path">
        @error('path')
            <p>{{ $message }}</p>
        @enderror
        </div>
        <div class="input_item">
        <select name="height" id="">
            <option value="от 0 до 11 см">от 0 до 11 см</option>
            <option value="от 12 до 25 см">от 12 до 25 см</option>
            <option value="от 26 до 40 см">от 26 до 40 см</option>
            <option value="от 41 до 60 см">от 41 до 60 см</option>
        </select>
        </div>
        <div class="input_item">
        <select name="category" id="">
            <option value="цветущие">цветущие</option>
            <option value="лиственные">лиственные</option>
            <option value="папоротники">папоротники</option>
            <option value="суккуленты">суккуленты</option>
        </select>
        </div>
        <div class="input_item">
        <select name="light" id="">
            <option value="южное окно">южное окно</option>
            <option value="северное окно">северное окно</option>
            <option value="западное окно">западное окно</option>
            <option value="восточное окно">восточное окно</option>
        </select>
        </div>
        <div class="input_item">
        <textarea name="description" cols="30" rows="10" placeholder="Описание"></textarea>
        @error('description')
            <p>{{ $message }}</p>
        @enderror
        </div>
        <input type="text" name="price" placeholder="Цена">
        @error('price')
            <p>{{ $message }}</p>
        @enderror
        <div class="button_div">
        <button class="add_button" type="submit">Добавить товар</button>
        </div>
    </form>
    @if(session('success_message') !== null)
        <p class="success">{{ session('success_message') }}<p>
        <p class="success">{{ Session::forget('success_message') }}</p>
    @endif
    </div>
    </div>
</body>

</html>
