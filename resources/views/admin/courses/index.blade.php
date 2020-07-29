@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title nav-title">{{ trans('course.course list') }}</h4>
                        <a href="{{ route('admin.courses.create') }}" class=" card-title nav-title "> <button
                                class="btn btn-outline-success"> <i class="fas fa-plus-square"></i>
                                {{ trans('course.add_course') }} </button> </a>
                    </div>
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
                                <td>
                                    @switch($course->getStatus())
                                    @case('init')
                                    <span class="badge badge-warning">{{ trans('course.initial') }}</span>
                                    @break
                                    @case('started')
                                    <span class="badge badge-success">{{ trans('course.started') }}</span>
                                    @break
                                    @case('ended')
                                    <span class="badge badge-secondary">{{ trans('course.ended') }}</span>
                                    @break
                                    @default
                                    <span class="badge badge-secondary">{{ trans('course.unknown') }}</span>
                                    @endswitch</td>
                                <td>{{date('Y/m/d',strtotime($course->start_day))}}</td>
                                <td>{{date('Y/m/d',strtotime($course->end_day))}}</td>
                                <td>
                                    <a href="{{ route('admin.courses.show', ['course'=>$course->id]) }}"><button
                                            class="mr-2 btn btn-outline-primary"><i
                                                class="fas fa-info"></i></button></a>
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
