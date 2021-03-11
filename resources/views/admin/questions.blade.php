@extends('layouts.master')
@section('content')
@if($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>

@endif

@if(session()->has('success'))
	<div class="alert alert-success">
		{{ session()->get('success') }}
	</div>
@endif

    <div class="page-title">
        <h3>Questions</h3>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Question Details</h4>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-toggle="tab" href="#ques_list" role="tab" aria-selected="true">Questions List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#add_que" role="tab" aria-selected="false">Add Question</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="ques_list" role="tabpanel">
                    <table class="data-table table">
                        <thead>
                            <tr>
                                <th class="table-plus">Question</th>
                                <th class="table-plus datatable-nosort">Answer</th>
                                <th class="table-plus">Subject</th>
                                <th class="table-plus">Exam</th>
                                <th class="datatable-nosort" style="text-align:right;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questions as $item)
                            <tr id = {{$item->id}}>
                                <td class="table-plus">{{$item->title}}</td>
                                <td class="table-plus">{{$item->answer}}</td>
                                <td class="table-plus">{{$item->subject}}</td>
                                <td class="table-plus">{{$item->categories}}</td>
                                <td style="float: right;">
                                    <a class="btn btn-outline-primary" href="#" ><i class="dw dw-edit2"></i></a>
                                    <a class="btn btn-outline-danger" href=""><i class="dw dw-delete-3"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- <!--Add Question section --> --}}
                <div class="tab-pane fade" id="add_que" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Quesion</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/addquestion" enctype="multipart/form-data">
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
                                        <select class="custom-select form-control" name="subject" required >
                                            <option value="" active>Select Subject</option>
                                            @foreach ($subjects as $item)
                                            <option value={{$item->title}}>{{$item->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Exam Category</label>
                                    <div class="col-sm-12 col-md-10">
                                        <select class="choices form-control" name="category[]" multiple="multiple">
                                            @foreach ($categories as $item)
                                            <option value={{$item->title}}>{{$item->title}}</option>
                                            @endforeach
                                        </select>
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
        </div>
    </div>
    <script>
        $('#text_editor').trumbowyg();
    </script>
@endsection
