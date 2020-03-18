@extends('admin.layouts.master')

@section('content')

    <div class="container">

        @include('admin.layouts.error')

        <h2>افزودن دسته بندی جدید</h2>
        <br><br>
        <form action="{{route('admin.categories.store')}}" method="post">
            @csrf

            <div class="form-group">
                <label class="control-label" for="category_name" >نام دسته بندی  </label>
                <input type="text"  name="category_name"  placeholder="نام دسته بندی"  id="category_name" class="form-control" value="{{old('category_name')}}" required/>
            </div>

            <div class="form-group required">
                <label for="parent_id" class="col-sm-1 control-label">parent_id</label>
                  <select name="parent_id" id="parent_id" class="custom-select form-control col-sm-2" required/>
                        <option value="" selected>--شماره دسته بندی والد--</option>
                        <option value="0">بدون والد</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                  </select>
            </div>

            <div class="form-group my-5">
                <input type="submit"  value="افزودن"  class="btn btn-primary col-sm-1 control-label">
                <a href="{{route('admin.categories.index')}}"    class="btn btn-secondary col-sm-1 control-label">بازگشت</a>
            </div>

        </form>
    </div>

@endsection
