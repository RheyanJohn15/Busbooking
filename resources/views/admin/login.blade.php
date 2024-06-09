
<!DOCTYPE html>
<html lang="en">

	<head>
        @include('admin.components.header', ['title'=>'Admin Login'])
	</head>

	<body class="bg-one">
		<!-- Container start -->
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-4 col-lg-5 col-sm-6 col-12">
					<form action="index.html" class="my-5">
						<div class="card p-md-4 p-sm-3">
							<div class="login-form">
								<a href="#" class="mb-4 d-flex w-100 justify-content-center">
									<img src="{{asset('assets/images/logo.png')}}" class="img-fluid login-logo" style="height: 5rem" alt="Logo" />
								</a>
								<h2 class="mt-4 mb-4 text-center">Admin Login</h2>
								<div class="mb-3">
									<label class="form-label">Username</label>
									<input type="text" class="form-control" placeholder="Username" />
								</div>
								<div class="mb-3">
									<label class="form-label">Password</label>
									<div class="input-group">
										<input type="password" class="form-control" placeholder="Enter password" />
										<a href="#" class="input-group-text">
											<i class="icon-eye"></i>
										</a>
									</div>
								</div>
								<div class="d-flex align-items-center justify-content-between">
									<div class="form-check m-0">
										<input class="form-check-input" type="checkbox" value="" id="rememberPassword" />
										<label class="form-check-label" for="rememberPassword">Remember</label>
									</div>
								</div>
								<div class="d-grid py-3 mt-3">
									<button type="submit" class="btn btn-lg btn-success">
										LOGIN
									</button>
								</div>
							
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Container end -->
	</body>

</html>