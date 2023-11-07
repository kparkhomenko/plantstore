<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Каталог товаров</title>
    <link rel="stylesheet" href="{{ asset('css/catalogue.css') }}" />
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>

<body>
	<div class="container">
		<nav>
			@include('components.header')
			<div class="search_div">
				<img src="{{ asset('storage/img/loup.png') }}" class="loup">
				<input type="text" name="search_word" id="search_bar" class="search_bar" placeholder="Что вы ищите?">
			</div>
		</nav>
		<div class="filters_div">
			<p class="filters_title">Фильтры</p>
			<div class="filters_div1">
				<div class="category_grid">
					<p class="category_div_title">Высота</p>
					<div class="checkbox_div">
						<input type="checkbox" name="">
						<p>от 0 до 11 см</p>
					</div>
					<div class="checkbox_div">
						<input type="checkbox" name="">
						<p>от 12 до 25 см</p>
					</div>
					<div class="checkbox_div">
						<input type="checkbox" name="">
						<p>от 26 до 40 см</p>
					</div>
					<div class="checkbox_div">
						<input type="checkbox" name="">
						<p>от 41 до 60 см</p>
					</div>
				</div>
				<div class="category_grid">
					<p class="category_div_title">Категория</p>
					<div class="checkbox_div">
						<input type="checkbox" name="">
						<p>цветущие</p>
					</div>
					<div class="checkbox_div">
						<input type="checkbox" name="">
						<p>лиственные</p>
					</div>
					<div class="checkbox_div">
						<input type="checkbox" name="">
						<p>папоротники</p>
					</div>
					<div class="checkbox_div">
						<input type="checkbox" name="">
						<p>суккуленты</p>
					</div>
				</div>
				<div class="category_grid">
					<p class="category_div_title">Освещенность</p>
					<div class="checkbox_div">
						<input type="checkbox" name="">
						<p>южное окно</p>
					</div>
					<div class="checkbox_div">
						<input type="checkbox" name="">
						<p>северное окно</p>
					</div>
					<div class="checkbox_div">
						<input type="checkbox" name="">
						<p>западное окно</p>
					</div>
					<div class="checkbox_div">
						<input type="checkbox" name="">
						<p>восточное окно</p>
					</div>
				</div>
			</div>
		</div>
		<div class="plants_div" id="plants_div">
			@include('components.plants')
		</div>
	    <div id="no_result">
	        <p>По вашему запросу ничего не найдено</p>
	    </div>
	</div>
    <script>
        function getword() {
            let search_word = $('#search_bar').val();
            make_search(search_word);
        }

        function make_search(search_word) {
            $.ajax({
                    url: '{{ route("search") }}',
                    method: 'GET',
                    data: {
                        search_word: search_word
                    },
                    success: function(data) {

                        if (data.length == 0) {
                            $('#plants_div').empty();
                            $('#no_result').show();
                        } else {
                            $('#no_result').hide();
                            $('#plants_div').empty().append(data);
                        }

                    }
                })
        }

        $('#search_bar').keypress(function(event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '500') {
                getword();
            }
        });
	</script>      
</body>
