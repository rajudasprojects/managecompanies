@extends('admin.admin_master')
@section('admin')



	  <div class="container-full">
	

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			

			<div class="col-8">
			
			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Employies List <span class="badge badge-pill badge-danger">{{ count($emps) }}</span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Employee Name</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Company</th>
								<th width="30%">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($emps as $item)
							<tr>
								<td>{{ $item->fname }} {{ $item->lname }}</td>
								<td>{{ $item->phone }}</td>
								<td>{{ $item->email }}</td>
								<td>{{ $item->company_id }}</td>
								<td>
									<a href="{{ route('employee.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
									<a href="{{ route('employee.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
						
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->
		  </div>
		  <!-- ----------------Add emp-------------------- -->

		  <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Employee</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <form action="{{ route('employee-add') }}" method="post" >
						@csrf
							
							<div class="form-group">
								<h5>First Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="fname" class="form-control" > 

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
									<input type="text" name="lname" class="form-control" > 

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
									<input type="text" name="phone" class="form-control" maxlength="10"> 

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
									<input type="email" name="email" class="form-control"> 
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
										<option value="{{ $company->id }}">{{$company->name}}</option>
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
			<!-- ----------------Add emp-------------------- -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>



@endsection