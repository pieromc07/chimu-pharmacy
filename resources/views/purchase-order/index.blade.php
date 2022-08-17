@extends('adminlte::page')

@section('title', 'Purchase Orders')

@section('content_header')
    <h1>Purchase Orders</h1>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Purchase Order') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('purchase-orders.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Purcahse Order Number</th>
										<th>Date</th>
										<th>Total</th>
										<th>Status</th>
										<th>Supplier Id</th>
										<th>Employee Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchaseOrders as $purchaseOrder)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $purchaseOrder->purcahse_order_number }}</td>
											<td>{{ $purchaseOrder->date }}</td>
											<td>{{ $purchaseOrder->total }}</td>
											<td>{{ $purchaseOrder->status }}</td>
											<td>{{ $purchaseOrder->supplier_id }}</td>
											<td>{{ $purchaseOrder->employee_id }}</td>

                                            <td>
                                                <form action="{{ route('purchase-orders.destroy',$purchaseOrder->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('purchase-orders.show',$purchaseOrder->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('purchase-orders.edit',$purchaseOrder->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $purchaseOrders->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
