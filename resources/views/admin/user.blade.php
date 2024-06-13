
<!DOCTYPE html>
<html lang="en">

	<head>
		@include('admin.components.header', ['title'=>'User Profile'])
	</head>

	<body>
		@include('admin.components.loading')
		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- App container starts -->
			<div class="app-container">

				@include('admin.components.nav', ['active'=>'none'])
                
				<!-- App body starts -->
				<div class="app-body">

					<!-- Container starts -->
					<div class="container">

                        <div class="row gx-2">
							<div class="col-xxl-12">
								<div class="card mb-2">
									<div class="card-body">
										<div class="custom-tabs-container">
											<ul class="nav nav-tabs" id="customTab2" role="tablist">
												<li class="nav-item" role="presentation">
													<a class="nav-link active" id="tab-oneA" onclick="Admin.UserProfile.ChangeTab('general')" data-bs-toggle="tab" href="#general" role="tab"
														aria-controls="oneA" aria-selected="true">General</a>
												</li>
												<li class="nav-item" role="presentation">
													<a class="nav-link" id="tab-twoA" onclick="Admin.UserProfile.ChangeTab('changePass')" data-bs-toggle="tab" href="#changePass" role="tab"
														aria-controls="twoA" aria-selected="false">Change Password</a>
												</li>
												<li class="nav-item" role="presentation">
													<a class="nav-link" id="tab-threeA" onclick="Admin.UserProfile.ChangeTab('uploadPic')" data-bs-toggle="tab" href="#updatePic" role="tab"
														aria-controls="threeA" aria-selected="false">Update Profile Picture</a>
												</li>
											</ul>
											<div class="tab-content h-350">
												<div class="tab-pane fade show active" id="general" role="tabpanel">
													<!-- Row start -->
													<div class="row gx-2">
														<div class="col-sm-4 col-12">
															<div class="w-100 d-flex justify-content-center align-items-center">
                                                                <img src="{{$user->admin_pic === 'none' ? asset('admin/placeholder.jfif') : asset('admin/'. $user->admin_pic)}}" class="w-50 rounded-circle" alt="">
                                                            </div>
														</div>
                                                      
                                                        
														<div class="col-sm-8 col-12">
                                                            <form method="POST" id="generalForm">
                                                                @csrf
                                                                <input type="hidden" name="user_id" value="{{session('admin_id')}}">
															<div class="row gx-2">
																<div class="col-6">
																	<!-- Form Field Start -->
																	<div class="mb-3">
																		<label for="fullName" class="form-label">Name</label>
																		<input type="text" value="{{$user->admin_name}}" class="form-control" id="fullName" name="fullname" placeholder="Full Name" />
                                                                        <small id="fullNameE" style="display:none" class="text-danger">Don't Leave this field Empty</small>
																	</div>

																</div>
																<div class="col-6">
																	<!-- Form Field Start -->
																	<div class="mb-3">
																		<label for="username" class="form-label">Username</label>
																		<input type="text" value="{{$user->admin_username}}" class="form-control" id="username" name="username" placeholder="Username" />
                                                                        <small id="usernameE" style="display:none;" class="text-danger">Don't Leave this field Empty</small>
																	</div>

																	
																</div>
																
															</div>
                                                        </form>
														</div>
                                               
													</div>
													<!-- Row end -->
												</div>
												<div class="tab-pane fade" id="changePass" role="tabpanel">
													<div class="card-body">
														<!-- Row start -->
														<div class="row gx-2">
															<div class="col-sm-12 col-12">
                                                                <form method="POST" id="changePassword">
                                                                    @csrf
																	<input type="hidden" name="user_id" value="{{session('admin_id')}}">
                                                                <div class="row gx-2">
                                                                    <div class="col-4">
                                                                        <!-- Form Field Start -->
                                                                        <div class="mb-3">
                                                                            <label for="currentPass" class="form-label">Current Password</label>
                                                                            <input type="password" class="form-control" id="currentPass" name="currentPass" placeholder="Current Password" />
                                                                            <small id="currentPassE" style="display:none" class="text-danger">Don't Leave this field Empty</small>
                                                                        </div>
    
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <!-- Form Field Start -->
                                                                        <div class="mb-3">
                                                                            <label for="newPass" class="form-label">New Password</label>
                                                                            <input type="password" class="form-control" id="newPass" name="newPass" placeholder="New Password" />
                                                                            <small id="newPassE" style="display:none" class="text-danger">Don't Leave this field Empty</small>
                                                                        </div>
    
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <!-- Form Field Start -->
                                                                        <div class="mb-3">
                                                                            <label for="confirmPass" class="form-label">Confirm Password</label>
                                                                            <input type="password" class="form-control" id="confirmPass" name="confirmPass" placeholder="Confirm Password" />
                                                                            <small id="confirmPassE" style="display:none;" class="text-danger">Don't Leave this field Empty</small>
                                                                        </div>
    
                                                                        
                                                                    </div>
                                                                    
                                                                </div>
                                                            </form>
															</div>
														
														</div>
														<!-- Row end -->
													</div>
												</div>
												<div class="tab-pane fade" id="updatePic" role="tabpanel">
													<!-- Row start -->
													<div class="row">
														<div class="col-12">
															<div class="w-100 d-flex flex-column justify-content-center align-items-center">
                                                                <img id="profilePic" src="{{$user->admin_pic === 'none' ? asset('admin/placeholder.jfif') : asset('admin/'. $user->admin_pic)}}" class="w-sm-50 w-25 rounded-circle" alt="">
                                                                <div class="mt-2">
                                                                    <label for="formFile" class="form-label">Default file input example</label>
                                                                   <form method="POST" id="uploadProfilePic" enctype="multipart/form-data">
																	@csrf
																	<input type="hidden" name="user_id" value="{{session('admin_id')}}">
																	<input accept="image/*" class="form-control" type="file" name="profilePic" id="formFile" />
																   </form>
                                                                </div>
                                                            </div>
														</div>
													</div>
													<!-- Row end -->
												</div>
											</div>
											<div class="d-flex gap-2 justify-content-end">
												<button type="button" class="btn btn-light">
													Cancel
												</button>
												<button type="button" id="generalUpdate" onclick="Admin.UserProfile.UpdateGeneral('{{route('updateGeneral')}}')" class="btn btn-success">
													Update
												</button>
                                                <button type="button" style="display: none" id="changePassUpdate"onclick="Admin.UserProfile.UpdatePassword('{{route('updatePassword')}}')" class="btn btn-success">
													Change Password
												</button>
                                                <button type="button" style="display: none" id="uploadPicUpdate"onclick="Admin.UserProfile.UpdatePic('{{route('updatePic')}}')"class="btn btn-success">
													Upload Pic
												</button>
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
	
	</body>

</html>