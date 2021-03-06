@extends('dashboard.layouts.master')

@section('dashboard', 'current')
@section('title', 'داشبورد')

@section('body')
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{route("home")}}">
                <div class="row mx-5">
                    <input type="text" name="search" class="form-control col-10" placeholder="جستجو بر اساس نام و ایمیل می‌باشد.">
                <input type="submit" value="جستجو" class="btn btn-primary mx-3">
                </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered text-center table-striped table-hover table-responsive-md">
                    <thead>
                        <th>ردیف</th>
                        <th>اسم</th>
                        <th>ایمیل</th>
                        <th>مقام</th>
                        <th>مدیریت</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ __($user->role) }}</td>
                                <td class="d-flex justify-content-center">
                                    <a href="{{route("show.user",$user->id)}}" class="btn btn-warning text-dark">نمایش</a>
                                    <form action="{{route("make.admin",$user->id)}}" method="POST" class="{{$user->id==auth()->id() ? "d-none" : ""}}">
                                        |
                                        @csrf
                                        <input type="submit" class="btn btn-danger rounded mx-auto" value="تغیر مقام">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="ltr justify-content-center">
                    {{ $users->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
