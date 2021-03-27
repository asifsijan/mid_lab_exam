<!DOCTYPE html>
<html>
<head>
	@include('layouts.head')
</head>
<body>
	
	<div class="col-3 ml-auto text-right py-4 mx-5">

		<button class="button btn-outline-secondary"><a href="/member/login">Login</a></button>	
	</div>

	<div class="container">
		<form method="POST" action="" enctype="multipart/form-data">
			@csrf



			<div class="form-group">
				<label for="name">User Name</label>
				<input type="text" class="form-control" placeholder="" name="name" required>
			</div>

			<div class="form-group">
				<label for="full_name">Full Name</label>
				<input type="text" class="form-control" placeholder="" name="full_name" required>
			</div>

			<div class="form-group">
				<label for="email">email</label>
				<input type="email" class="form-control" placeholder="" name="email" required>
			</div>

			<div class="form-group">
				<label for="password">password</label>
				<input type="password" class="form-control" placeholder="" name="password" required> 
			</div>

			<div class="form-group">
				<label for="dob">Date of birth</label>
				<input type="date" class="form-control" placeholder="" name="dob" required>
			</div>
			<div class="form-group">
				<label for="contact">contact</label>
				<input type="text" class="form-control" placeholder="" name="contact" required>
			</div>



			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

	@include('layouts.footer')

</body>
</html>