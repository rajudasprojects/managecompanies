<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function ViewCompany(){
    	$companies = Company::latest()->get();
    	return view('backend.companies.company_view',compact('companies'));
    }


    public function AddCompany(Request $request){

    	$request->validate([
    		'name' => 'required',
    		//'email' => 'required',
    		'logo' => 'required|mimes:jpeg,png,jpg|dimensions:min_width=100,min_height=100',
    		//'website' => 'required',
    	],[
    		
    		'logo.required' => 'The file has invalid image dimensions min(100x100)',
    	]);

    	$image = $request->file('logo');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	$image->move(public_path().'/upload/', $name_gen); 
    	$save_url = 'upload/'.$name_gen;


    	Company::insert([

    		'name' =>$request->name,
    		'email' =>$request->email,
    		'logo' => $save_url,
    		'website' => $request->website,

    	]);

    	$notification = array(
    		'message' => 'Company Inserted successfuly.',
    		'alert-type' => 'info'
    	);

    	return redirect()->back()->with($notification);

    	

    }


    public function EditCompany($id){
    	$com_data = Company::findOrFail($id);
    	return view('backend.companies.company_edit',compact('com_data'));
    }


    public function UpdateCompany(Request $request){
    	$com_id = $request->id;
    	$old_image = $request->old_image;

    	if($request->file('logo')){

    		unlink($old_image);

    		$image = $request->file('logo');
	    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
	    	$image->move(public_path().'/upload/', $name_gen); 
	    	$save_url = 'upload/'.$name_gen;


	    	Company::findOrFail($com_id)->update([

	    		'name' =>$request->name,
	    		'email' =>$request->email,
	    		'logo' => $save_url,
	    		'website' => $request->website,

	    	]);

	    	$notification = array(
	    		'message' => 'Company Updated successfuly.',
	    		'alert-type' => 'success'
	    	);

	    	return redirect()->route('company-view')->with($notification);

    	}else{
    		Company::findOrFail($com_id)->update([

	    		'name' =>$request->name,
	    		'email' =>$request->email,
	    		'website' => $request->website,

	    	]);

    		$notification = array(
	    		'message' => 'Company Updated successfuly.',
	    		'alert-type' => 'success'
	    	);

	    	return redirect()->route('company-view')->with($notification);
    	}


    }//End update com


    public function DeleteCompany($id){

    	$company = Company::findOrFail($id);
    	$img = $company->logo;
    	unlink($img);

    	Company::findOrFail($id)->delete();

    	$notification = array(
	    		'message' => 'Company Deleted successfuly..',
	    		'alert-type' => 'error'
	    	);

	    	return redirect()->back()->with($notification);

    	

    }




}
