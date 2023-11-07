<link rel="stylesheet" href="{{ asset('css/components/header.css')}}" />
<div class="navbar">
    <div class="logo_div">
    <a href="{{ route('mainpage') }}"><img src="{{ asset('storage/img/logo.png')}}" alt=""></a>
    <p>LotPlant</p>
    </div>
    <div class="icon_bar">
    @auth
        @if (Auth::user()->status == 'admin')
            <a class="admin" href="{{ route('adminpanel') }}"><img src="{{ asset('storage/img/admin.png') }}" alt=""></a>
        @endif
        <a class="cart" href="{{ route('cart', Auth::user()->id) }}"><img src="{{ asset('storage/img/cart.png') }}" alt=""></a>

        <a class="logout" href="{{ route('logout') }}"><img src="{{ asset('storage/img/out.png') }}"></a>
        
    @endauth

    @guest
        <a class="user" href="{{ route('login') }}"><img src="{{ asset('storage/img/user.png') }}"></a>
    @endguest
    </div>
</div>