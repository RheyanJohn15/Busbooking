
<!DOCTYPE html>
<html lang="en">

	<head>
		@include('admin.components.header', ['title'=>'Booking List'])
	</head>

	<body>

		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- App container starts -->
			<div class="app-container">

				@include('admin.components.nav', ['active'=>'booked'])

				<!-- App body starts -->
				<div class="app-body">

					<!-- Container starts -->
					<div class="container">

						<!-- Row start -->
						<div class="row">
							<div class="col-12 col-xl-6">

								<!-- Breadcrumb start -->
								<ol class="breadcrumb mb-3">
									<li class="breadcrumb-item">
										<i class="icon-house_siding lh-1"></i>
										<a href="{{route('adminDashboard')}}" class="text-decoration-none">Dashboard</a>
									</li>
									<li class="breadcrumb-item text-light">Booked List</li>
								</ol>
								<!-- Breadcrumb end -->
							</div>
						</div>
						<!-- Row end -->

						<!-- Row start -->
						<div class="row gx-2">
							<div class="col-12">
								<div class="card mb-2">
									<div class="card-header">
										<h5 class="card-title">Booked Tickets</h5>
									</div>
									<div class="card-body">
										<div class="row">
                                            <div class="col-12">
                                                <div class="card mb-2">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="bookedList" class="table table-striped table-hover table-bordered align-middle m-0">
                                                                <thead>
                                                                    <tr class="thead-dark">
                                                                        
                                                                        <th>Booking Code</th>
                                                                        <th>Full Name</th>
																		<th>Email</th>
                                                                        <th>Contact</th>
                                                                        <th>Reserve Seats</th>
                                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
              
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
									</div>
								</div>
							</div>
						</div>
						<!-- Row end -->

					</div>
					<!-- Container ends -->

				</div>
				<!-- App body ends -->

			

			</div>
			<!-- App container ends -->

		</div>
		<!-- Page wrapper end -->

	@include('admin.components.scripts')
	<script>
        window.onload = ()=>{
            LoadBookedList("{{route('getBookedList')}}")
        }
    </script>
	</body>

</html>