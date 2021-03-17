@extends('layouts.master')

@section('content')

@if($errors->any())
    <div class="alert alert-danger" >
        @foreach($errors->all() as $error)
          <p> {{ $error }}</p>
        @endforeach
    </div>

@endif

@if ($errors->has('title'))
<div class="error">
    {{ $errors->first('title') }}
</div>
@endif



@if(session()->has('success'))
	<div class="alert alert-success">
		{{ session()->get('success') }}
	</div>
@endif
<br>

<div class="row">
    <div class="page-title col">
        <h4>Exam List </h2>
    </div>
    <div class="col">
        <a type="button" href="#" class="btn btn-primary" style="float:right;" data-toggle="modal" data-target="#addexammodal">Add Exam</a>
    </div>
</div>

<div class="row ">
    {{-- View Existing Exams --}}
    @foreach ($exams as $item)
        <div class="col-lg-4 col-md- col-sm-4 ">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4  class="card-title" style="text-align: center;">{{$item->title}}</h4>
                        <div class="card-text">
                            <button class="btn btn-outline-info disabled">{{ $item->category }}  </button>
                            <button class="btn btn-outline-danger disabled" style="float: right;"> {{$item->subjects}} </button>
                            <hr>
                            {{-- <h5 class="h5">Added Question: <span class="pull-right"> </span>  </h5> --}}
                            <h6 >Maximum Question: <span style="float: right;"> {{$item->total_questions}} </span> </h6>
                            <h6 >Negative Mark:  <span style="float: right;"> {{$item->neg_mark}} </span></h6>
                            <h6 >Total Mark:  <span style="float: right;"> {{$item->passing_mark}} </span></h6>
                        </div>
                        <hr>
                        <form method="GET" action="/addQtoExam">
                            @csrf
                            <input type="hidden" name="examid" value="{{$item->id}}">
                            <input type="submit" class="btn btn-outline-success" value="Add Questions" >
                        </form>
                        <hr>
                        <div class="card-footer d-flex justify-content-between">
                            <button class="editButton btn btn-warning" id="editExam" data-toggle="modal" data-target="#edit_modal"  data-id="{{ $item->id }}"> View/Edit </button>
                            <button class="btn btn-danger pull-right">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{-- add exam modal --}}
<div class="modal fade bs-example-modal-lg" id="addexammodal" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="h4 text-blue">Fill Exam Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
            <form method="POST" action="/addexam">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Exam Title</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" name="title">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Description</label>
                    <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" name="desc">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Subject</label>
                    <div class="col-sm-12 col-md-10">
                        <select  class="choices form-select multiple-remove"  name="subject">
                            <option selected="">Choose...</option>
                            @foreach ($subjects as $item)
                            <option value={{$item->title}}>{{$item->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Exam Categories</label>
                    <div class="col-sm-12 col-md-10">
                        <select  class="choices form-select multiple-remove"  name="categories">
                            <option selected="">Choose...</option>
							@foreach ($categories as $item)
                            <option value={{$item->title}}>{{$item->title}}</option>
                            @endforeach
						</select>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-md-6 col-sm-12">
                        <label class="col-sm-12 col-md-12 col-form-label">Total Question</label>
                        <div class="col-sm-12 col-md-12">
                            <input class="form-control" type="text" name="total_que">
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label class="col-sm-12 col-md-12 col-form-label">Total Attempt</label>
                        <div class="col-sm-12 col-md-12">
                            <input class="form-control" type="text" name="total_attempt">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 col-sm-12">
                        <label class="col-sm-12 col-md-12 col-form-label">Negative Mark</label>
                        <div class="col-sm-12 col-md-12">
                            <input class="form-control" type="text" value="0" name="neg_mark">
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label class="col-sm-12 col-md-12 col-form-label">Positive Mark</label>
                        <div class="col-sm-12 col-md-12">
                            <input class="form-control" type="text" value="1" name="pos_mark">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 col-sm-12">
                        <label class="col-sm-12 col-md-12 col-form-label">Passing Mark</label>
                        <div class="col-sm-12 col-md-12">
                            <input class="form-control" type="text" name="passing_mark">
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                        <label class="col-sm-12 col-md-12 col-form-label">Total Mark</label>
                        <div class="col-sm-12 col-md-12">
                            <input class="form-control" type="text" name="total_mark">
                        </div>
                    </div>
                </div>
                <hr>

                <div class="form-group row">
                    <div class="col-md-6 col-sm-12">
                        <label class="col-sm-12 col-md-2 col-form-label">Price</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="choices form-select multiple-remove" name="price">
                                <option selected="">Choose...</option>
                                <option value="1">Free</option>
                                <option value="2">Paid</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label class="col-sm-12 col-md-2 col-form-label">Status</label>
                        <div class="col-sm-12 col-md-10">
                            <select  class="choices form-select multiple-remove"  name="status">
                                <option value="1">Active</option>
                                <option value="2">Close</option>
                            </select>
                        </div>
                    </div>
                </div>
                {{ @csrf_field() }}
                <div class="form-group">
                    <input type="submit" value="Save" class="btn btn-success pull-right form-control">
                </div>

            </form>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            {{-- <button type="button" class="btn btn-primary">Add Exam</button> --}}
        </div>
    </div>
</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".editButton").click(function(){
            event.preventDefault();
            var id = $(this).data('id');
            console.log(id)
            $.get('viewexam/getExam/'+ id, function (data) {
                console.log(data);
                $('#edit_modal').modal({show: true});
                $('#edit_id').val(data.id);
                $('#etitle').val(data.title);
                $('#edesc').val(data.desc);
                $('#esubject').val(data.subjects);
                $('#ecategory').val(data.category);
                $('#etotal_que').val(data.total_questions);
                $('#etotal_attempt').val(data.total_attempt);
                $('#eneg_mark').val(data.neg_mark);
                $('#epos_mark').val(data.pos_mark);
                $('#epassing_mark').val(data.passing_mark);
                $('#etotal_mark').val(data.total_mark);
                $('#eprice').val(data.price);
                $('#estatus').val(data.status);
            });
        });
    });

</script>





    {{-- Edit exam modal by id --}}
    <div class="modal fade text-left" id="" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Exam Details</h5>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="">
                    @csrf
                    <input type="hidden" id="edit_id" name="edit_id" value="">
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Exam Title</label>
                        <div class="col-sm-12 col-md-10">
                        <input class="form-control" type="text" id="etitle" name="etitle" value="{{$item->title}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Description</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" id="edesc" value="{{$item->desc}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Subject</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="custom-select form-control" id="esubject">
                                @foreach ($subjects as $i)
                                <option value={{$i->title}}>{{$i->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Exam Categories</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="custom-select form-control" id="ecategory" style="width: 100%;">
                                @foreach ($categories as $i)
                                <option value={{$i->title}}>{{$i->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-md-6 col-sm-12">
                            <label class="col-sm-12 col-md-12 col-form-label">Total Question</label>
                            <div class="col-sm-12 col-md-12">
                                <input class="form-control" type="text" id="etotal_que" value="{{$item->total_questions}}">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <label class="col-sm-12 col-md-12 col-form-label">Total Attempt</label>
                            <div class="col-sm-12 col-md-12">
                                <input class="form-control" type="text" id="etotal_attempt" value="{{$item->total_attempt}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 col-sm-12">
                            <label class="col-sm-12 col-md-12 col-form-label">Negative Mark</label>
                            <div class="col-sm-12 col-md-12">
                                <input class="form-control" type="text" id="eneg_mark" value="{{$item->neg_mark}}">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <label class="col-sm-12 col-md-12 col-form-label">Positive Mark</label>
                            <div class="col-sm-12 col-md-12">
                                <input class="form-control" type="text" id="epos_mark" value="{{$item->pos_mark}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 col-sm-12">
                            <label class="col-sm-12 col-md-12 col-form-label">Passing Mark</label>
                            <div class="col-sm-12 col-md-12">
                                <input class="form-control" type="text" id="epassing_mark" value="{{$item->	passing_mark}}">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <label class="col-sm-12 col-md-12 col-form-label">Total Mark</label>
                            <div class="col-sm-12 col-md-12">
                                <input class="form-control" type="text" id="etotal_mark" value="{{$item->total_mark}}">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-md-6 col-sm-12">
                            <label class="col-sm-12 col-md-2 col-form-label">Price</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select form-control" id="eprice">
                                    <option selected="">Choose...</option>
                                    <option value="1">Free</option>
                                    <option value="2">Paid</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="col-sm-12 col-md-2 col-form-label">Status</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select form-control" id="estatus">
                                    <option value="1">Active</option>
                                    <option value="2">Close</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-success pull-right form-control">
                    </div>

                </form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Add Exam</button> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- end of edit section --}}
@endsection
