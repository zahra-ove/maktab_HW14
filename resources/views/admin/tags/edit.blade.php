@extends('admin.layouts.master')

@section('content')

    <div class="container">

{{-- Displaying Messagas --}}
@if(session('status'))
<div class="container alert alert-success alert-dismissable">
    <button class="close text-white" type="button" data-dismiss="alert">&times;&nbsp;&nbsp;</button>
    {{session('status')}}
</div>
@endif

@include('admin.layouts.error')


        <h2>ویرایش تگ</h2>
        <br><br>


        <form action="{{route('admin.tags.update', ['tag' => $tag])}}" method="post">
            @method('PUT')
            @csrf


            <div class="form-group">
                <label class="control-label" for="product_code" > نام تگ </label>
                <input type="text"  name="tag_name"  placeholder="نام تگ"  id="tag_name" class="form-control" value="{{$tag->tag_name}}" required/>
            </div>

            <div class="form-group">
                <label class="control-label" for="description">توضیحات تگ</label>
                <input type="text"  name="description"  placeholder="توضیحات تگ"  id="description" class="form-control" value="{{$tag->description}}" required/>
            </div>

            {{-- <br/><br/><br/><br/> --}}
            <div class="form-group my-5">
                <button type="submit"   class="btn btn-primary col-sm-1 control-label" id="add">ویرایش</button>
                <a href="{{route('admin.tags.index')}}" class="btn btn-sm btn-outline-dark">بازگشت</a>
            </div>

        </form>
    </div>

@endsection
