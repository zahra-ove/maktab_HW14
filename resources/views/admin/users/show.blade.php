@extends('admin.layouts.master')

@section('content')


{{-- Display status messages --}}
@if(session('status'))
    <div class="container alert alert-success alert-dismissable">
        <button class="close text-white" type="button" data-dismiss="alert">&times;&nbsp;&nbsp;</button>
        {{session('status')}}
    </div>
@endif
{{-- End Display status messages --}}



<div class="container">
    <div class="row mt-3">
        <div class="col-sm-3">
            @if(is_null($user->image))
            <div style="width:100%;height:100%;"><img src="{{asset('storage/products/noimage.jpg')}}" style="width:100%;height:100%;" /></div>

            @else
                <div style="width:100%;height:100%;"><img src="{{asset($user->image->image_path.$user->image->image_name)}}" class="rounded-circle" style="width:100%;height:100%;" /></div>
            @endif
        </div>

        <div class="col-sm-9 pr-3 mt-5">
            <p>نام:           <span  style="color:darkblue;">{{$user->name}}</span></p>
            <p>نام کاربری:    <span style="color:darkblue;">{{$user->username}}</span></p>
            <p>پست الکترونیک: <span  style="color:darkblue;">{{$user->email}}</span></p>
            <p>تاریخ عضویت:   <span  style="color:darkblue;">{{$user->created_at}}</span></p>
        </div>
    </div>
</div>


<div class="container">
    <a href="{{route('admin.users.index')}}"  class="btn btn-secondary float-left">بازگشت</a>
</div>

@endsection
