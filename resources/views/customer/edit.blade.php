@extends('adminlte::page')

@section('title', 'Edit Customer')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Customer</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('customers.update', $customer->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('customer.form')

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
