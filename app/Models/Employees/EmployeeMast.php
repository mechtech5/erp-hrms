<?php

namespace App\Models\Employees;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeMast extends Model
{
	use SoftDeletes;
  protected $table = 'emp_mast';  

	public function company(){
 		return $this->belongsTo('App\Models\Master\CompMast','comp_id');
 	}

 	// public function tours(){
 	// 	return $this->hasMany('App\Models\Tours','emp_id');
 	// }

 	public function designation(){
 		return $this->belongsTo('App\Models\Master\Designation', 'desg_id');
 	}

 	public function grade(){
 		return $this->belongsTo('App\Models\Master\Grade','desg_id');
 	}

 	public function dobFormated($value)
  {
     return date("d-m-Y", strtotime($value));
  }
 	// public function user(){
 	// 	return $this->hasOne('App\User','id');
 	// }

 	// public function stages(){
 	// 	return $this->hasMany('App\Models\TourStages','emp_id');
 	// }
}