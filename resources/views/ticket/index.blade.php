@extends('adminlte::page')

@section('title', 'Tickets')

@section('content_header')
    <h1>Tickets</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ticket') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('tickets.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Ticket Number</th>
										<th>Date</th>
										<th>Total</th>
										<th>Discount</th>
										<th>Employee Id</th>
										<th>Customer Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $ticket->ticket_number }}</td>
											<td>{{ $ticket->date }}</td>
											<td>{{ $ticket->total }}</td>
											<td>{{ $ticket->discount }}</td>
											<td>{{ $ticket->employee_id }}</td>
											<td>{{ $ticket->customer_id }}</td>

                                            <td>
                                                <form action="{{ route('tickets.destroy',$ticket->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('tickets.show',$ticket->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $tickets->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
