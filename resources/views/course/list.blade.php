@extends('layouts.main')

@section('content')
    @component('components.search' , [
    'redirect' => route('course.list'),
    'q' => $q
    ])
    @endcomponent

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <a href="{{route('course.create')}}"><button type="button" class="btn btn-round btn-primary">New Course +</button></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel panel-primary">
                <header class="panel-heading">
                    courses list
                </header>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th><i class="fa fa-align-left"></i> Row</th>
                        <th><i class="fa fa-bullhorn"></i> Title</th>
                        <th><i class="fa fa-question-circle"></i> Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($start_from = 0)
                    @foreach($courses as $row)
                        @php($start_from++)
                        <tr>
                            <td>{{$start_from}}</td>
                            <td><a href="{{route('course.show' , $row->id)}}">{{$row->title}}</a></td>
                            <td> {{limitWord($row->description,10)}}</td>
                            <td>@component('components.btn-edit') @endcomponent</td>
                            <td>@component('components.btn-trash') @endcomponent</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div align="center">{{$courses->links()}}</div>

            </section>
        </div>
    </div>

@endsection
