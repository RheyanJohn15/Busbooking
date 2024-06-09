
<!DOCTYPE html>
<html lang="en">

	<head>
		@include('admin.components.header', ['title'=>'Bus List'])
	</head>

	<body>
		@include('admin.components.loading')
		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- App container starts -->
			<div class="app-container">

				@include('admin.components.nav', ['active'=>'bus'])

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
									<li class="breadcrumb-item text-light">Bus List</li>
								</ol>
								<!-- Breadcrumb end -->
							</div>
						</div>
						<!-- Row end -->

						<!-- Row start -->
						<div class="row gx-2">
							<div class="col-12">
								<div class="card mb-2">
									<div class="card-header d-flex justify-content-between">
										<h5 class="card-title">Bus List</h5>
										<button data-bs-toggle="modal" data-bs-target="#addBus" class="btn btn-primary"> <i class="icon-plus-circle"></i> Add Bus</button>
									</div>
									<div class="card-body">
										<div class="row">
                                            <div class="col-12">
                                                <div class="card mb-2">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="busList" class="table table-striped table-hover table-bordered align-middle m-0">
                                                                <thead>
                                                                    <tr class="thead-dark">
                                                                        
                                                                        <th>Bus Code</th>
                                                                        <th>Bus Type</th>
																		<th>Bus Seats</th>
                                                                        <th style="width: 10%">Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="busTable">
              
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

				<div class="modal fade" id="addBus" tabindex="-1"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">
                               Add Bus
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="busForm">
                                @csrf
                                <div class="row mb-3">
                                    <label for="busCode" class="col-sm-3 col-form-label">Bus Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="code" class="form-control" id="busCode" placeholder="eg. 23STGUS" />
                                        <small id="busCodeE" style="display: none" class="text-danger">Please Fill this field</small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="busType" class="col-sm-3 col-form-label">Bus Type</label>
                                    <div class="col-sm-9">
                                        <select  name="type" class="form-control" id="busType">
											<option value="none" selected disabled> --------Select Bus Type-------- </option>
											<option value="Economy">Economy</option>
											<option value="Ceres Tour">Ceres Tour</option>
											<option value="AirCon">AirCon</option>
											<option value="One Stop">One Stop</option>
											<option value="Two Stops">Two Stops</option>
										</select>
                                        <small id="busTypeE" style="display: none" class="text-danger">Please Select Bus Type</small>
                                    </div>
                                </div>
								<div class="row mb-3">
                                    <label for="busSeats" class="col-sm-3 col-form-label">Bus Seats</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="seats" class="form-control" id="busSeats" placeholder="eg. 100" />
                                        <small id="busSeatsE" style="display: none" class="text-danger">Please Fill this field</small>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="closeBus" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" onclick="Admin.Bus.Add('{{route('addBus')}}', '{{route('loadBus')}}', '{{route('editBus')}}')" class="btn btn-primary">
                                Add Bus
                            </button>
                        </div>
                    </div>
                </div>
                </div>


				
				<div class="modal fade" id="updateBus" tabindex="-1"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">
                               Update Bus
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="UpbusForm">
                                @csrf
								<input type="hidden" name="id" id="upBusId">
								<input type="hidden" name="action" value="update">
                                <div class="row mb-3">
                                    <label for="UpbusCode" class="col-sm-3 col-form-label">Bus Code</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="code" class="form-control" id="UpbusCode" placeholder="eg. 23STGUS" />
                                        <small id="UpbusCodeE" style="display: none" class="text-danger">Please Fill this field</small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="UpbusType" class="col-sm-3 col-form-label">Bus Type</label>
                                    <div class="col-sm-9">
                                        <select  name="type" class="form-control" id="UpbusType">
											<option value="none" selected disabled> --------Select Bus Type-------- </option>
											<option value="Economy">Economy</option>
											<option value="Ceres Tour">Ceres Tour</option>
											<option value="AirCon">AirCon</option>
											<option value="One Stop">One Stop</option>
											<option value="Two Stops">Two Stops</option>
										</select>
                                        <small id="UpbusTypeE" style="display: none" class="text-danger">Please Select Bus Type</small>
                                    </div>
                                </div>
								<div class="row mb-3">
                                    <label for="UpbusSeats" class="col-sm-3 col-form-label">Bus Seats</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="seats" class="form-control" id="UpbusSeats" placeholder="eg. 100" />
                                        <small id="UpbusSeatsE" style="display: none" class="text-danger">Please Fill this field</small>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="UpcloseBus" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" onclick="Admin.Bus.Edit.Update('{{route('editBus')}}', '{{route('loadBus')}}')" class="btn btn-primary">
                                Update Terminal
                            </button>
                        </div>
                    </div>
                </div>
                </div>


			</div>

			<!-- App container ends -->

			<form method="POST" id="DisableBus">
				@csrf
				<input type="hidden" name="id" id="disableBusId">
				<input type="hidden" name="action" value="delete">
			</form>
		</div>
		<!-- Page wrapper end -->

	@include('admin.components.scripts')
	<script>
		window.onload = ()=>{
			LoadBus("{{route('loadBus')}}", "{{route('editBus')}}");
		}
	</script>
	</body>

</html>