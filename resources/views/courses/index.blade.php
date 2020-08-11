@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title nav-title"> {{ trans('course.yourcourse') }} </h4>
                    <div class="row">
                        @if ($courses)
                            @foreach ($courses as $item)
                                <div class="col-md-4 d-flex align-items-stretch">
                                    <div class="card mb-3">
                                        <div class="card-body d-flex flex-column">
                                            <a href="{{ route('courses.show', $item->id) }}">
                                                <img src="https://filedn.com/ltOdFv1aqz1YIFhf4gTY8D7/ingus-info/BLOGS/Photography-stocks3/stock-photography-slider.jpg" alt="" class="card-img-top img-thumbnail">
                                            </a>
                                            <h5 class="card-title mt-3"> {{ $item->name }} </h5>
                                            <p class="card-text"> {{ trans('course.start_day:') }} {{ $item->pivot->start_day }} </p>
                                            <p class="card-text"> {{ trans('course.end_day:') }} {{ $item->pivot->end_day }} </p>
                                            <div class="mt-auto">
                                                <div class="d-flex justify-content-between">
                                                    <div> {{ trans('course.joinas') }}
                                                        @if ($item->pivot->role)
                                                            {{ trans('course.trainee') }}
                                                        @else
                                                            {{ trans('course.trainer') }}
                                                        @endif
                                                    </div>
                                                    <div> {{ trans('course.status:') }}
                                                        @if ($item->pivot->status)
                                                            {{ trans('course.active') }}
                                                        @else
                                                            {{ trans('course.disable') }}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
