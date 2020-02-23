@extends('layouts.layout')

@section('title')
{{'محصولات'}}
@endsection

@section('content')

<div id="container">
    <div class="container">
        @foreach($tagRelatedProducts->chunk(3) as $items)
            <div style="display:flex; flex-direction:row; justify-content:center;">
                @foreach($items as $item)
                    <div style="margin-right:20px;margin-bottom:10px;">
                        <a href="{{route('product', $item->id)}}"><img src="{{asset('storage/products/'.$item->images()->first()->image_name)}}" alt=""></a>
                        <a href="{{route('product', $item->id)}}"><p>{{$item->product_name}}</p></a>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
  </div>

@endsection
