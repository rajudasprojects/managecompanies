@extends('admin.admin_master')
@section('admin')



	  <div class="container-full">
	

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			

			
		  <!-- ----------------Edit company-------------------- -->

		  <div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Edit Company</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <form action="{{ route('company-update',$com_data->id ) }}" method="post" enctype="multipart/form-data" >
						@csrf

							<input type="hidden" name="id" value="{{ $com_data->id }}">
							<input type="hidden" name="old_image" value="{{ $com_data->logo }}">
							
							<div class="form-group">
								<h5>Company Name <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="name" class="form-control" value="{{ $com_data->name }}" > 

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
									<input type="email" name="email" class="form-control" value="{{ $com_data->email }}"> 
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
									<input type="text" name="website" class="form-control" value="{{ $com_data->website }}"> 
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
			<!-- ----------------Edit company-------------------- -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>



@endsection