@extends('layouts.admin')

@section('content')
    @if(Session::has('success'))
        <p class="bg-success">{{session('success')}}</p>
    @endif
    @if(Session::has('failure'))
    <p class="bg-danger">{{session('failure')}}</p>
    @endif
    <h1>Admin/Users</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Active</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
        @if($users)
           {{-- @php(dd($users))--}}
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><img height="40" src="{{$user->photo?$user->photo->file:'http://placehold.it/400x400'}}" alt=""></td>
                    <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{($user->is_active)? 'Yes': 'No'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection