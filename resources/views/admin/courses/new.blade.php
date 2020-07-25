@extends('layouts.app')

@push('scripts')
    <script src="{{ mix('js/course.js') }}"></script>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title nav-title"> {{ trans('new_course.addcourse') }} </h4>
                    <form name="add_course_form" id="add_course_form">

                        <div class="form-group">
                            <label for="name"> {{ trans('new_course.coursename') }} </label>
                            <input class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="image"> {{ trans('new_course.courseimg') }} </label>
                            <input class="form-control" id="image" name="image">
                        </div>
                        <div class="form-group">
                            <label for="description"> {{ trans('new_course.coursedes') }} </label>
                            <input class="form-control" id="description" name="description">
                        </div>

                        <div class="form-group">
                            <label for="duration"> {{ trans('new_course.courseduration') }} </label>
                            <div class="row ml-0" id="duration">
                                <input class="form-control col-sm-3 mr-1" type="number" min="1"  name="duration">
                                <select name="duration_type" id="duration_type" class="form-control col-sm-1">
                                    <option value="0"> {{ trans('new_course.day') }} </option>
                                    <option value="1"> {{ trans('new_course.mon') }} </option>
                                    <option value="2"> {{ trans('new_course.year') }} </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status"> {{ trans('new_course.coursestatus') }} </label>
                            <select name="status" id="status" class="form-control col-sm-2">
                                <option value="0"> {{ trans('new_course.open') }} </option>
                                <option value="1"> {{ trans('new_course.close') }} </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="start_day"> {{ trans('new_course.coursestartday') }} </label>
                            <input type="date" name="start_day" id="start_day" class="form-control col-sm-3">
                        </div>

                        <div class="form-group">
                            <label for="end_day"> {{ trans('new_course.courseendday') }} </label>
                            <input type="date" name="end_day" id="end_day" class="form-control col-sm-3">
                        </div>

                        <label> {{ trans('app.subjects') }} </label>
                        <table class="table" id="dynamic_subject_field">
                            <tr>
                                <td id="subject_selector">
                                    <select name="subject[]" class="form-control">
                                        @foreach ($subjects as $item)
                                            <option value=" {{$item->id}} "> {{$item->name}} </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td id="action_col"><button type="button" name="add_subject" id="add_subject" class="btn btn-outline-success"><i class="fas fa-plus-square"></i> {{ trans('new_course.addsjbtn') }} </button></td>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-primary"> {{ trans('new_course.submitbtn') }} </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
