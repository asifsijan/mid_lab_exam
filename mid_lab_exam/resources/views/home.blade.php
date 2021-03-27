<!DOCTYPE html>
<html>
<head>
	@include('layouts.head')
</head>
<body>
	@include('layouts.header')

		<div class="container">
		@foreach ($cars as $car)
		<div class="jumbotron">

			<h4 class="d-flex justify-content-center">{{ $car->name }}</h4>
			<img src="{{asset('/upload')}}/{{$car['image']}}" width="800px" height="500px">

		</div>
		@endforeach
	</div>

	@include('layouts.footer')
</body>
</html>