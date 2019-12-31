@extends('layout.base')

@section('title', $title)

@section('content')
<h3>Edit Category {{$category->name}}</h3>
<hr>
<form action="/category/{{$category->id}}" method="POST">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Please fill the name" value="{{$category->name}}">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{$category->description}}</textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection