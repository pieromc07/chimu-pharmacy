@extends('adminlte::page')

@section('title', 'Show Ticket Details')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Ticket Detail</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ticket-details.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Ticket Id:</strong>
                            {{ $ticketDetail->ticket_id }}
                        </div>
                        <div class="form-group">
                            <strong>Product Id:</strong>
                            {{ $ticketDetail->product_id }}
                        </div>
                        <div class="form-group">
                            <strong>Quantity:</strong>
                            {{ $ticketDetail->quantity }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $ticketDetail->price }}
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
