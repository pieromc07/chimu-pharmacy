@extends('adminlte::page')

@section('title', 'Show Purchase Order Detail')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Purchase Order Detail</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('purchase-order-details.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Purchase Order Id:</strong>
                            {{ $purchaseOrderDetail->purchase_order_id }}
                        </div>
                        <div class="form-group">
                            <strong>Product Id:</strong>
                            {{ $purchaseOrderDetail->product_id }}
                        </div>
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            {{ $purchaseOrderDetail->quantity }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $purchaseOrderDetail->price }}
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
