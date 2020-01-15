@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($products as $product)
        <div class="col md-4">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset('images/'. $product->image) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->title }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <form action="/add-to-cart/{{ $product->id }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection