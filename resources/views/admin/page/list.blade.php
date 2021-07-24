@extends('admin/layout.layout')

@section('page_title','Page Listing')

@section('container')

<div class="">
	  <div class="page-title">
		 <div class="title_left">
			<h4>Post</h4>
			<h2><a href="/admin/page/add">Add Page</a></h2>
		 </div>
	  </div>
	  <div class="clearfix"></div>
	  <div class="row">
		 <div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
			   <div class="x_content">
				  <div class="row">
					 <div class="col-sm-12">
						 <div class="col-sm-12" style="color:red;text-align:center;font-size:24px;">{{session('msg')}}</div>
						<div class="card-box table-responsive">
						   <table id="datatable" class="table table-striped table-bordered" style="width:100%">
							  <thead>
								 <tr>
									<th width='2%'>ID</th>
									<th width='25%'>Name</th>
									<th width='30%'>Slug</th>
									<th width='48%'>Action</th>
								 </tr>
							  </thead>
							  <tbody>
							  @foreach($result as $list)
								 <tr>
									<td>{{$list->id}}</td>
									<td>{{$list->name}}</td>
									<td>{{$list->slug}}</td>
									<td>
									<a class="btn btn-info color_white" style="color:white;" href="{{url('admin/page/edit/'.$list->id)}}">Edit</a>
									<a class="btn btn-danger color_white" style="color:white;" href="{{url('admin/page/delete/'.$list->id)}}">Delete</a>
									</td>
								 </tr>
								 @endforeach
							  </tbody>
						   </table>
						</div>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>
	  </div>
   </div>
@endsection