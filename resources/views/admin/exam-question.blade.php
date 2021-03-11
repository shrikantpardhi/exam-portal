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

<div class="page-title col">
    <h4>Add Question to Exam</h2>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <label for="exam title">Exam: <span class="h5">{{ $exam->title}}</span> </label>
            </div>
            <div class="col">
                <label for="exam subject">Subject:<span class="h5"> {{ $exam->subjects}}</span> </label>
            </div>
            <div class="col">
                <label for="exam subject">Category:<span class="h5"> {{ $exam->category}} </span></label>
            </div>
            <div class="col">
                <label for="free">Type:<span class="h5"> {{ $exam->price}} </span></label>
            </div>
        </div>
        <div class="row" style="margin-top: 10px;">
            <div class="col">
                <label for="question">Added Question: <span class="h6">{{ count($questions) }}</span> </label>
            </div>
            <div class="col">
                <label for="total">Total Question:<span class="h6"> {{ $exam->total_questions}}</span> </label>
            </div>
            <div class="col">
                <label for="neg mark">Negative Mark:<span class="h6"> {{ $exam->neg_mark}} </span></label>
            </div>
            <div class="col">
                <label for="mark">Total Mark:<span class="h6"> {{ $exam->total_mark}} </span></label>
            </div>
        </div>
    </div>
</div>

{{--view question table --}}
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h4 class="card-title">Question List</h4>
            </div>
            <div class="col">
                <a class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#addModal">Add Question</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">answer</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Categories</th>
                    <th scope="col">Level</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp
                @foreach ($questions as $item)
                <tr>
                    <td> {{ $count++ }} </td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->answer }}</td>
                    <td>{{ $item->subject }}</td>
                    <td>{{ $item->categories }}</td>
                    <td>{{ $item->level }}</td>
                    <td><a class="btn btn-danger" href="">Delete</a></td>
                </tr>
                @endforeach
                </tbody>
        </table>
    </div>
</div>

{{-- add question modal --}}
<div class="modal fade text-left" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Select Questions</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('addquestion')}}" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Exam ID</label>
                        <div class="col-sm-12 col-md-10 ">
                            <input type="text" class="form-control" name="examid" value="{{ $exam->id }}"  readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Question Title</label>
                        <div class="col-sm-12 col-md-10 ">
                            <textarea class="form-control" name="title" id="text_editor" required> </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Image</label>
                        <div class="col-sm-12 col-md-10">
                            <input type="file" class="form-control" name="que_img" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Description</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea class="textarea_editor form-control border-radius-1" name="que_desc" cols="4" > </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Option A</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="op1"  required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Option B</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="op2" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Option C</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="op3">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Option D</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="op4">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Correct Answer</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="custom-select2 form-control" name="answer" required style="width: 100%; height: 38px;">
                                <option value="" active>Select Answer</option>
                                <option value="op1">Option A</option>
                                <option value="op2">Option B</option>
                                <option value="op3">Option C</option>
                                <option value="op4">Option D</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Answer Description</label>
                        <div class="col-sm-12 col-md-10">
                            <textarea class="textarea_editor form-control border-radius-1" name="ans_desc" required cols="4" > </textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Answer Image</label>
                        <div class="col-sm-12  col-md-10">
                            <input type="file" class="form-control" name="ans_img">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Subject</label>
                        <div class="col-sm-12 col-md-10">
                            <input type="text" class="form-control" name="subject" value="{{ $exam->subjects }}"  readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Exam Category</label>
                        <div class="col-sm-12 col-md-10 ">
                            <input type="text" class="form-control" name="category" value="{{ $exam->category }}"  readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Question Level</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="custom-select form-control" name="level" required >
                                <option value="" active>Select Level</option>
                                <option value="easy">Easy</option>
                                <option value="mediun">Medium</option>
                                <option value="hard">Hard</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-primary" style="float: right;" value="Add Question">

                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
$(document).ready(function() {

} );
</script>

@endsection
