@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <img class="card-img-top"
                            src="https://mucinminhhao.com/wp-content/uploads/2018/11/SABER-%E2%80%93-FATE-STAY-NIGHT.jpg"
                            alt="Card image">

                    </div>
                    <div class="col-md-5">
                        <div class="card-body">
                            <h3 class="card-title nav-title">{{ $course->name }}</h3>
                            <h6>{{ trans('course.start_day') }}: <input data-date-format="yyyy/mm/dd" class="datepicker"
                                    value="{{date('Y/m/d',strtotime($course->start_day))}}"></h6>
                            <h6>{{ trans('course.end_day') }}: <input data-date-format="yyyy/mm/dd" class="datepicker"
                                    value="{{date('Y/m/d',strtotime($course->end_day))}}"></h6>
                            <div class='status'>
                                {{ trans('course.status') }}:
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
                                @endswitch
                            </div>
                            <p class="class-text">{{ $course->description}}</p>
                            <button class="btn btn-success status_btn" id="start_course" value="{{$course->id}}"><i
                                    class="fas fa-play"></i>{{ trans('course.start_course') }}</button>
                            <button class="btn btn-danger status_btn" id="end_course" value="{{$course->id}}"><i
                                    class="fas fa-stop"></i>{{ trans('course.end_course') }}</button>
                            <a href="{{ route('admin.courses.update', ['course'=>$course->id]) }}" class=" card-title nav-title "> <button
                                    class="btn btn-outline-success"> <i class="fas fa-edit"></i>
                                    {{ trans('course.edit_course') }} </button> </a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card mt-3">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="subject-tab" data-toggle="tab" href="#subject" role="tab"
                                    aria-controls="subject"
                                    aria-selected="true">{{ trans('course.course_subjects') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="user-tab" data-toggle="tab" href="#user" role="tab"
                                    aria-controls="user" aria-selected="false">{{ trans('course.course_members') }}</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="subject" role="tabpanel" aria-labelledby="subject-tab">
                                <input class="form-control search-input" type="text" placeholder="Search..">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="d-flex">
                                            <th class="col-1"> {{ trans('course.stt') }} </th>
                                            <th class="col-7"> {{ trans('course.course_subjects') }} </th>
                                            <th class="col-2"> {{ trans('course.status') }} </th>
                                            <th class="col-2"> {{ trans('course.action') }} </th>
                                        </tr>
                                    </thead>
                                    <tbody class="course-table">
                                        @foreach ($course_subjects as $subject)
                                        <tr>
                                            <td class="counterCell col-1"> </td>
                                            <td class="col-7"> {{$subject->name}} </td>
                                            <th class="col-2">
                                                @switch($subject->pivot->status)
                                                @case('0')
                                                <span class="badge badge-warning">{{ trans('course.initial') }}</span>
                                                @break
                                                @case('1')
                                                <span class="badge badge-success">{{ trans('course.started') }}</span>
                                                @break
                                                @case('2')
                                                <span class="badge badge-secondary">{{ trans('course.ended') }}</span>
                                                @break
                                                @default
                                                <span class="badge badge-secondary">{{ trans('course.unknown') }}</span>
                                                @endswitch
                                            </th>
                                            <td class="col-2">
                                                <a href="{{ route('admin.subject.show', ['subject'=>$subject->id]) }}">
                                                    <button class="mr-1 btn btn-outline-primary"><i
                                                            class="fas fa-info"></i></button>
                                                </a>
                                                <button class="mr-1 btn btn-outline-warning"><i
                                                        class="fas fa-play"></i></button>
                                                <button class="mr-1 btn btn-outline-danger"><i
                                                        class="fas fa-stop"></i></button>
                                                <button class="mr-1 btn btn-outline-danger"><i
                                                        class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="user" role="tabpanel" aria-labelledby="user-tab">
                                <input class="form-control search-input" type="text" placeholder="Search..">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="d-flex">
                                            <th class="col-1"> {{ trans('course.stt') }} </th>
                                            <th class="col-3"> {{ trans('course.course_members') }} </th>
                                            <th class="col-2"> {{ trans('course.role') }} </th>
                                            <th class="col-2"> {{ trans('course.start_day') }} </th>
                                            <th class="col-2"> {{ trans('course.end_day') }} </th>
                                            <th class="col-2"> {{ trans('course.action') }} </th>
                                        </tr>
                                    </thead>
                                    <tbody class="course-table">
                                        @foreach ($course_users as $user)
                                        <tr>
                                            <td class="counterCell col-1"> </td>
                                            <td class="col-3"> {{$user->name}} </td>
                                            <td class="col-2">
                                                @switch($user->pivot->role)
                                                @case('0')
                                                <span class="badge badge-warning">{{ trans('user.supervisor') }}</span>
                                                @break
                                                @case('1')
                                                <span class="badge badge-success">{{ trans('user.trainee') }}</span>
                                                @break
                                                @default
                                                <span
                                                    class="badge badge-secondary">{{ trans('user.unidentified') }}</span>
                                                @endswitch
                                            </td>
                                            <td class="col-2">{{date('Y/m/d',strtotime($user->pivot->start_day))}}</td>
                                            <td class="col-2">{{date('Y/m/d',strtotime($user->pivot->end_day))}}</td>
                                            <td class="col-2"> <i class="fas fa-edit"></i> <i
                                                    class="fas fa-trash-alt"></i>
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

        </div>
    </div>


</div>
</div>
@endsection
