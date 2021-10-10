<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;

class EmpController extends Controller
{
    public function ViewEmploye(){

    	$companies = Company::orderBy('name','ASC')->get();
    	$emps = Employee::latest()->get();
    	return view('backend.employe.employ_view',compact('emps','companies'));
    }


    public function AddEmploye(Request $request){

    	$request->validate([
    		'fname' => 'required',
    		'lname' => 'required',
    		
    		//'website' => 'required',
    	],[
    		
    		'logo.required' => 'The name feild is required.',
    	]);

    	Employee::insert([

    		'fname' =>$request->fname,
    		'lname' =>$request->lname,
    		'phone' =>$request->phone,
    		'email' =>$request->email,
    		'company_id' =>$request->id,

    	]);

		$notification = array(
    		'message' => 'Employee Created successfuly.',
    		'alert-type' => 'success'
    	);

    	return redirect()->back()->with($notification);
    	

    }


    public function EditEmploye($id){
    	$companies = Company::orderBy('name','ASC')->get();
    	$emps = Employee::findOrFail($id);
    	return view('backend.employe.empl_edit',compact('emps','companies'));
    }



    public function UpdateEmploye(Request $request){

    	$emp_id = $request->id;

    	Employee::findOrFail($emp_id)->update([

	    	'fname' =>$request->fname,
    		'lname' =>$request->lname,
    		'phone' =>$request->phone,
    		'email' =>$request->email,
    		'company_id' =>$request->id,

	    	]);

    		$notification = array(
	    		'message' => 'Employee Updated successfuly.',
	    		'alert-type' => 'success'
	    	);

	    	return redirect()->route('employies-view')->with($notification);

    }


    public function DeleteEmploye($id){

    	Employee::findOrFail($id)->delete();

    		$notification = array(
	    		'message' => 'Employee Deleted successfuly..',
	    		'alert-type' => 'error'
	    	);

	    	return redirect()->back()->with($notification);

    	

    }

















}
