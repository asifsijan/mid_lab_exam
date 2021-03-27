<!DOCTYPE html>
<html>
<head>
	@include('layouts.head')
</head>
<body>

	<div class="col-3 ml-auto text-right py-4 mx-5">

		<button class="button btn-outline-secondary"><a href="/admin/logout">Logout</a></button>	
	</div>

	<div class="container">

		<h4> Hello	{{session('name')}} </h4>

	</div>
	<div class="container">
		<form method="POST" action="" enctype="multipart/form-data">
			@csrf



			<div class="form-group">
				<label for="name">Car Name</label>
				<input type="text" class="form-control" placeholder="" name="name" required>
			</div>


			<div class="form-group">
				<label class=" control-label" for="category">Category</label>
				<div class="">
					<select name="category" class="form-control">
						<option value="private_car">private car</option>
						<option value="micro_bus">micro-bus</option>
						<option value="pick_up">pick-up</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="image">car image</label>
				<input type="file" class="form-control" placeholder="" name="image">
			</div>
			<div class="form-group">
				<label for="price">rent cost</label>
				<input type="number" class="form-control" placeholder="" name="price">
			</div>



			<button type="submit" class="btn btn-primary">Add Car</button>
		</form>
		{{session('msg')}}
	</div>

	@include('layouts.footer')
</body>
</html>