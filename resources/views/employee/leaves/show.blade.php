<table class="table table-striped table-hover table-bordered">
	<thead class="thead-dark">
		<tr>
			<th>Type</th>
			<th>Leave Start</th>
			<th>Leave Ends</th>
			<th>Duration</th>
			<th>Status</th>
			<th>Reason</th>
			<th>Document</th>
			<th>Contact No</th>
			<th>Address</th>
			<th>Applicant's Remark</th>
		</tr>
	</thead>
	<tbody id="experiencesTbody">
		<tr>	
			<td>{{$leave_req['leavetype']->name}}</td>
			<td>{{$leave_req->from}}</td>
			<td>{{$leave_req->to}}</td>
			<td>{{$leave_req->count}}</td>
			<td>{{$leave_req['approvalaction']->name}}</td>
			<td>{{$leave_req->reason}}</td>
			@if($leave_req->file_path != null)
				<td><a href="{{route('request.document', [$leave_req->id])}}"><i class="fa fa-arrow-down"></i>Download</a></td>
			@endif
			<td>{{$leave_req->contact_no}}</td>
			<td>{{$leave_req->status}}</td>
			<td>{{$leave_req->applicant_remark}}</td>
		</tr>
	</tbody>
</table>