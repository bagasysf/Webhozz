@extends('layout.base')

@section('title', $title)

@section('content')
<h3>Create new category</h3>
<hr>
<form action="">
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Please fill the name">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-primary">Save</button>
    </div>
</form>
@endsection