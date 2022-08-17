@extends('adminlte::page')

@section('title', 'Create Filing')

@section('content_header')
    <h1>Create Filing</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Filing</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('filings.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('filing.form')

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
