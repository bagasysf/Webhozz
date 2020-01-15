@extends('layout.base')

@section('title', $title)

@section('content')
<h3>Create new product</h3>
<hr>
<form action="/product" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="category_id">
            <option value="">Please select</option>
            @foreach($categories as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Please fill the name">
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="text" name="price" id="price" class="form-control" placeholder="Please fill the price">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class=" form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
@endsection