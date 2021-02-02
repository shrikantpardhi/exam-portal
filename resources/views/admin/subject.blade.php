@extends('layouts.master')

@section('content')

	<div class="row">
		<!-- Bootstrap subject Start -->
		<div class="col-md-6 col-sm-12 mb-30">
			<div class="pd-20 card-box height-100-p">
				<div class="clearfix mb-30">
					<div class="pull-left">
						<h4 class="text-blue h4">Subject Details</h4>
					</div>
				</div>
				<form >
					<div class="form-group">
						<label for="subjectTitle">Subject Title</label>
						<input type="text" class="form-control" placeholder="Title">
					</div>
					<div class="form-group">
						<label>Select Exam Category</label>
						<select class="custom-select2 form-control" multiple="multiple" style="width: 100%;">
							<option value="CA">California</option>
							<option value="NV">Nevada</option>
							<option value="OR">Oregon</option>
							<option value="WA">Washington</option>
						</select>
					</div>
					<button type="submit" class="btn btn-primary mb-2">Add Subject</button>
				</form>
			</div>
		</div>
		<!-- Bootstrap subject End -->
		<!-- Bootstrap exam categories Start -->
		<div class="col-md-6 col-sm-12 mb-30">
			<div class="pd-20 card-box height-100-p">
				<div class="clearfix mb-30">
					<div class="pull-left">
						<h4 class="text-blue h4">Exam Categories</h4>
					</div>
				</div>
				<form>
					<div class="form-group">
						<label for="examTitle">Exam Title</label>
						<input type="text" class="form-control" placeholder="Title">
					</div>
					<button type="submit" class="btn btn-primary mb-2">Add Category</button>
				</form>
			</div>
		</div>
		<!-- Bootstrap Exam categories End -->
	</div>
	
@endsection