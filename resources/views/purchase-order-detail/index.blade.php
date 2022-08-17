@extends('layouts.app')

@section('template_title')
    Purchase Order Detail
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Purchase Order Detail') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('purchase-order-details.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Purchase Order Id</th>
										<th>Product Id</th>
										<th>Quantity</th>
										<th>Price</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchaseOrderDetails as $purchaseOrderDetail)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $purchaseOrderDetail->purchase_order_id }}</td>
											<td>{{ $purchaseOrderDetail->product_id }}</td>
											<td>{{ $purchaseOrderDetail->quantity }}</td>
											<td>{{ $purchaseOrderDetail->price }}</td>

                                            <td>
                                                <form action="{{ route('purchase-order-details.destroy',$purchaseOrderDetail->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('purchase-order-details.show',$purchaseOrderDetail->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('purchase-order-details.edit',$purchaseOrderDetail->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $purchaseOrderDetails->links() !!}
            </div>
        </div>
    </div>
@endsection
