@extends('layouts.master')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
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

	<div class="page-title">
		<h3>Subject | Categories</h3>
	</div>
	<div class="row">
		<!-- Bootstrap subject Start -->
		<div class="col-md-8 col-sm-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Add Subject</h4>
				</div>
				<div class="card-content">
					<div class="card-body">
						<form method = "post" action="/addsubject" >
							<div class="form-group">
								<label for="subjectTitle">Subject Title</label>
								<input type="text" class="form-control" name="title" placeholder="Title">
							</div>

							<div class="form-group">
								<label>Select Exam Category</label>
								<select class="choices form-select multiple-remove" multiple="multiple" name="categories[]">
									@foreach ($categories as $item)
									<option value={{$item->title}}>{{$item->title}}</option>
									@endforeach
								</select>
							</div>
							{{ @csrf_field() }}
							<button type="submit" class="btn btn-primary mb-2">Add Subject</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Bootstrap subject End -->
		<!-- Bootstrap exam categories Start -->
		<div class="col-md-4 col-sm-12 mb-30">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Add Category</h4>
				</div>
				<div class="card-content">
					<div class="card-body">
						<form method = "post" action="/addcategory" >
							<div class="form-group">
								<label for="examTitle">Exam Title</label>
								<input type="text" class="form-control" name="title" placeholder="Title">
							</div>

							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<button type="submit" class="btn btn-primary mb-2">Add Category</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		{{-- start second row for tables  --}}
		<div class="row">
			<div class="col-md-8 col-sm-12">

				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Subjects</h4>
					</div>
					<div class="card-body">
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
										<a class="btn icon btn-primary" href="#" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>
										<a class="btn icon icon-left btn-danger" href="/deletesubject/{{ $item->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg> Delete</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Categories</h4>
					</div>
					<div class="card-body">
						<table class='table' id="table1">
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
										<a class="btn icon icon-left btn-danger" href="/deleteCategory/{{ $item->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	
@endsection