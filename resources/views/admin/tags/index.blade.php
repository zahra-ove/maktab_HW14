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



<div class="container ">
    <a href="{{route('admin.tags.create')}}" class="btn btn-sm btn-outline-warning" >افزودن تگ جدید</a>
</div>

<div class="row justify-content-center">
    <div class="col-sm-9">
        <div class="col-auto my-4">
            <table class="table-responsive-sm  table-bordered table-hover text-center mytable">
                <thead class="thead-light">
                    <tr>
                        <th>Id</th>
                        <th>نام تگ</th>
                        <th>توضیحات تگ</th>
                        <th>تنظیمات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->tag_name}}</td>
                            <td>{{$tag->description}}</td>
                            <td>
                                <div class="btn-group">
                                <a href="{{ route('admin.tags.show', ['tag' => $tag])}}" class="btn btn-sm btn-warning">نمایش</a>
                                <a href="{{ route('admin.tags.edit', ['tag' => $tag])}}" class="btn btn-sm btn-primary">ویرایش</a>

                                <form action="{{route('admin.tags.destroy', ['tag' => $tag])}}" method="post">
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


@endsection
