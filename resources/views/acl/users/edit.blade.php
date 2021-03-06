@extends('layouts.master')
@push('styles')
  <script src="{{asset('themes/vali/js/plugins/bootstrap-datepicker.min.js')}}"></script>
@endpush
@section('content')
<main class="app-content">
	<div class="row">
		<div class="col-md-12 col-xl-12">
			<h1 style="font-size: 24px">Edit Role
              <a href="{{ URL::previous() }}" class="btn btn-sm btn-primary pull-right"  style="{background-color: #e7e7e7; color: black;}" >Go Back</a>
				
				<button class="btn btn-sm btn-info ml-2 employee">
                  <i class="fa fa-eye" style="font-size: 12px">&nbsp Add as Employee</i>
                </button>
			</h1>
		</div>
	</div>
	<div style="margin-top: 1.5rem; padding: 1.5rem; border: 1px solid grey;">
		@if($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
				{{$message}}
			</div>
		@endif
		<div><h5>UPDATE USER NAME HERE</h5></div><hr>
		<form action="{{route('users.update', $user->id)}}" method="POST" enctype="multipart/form-data">
			@csrf
			@method('PATCH')
			<div class="row">
				<div class="col-12" style="text-align: center;">
					<input type="text" name="name" value="{{old('name', $user->name)}}" style="width:50%;">
					@error('name')
					<small class="form-text text-muted " role="alert" id="emailHelp">	
						<strong style="color: red;">* {{ $message }}</strong>
					</small>			          
			      	@enderror
				</div>			
			</div>
			<br>
			<div><h5>SET ROLES FOR USER</h5></div><hr>
			<div class="toggle lg row col-12">
			@foreach($roles as $data)
				<div class="col-3 form-check form-check-inline mr-0">
					<label>
	                	<input type="checkbox" name="roles[]" value="{{$data->name}}" {{ in_array($data->id, $roles_given) ? 'checked' : ''}}><span class="button-indecator">{{ucwords($data->name)}}</span>
					</label>
				</div>
			@endforeach
			</div>
			<br>
			<div><h5>SET PERMISSIONS FOR USER</h5></div><hr>
			<div class="toggle lg row col-12">
			@foreach($permissions as $data)
				<div class="col-3 form-check form-check-inline mr-0">
					<label>
						<input type="checkbox" name="perms[]" value="{{$data->name}}" {{ in_array($data->id, $permissions_given) ? 'checked' : ''}}><span class="button-indecator">{{ucwords($data->name)}}</span>
					</label>
				</div>
			@endforeach
			</div>
			<br>
    		<div class="col-12 form-group" align="center">
				<button class="btn btn-info btn-sm m-2" style="width: 40%">Save</button>
			</div>
		</form>
	</div>
</main>
<script>
$(document).ready(function(){
	$('.employee').on('click', function(e){
		$.ajax({
            type: 'GET',
			url: '{{ route("assign.user", $user->id)}}',
			success:function(data){

			}
		})
	});
});
</script>
@endsection
