@extends('adminlte::page')

@section('title', 'Show Product')

@section('content_header')
    <h1>{{ $product->name ?? 'Show Product' }}</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Product</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $product->name }}
                        </div>
                        <div class="form-group">
                            <strong>Sale Price:</strong>
                            {{ $product->sale_price }}
                        </div>
                        <div class="form-group">
                            <strong>Purchase Price:</strong>
                            {{ $product->purchase_price }}
                        </div>
                        <div class="form-group">
                            <strong>Expiration Date:</strong>
                            {{ $product->expiration_date }}
                        </div>
                        <div class="form-group">
                            <strong>Stock:</strong>
                            {{ $product->stock }}
                        </div>
                        <div class="form-group">
                            <strong>Category Id:</strong>
                            {{ $product->category_id }}
                        </div>
                        <div class="form-group">
                            <strong>Filing Id:</strong>
                            {{ $product->filing_id }}
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
