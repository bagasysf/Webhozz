@extends('layout.base')

@section('title', $title)

@section('content')
<div class="table-responsive">
    <h1>Categories</h1>
    <a href="/category/create" class="btn btn-info my-3">Create new category</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Pomade</td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection