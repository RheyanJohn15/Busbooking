
<!DOCTYPE html>
<html lang="en">

	<head>
		@include('admin.components.header', ['title'=>'Dashboard'])
	</head>

	<body>
		@include('admin.components.loading')
		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- App container starts -->
			<div class="app-container">

				@include('admin.components.nav', ['active'=>'terminal'])

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
									<li class="breadcrumb-item text-light">Terminal List</li>
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
										<h5 class="card-title">Terminal List</h5>

                                        <button data-bs-toggle="modal" data-bs-target="#addTerminal" class="btn btn-primary"> <i class="icon-plus-circle"></i> Add Terminal</button>
									</div>
									<div class="card-body">

                                        
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card mb-2">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table id="terminalList" class="table table-striped table-hover table-bordered align-middle m-0">
                                                                <thead>
                                                                    <tr class="thead-dark">
                                                                        
                                                                        <th>Terminal</th>
                                                                        <th>Location</th>
                                                                        <th style="width: 10%">Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="terminalTable">
              
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

                <div class="modal fade" id="addTerminal" tabindex="-1"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">
                               Add Terminal
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="terminalForm">
                                @csrf
                                <div class="row mb-3">
                                    <label for="terminalName" class="col-sm-3 col-form-label">Terminal Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" id="terminalName" placeholder="eg. Terminal Id" />
                                        <small id="termName" style="display: none" class="text-danger">Please Fill this field</small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="terminalLocation" class="col-sm-3 col-form-label">Location</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="location" class="form-control" id="terminalLocation" placeholder="eg. Victorias City" />
                                        <small id="termLocation" style="display: none" class="text-danger">Please Fill this field</small>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="closeTerminal" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" onclick="Admin.Terminal.Add('{{route('addTerminal')}}', '{{route('loadTerminal')}}', '{{route('updateTerminal')}}')" class="btn btn-primary">
                                Add Terminal
                            </button>
                        </div>
                    </div>
                </div>
                </div>


                <div class="modal fade" id="updateModal" tabindex="-1"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">
                              Update Terminal
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="updateTerminalForm">
                                @csrf
                                <input type="hidden" id="updateTermId" name="term_id">
                                <input type="hidden" name="action" value="update">
                                <div class="row mb-3">
                                    <label for="updateTermName" class="col-sm-3 col-form-label">Terminal Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" id="updateTermName" placeholder="eg. Terminal Id" />
                                        <small id="UptermName" style="display: none" class="text-danger">Please Fill this field</small>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="updateTermLocation" class="col-sm-3 col-form-label">Location</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="location" class="form-control" id="updateTermLocation" placeholder="eg. Victorias City" />
                                        <small id="UptermLocation" style="display: none" class="text-danger">Please Fill this field</small>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="UpdatecloseTerminal" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="button" onclick="Admin.Terminal.Edit.Update('{{route('updateTerminal')}}', '{{route('loadTerminal')}}')" class="btn btn-primary">
                                Update Terminal
                            </button>
                        </div>
                    </div>
                </div>
                </div>

			</div>
			<!-- App container ends -->

            <form method="POST" id="DisableTerminal">
                @csrf
                <input type="hidden" name="term_id" id="disableTermId">
                <input type="hidden" name="action" value="delete">
            </form>
		</div>
		<!-- Page wrapper end -->

	@include('admin.components.scripts')
	<script>
        window.onload = ()=>{
             LoadTerminal("{{route('loadTerminal')}}", "{{route('updateTerminal')}}");
        }
    </script>
	</body>

</html>