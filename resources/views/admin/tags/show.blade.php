@extends('admin.layouts.master')

@section('content')

{{-- Displaying Messagas --}}
@if(session('status'))
<div class="container alert alert-success alert-dismissable">
    <button class="close text-white" type="button" data-dismiss="alert">&times;&nbsp;&nbsp;</button>
    {{session('status')}}
</div>
@endif

@include('admin.layouts.error')



<div class="container">
    <p>شماره تگ : {{$tag->id}}</p>
    <p>نام تگ : {{$tag->tag_name}}</p>
    <p>توضیحات تگ : {{$tag->description}}</p>
</div>
<br/><br/>
<div id="container">
    <div class="container">
        @foreach($tag->products->chunk(3) as $items)
            <div style="display:flex; flex-direction:row; justify-content:center;">
                @foreach($items as $item)
                    <div style="margin-right:20px;margin-bottom:10px;">
                        <img src="{{asset('storage/products/'.$item->images()->first()->image_name)}}" alt="">
                        <p>{{$item->product_name}}</p>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>


<div class="container">
    <a href="{{route('admin.tags.index')}}" class="btn btn-sm btn-outline-dark">بازگشت</a>
</div>


@endsection
