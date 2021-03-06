<div class="row card-body text-center">
	<div class="col-6" style="border: 1px solid black;border-radius: 6px;">
		<h4>Leave Name</h4>
		<div>{{$leave_type->name}}</div>
	</div>
	<div class="col-6" style="border: 1px solid black;border-radius: 6px;">
		<h4>Total Leaves</h4>
		<div>{{$leave_type->count}}</div>
	</div>
</div>
<div class="row card-body text-center">
	<div class="col-6" style="border: 1px solid black;border-radius: 6px;">
		<h4>Generates After</h4>
		<div>{{$leave_type->generates_in}}</div>
	</div>
	<div class="col-6" style="border: 1px solid black;border-radius: 6px;">
		<h4>Can be applied min once</h4>
		<div>{{$leave_type->min_apply_once}}</div>
	</div>
</div>
<div class="row card-body text-center">
	<div class="col-6" style="border: 1px solid black;border-radius: 6px;">
		<h4>Can be applied max once</h4>
		<div>{{$leave_type->max_apply_once}}</div>
	</div>
	<div class="col-6" style="border: 1px solid black;border-radius: 6px;">
		<h4>Max days in month</h4>
		<div>{{$leave_type->max_days_month}}</div>
	</div>
</div>
<div class="row card-body text-center">
	<div class="col-6" style="border: 1px solid black;border-radius: 6px;">
		<h4>Can be applied max in month</h4>
		<div>{{$leave_type->max_apply_month}}</div>
	</div>
	<div class="col-6" style="border: 1px solid black;border-radius: 6px;">
		<h4>Can be applied max in year</h4>
		<div>{{$leave_type->max_apply_month}}</div>
	</div>
</div>