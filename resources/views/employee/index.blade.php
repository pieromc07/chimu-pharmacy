@extends('adminlte::page')

@section('title', 'Employees')

@section('content_header')
    <h1>Employees</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Employee') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('employees.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

										<th>Full Name</th>
										<th>Dni</th>
										<th>Address</th>
										<th>Workstation</th>
										<th>Age</th>
										<th>Phone</th>
										<th>Contract Start</th>
										<th>User Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $employee->full_name }}</td>
											<td>{{ $employee->dni }}</td>
											<td>{{ $employee->address }}</td>
											<td>{{ $employee->workstation }}</td>
											<td>{{ $employee->age }}</td>
											<td>{{ $employee->phone }}</td>
											<td>{{ $employee->contract_start }}</td>
											<td>{{ $employee->user_id }}</td>

                                            <td>
                                                <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('employees.show',$employee->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('employees.edit',$employee->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $employees->links() !!}
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
