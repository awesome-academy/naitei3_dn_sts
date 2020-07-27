@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title nav-title">{{ trans('course.course list') }}</h4>
                    <table class="table">
                        <tr>
                            <th>{{ trans('course.stt') }}</th>
                            <th>{{ trans('course.name') }}</th>
                            <th>{{ trans('course.status') }}</th>
                            <th>{{ trans('course.start_day') }}</th>
                            <th>{{ trans('course.end_day') }}</th>
                            <th>{{ trans('course.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($courses as $course)
                            <tr>
                              <td class="counterCell"></td>
                              <td>{{$course->name}}</td>
                              <td>{{$course->status}}</td>
                              <td>{{$course->start_day}}</td>
                              <td>{{$course->end_day}}</td>
                              <td>
                                <button class="mr-2 btn btn-outline-primary"><i class="fas fa-info"></i></button>
                                <button class="mr-2 btn btn-outline-warning"><i class="fas fa-edit"></i></button>
                                <button class="mr-2 btn btn-outline-danger"><i class="fas fa-trash"></i></button>              
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
@endsection
