@extends('layout.base')

@section('content')
<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Trx ID</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        @forelse ($detail as $item)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $transaction->id }}</td>
            <td>{{ $item->product->name ?? null }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->sub_total }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5">Ops. Your cart is empty</td>
        </tr>
        @endforelse
        @if($transaction)
        <tr>
            <td colspan="4">Total</td>
            <td>{{ $transaction->total }}</td>
        </tr>
        @endif
    </table>
    @if($transaction)
    <form action="/checkout/{{ $transaction->id }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Checkout</button>
    </form>
    @endif

</div>
@endsection