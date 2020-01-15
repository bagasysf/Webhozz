@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Transaction</div>
                    <div class="card-body">
                        <a href="{{ url('/transaction/create') }}" class="btn btn-success mb-4" title="Add New Transaction">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/transaction', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <span class="input-group-append">
                                <button class="btn btn-dark" type="submit">
                                    Search
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <div class="table-responsive py-4">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th><th>User Id</th><th>Total</th><th>Status</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($transaction as $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item->user_id }}</td><td>{{ $item->total }}</td><td>{{ $item->status }}</td>
                                        <td>
                                            <a href="{{ url('/transaction/' . $item->id) }}" title="View Transaction"><button class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/transaction/' . $item->id . '/edit') }}" title="Edit Transaction"><button class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/transaction', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger',
                                                        'title' => 'Delete Transaction',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="{{ config('laravelmanthra.view_columns_number') + 2 }}">
                                            Data not found, <a href="{{ url('/transaction/create') }}"> create new </a>
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $transaction->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('manthra::include.flash_message')
@endsection

