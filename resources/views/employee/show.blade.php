@extends('adminlte::page')

@section('title', 'Show Employee')

@section('content_header')
    <h1>{{ $employee->full_name ?? 'Show Employee' }}</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Employee</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Full Name:</strong>
                            {{ $employee->full_name }}
                        </div>
                        <div class="form-group">
                            <strong>Dni:</strong>
                            {{ $employee->dni }}
                        </div>
                        <div class="form-group">
                            <strong>Address:</strong>
                            {{ $employee->address }}
                        </div>
                        <div class="form-group">
                            <strong>Workstation:</strong>
                            {{ $employee->workstation }}
                        </div>
                        <div class="form-group">
                            <strong>Age:</strong>
                            {{ $employee->age }}
                        </div>
                        <div class="form-group">
                            <strong>Phone:</strong>
                            {{ $employee->phone }}
                        </div>
                        <div class="form-group">
                            <strong>Contract Start:</strong>
                            {{ $employee->contract_start }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $employee->user_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
