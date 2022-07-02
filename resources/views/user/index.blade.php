@extends('layouts.app')

@section('title')
        all users phone
@endsection

@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">phones</th>
      <th scope="col">delete</th>
      <th scope="col">update</th>
      <th scope="col">show</th>
      <th scope="col">ownerPhone</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        @foreach($phones as $phone )
      <th scope="row">{{$phone->id}}</th>
      <td>{{$phone->phone}}</td>
      <td><a href = "{{route('crud.edit',$phone->id)}}"><button type="button" class="btn btn-primary">update</button></a></td>
    <td>
        <form action = "{{route('crud.destroy',$phone->id)}}" method = 'post'>
            @csrf
            @method('delete')
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </td>
    <td><a href = "{{route('crud.show',$phone->id)}}"><button type="button" class="btn btn-success">show</button></a></td>
    <td><div class="text-danger">{{$phone->user->name}}</div></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection