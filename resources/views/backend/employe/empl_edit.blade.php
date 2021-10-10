@extends('admin.admin_master')
@section('admin')



	  <div class="container-full">
	

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			
		  <!-- ----------------Edit emp-------------------- -->

		  <div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Employee</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <form action="{{ route('employee-update') }}" method="post" >
						@csrf

							<input type="hidden" name="id" value="{{ $emps->id }}">

							<div class="form-group">
								<h5>First Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="fname" class="form-control" value="{{ $emps->fname }}"> 

								@error('fname')    
					                <span class="text-danger" role="alert">
					                    <strong>{{$message}}</strong>
					                </span>
					            @enderror
								</div>
							</div>

							<div class="form-group">
								<h5>Last Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="lname" class="form-control" value="{{ $emps->lname }}" > 

								@error('lname')    
					                <span class="text-danger" role="alert">
					                    <strong>{{$message}}</strong>
					                </span>
					            @enderror
								</div>
							</div>
							

							<div class="form-group">
								<h5>Phone <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="phone" class="form-control" maxlength="10" value="{{ $emps->phone }}"> 

								@error('phone')    
					                <span class="text-danger" role="alert">
					                    <strong>{{$message}}</strong>
					                </span>
					            @enderror
								</div>
							</div>

						
							<div class="form-group">
								<h5>Email<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="email" name="email" class="form-control" value="{{ $emps->email }}"> 
									@error('email')    
						                <span class="text-danger" role="alert">
						                    <strong>{{$message}}</strong>
						                </span>
						            @enderror
								</div>
								
							</div>
						

							<div class="form-group">
								<h5>Company name <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="id" class="form-control" >
										<option disabled="" selected="">Select Company</option>
										@foreach($companies as $company)
										<option value="{{ $company->id }}" {{ $company->id == $emps->company_id ?'selected':'' }}>{{$company->name}}</option>
										@endforeach
									</select>
									@error('id')    
						                <span class="text-danger" role="alert">
						                    <strong>{{$message}}</strong>
						                </span>
						            @enderror
								</div>
							</div>
					
							<div class="text-xs-right">
								<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
							</div>
					</form>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
			        
			</div>
			<!-- /.col -->
			<!-- ----------------Edit emp-------------------- -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>



@endsection