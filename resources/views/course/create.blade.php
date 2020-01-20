@extends('layouts.main')

@section('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

    <!--notification start-->
    <div class="row">
        <div class="col-lg-12">
            <!--notification start-->
            @if (\Session::has('success'))
                @component('components.msg-success')
                    {!! \Session::get('success') !!}
                @endcomponent
            @elseif(\Session::has('error'))
                @component('components.msg-error')
                    {!! \Session::get('error') !!}
                @endcomponent
            @endif
        </div>
    </div>
    <!--notification end-->

    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel panel-primary">
                <header class="panel-heading">
                    Add course
                </header>
                <div class="panel-body">
                    <form class="form-horizontal tasi-form" method="post" action="{{route('course.store')}}"
                          enctype="multipart/form-data" name="myform">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Course name:</label>
                            <div class="col-sm-10">
                                <input name="title" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Price:</label>
                            <div class="col-sm-4">
                                <input name="price" type="number" class="form-control"
                                       required>
                            </div>
                            <label class="col-sm-2 control-label">Discounted price:</label>
                            <div class="col-sm-4">
                                <input name="discount" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Level:</label>
                            <div class="col-sm-4">
                                <select class="col-sm-3 form-control m-bot10" name="level" id="level">
                                    <option value="1">Elementary</option>
                                    <option value="2">Intermediate</option>
                                    <option value="3">Professional</option>
                                </select>
                            </div>
                            <label class="col-sm-2 control-label">Status:</label>
                            <div class="col-sm-4">
                                <select class="col-sm-3 form-control m-bot10" name="status" id="status">
                                    <option value="0">Publish later</option>
                                    <option value="1">Is publishing</option>
                                    <option value="2">Finished</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Upload picture:</label>
                            <div class="col-sm-3">
                                <input name="image" type="file" class="form-control file"
                                       required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Description:</label>
                            <div class="col-sm-11">
                                                <textarea name="description" class="text form-control"
                                                          rows="5"></textarea>
                            </div>
                        </div>
                        @component('components.btn-back'){{route('course.list')}} @endcomponent
                        @component('components.btn-save') @endcomponent
                    </form>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->

@endsection

@section('scripts')

@endsection
