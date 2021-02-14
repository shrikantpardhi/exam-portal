@extends('layouts.master')

@section('content')


@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

@if(session()->has('success'))
	<div class="alert alert-success">
		{{ session()->get('success') }}
	</div>
@endif
<br />	

	<div class="row">
		<!-- Bootstrap subject Start -->
		<div class="col-md-8 col-sm-12 mb-30">
			<div class="pd-20 card-box height-100-p">
				<div class="clearfix mb-30">
					<div class="pull-left">
						<h4 class="text-blue h4">Subject Details</h4>
					</div>
				</div>
				<form method = "post" action="/addsubject" >
					<div class="form-group">
						<label for="subjectTitle">Subject Title</label>
						<input type="text" class="form-control" name="title" placeholder="Title">
					</div>
					<div class="form-group">
						<label>Select Exam Category</label>
						<select class="custom-select2 form-control" multiple="multiple" name="categories[]" style="width: 100%;">
							@foreach ($categories as $item)
							<option value={{$item->title}}>{{$item->title}}</option>
							@endforeach
						</select>
					</div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" class="btn btn-primary mb-2">Add Subject</button>
				</form>
				<hr>
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Subjects</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Title</th>
									<th class="table-plus datatable-nosort">Exam Tags</th>
									<th class="datatable-nosort" style="text-align:right;">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($subjects as $item)
								<tr id = {{$item->id}}>
									<td class="table-plus">{{$item->title}}</td>
									<td class="table-plus">{{$item->categories}}</td>
									<td style="float: right;">
										<a class="btn btn-outline-primary" href="#" ><i class="dw dw-edit2"></i></a>
										<a class="btn btn-outline-danger" href="/deletesubject/{{ $item->id }}"><i class="dw dw-delete-3"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- Bootstrap subject End -->
		<!-- Bootstrap exam categories Start -->
		<div class="col-md-4 col-sm-12 mb-30">
			<div class="pd-20 card-box height-100-p">
				<div class="clearfix mb-30">
					<div class="pull-left">
						<h4 class="text-blue h4">Exam Categories</h4>
					</div>
				</div>
				<form method = "post" action="/addcategory" >
					<div class="form-group">
						<label for="examTitle">Exam Title</label>
						<input type="text" class="form-control" name="title" placeholder="Title">
					</div>

					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" class="btn btn-primary mb-2">Add Category</button>
				</form>
				<br>
				<br>
				<br>
				<br>
				<hr>
				<div class="card-box mb-30">
					<div class="pd-20">
						<h4 class="text-blue h4">Categories</h4>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr>
									<th class="table-plus datatable-nosort">Title</th>
									<th class="datatable-nosort" style="text-align:right;">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($categories as $item)
								<tr id = {{$item->id}}>
									<td class="table-plus">{{$item->title}}</td>
									<td style="float: right;">
										<a class="btn btn-outline-primary" href="#" ><i class="dw dw-edit2"></i></a>
										<a class="btn btn-outline-danger" href="/deleteCategory/{{ $item->id }}"><i class="dw dw-delete-3"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- Bootstrap Exam categories End -->
	</div>
	
@endsection