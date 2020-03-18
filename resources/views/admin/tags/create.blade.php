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

        <h2>افزودن تگ جدید</h2>
        <br><br>

        {{-- class="dropzone" id="myDropzone" --}}
        <form action="{{route('admin.tags.store')}}" method="post">
            @csrf

            <div class="form-group">
                <label class="control-label" for="product_code" > نام تگ </label>
                <input type="text"  name="tag_name"  placeholder="نام تگ"  id="tag_name" class="form-control" value="{{old('tag_name')}}" required/>
            </div>

            <div class="form-group">
                <label class="control-label" for="description">توضیحات تگ</label>
                <input type="text"  name="description"  placeholder="توضیحات تگ"  id="description" class="form-control" value="{{old('description')}}" required/>
            </div>

            {{-- <br/><br/><br/><br/> --}}
            <div class="form-group my-5">
                {{-- <input type="submit"  value="افزودن"  class="btn btn-primary col-sm-1 control-label"> --}}
                <button type="submit"  value="افزودن"  class="btn btn-primary col-sm-1 control-label" id="add">افزودن</button>
                <a href="{{route('admin.tags.index')}}" class="btn btn-default">بازگشت <span class="fa fa-arrow-circle-left"></span></a>
            </div>

        </form>


        {{-- <form action="{{route('admin.products.store')}}"  method="POST" class="dropzone" id="myDropzone">@csrf</form> --}}
    </div>

@endsection
