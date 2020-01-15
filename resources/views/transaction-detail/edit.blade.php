@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Edit TransactionDetail #{{ $transactiondetail->id }}
                        <div class="text-right">
                            <a href="{{ url('/transaction-detail') }}" title="Back">
                                <button class="btn btn-warning">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                        {!! Form::model($transactiondetail, [
                            'method' => 'PATCH',
                            'url' => ['/transaction-detail', $transactiondetail->id],
                            'class' => 'form-horizontal',
                            'files' => true,
                            'onsubmit' => "submitButton.disabled = true"
                        ]) !!}

                        @include ('transaction-detail.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
