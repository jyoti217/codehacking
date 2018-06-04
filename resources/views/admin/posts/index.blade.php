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
            <th>Category</th>
            <th>Photo</th>
            <th>Title</th>
            <th>User</th>
            <th>Body</th>
            <th>View post</th>
            <th>View comments</th>
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
                    <td>{{$post->category->name?$post->category->name:'Uncagegoriesd' }}</td>
                    <td><img height="40" src="{{$post->photo?$post->photo->file:'http://placehold.it/400x400'}}" alt=""></td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td><a href="{{route('admin.users.edit', $post->user_id)}}">{{$post->user->name}}</a></td>
                    <td>{{str_limit($post->body, 30)}}</td>
                    <td><a href="{{route('home.post', $post->slug?$post->slug:$post->id)}}">view post</a></td>
                    <td><a href="{{route('admin.comments.show', $post->id)}}">view comments</a></td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>
@endsection