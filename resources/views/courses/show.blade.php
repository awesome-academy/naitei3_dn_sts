@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title nav-title"> {{$courses->name}} </h4>
                    <div class="card mb-3 border-0">
                        <div class="card-body d-flex flex-column">
                            <div class="row d-flex">
                                <div class="col-sm-3">
                                    <img src="https://filedn.com/ltOdFv1aqz1YIFhf4gTY8D7/ingus-info/BLOGS/Photography-stocks3/stock-photography-slider.jpg" alt="" class="card-img-top img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <p class="card-text">
                                        {{ trans('course.trainer:') }}
                                        @if ($trainers->count() > 0)
                                            @foreach ($trainers as $item)
                                                {{$item->name}}
                                                @if (!$loop->last)
                                                    {{ trans('course.space') }}
                                                @endif
                                            @endforeach
                                        @endif
                                    </p>
                                    <p class="card-text"> {{ trans('course.start_day:') }} {{$user_info->pivot->start_day}} </p>
                                    <p class="card-text"> {{ trans('course.end_day:') }} {{$user_info->pivot->end_day}} </p>
                                    <p class="card-text"> {{ trans('course.description:') }} {{$courses->description}} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($subjects as $item)
            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title nav-title"> {{ trans('course.subject:') }} {{$item->name}} </h5>
                        <table class="table table-hover">
                            <thead>
                                <tr class="d-flex">
                                    <th class="col-1"> {{ trans('course.stt') }} </th>
                                    <th class="col-5"> {{ trans('course.task') }} </th>
                                    <th class="col-3"> {{ trans('course.status') }} </th>
                                    <th class="col-3"> {{ trans('course.action') }} </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks[$item->id] as $i)
                                    <tr class="d-flex">
                                        <th class="col-1"> {{$loop->index +1}} </th>
                                        <td class="col-5"> {{ $tasks[$item->id][$loop->index]['name'] }} </td>
                                        <td class="col-3">
                                            @if ( $tasks[$item->id][$loop->index]['status'] == 0)
                                                {{ trans('course.notstartyet') }}
                                            @else @if ( $tasks[$item->id][$loop->index]['status'] == 1)
                                                {{ trans('course.pending') }}
                                            @else
                                                {{ trans('course.finished') }}
                                            @endif
                                            @endif
                                        </td>
                                        <td class="col-3">
                                            <a href=""> <button class="btn btn-outline-primary"> <i class="fas fa-info"></i> {{ trans('course.report') }} </button> </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title nav-title"> {{ trans('course.trainees:') }}  </h5>
                    <table class="table table-hover">
                        <thead>
                            <tr class="d-flex">
                                <th class="col-1"> {{ trans('course.stt') }} </th>
                                <th class="col-5"> {{ trans('course.name') }} </th>
                                <th class="col-6"> {{ trans('course.email') }} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($trainees->count() > 0)
                                @foreach ($trainees as $i)
                                    <tr class="d-flex">
                                        <th class="col-1"> {{$loop->index +1}} </th>
                                        <td class="col-5"> {{$i->name}} </td>
                                        <td class="col-6"> {{$i->email}} </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
