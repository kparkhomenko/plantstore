<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $plant->name }}</title>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/plantpage.css') }}" />

</head>

<body>
    <div class="container">
        <nav>
            @include('components/header')
        </nav>
        <div class="plant_img">
            <img src="{{ asset('storage/plant_img/' . $plant->path) }}">
        </div>
        <div class="plant_name">
            <h1>{{ $plant->name }}</h1>
        </div>
        <div class="raiting_div">
            <p>Средняя оценка продукта</p>
        </div>
        <div class="description_div">
            <p class="description_title">Описание</p>
            <p class="description">{{ $plant->description }}</p>
        </div>
        <div class="features_div">
            <p class="features_title">Характеристики</p>
            <div class="feature">
                <img src="{{ asset('storage/img/height.png') }}">
                <p class="feature_name">Высота</p>
                <p class="feature_text">{{ $plant->height }}</p>
            </div>
            <div class="feature">
                <img src="{{ asset('storage/img/category.png') }}">
                <p class="feature_name">Категория</p>
                <p class="feature_text_2">{{ $plant->category }}</p>
            </div>
            <div class="feature">
                <img src="{{ asset('storage/img/light.png') }}">
                <p class="feature_name">Освещенность</p>
                <p class="feature_text_3">{{ $plant->light }}</p>
            </div>
        </div>
        @auth
            <button class="add_cart" onclick="addCart('{{ $plant->id }}')">Добавить в корзину</button>
            <div class="comment_div">
                <h1 class="comment_div_title">Что вы думаете об этом товаре?</h1>
                <div class="comment_write">
                    <div class="comment_write_rate_div">
                        <p>Ваша оценка</p>
                        <div class="comment_write_rate_div1">
                            <button id="star_btn" class="star_btn" onclick="star_change(this)" value="1"><img
                                    class="star_img" id="star_img" src="{{ asset('storage/img/emptystar.png') }}"
                                    alt=""></button>
                            <button id="star_btn" class="star_btn" onclick="star_change(this)" value="2"><img
                                    class="star_img" id="star_img" src="{{ asset('storage/img/emptystar.png') }}"
                                    alt=""></button>
                            <button id="star_btn" class="star_btn" onclick="star_change(this)" value="3"><img
                                    class="star_img" id="star_img" src="{{ asset('storage/img/emptystar.png') }}"
                                    alt=""></button>
                            <button id="star_btn" class="star_btn" onclick="star_change(this)" value="4"><img
                                    class="star_img" id="star_img" src="{{ asset('storage/img/emptystar.png') }}"
                                    alt=""></button>
                            <button id="star_btn" class="star_btn" onclick="star_change(this)" value="5"><img
                                    class="star_img" id="star_img" src="{{ asset('storage/img/emptystar.png') }}"
                                    alt=""></button>
                        </div>
                    </div>
                    <textarea id="comment" name="comment" cols="30" rows="10" placeholder="Здесь мог бы быть ваш текст"></textarea>
                    <button onclick="getComment( {{ $plant->id }} )" class="comment_btn" id="comment_btn">Отправить
                        отзыв</button>
                    <div id="error_container"></div>
                </div>
            </div>
        @endauth
        <div class="comments_div">
            <h1>Отзывы клиентов</h1>
            <div class="comments">
                @include('components/comments')
            </div>
        </div>
        <footer>
            <div class="logo_footer_div">
                <a href="{{ route('mainpage') }}"><img src="{{ asset('storage/img/logo.png') }}" alt=""
                        class="footer_img"></a>
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
    <script>
        function star_change(qu) {
            star_img = document.querySelectorAll('.star_img');
            for (let img = 0; img < 5; img++) {
                const element = star_img[img];
                element.src = "{{ asset('storage/img/emptystar.png') }}"
            }
            for (let img = 0; img < qu; img++) {
                const element = star_img[img];
                element.src = "{{ asset('storage/img/star.png') }}"
            }
            let btn = document.querySelector(".star_btn");
            btn.classList.add("active");
            // star_img.forEach((img) => console.log(img));
            // if (qu = 1) {
            //     star_img.src = "{{ asset('storage/img/star.png') }}"
            // } else {

            // }
            // star_img.src = "{{ asset('storage/img/star.png') }}"
        }



        function sendComment(text, plant_id) {
            $.ajax({
                    url: '{{ route('sendComment') }}',
                    method: 'GET',
                    data: {
                        star: star,
                        text: text,
                        plant_id: plant_id
                    },
                    success: function(data) {
                        $('#comments').empty().append(data);
                        $('textarea').val('');
                        console.log(data);
                    }
                })
                .fail(function(jqXHR, ajaxOpions, throwError) {
                    console.log(data);
                })
        }

        function getComment(plant_id) {
            let text = $('#comment').val();
            let star = document.querySelector(".star_btn").value;
            console.log(star)
            if (text.length > 300) {
                $('#error_container').empty();
                let p = '<p id="comment_error">Лимит символов превышен<p>'
                $('#error_container').append(p);
            } else
                $('#error_container').empty();
            sendComment(text, plant_id);
        }

        function addCart(plant_id) {
            $.ajax({
                    url: '{{ route('addCart') }}',
                    method: 'GET',
                    data: {
                        plant_id: plant_id
                    },
                    success: function(data) {
                        console.log(data);
                    }
                })
                .fail(function(jqXHR, ajaxOpions, throwError) {
                    console.log(data);
                })
        }

        function delete_comment(id) {
            $.ajax({
                url: '{{ route('deleteComment') }}',
                method: 'GET',
                data: {
                    id: id
                }
            })
        }

        $('.delete_comment_btn').click(function() {
            let id = $(this).val();
            delete_comment(id);
        })
    </script>
</body>

</html>
