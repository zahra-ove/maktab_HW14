@extends('admin.layouts.master')

@section('content')

{{-- Displaying Messagas --}}
@if(session('status'))
<div class="container alert alert-success alert-dismissable">
    <button class="close text-white" type="button" data-dismiss="alert">&times;&nbsp;&nbsp;</button>
    {{session('status')}}
</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{{--  data-toggle="modal" data-target="#myModal" --}}
<div class="container ">
    <a href="{{route('admin.products.create')}}" class="btn btn-sm btn-outline-warning" id="addNewItem">افزودن محصول جدید</a>
</div>

<div class="row justify-content-center">
    <div class="col-sm-9">
        <div class="col-auto my-4">
            <table class="table-responsive-sm  table-bordered table-hover text-center mytable">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>کد محصول</th>
                        <th>نام محصول</th>
                        <th>قیمت</th>
                        <th>موجودی</th>
                        <th>دسته بندی</th>
                        <th>تصویر</th>
                        <th>تنظیمات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->product_code}}</td>
                            <td><a href="{{route('admin.products.show', $product)}}">{{$product->product_name}}</a></td>
                            <td>{{$product->product_price}}</td>
                            <td>{{$product->product_count}}</td>
                            <td>{{$product->category->category_name}}</td>
                            <td ><img src="{{asset('storage/products/'.$product->images->first()->image_name)}}" style="width:50%;height:50%;"></td>
                            <td>
                                <div class="btn-group">
                                <a href="{{ route('admin.products.edit', ['product' => $product])}}" class="btn btn-sm btn-primary">ویرایش</a>

                                <form action="{{route('admin.products.destroy', ['product' => $product])}}" method="post">
                                    @method('DELETE')
                                    @csrf

                                    <button class="btn btn-sm btn-danger">حذف</button>
                                </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



  <!-- Modal -->
  <div class="modal fade mt-5" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="modalTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!-- Modal Body -->
        <div class="modal-body">
            <form action="#" method="POST"  id="addForm"  enctype="multipart/form-data">
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

                {{-- image upload by dropzone  class="dropzone-previews" --}}
                <div  class="dropzone" id="myDropzone"></div>
            </form>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="close" data-dismiss="modal">بی خیال!</button>
          <button type="button" class="btn btn-primary" id="add" style="display:none;">افزودن</button>
          <button type="button" class="btn btn-primary" id="edit" style="display:none;">ویرایش</button>
        </div>

      </div>
    </div>
  </div>

@endsection
