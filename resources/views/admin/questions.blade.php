@extends('layouts.master')
@section('content')
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                <div class="pd-20 card-box">
                    <h5 class="h4 text-blue mb-20">Question Details</h5>
                    <div class="tab">
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-blue" data-toggle="tab" href="#ques_list" role="tab" aria-selected="true">Questions List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-blue" data-toggle="tab" href="#add_que" role="tab" aria-selected="false">Add Question</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="ques_list" role="tabpanel">
                                <div class="pd-20">
                                    <div class="card-box mb-30">
                                        <div class="pb-20">
                                            <table class="data-table table stripe hover nowrap">
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
                                    </div>
                                </div>
                            </div>

                            {{-- <!--Add Quesion section --> --}}
                            <div class="tab-pane fade" id="add_que" role="tabpanel">
                                <div class="pd-20">
                                    <div class="html-editor pd-20 card-box mb-30" height=200px>
                                        <h4 class="h4 text-blue">Add Question Details</h4> <hr>
                                        <form method="POST" action="/addquestion" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label"><h5 class="h6 text-blue">Question</h5></label>
                                                <div class="col-sm-12 col-md-10">
                                                    <textarea class="textarea_editor form-control border-radius-1" name="title" cols="4" required> </textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label"><h5 class="h6 text-blue">Image</h5></label>
                                                <div class="col-sm-12 col-md-10">
                                                    <input type="file" class="form-control" name="que_img" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label"><h5 class="h6 text-blue">Description</h5></label>
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
                                                <label class="col-sm-12 col-md-2 col-form-label"><h5 class="h6 text-blue">Correct Answer</h5></label>
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
                                                <label class="col-sm-12 col-md-2 col-form-label"><h5 class="h6 text-blue">Answer Description</h5></label>
                                                <div class="col-sm-12 col-md-10">
                                                    <textarea class="textarea_editor form-control border-radius-1" name="ans_desc" required cols="4" > </textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label"><h5 class="h6 text-blue">Answer Image</h5></label>
                                                <div class="col-sm-12  col-md-10">
                                                    <input type="file" class="form-control" name="ans_img"> 
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label"><h5 class="h6 text-blue">Subject</h5></label>
                                                <div class="col-sm-12 col-md-10">
                                                    <select class="custom-select form-control" name="subject" required style="width: 100%; height: 38px;">
                                                        <option value="" active>Select Subject</option>
                                                        @foreach ($subjects as $item)
                                                        <option value={{$item->title}}>{{$item->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label"><h5 class="h6 text-blue">Exam Category</h5></label>
                                                <div class="col-sm-12 col-md-10">
                                                    <select class="custom-select2 form-control" name="category[]" multiple="multiple" required style="width: 100%; height: 38px;">
                                                        @foreach ($categories as $item)
                                                        <option value={{$item->title}}>{{$item->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-2 col-form-label">Question Level</label>
                                                <div class="col-sm-12 col-md-10">
                                                    <select class="custom-select form-control" name="level" required style="width: 100%; height: 38px;">
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
            </div>
        </div>
    </div>
    
@endsection