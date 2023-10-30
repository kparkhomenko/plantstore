 <link rel="stylesheet" href="{{ asset('css/components/plants.css')}}" />
@if (!empty($plants))
    @foreach ($plants as $plant)
        <a href="{{ url('plant/'. $plant->id) }}"><div class="plant">
            <div class="div_plant_img">
            <img src="{{asset('storage/plant_img/'.$plant->path)}}" alt="">
            </div>
            <p class="plant_name">{{ $plant->name }}</p>
            <p class="plant_description">{{ $plant->description }}</p>
            <p class="plant_price">{{ $plant->price }}₽</p>
            @auth
                <button class="cart_button">В корзину</button>
            @endauth
        </div></a>
    @endforeach
@endif

