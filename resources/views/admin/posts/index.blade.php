@extends('layouts.admin')

@section('content')
    @if(Session::has('success'))
        <p class="bg-success">{{session('success')}}</p>
    @endif
    @if(Session::has('failure'))
        <p class="bg-danger">{{session('failure')}}</p>
    @endif
    <h1>Posts</h1>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Title</th>
            <th>User</th>
            <th>Body</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            {{-- @php(dd($posts))--}}
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="40" src="{{$post->photo?$post->photo->file:'http://placehold.it/400x400'}}" alt=""></td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td><a href="{{route('admin.users.edit', $post->user_id)}}">{{$post->user->name}}</a></td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection