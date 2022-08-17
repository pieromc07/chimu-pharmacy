@extends('adminlte::page')

@section('title', 'Create Voucher Type')

@section('content_header')
    <h1>Create Voucher Type</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Voucher Type</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('voucher-types.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('voucher-type.form')

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
