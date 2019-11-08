@extends('layouts.master')
@section('content')
	<main class="app-content">
		<div class="row">
			<div class="col-md-12 col-xl-12">
				<h1 style="font-size: 24px">Leaves Request
			</div>
		</div>
		@if($message = Session::get('success'))
			<div class="alert alert-success">
				{{$message}}
			</div>
		@endif 
		<div class="row ">
			<div class="col-md-12 col-xl-12">
				<div class="card">
					<div class="card-body table-responsive">
						<table class="table table-stripped table-bordered">
							<thead>
								<tr>
									<th>####</th>
									<th>Employee</th>
									<th>Leave</th>
									<th>Details</th>
									<th>Leave starts</th>
									<th>Leave ends</th>
									<th>Duration</th>
									<th>Status</th>
									<th style="text-align: center;">Actions</th>
								</tr>
							</thead>
							<tbody>
							@foreach($leave_request as $request) 
								<tr>
									<td>{{$request->id}}</td>
									<td>{{$request->emp_name}}</td>
									<td>{{$request->name}}</td>
									<td>
									<button class="btn btn-sm btn-info modalReq" data-id="{{$request->id}}"><i class="fa fa-eye" style="font-size: 12px;"></i>
									</button></td>
									<div class="modal fade" id="reqModal" role="dialog">
									     <div class="modal-dialog modal-lg" >
									    	<div class="modal-content" style="width:1250px;margin: auto;right: 27%;">
									        	<div class="modal-header">
									        		<h4 class="modal-title">Request Detail</h4>
									        	</div>
									        	<div class="modal-body table-responsive" id="detailTable">
									        	</div>
									        	 <div class="modal-footer">
									          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
									        </div>
									        </div>
									    </div>
									</div>
									<td>{{$request->from}}</td>
									<td>{{$request->to}}</td>
									<td>{{$request->count}}</td>
									<td>{{$request->action_name}}</td>
										<td class='d-flex' style="border-bottom:none">
										@foreach($actions as $action)
										@if($action->name != 'Pending')
												<span class="ml-2">
												<a href="{{route('leave.details', ['leave_id' => $request->id, 'approver_id' => Auth::id(), 'action' => $action->id])}}" class="btn btn-sm btn-success">{{$action->name}}</a>
												</span>
										@endif
										@endforeach
										</td>
								</tr>
							 @endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</main>
<script>
	$(document).ready(function(){

		$('.modalReq').on('click', function(e){
			e.preventDefault();
			var leave_id = $(this).data('id');
			$.ajax({
				type: 'GET',
				url: "{{route('request.detail')}}?leave_id="+leave_id,
				success:function(res){
					$('#detailTable').empty().html(res);
					$('#reqModal').modal('show');
				}
			})
		})
	});
</script>

@endsection