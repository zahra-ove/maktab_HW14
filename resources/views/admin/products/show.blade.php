@extends('admin.layouts.master')

@section('content')


@if(session('status'))
<div class="container alert alert-success alert-dismissable">
    <button class="close text-white" type="button" data-dismiss="alert">&times;&nbsp;&nbsp;</button>
    {{session('status')}}
</div>
@endif



{{-- <div class="container ">
    <a href="{{route('admin.products.create')}}" class="btn btn-sm btn-outline-warning">افزودن محصول جدید</a>
</div> --}}

<div class="container">
    <div class="row">
        <div class="col-sm-3  col-md-3 col-lg-3">
            <img src="{{asset('storage/products/'.$product->images->first()->image_name)}}" alt="" style="width:100%;">
        </div>
        <div class="col-sm-6  col-md-6 col-lg-6 ml-0 mr-5">
            <div class="mx-auto">
                <h4><span>نام محصول: </span>{{$product->product_name}}</h4>
                <h6><span>قیمت: </span>{{$product->product_price}} تومان</h6>
            </div>
        </div>
    </div>
    <br/>
    {{-- image gallery --}}
    @if(count($product->images) > 1)
        <p class="text-black-50 mt-4">سایر تصاویر این محصول<p>
    @endif
    <div class="row">
        @foreach($product->images as $image)
            @if($loop->index > 0)
                <div class="col-sm-2 col-md-2 col-lg-2 ">
                    <img src="{{asset('storage/products/'.$image->image_name)}}" alt="" style="width:150px;height:150px;">
                </div>
            @endif
        @endforeach
    </div>

</div>

<div class="container mt-5">
    <a href="{{route('admin.products.index')}}" class="btn btn-sm btn-outline-dark">بازگشت</a>
</div>

@endsection
