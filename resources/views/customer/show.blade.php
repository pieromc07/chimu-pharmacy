@extends('adminlte::page')

@section('title', 'Show Customer')


@section('content_header')
    <h1>{{ $customer->full_name ?? 'Show Customer' }}</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Customer</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('customers.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Full Name:</strong>
                            {{ $customer->full_name }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $customer->address }}
                        </div>
                        <div class="form-group">
                            <strong>Gender:</strong>
                            {{ $customer->gender }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $customer->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Dni:</strong>
                            {{ $customer->dni }}
                        </div>
                        <div class="form-group">
                            <strong>Ruc:</strong>
                            {{ $customer->ruc }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
