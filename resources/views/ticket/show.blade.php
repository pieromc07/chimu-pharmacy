@extends('adminlte::page')

@section('title', 'Show Ticket')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Ticket</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tickets.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Ticket Number:</strong>
                            {{ $ticket->ticket_number }}
                        </div>
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $ticket->date }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $ticket->total }}
                        </div>
                        <div class="form-group">
                            <strong>Discount:</strong>
                            {{ $ticket->discount }}
                        </div>
                        <div class="form-group">
                            <strong>Employee Id:</strong>
                            {{ $ticket->employee_id }}
                        </div>
                        <div class="form-group">
                            <strong>Customer Id:</strong>
                            {{ $ticket->customer_id }}
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
