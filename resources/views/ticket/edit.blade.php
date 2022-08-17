@extends('adminlte::page')

@section('title', 'Edit Ticket')

@section('content_header')
    <h1>Edit Ticket</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Ticket</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tickets.update', $ticket->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('ticket.form')

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
