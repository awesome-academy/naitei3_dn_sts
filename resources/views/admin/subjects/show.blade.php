@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title nav-title"> {{ trans('crud.sjdetail') }} </h4>
                    <div class="row mt-3 mb-3">
                        <div class="col-md-2 mb-3">
                            <div class="ml-5"> {{ trans('crud.sjname') }} </div>
                        </div>
                        <div class="col-md-10">
                            <div class="float-left"> {{ $subject->name }}  </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="ml-5"> {{ trans('crud.sjimage') }} </div>
                        </div>
                        <div class="col-md-10">
                            <img src="https://filedn.com/ltOdFv1aqz1YIFhf4gTY8D7/ingus-info/BLOGS/Photography-stocks3/stock-photography-slider.jpg" alt="" class="card-img-top img-thumbnail" id="detail_image">
                        </div>
                        <div class="col-md-2 mb-3">
                            <div class="ml-5"> {{ trans('crud.sjdes') }} </div>
                        </div>
                        <div class="col-md-10">
                            <div class="float-left"> {{ $subject->description }}  </div>
                        </div>
                    </div>
                    <h5 class="nav-title"> {{ trans('crud.task') }} </h5>
                    <table class="table">
                        <thead>
                            <tr class="d-flex">
                                <th class="col-9"> {{ trans('crud.name') }} </th>
                                <th class="col-3"> {{ trans('crud.action') }} </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $item)
                                <tr class="d-flex">
                                    <td class="col-9"> {{$item->name}} </td>
                                    <td class="col-3"> <i class="fas fa-edit"></i> <i class="fas fa-trash-alt"></i> </td>
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
