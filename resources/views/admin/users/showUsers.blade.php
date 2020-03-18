@extends('admin.layouts.master')

@section('content')

@if(session('status'))
    <div class="container alert alert-success alert-dismissable">
        <button class="close text-white" type="button" data-dismiss="alert">&times;&nbsp;&nbsp;</button>
        {{session('status')}}
    </div>
@endif

    {{-- @if(session('status'))
        <div class="container alert alert-success">
            {{session('status')}}
        </div>
    @endif --}}

    <div class="container ">
        <a href="{{route('admin.users.create')}}" class="btn btn-sm btn-outline-warning">افزودن کاربر جدید</a>

    <div class="col-auto my-4">
        <table class="table-responsive-sm  table-bordered table-hover text-center mytable smallFont">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>نام</th>
                    <th>نام کاربری</th>
                    <th>ایمیل</th>
                    <th>تاریخ عضویت</th>
                    <th>آخرین تغییرات</th>
                    <th>جنسیت</th>
                    <th>نقش</th>
                    <th>تصویر</th>
                    <th>تنظیمات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)

                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td>{{$user->gender->genderName}}</td>
                        <td>{{ implode(",", $user->roles()->get()->pluck('name')->toArray())}}</td>
                        <td>
                            @if(is_null($user->image))
                                {{'No Image'}}
                            @else
                                <div style="width:100%;height:100%;"><img src="{{asset($user->image->image_path.$user->image->image_name)}}" style="width:50%;height:50%;" /></div>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                            <a href="{{ route('admin.users.show', ['user' => $user] ) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye" style="color:black;"></i></a>
                            <a href="{{ route('admin.users.edit', ['user' => $user] ) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>

                            <form action="{{route('admin.users.destroy', ['user' => $user])}}" method="post">
                                @method('DELETE')
                                @csrf

                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash" style="color:black;" aria-hidden="true"></i></button>
                            </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
