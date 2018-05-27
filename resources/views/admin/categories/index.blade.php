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
            <th>Name</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        </thead>
        <tbody>
        @if($categories)
            {{-- @php(dd($posts))--}}
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                    <td>{{$category->created_at ? $category->created_at->diffForHumans():'--'}}</td>
                    <td>{{$category->updated_at ? $category->updated_at->diffForHumans() : '--'}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection