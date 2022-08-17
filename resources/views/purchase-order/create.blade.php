@extends('adminlte::page')

@section('title', 'Create Purchase Order')

@section('content_header')
    <h1>Create Purchase Order</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Purchase Order</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('purchase-orders.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('purchase-order.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
