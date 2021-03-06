@extends('layouts.master')
@section('content')

	<main class="app-content">
		<div class="row">
			<div class="col-md-12 col-xl-12">
				<h1 style="font-size: 20px">Edit Tour
				<a href="{{ URL::previous() }}" class="btn btn-sm btn-primary pull-right" style="font-size:13px"  style="{background-color: #e7e7e7; color: black;}" >Go Back</a></h1>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-xl-12">
				<div class="card shadow-xs">
					<div class="card-body">
						<form action="{{route('tours.update', ['id'=>$tour->id])}}" method="post">
							@csrf
							@method('PATCH')
							<div class="row ">
								<div class="col-md-12 col-xl-12">
									<div class="card shadow-xs">
										<div class="card-body">
											<form action="{{route('tours.store')}}" method="post">
												@csrf
												<div class="row form-group">
													<div class="col-md-6 col-lg-6 col-xl-6 mt-2">
														<label for="name"><b>Employee name <span class="text-danger">*</span></b> </label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="fa fa-user"></i>	
																</span>
															</div>
															<input type="text" name="name" class="form-control" value="{{$logged_emp->emp_name}}" readonly>
															<input type="hidden" name="emp_id" class="form-control" value="{{$logged_emp->emp_id}}" readonly>
														</div>
														@error('name')
					                    <span class="text-danger" role="alert">
					                        <strong>{{ $message }}</strong>
					                    </span>
					                	@enderror
													</div>
													<div class="col-md-6 col-lg-6 col-xl-6 mt-2">
														<label for="name"><b>Purpose <span class="text-danger">*</span></b> </label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="fa fa-id-card-o"></i>	
																</span>
															</div>
															<input type="text" name="purpose" class="form-control" value="{{old('purpose')}}">
														</div>
														@error('purpose')
					                    <span class="text-danger" role="alert">
					                        <strong>{{ $message }}</strong>
					                    </span>
					                	@enderror
													</div>
													<div class="col-md-6 col-lg-6 col-xl-6 mt-2">
														<label for="name"><b>Company<span class="text-danger">*</span></b> </label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="fa fa-building-o"></i>	
																</span>
															</div>
															<select name="company" id="" class="form-control">
																<option value="">Select Company</option>
																@foreach($companies as $company)
																<option value="{{$company->comp_code}}" {{old('company') == $company->comp_code ? 'selected' : ''}}>{{$company->comp_name}}</option>
																@endforeach
															</select>
														</div>
														@error('company')
					                    <span class="text-danger" role="alert">
					                        <strong>{{ $message }}</strong>
					                    </span>
					                	@enderror
													</div>
													<div class="col-md-6 col-lg-6 col-xl-6 mt-2">
														<label for="start_loc"><b>Start Location<span class="text-danger">*</span></b> </label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="fa fa-location-arrow"></i>	
																</span>
															</div>
															<input type="text" name="start_loc" class="form-control" value="{{old('start_loc')}}">
														</div>
														@error('start_loc')
					                    <span class="text-danger" role="alert">
					                        <strong>{{ $message }}</strong>
					                    </span>
					                	@enderror
													</div>
													<div class="col-md-6 col-lg-6 col-xl-6 mt-2">
														<label for="start_loc"><b>End Location<span class="text-danger">*</span></b> </label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="fa fa-map-signs"></i>	
																</span>
															</div>
															<input type="text" name="end_loc" class="form-control" value="{{old('end_loc')}}">
														</div>
														@error('end_loc')
					                    <span class="text-danger" role="alert">
					                        <strong>{{ $message }}</strong>
					                    </span>
					                	@enderror
													</div>
													<div class="col-md-6 col-lg-6 col-xl-6 mt-2">
														<label for="start_loc"><b>Advance Amount<span class="text-danger">*</span></b> </label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="fa fa-inr"></i>	
																</span>
															</div>
															<input type="text" name="advance_amount" class="form-control advance_amount"  value="{{old('advance_amount')}}">
														</div>
														@error('advance_amount')
					                    <span class="text-danger" role="alert">
					                        <strong>{{ $message }}</strong>
					                    </span>
					                	@enderror
													</div>
													<div class="col-md-6 col-lg-6 col-xl-6 mt-2">
														<label for="name"><b>Note <span class="text-danger">*</span></b> </label>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text">
																	<i class="fa fa-asterisk"></i>	
																</span>
															</div>
															<textarea class="form-control" name="note" id="" cols="30" rows="5">{{old('note')}}</textarea>
														</div>
														@error('note')
					                    <span class="text-danger" role="alert">
					                        <strong>{{ $message }}</strong>
					                    </span>
					                	@enderror
													</div>
													<div class="col-md-12 mt-3">
														<button class="btn btn-md btn-success" type="submit"><span class="fa fa-save"></span> Submit</button>
														<span class="ml-2" ><a href="{{route('tours.index')}}" class="btn btn-md btn-default" style="background-color: #f4f4f4;color: #444;    border-color: #ddd;"><span class="fa fa-times-circle"></span> Cancel</a></span>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12 mt-3">
								<input type="hidden" name="grp_code" value="1">
								<button class="btn btn-md btn-success" type="submit"><span class="fa fa-save"></span> Submit</button>
								<span class="ml-2" ><a href="{{route('designations.index')}}" class="btn btn-md btn-default" style="background-color: #f4f4f4;color: #444;    border-color: #ddd;"><span class="fa fa-times-circle"></span> Cancel</a></span>
							</div>
						</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection