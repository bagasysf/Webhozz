@extends('layout.base')

@section('title', $title)

@section('content')
<h3>Edit Product {{$products->name}}</h3>
<hr>
<form action="/product/{{$products->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="category_id">
            <option value="">Please select</option>
            @foreach($categories as $item)
            <option value='{{$item->id}}' {{$products->category_id == $item->id ? 'selected':null}}>{{$item->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Please fill the name" value="{{$products->name}}">
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="text" name="price" id="price" class="form-control" placeholder="Please fill the price" value="{{$products->price}}">
    </div>
    <div class="form-group">
        <label>Description</label>
        <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{$products->description}}"</textarea>
    </div>
    <div class="form-group">
        <label>Image</label><br>
        <img src="{{asset('images') . '/' . $products->image}}" alt="" style="width: 128px; height: 128px">
        <input type="file" name="image" class="form-control">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
@endsection