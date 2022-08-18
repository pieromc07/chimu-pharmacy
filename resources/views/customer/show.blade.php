@extends('adminlte::page')

@section('title', 'Show Customer')

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
                            <strong>Document:</strong>
                            {{ $customer->document }}
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
