<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Корзина</title>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}" />
</head>

<body>
    <div class="container">
        <nav>
            @include('components/header')
        </nav>
        <h1 class="cart_title">Добавленные товары</h1>
        <div class="cart_items_div">
            @foreach ($cart_items as $cart_item)
                <div class="cart_item_div">
                    <div class="cart_img_div">
                        <img src="{{ asset('storage/plant_img/'. $cart_item->path)}}">
                    </div>
                    <div class="cart_item_text">
                    <p class="cart_item_name">{{ $cart_item->name }}</p>
                    <p class="cart_item_description">{{ $cart_item->description }}</p>
                    </div>
                    <div class="price_div">
                    <p class="cart_item_price">{{ $cart_item->price }}₽</p>
                    </div>
                    <button class="pay_btn">Оплатить</button>
                    <button class="delete_btn" value="{{ $cart_item->cart_id }}">Удалить</button>
                </div>
                <hr>
            @endforeach
        <footer>
            <div class="logo_footer_div">
            <a href="{{ route('mainpage') }}"><img src="{{ asset('storage/img/logo.png')}}" alt="" class="footer_img"></a>
            <p>LotPlant</p>
            </div>
            <div class="num">
                <p>тел. 8800-555-35-35</p>
            </div>
            <div class="soc">
                <div class="soc_div">
                <img src="{{ asset('storage/img/whatsupp.png') }}">
                </div>
                <div class="soc_div">
                <img src="{{ asset('storage/img/telegram.png') }}">
                </div>
                <div class="soc_div">
                <img src="{{ asset('storage/img/vk.png') }}">
                </div>
            </div>
        </footer>
        </div>
    </div>
    <script>
    function deleteCartPlant(id) {
        $.ajax({
                url: '{{ route("deleteCartPlant") }}',
                method: 'GET',
                data: {
                    id: id
                }
            })  
    }

    $('.delete_btn').click(function() {
        let id = $(this).val();
        deleteCartPlant(id);
    })  			
    </script>
</body>

</html>
