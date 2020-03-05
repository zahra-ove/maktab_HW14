@extends('admin.layouts.master')

@section('content')

    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2>افزودن محصول جدید</h2>
        <br><br>

        {{-- class="dropzone" id="myDropzone" --}}
        <form action="{{route('admin.products.store')}}" method="post"  class="dropzone" id="myDropzone" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label class="control-label" for="product_code" > کد محصول  </label>
                <input type="text"  name="product_code"  placeholder="کد محصول"  id="product_code" class="form-control" value="{{old('product_code')}}" required/>
            </div>

            <div class="form-group">
                <label class="control-label" for="product_name">نام محصول</label>
                <input type="text"  name="product_name"  placeholder="نام محصول"  id="product_name" class="form-control" value="{{old('product_name')}}" required/>
            </div>

            <div class="form-group">
                <label class="control-label" for="product_price">قیمت</label>
                <input type="text"  name="product_price"    placeholder="قیمت"  id="product_price" class="form-control" value="{{old('product_price')}}" required/>
            </div>

            <div class="form-group">
                <label class="control-label" for="product_count">موجودی</label>
                <input type="number"  name="product_count"    placeholder="موجودی"  id="product_count" class="form-control" value="{{old('product_count')}}" />
            </div>

            <!-- choosing category from list -->
            <div class="form-group required">
                <label for="category_id" class="col-sm-1 control-label">دسته بندی</label>
                  <select name="category_id" id="gender" class="custom-select form-control col-sm-2" required/>
                        <option value="" selected>--دسته بندی--</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                  </select>
            </div>

            {{-- image upload by dropzone --}}
            <div class="dropzone-previews"></div>



            {{-- <div  class="form-group" >
                <label for="productImg">آپلود تصویر محصول</label>
                <input type="file" name="file" id="productImg" >
            </div> --}}

            {{-- <br/><br/><br/><br/> --}}
            <div class="form-group my-5">
                {{-- <input type="submit"  value="افزودن"  class="btn btn-primary col-sm-1 control-label"> --}}
                <button type="submit"  value="افزودن"  class="btn btn-primary col-sm-1 control-label">افزودن</button>
                <a href="{{route('admin.products.index')}}" class="btn btn-default">بازگشت <span class="fa fa-arrow-circle-left"></span></a>
            </div>

        </form>


        {{-- <form action="{{route('admin.products.store')}}"  method="POST" class="dropzone" id="myDropzone">@csrf</form> --}}
    </div>

@endsection
