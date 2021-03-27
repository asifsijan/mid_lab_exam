<!DOCTYPE html>
<html>
<head>
	@include('layouts.head')
</head>
<body>
	<div class="col-3 ml-auto text-right py-4 mx-5">
	
<button class="button btn-outline-secondary"><a href="/member/logout">Logout</a></button>	
</div>

	<div class="container">

			<h4> Hello	{{session('member_name')}} </h4>

	</div>

	@include('layouts.footer')
</body>
</html>