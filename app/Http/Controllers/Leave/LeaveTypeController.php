<?php

namespace App\Http\Controllers\Leave;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Master\LeaveMast;

class LeaveTypeController extends Controller
{
    public function index(){

    	$leaves = LeaveMast::all();

    	return view('leave.type.index', compact('leaves'));

    }

    public function create(){

    	return view('leave.type.create');

    }

    public function store(Request $request){



    	$carry = $request->carry;

    	if(empty($request->carry)){
    		$carry = 0;
    	}

    	$leaves = new LeaveMast;

    	$leaves->name 				= 	$request->leave_name;
    	$leaves->count 				=	$request->total_leaves;
    	$leaves->generates_in		=	$request->generate_after;
    	$leaves->max_apply_once		=	$request->max_apply_once;
    	$leaves->min_apply_once		=	$request->min_apply_once;
    	$leaves->max_days_month		=	$request->max_days_inmonth;
    	$leaves->max_apply_month	=	$request->max_apply_month;
    	$leaves->max_apply_year		=	$request->max_apply_year;
    	$leaves->carry_forward		=	$carry;
    	$leaves->save();

    	return redirect()->route('types.index')->with('success', 'Updated record successfully.');
    }

    public function show( $id){
    	
    	$leave_type = LeaveMast::find($id);
    	return view('leave.type.show', compact('leave_type'));
    }

    public function edit($id ){

    	$leave_type = LeaveMast::findOrFail($id);

    	return view('leave.type.edit', compact('leave_type'));

    }

    public function update(){
    	return back()->with('success', 'Updated successfully.');
    }

    public function destroy($id){

    	$leave_type = LeaveMast::findOrFail($id);
    	$leave_type->delete();

    	return back()->with('success', 'Deleted successfully.');

    }


}
