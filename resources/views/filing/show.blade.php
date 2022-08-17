@extends('adminlte::page')

@section('title', 'Show Filing' )

@section('content_header')
    <h1>{{ $filing->name ?? 'Show Filing' }}</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Filing</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('filings.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Filing:</strong>
                            {{ $filing->filing }}
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
