@extends('adminlte::page')

@section('title', 'Show Purchase Order')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Purchase Order</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('purchase-orders.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Purcahse Order Number:</strong>
                            {{ $purchaseOrder->purcahse_order_number }}
                        </div>
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $purchaseOrder->date }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $purchaseOrder->total }}
                        </div>
                        <div class="form-group">
                            <strong>Status:</strong>
                            {{ $purchaseOrder->status }}
                        </div>
                        <div class="form-group">
                            <strong>Supplier Id:</strong>
                            {{ $purchaseOrder->supplier_id }}
                        </div>
                        <div class="form-group">
                            <strong>Employee Id:</strong>
                            {{ $purchaseOrder->employee_id }}
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
