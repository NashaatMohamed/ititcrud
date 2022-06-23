@extends('layouts.app');

@section('title')
    create users phones
@endsection


@section('content')
<form action= '{{route("crud.store")}}' method = 'post'>
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Your phone</label>
    <input type="text" name = 'phone' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection