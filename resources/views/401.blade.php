
<!DOCTYPE html>
<html lang="en">

	<head>
		@include('admin.components.header', ['title'=>'401 - Unauthorize Access'])
	</head>

	<body class="bg-one">

		<div class="container">
			<div class="row justify-content-center align-items-center vh-100">
				<div class="col-sm-6 col-12">
					<div class="text-warning">
						<h1 class="display-1 fw-bold">401</h1>
						<h6 class="lh-2">Unauthorize Access...Please Login First</h6>
						<img src="{{asset('assets/images/error.svg')}}" class="img-fluid" alt="Bootstrap Dashboards" />
						<div class="text-end">
							<a href="{{route('loginAdmin')}}" class="btn btn-light rounded-5 px-4 py-3 shadow">Go back to Login</a>
						</div>
					</div>
				</div>
			</div>
		</div>

	@include('admin.components.scripts')
	
	</body>

</html>