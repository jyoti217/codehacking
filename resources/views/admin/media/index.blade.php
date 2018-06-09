@extends('layouts.admin')

@section('content')
    @if(Session::has('success'))
        <p class="bg-success">{{session('success')}}</p>
    @endif
    @if(Session::has('failure'))
        <p class="bg-danger">{{session('failure')}}</p>
    @endif
    <h1>Media</h1>

    <form action="delete/media" method="post">
        {{csrf_field()}}
        {{method_field('delete')}}
        <div class="form-group col-sm-2">
            <select name="" id="" class="form-control">
                <option>Delete</option>
            </select>
        </div>
        
        <div class="form-group col-sm-2">
            <input type="submit" value="Apply" name="delete_selected" class="btn btn-primary"/>
        </div>


    <table class="table">
        <thead>
        <tr>
            <th><input type="checkbox" id="options" ></th>
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
                    <td><input class="checkboxes" type="checkbox" name="deleteArray[]" value="{{$photo->id}}"></td>
                    <td>{{$photo->id}}</td>
                    <td><img height="50" src="{{$photo->file?$photo->file:'http://placehold.it/400x400'}}" alt=""></td>
                    {{--<td><a href="{{route('admin.media.edit', $photo->id)}}">{{$photo->file}}</a></td>--}}
                    <td>{{$photo->created_at ? $photo->created_at->diffForHumans():'--'}}</td>
                    <td>
                        <div class="form-group">
                            <input type="hidden" name="single_delete_id" value="{{$photo->id}}">
                            <input class='btn btn-danger' type="submit" value="Delete" name="delete_single">
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    </form>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $('#options').click(function () {
            if(this.checked){
                $('.checkboxes').each(function(){
                    this.checked = true
                })
            }else{
                $('.checkboxes').each(function(){
                    this.checked = false
                })
            }
        })
    })
</script>
@endsection