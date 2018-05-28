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
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @if($photos)
            {{-- @php(dd($posts))--}}
            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img height="50" src="{{$photo->file?$photo->file:'http://placehold.it/400x400'}}" alt=""></td>
                    {{--<td><a href="{{route('admin.media.edit', $photo->id)}}">{{$photo->file}}</a></td>--}}
                    <td>{{$photo->created_at ? $photo->created_at->diffForHumans():'--'}}</td>
                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete Media', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection