<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админская панель</title>
    <link rel="stylesheet" href="{{ asset('css/adminpanel.css')}}" />
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>

<body>
	<div class="container">
		<nav>
			@include('components.header')
		</nav>
		<a href="{{ route('addplant') }}"><button class="add_plant_btn">Добавить товар</button></a>
	</div>
	<p class="plants_list_title">Список товаров</p>
    <div class="plants_div">
    @include('components/plants')
    </div>
</body>

<script>
	
	function delete_plant(id) {
	    $.ajax({
	            url: '{{ route("deletePlant") }}',
	            method: 'GET',
	            data: {
	                id: id
	            }
	        })	
	}

	$('.delete_plant_btn').click(function() {
	    let id = $(this).val();
	    delete_plant(id);
	})          

</script>

</html>
