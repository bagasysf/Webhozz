@extends('layout.base')

@section('title', $title)

@section('content')
<div class="table-responsive">
    <h1>Categories</h1>
    <a href="/product/create" class="btn btn-info my-3">Create new product</a>
    <table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Category</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Image</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php
            //ini untuk buat nomor
            $num = 0;
            @endphp

            @foreach($products as $item)
            @php
            //tambahin nomor setiap urut loop
            $num++;
            @endphp
            <tr>
                <td>{{$num}}</td>
                <td>{{$item->category->name}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->description}}</td>
                <td><img src="{{ asset('/images/'.$item->image)}}" alt="" style="width: 60px; height: 60px"></td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td>
                    <form action="/product/{{$item->id}}" method="POST">
                        <a class="btn btn-success" href="/product/{{$item->id}}/edit">Update</a>
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection