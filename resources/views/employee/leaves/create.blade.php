@extends('layouts.master')
@push('styles')
  <script src="{{asset('themes/vali/js/plugins/bootstrap-datepicker.min.js')}}"></script>
@endpush
@section('content')
<main class="app-content">
	<div class="row">
			<div class="col-md-12 col-xl-12">
				<h1 style="font-size: 24px">Leave Application
				<a href="{{ URL::previous() }}" class="btn btn-sm btn-primary pull-right" style="font-size:13px"  style="{background-color: #e7e7e7; color: black;}" >Go Back</a></h1></h1>
			</div>
		</div>
	<div style="margin-top: 1.5rem; padding: 1.5rem; border: 1px solid grey;">
		@if($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
				{{$message}}
			</div>
		@endif 
			<form action="{{url('employee/leaves')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-6 form-group">
							<label for="leave_type">Leave</label>
							<select name="leave_type_id" id="leave_type" class="custom-select">
								<option value="">Select</option>
								@foreach($leave_type as $leave_type)
								<option value="{{$leave_type->id}}">{{$leave_type->name}}</option>
								@endforeach
							</select>
							@error('leave_type_id')
							<span class="text-danger" role="alert">
								<strong>* {{ $message }}</strong>
							</span>
							@enderror
						</div>
						<div class="col-6 form-group">
						<label for="team_lead">Team Lead</label>
						<input type="text" id="team_lead" class="form-control" name="team_lead"	value="{{!empty($team_lead) ? $team_lead->emp_name : null}}" disabled>
						<input type="hidden" name="team_lead_id" value="{{!empty($team_lead) ?$team_lead->id : null}}">
						@error('team_lead_id')
				          <span class="text-danger" role="alert">
				            <strong>* {{ $message }}</strong>
				          </span>
				      	@enderror
					</div>
		    	</div>
		    	<div class="row"   style="padding-top: 1%">
					<div class="col-1 form-group">
						<button type="button" id="multi" class="btn btn-primary active">Multiple</button>
					</div>
					<div class="col-1 form-group">
							<button type="button" id="full" class="btn btn-primary " >Full Day</button>
					</div>
					<div class="col-1 form-group">
						<button type="button" id="half" class="btn btn-primary ">Half Day</button>
					</div>
		    	</div>
		    	<div class="row">
					<div class="col-4">
						<label for="start_date">Start Date</label>
						<input type="text" class="form-control datepicker start" name="start_date" autocomplete="off" id="start_date">
						@error('start_date')
				          <span class="text-danger" role="alert">
				            <strong>* {{ $message }}</strong>
				          </span>
				      	@enderror
				      	<input type="hidden" name="full_day" id="full_day">
				    </div>
					<div class="col-4 form-group">
						<span id="end_date"><label for="end_date">End Date</label>
						<input type="text" class="form-control datepicker end" name="end_date" autocomplete="off" id="end_date">
						@error('end_date')
				          <span class="text-danger" role="alert">
				            <strong>* {{ $message }}</strong>
				          </span>
				      	@enderror
				      	</span>
				      	<span id="checkday" style="display: none;">
					      	<label class="">
							    <input type="radio" name="half_day" value="1" autocomplete="off"> First Half
							</label>
							<label class="">
							    <input type="radio"  name="half_day" value="2" autocomplete="off"> Second Half
							</label>
						</span>
					</div>
					<div class="col-4 form-group">
						<label for="duration">Duration ( In days )</label>
						<input type="text" class="form-control duration" name="duration" id="duration" disabled="" value="">
						<input type="hidden" name="count" id="count">
						<span class="text-danger duration_alert" role="alert" style="display:none">
			    			<strong> &nbsp;&nbsp;&nbsp; You don't have adequate leaves left.</strong>
			    		</span>
			    		<div>
			    		<span class="text-danger rule_alert" role="alert" style="display:none">
			    			<strong> &nbsp;&nbsp;&nbsp; Your leaves falling into sandwich rule.</strong>
			    		</span>
			    		</div>
					</div>
		    	</div>
		    	<div class="row">
					<div class="col-7 form-group">
						<label for="reason">Reason</label>
						<textarea  class="form-control" id="reason" name="reason" value=""></textarea>
						@error('reason')
				          <span class="text-danger" role="alert">
				            <strong>* {{ $message }}</strong>
				          </span>
				      	@enderror
					</div>
					<div class="col-5 form-group">
						<label for="contact_no">Contact no</label>
						<input type="text" id="contact_no" class="form-control" name="contact_no"
						value="">
						@error('contact_no')
				          <span class="text-danger" role="alert">
				            <strong>* {{ $message }}</strong>
				          </span>
				      	@enderror
					</div>
					<div class="col-7 form-group">
						<label for="file_path">Upload Documents</label>
    					<input type="file" name="file_path" class="form-control-file" id="file_path" value="">
					</div>
					<div class="col-6 form-group">
						<label for="address_leave">Address During Leave</label>
						<textarea class="form-control" id="address_leave" name="address_leave"	value=""></textarea>
						@error('address_leave')
				          <span class="text-danger" role="alert">
				            <strong>* {{ $message }}</strong>
				          </span>
				      	@enderror
					</div>
					<div class="col-6 form-group">
						<label for="applicant_remark">Applicant's Remark</label>
						<textarea class="form-control" id="applicant_remark" name="applicant_remark" value=""></textarea>
						@error('applicant_remark')
				          <span class="text-danger" role="alert">
				            <strong>* {{ $message }}</strong>
				          </span>
				      	@enderror
					</div>
					<div class="col-12 form-group text-center">
						<button class="btn btn-info btn-sm m-2" style="width: 30%">Save</button>
						<a class="btn btn-danger btn-sm" type="submit" href="javascript:location.reload()" style="width: 30%">Clear</a>
					</div>
				</div>
			</form>
	</main>
	<script>
		$(document).ready(function(){
			
			$('.datepicker').datepicker({
				orientation: "bottom",
				format: "yyyy-mm-dd",
				autoclose: true,
				todayHighlight: true
			});

			//Hide full & half day bu
			$('#leave_type').on('change', function(){
				//var str = 'Privilege leave';
				//alert(str.includes('leave'));

				var value = $(this).children("option:selected").text();
				var leave = value.trim()

				if(leave.indexOf('Privilege') == false){
					$('#full, #half').attr('hidden', true);
				}else{
					$('#full, #half').removeAttr('hidden');
				}
			});

			$('#multi').on('click', function(e){
		    	e.preventDefault();
		    	$(this).addClass('active');
		    	$('#end_date').show();
		    	$('#half, #full').removeClass('active');
		    	$('#checkday').hide();

		    });

		    $(".end").on("change",function(){

				var leave_type 	= $('select').children("option:selected").val();
		        var start 		= $('.start').val();
		        var end 		= $('.end').val();
		        var id 			= "{{Auth::id()}}";
		        var day 		= $('#multi').attr('id');

		        $.ajax({
					type:'get',
					url: '/balance/',
					data:{'leave_type': leave_type, 'start_date':start,'end_date':end, 'id': id, 'day': day},
					success:function(data){
						 var data = JSON.parse(data);

						$('.duration').val(data.days+' days');
						$('#count').val(data.days);
						if(data.msg == 0 ){
							$(".duration_alert").hide();
						}else{
							$(".duration_alert").show();
							//$('button').removeAttr('disabled');
						}

						if(data.rule == 0){
							$(".rule_alert").hide();
						}else{
							$(".rule_alert").show();
							//$('button').removeAttr('disabled');
						}
					}
				});
		    });

		    $('#full').on('click', function(e){
		    	e.preventDefault();
		    	$(this).addClass('active');
		    	$('#half, #multi').removeClass('active');
		    	$('#checkday').hide();
		    	$('#end_date').hide();
		    	$('#full_day').val(1);

		    	$('#start_date').on('change', function(){
		    		var leave_type 	= $('select').children("option:selected").val();
			        var start 		= $('.start').val();
			        var end 		= $('.end').val();
			        var emp_id 		= "{{Auth::id()}}";
			        var day 		= 'full';

			        $.ajax({
					type:'get',
					url: '/balance/',
					data:{'leave_type': leave_type, 'start_date':start,'end_date':end, 'emp_id': emp_id, 'day': day },
					success:function(data){
						 var data = JSON.parse(data);

						$('.duration').val(data.days+' days');
						$('#count').val(data.days);

						if(data.rule == null){
							$(".duration_alert").hide();
						}

						if(data.msg == 0 ){
							$(".duration_alert").hide();
						}else{
							$(".duration_alert").show();
							$('button').removeAttr('disabled');
						}
					}
				});
		    	})


		    	
		    });

		    $('#half').on('click', function(e){
		    	e.preventDefault();
		    	$(this).addClass('active');
		    	$('#end_date').hide();
		    	$('#full, #multi').removeClass('active');
		    	$('#checkday').show();

		    	$('#start_date').on('change', function(){
		    		var leave_type 	= $('select').children("option:selected").val();
			        var start 		= $('.start').val();
			        var end 		= $('.end').val();
			        var emp_id 		= "{{Auth::id()}}";
			        var day 		= 'half';

			        $.ajax({
					type:'get',
					url: '/balance/',
					data:{'leave_type': leave_type, 'start_date':start,'end_date':end, 'emp_id': emp_id, 'day': day },
					success:function(data){
						 var data = JSON.parse(data);
						 //alert(data)

						$('.duration').val(data.days+' days');
						$('#count').val(data.days);
						if(data.msg == 0 ){
							$(".duration_alert").hide();
						}else{
							$(".duration_alert").show();
							$('button').removeAttr('disabled');
						}
					}
				});
		    	})


		    });
		    
		});

		

	</script>
@endsection
