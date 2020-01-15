@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        TransactionDetail {{ $transactiondetail->id }}
                        <div class="text-right">
                            <a href="{{ url('/transaction-detail') }}" title="Back">
                                <button class="btn btn-warning">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/transaction-detail/' . $transactiondetail->id . '/edit') }}" title="Edit TransactionDetail">
                            <button class="btn btn-primary">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                            </button>
                        </a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['transactiondetail', $transactiondetail->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger',
                                    'title' => 'Delete TransactionDetail',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}

                        <div class="table-responsive py-4">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $transactiondetail->id }}</td>
                                    </tr>
                                    <tr><th> Transaction Id </th><td> {{ $transactiondetail->transaction_id }} </td></tr><tr><th> Product Id </th><td> {{ $transactiondetail->product_id }} </td></tr><tr><th> Quantity </th><td> {{ $transactiondetail->quantity }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
