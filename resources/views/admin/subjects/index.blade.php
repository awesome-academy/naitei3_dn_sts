@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 h-75">
            <div class="card">
                <div class="card-body h-75">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title nav-title"> {{ trans('crud.sjlist') }} </h4>
                        <a href="{{ route('admin.subject.create') }}" class=" card-title nav-title "> <button class="btn btn-outline-success"> <i class="fas fa-plus-square"></i> {{ trans('crud.addsj') }} </button> </a>
                    </div>
                    <div class="row">
                        @foreach ($subjects as $item)
                            <div class="col-md-4 d-flex align-items-stretch">
                                <div class="card mb-3">
                                    <div class="card-body d-flex flex-column">
                                        <img src="https://filedn.com/ltOdFv1aqz1YIFhf4gTY8D7/ingus-info/BLOGS/Photography-stocks3/stock-photography-slider.jpg" alt="" class="card-img-top img-thumbnail">
                                        <h5 class="card-title mt-3"> {{ $item->name }} </h5>
                                        <p class="card-text"> {{ $item->description }} </p>
                                        <div class="mt-auto">
                                            <div class="d-flex justify-content-between">
                                                <a href="{{ route('admin.subject.show', $item->id) }}" class=""> <button class="btn btn-outline-primary"> <i class="fas fa-info"></i> {{ trans('crud.detail') }} </button> </a>
                                                <a href="{{ route('admin.subject.edit', $item->id) }}" class=""> <button class="btn btn-outline-info"> <i class="fas fa-edit"></i> {{ trans('crud.edit') }} </button> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
