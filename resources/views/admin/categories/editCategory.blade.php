@extends('admin.layouts.master')

@section('content')

    <div class="container">

        @include('admin.layouts.error')

        <h2>ویرایش  پروفایل</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <br><br>
        <form action="{{route('admin.categories.update', ['category' => $thisCategory])}}" method="post">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label class="control-label" for="category_name">نام دسته بندی</label>
                <input type="text"  name="category_name"  value="{{$thisCategory->category_name}}"  placeholder="نام دسته بندی  "  id="category_name" class="form-control" />
            </div>

            <div class="form-group required">
                <label for="parent_id" class="col-sm-1 control-label">parent_id</label>
                  <select name="parent_id" id="parent_id" class="custom-select form-control col-sm-2" required/>
                        <option value="">--شماره دسته بندی والد--</option>
                        <option value="0" selected>بدون والد</option>
                        @foreach($allCategory as $category)
                            <option value="{{$category->id}}"  {{($thisCategory->parent_id == $category->id) ? 'selected' : ''}}> {{$category->category_name}} </option>
                        @endforeach
                  </select>
            </div>



            <div class="form-group my-5">
                <input type="submit"  value="ویرایش"  class="btn btn-warning col-sm-1 control-label">
                <a href="{{route('admin.categories.index')}}"    class="btn btn-secondary col-sm-1 control-label">بازگشت</a>
            </div>

        </form>
    </div>

@endsection
