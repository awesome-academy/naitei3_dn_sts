@extends('admin.layouts.app')

@push('scripts')
    <script src="{{ mix('js/subject.js') }}"></script>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title nav-title"> {{ trans('crud.addsj') }} </h4>
                    <form name="add_task" id="add_task">

                        <div class="form-group">
                            <label for="name"> {{ trans('crud.sjname') }} </label>
                            <input class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="image"> {{ trans('crud.sjimage') }} </label>
                            {{-- <label class="custom-file-label" for="image">Image:</label> --}}
                            <input class="form-control" id="image" name="image">
                            {{-- <input type="file" class="custom-file-input" id="image" name="filename"> --}}
                        </div>
                        <div class="form-group">
                            <label for="decription"> {{ trans('crud.sjdes') }} </label>
                            <input class="form-control" id="description" name="description">
                        </div>

                        <label> {{ trans('crud.task') }} </label>
                        <table class="table" id="dynamic_field">
                            <tr>
                                <td><input type="text" name="task[]" placeholder=" {{ trans('crud.placeholdername') }} "
                                        class="form-control name_list b" /></td>
                                <td><button type="button" name="add" id="add" class="btn btn-outline-success"><i
                                            class="fas fa-plus-square"></i> {{ trans('crud.addtask') }} </button></td>
                            </tr>
                        </table>
                        <button type="submit" id="submit-form" class="btn btn-primary"> {{ trans('crud.btnsubmit') }} </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
