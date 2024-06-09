
<!DOCTYPE html>
<html lang="en">

	<head>
		@include('admin.components.header', ['title'=>'Routes'])
	</head>

	<body>
        @include('admin.components.loading')
		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- App container starts -->
			<div class="app-container">

				@include('admin.components.nav', ['active'=>'routes'])

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
								
									<li class="breadcrumb-item text-light">Routes</li>
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
										<h5 class="card-title">Routes</h5>
                                        <button data-bs-toggle="modal" data-bs-target="#addRoute" class="btn btn-primary"> <i class="icon-plus-circle"></i> Add Route</button>
									</div>
									<div class="card-body">
										<div class="col-12">
                                            <div class="card mb-2">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="routeList" class="table table-striped table-hover table-bordered align-middle m-0">
                                                            <thead>
                                                                <tr class="thead-dark">
                                                                    
                                                                    <th>Route Code</th>
                                                                    <th>Route</th>
                                                                    
                                                                    <th>Bus Code</th>
                                                                    <th>Departure Date</th>
                                                                    <th>Departure Time</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="routeTable">
          
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

                @php
                    $bus = App\Models\Bus::where('bus_status', 1)->get();
                    $terminal = App\Models\Terminal::where('term_status',1)->get();
                @endphp
                <div class="modal fade" id="addRoute" tabindex="-1"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">
                               Add Route
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="routeForm">
                                @csrf
                                <div class="row mb-3">
                                    <label for="busCode" class="col-sm-3 col-form-label">Bus Code</label>
                                    <div class="col-sm-9">
                                        <select  name="busCode" class="form-control" id="busCode">
											<option value="none" selected disabled> --------Select Bus -------- </option>
                                            @foreach ($bus as $b)
                                                <option value="{{$b->bus_id}}">{{$b->bus_code}}</option>
                                            @endforeach
										</select>
                                        <small id="busCodeE" style="display: none" class="text-danger">Please Select Bus</small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="origin" class="col-sm-3 col-form-label">Origin</label>
                                    <div class="col-sm-9">
                                        <select  name="origin" class="form-control" id="origin">
											<option value="none" selected disabled> --------Select Origin-------- </option>
                                            @foreach ($terminal as $b)
                                                <option value="{{$b->term_id}}">{{$b->term_name}} - {{$b->term_location}}</option>
                                            @endforeach
										</select>
                                        <small id="originE" style="display: none" class="text-danger">Please Select Origin</small>
                                    </div>
                                </div>

                              

                                <div class="row mb-3">
                                    <label for="destination" class="col-sm-3 col-form-label"> Destination</label>
                                    <div class="col-sm-9">
                                        <select  name="destination" class="form-control" id="destination">
											<option value="none" selected disabled> --------Select Destination-------- </option>
                                            @foreach ($terminal as $b)
                                            <option value="{{$b->term_id}}">{{$b->term_name}} - {{$b->term_location}}</option>  
                                            @endforeach
										</select>
                                        <small id="destinationE" style="display: none" class="text-danger">Please Select Destination</small>
                                    </div>
                                </div>
                                
								<div class="row mb-3">
                                    <label for="departureDate" class="col-sm-3 col-form-label">Departure Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="dept_date" class="form-control" id="departureDate" placeholder="eg. 100" />
                                        <small id="departureDateE" style="display: none" class="text-danger">Please Fill this field</small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="departureTime" class="col-sm-3 col-form-label">Departure Time</label>
                                    <div class="col-sm-9">
                                        <input type="time" name="dept_time" class="form-control" id="departureTime" placeholder="eg. 100" />
                                        <small id="departureTimeE" style="display: none" class="text-danger">Please Fill this field</small>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="closeRoute" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" onclick="Admin.Route.Add('{{route('addRoute')}}', '{{route('loadRoute')}}', '{{route('editRoute')}}')" class="btn btn-primary">
                                Add Bus
                            </button>
                        </div>
                    </div>
                </div>
                </div>


                <div class="modal fade" id="updateRoute" tabindex="-1"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">
                               Update Route (<span id="routeCode"></span>)
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="UprouteForm">
                                @csrf
                                <input type="hidden" name="id" id="routeIdUp">
                                <input type="hidden" name="action" value="update">
                                <div class="row mb-3">
                                    <label for="UpbusCode" class="col-sm-3 col-form-label">Bus Code</label>
                                    <div class="col-sm-9">
                                        <select  name="busCode" class="form-control" id="UpbusCode">
										
                                            @foreach ($bus as $b)
                                                <option value="{{$b->bus_id}}">{{$b->bus_code}}</option>
                                            @endforeach
										</select>
                                        <small id="UpbusCodeE" style="display: none" class="text-danger">Please Select Bus</small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Uporigin" class="col-sm-3 col-form-label">Origin</label>
                                    <div class="col-sm-9">
                                        <select  name="origin" class="form-control" id="Uporigin">
											
                                            @foreach ($terminal as $b)
                                                <option value="{{$b->term_id}}">{{$b->term_name}} - {{$b->term_location}}</option>
                                            @endforeach
										</select>
                                        <small id="UporiginE" style="display: none" class="text-danger">Please Select Origin</small>
                                    </div>
                                </div>

                              

                                <div class="row mb-3">
                                    <label for="Updestination" class="col-sm-3 col-form-label"> Destination</label>
                                    <div class="col-sm-9">
                                        <select  name="destination" class="form-control" id="Updestination">
											
                                            @foreach ($terminal as $b)
                                            <option value="{{$b->term_id}}">{{$b->term_name}} - {{$b->term_location}}</option>  
                                            @endforeach
										</select>
                                        <small id="UpdestinationE" style="display: none" class="text-danger">Please Select Destination</small>
                                    </div>
                                </div>
                                
								<div class="row mb-3">
                                    <label for="UpdepartureDate" class="col-sm-3 col-form-label">Departure Date</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="dept_date" class="form-control" id="UpdepartureDate" placeholder="eg. 100" />
                                        <small id="UpdepartureDateE" style="display: none" class="text-danger">Please Fill this field</small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="UpdepartureTime" class="col-sm-3 col-form-label">Departure Time</label>
                                    <div class="col-sm-9">
                                        <input type="time" name="dept_time" class="form-control" id="UpdepartureTime" placeholder="eg. 100" />
                                        <small id="UpdepartureTimeE" style="display: none" class="text-danger">Please Fill this field</small>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="UpcloseRoute" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" onclick="Admin.Route.Edit.Update('{{route('editRoute')}}', '{{route('loadRoute')}}')" class="btn btn-primary">
                                Update Route
                            </button>
                        </div>
                    </div>
                </div>
                </div>


			</div>
			<!-- App container ends -->

        <form method="POST" id="DisableRoute">
            @csrf
            <input type="hidden" name="id" id="routeDisableId">
            <input type="hidden" name="action" value="delete">
        </form>
		</div>
		<!-- Page wrapper end -->

	@include('admin.components.scripts')
	<script>
        window.onload = ()=>{
            LoadRoute("{{route('loadRoute')}}", "{{route('editRoute')}}");
        }
    </script>
	</body>

</html>