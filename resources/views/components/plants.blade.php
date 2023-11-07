 <link rel="stylesheet" href="{{ asset('css/components/plants.css')}}" />
@if (!empty($plants))
    @foreach ($plants as $plant)
        <div class="plant">
            <a href="{{ url('plant/'. $plant->id) }}">
            <div class="div_plant_img">
            <img src="{{asset('storage/plant_img/'.$plant->path)}}" alt="">
            </div>
            <p class="plant_name">{{ $plant->name }}</p>
            <p class="plant_description">{{ $plant->description }}</p>
            <p class="plant_price">{{ $plant->price }}₽</p>
            </a>
            @auth
                <button class="cart_button">В корзину</button>
            @endauth
            @auth
                @if(Auth::user()->status == 'admin')
                    <button value="{{ $plant->id }}" class="delete_plant_btn">Удалить товар</button>
                @endif
            @endauth
        </div>
    @endforeach
@endif

