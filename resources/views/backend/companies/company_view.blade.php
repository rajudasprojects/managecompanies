@extends('admin.admin_master')
@section('admin')



	  <div class="container-full">
	

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			

			<div class="col-8">
			
			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Companies <span class="badge badge-pill badge-danger">{{ count($companies) }}</span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Logo</th>
								<th>Web Site</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($companies as $item)
							<tr>
								<td>{{ $item->name }}</td>
								<td>{{ $item->email }}</td>
								<td>
									<img src="{{ asset($item->logo) }}" style="width: 70px; height: 40px;">
								</td>
								<td>{{ $item->website }}</td>
								<td>
									<a href="{{ route('company.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i></a>
									<a href="{{ route('company.delete',$item->id) }}" class="btn btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
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
		  <!-- ----------------Add company-------------------- -->

		  <div class="col-4">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Add Company</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <form action="{{ route('company-add') }}" method="post" enctype="multipart/form-data" >
						@csrf
							
							<div class="form-group">
								<h5>Company Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="name" class="form-control" > 

								@error('name')    
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
								<h5>Company Logo<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="file" name="logo" class="form-control"> 
									@error('logo')    
					                <span class="text-danger" role="alert">
					                    <strong>{{$message}}</strong>
					                </span>
					            @enderror
								</div>
								
							</div>

							<div class="form-group">
								<h5>Web Site<span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="website" class="form-control"> 
									@error('website')    
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
			<!-- ----------------Add company-------------------- -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>



@endsection