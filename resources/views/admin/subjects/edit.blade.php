@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title nav-title"> {{ trans('crud.editsj') }} </h4>
                    <form action=" {{ route('admin.subject.update', $subject->id) }} " method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="name"> {{ trans('crud.sjname') }} </label>
                            <input class="form-control" id="name" name="name" value=" {{$subject->name}} ">
                        </div>
                        <div class="form-group">
                            <label for="image"> {{ trans('crud.sjimage') }} </label>
                            {{-- <label class="custom-file-label" for="image">Image:</label> --}}
                            <input class="form-control" id="image" name="image" value=" {{$subject->image}} ">
                            {{-- <input type="file" class="custom-file-input" id="image" name="filename"> --}}
                        </div>
                        <div class="form-group">
                            <label for="decription"> {{ trans('crud.sjdes') }} </label>
                            <input class="form-control" id="description" name="description" value=" {{$subject->description}} ">
                        </div>
                        <button type="submit" class="btn btn-primary"> {{ trans('crud.btnsubmit') }} </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
