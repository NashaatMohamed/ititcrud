@extends('layouts.app');

@section('title')
    update users phones
@endsection


@section('content')
<form action= '{{route("crud.update",$phones->id)}}' method = 'post'>
    @csrf
    @method('put')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Your phone</label>
    <input type="text" name = 'phone' value = "{{$phones->phone}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">update</button>
</form>
@endsection