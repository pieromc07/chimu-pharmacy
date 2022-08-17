@extends('adminlte::page')

@section('title', 'Show Supplier')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Supplier</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('suppliers.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $supplier->name }}
                        </div>
                        <div class="form-group">
                            <strong>Ruc:</strong>
                            {{ $supplier->ruc }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $supplier->address }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $supplier->phone }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
