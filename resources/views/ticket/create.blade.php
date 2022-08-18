@extends('adminlte::page')

@section('title', 'Create Ticket')

@section('content_header')
    <h1>Create Ticket</h1>
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Ticket</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tickets.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="ticket_number">Codigo de Ticket</label>
                                        <input class="form-control" id="ticket_number" type="text" placeholder=""
                                            name="ticket_number" value="{{ $ticket->ticket_number }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Fecha de entrega</label>
                                        <input class="form-control" id="date" name="date" type="hidden"
                                            value="{{ $ticket->date }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="d-flex flex-wrap align-content-center"
                                            for="quantiy">{{ __('Quantiy') }}</label>
                                        <input class="form-control" type="number" id="quantity" value="1"
                                            min="1" placeholder="number">
                                        <p id="error" class="text-danger font-weight-bold d-none">required</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    {{-- DNI O RUC (form text customer) --}}
                                    <div class="form-group">
                                        <label for="customer_id">Cliente</label>
                                        <input class="form-control" id="customer_id" type="text" placeholder="DNI o RUC"
                                            name="customer_id">
                                    </div>
                                    <div class="form-group">
                                        <label for="product">Producto</label>
                                        <select class="form-control" id="products" type="text">
                                            @foreach ($categories as $category)
                                                <optgroup label="{{ $category->category }}">
                                                    @foreach ($products as $product)
                                                        @if ($product->category->category == $category->category)
                                                            <option
                                                                value="{{ $product->id }}_{{ $product->name }}_{{ $product->sale_price }}_{{ $product->stock }}">
                                                                {{ $product->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <button type="button" class="btn btn-primary my-4" id="add"> Agregar</button>

                                    </div>
                                </div>
                                <div class="row d-flex justify-content-around">
                                    <div class="col-12 ">
                                        <div class="tile-footer d-flex justify-content-around">

                                            <button class="btn btn-success m-auto" type="submit"><i
                                                    class="fa fa-fw fa-lg fas fa-check"></i>Realizar venta
                                                </button>
                                        </div>
                                    </div>
                                </div>


                                <div class="ml-3 col-md-5 d-none alert alert-danger" role="alert" id="error-exists">
                                    <strong>This
                                        product is already added</strong>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="detalle">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre de Producto</th>
                                                <th>Cantidad</th>
                                                <th>Quitar</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                {{-- input text total --}}
                                <div class="form-group">
                                    <label for="total">Total</label>
                                    <input class="form-control" id="total" type="text" placeholder="" name="total"
                                        value="0" readonly>
                                </div>
                                <input type="hidden" name="employee_id" value="{{ $ticket->employee_id }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
@stop
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

    <script type="text/javascript">
        // $('#products').select2();
        let index = 0;
        let i = 1;
        let total = 0;
        let list_Product = [];
        $('#total').val(total);
        $('#add').click(function(e) {
            e.preventDefault();
            let product = $('#products').val().split('_');
            let quantity = $('#quantity').val();
            if (validate(quantity, product[0], product[3])) {
                let row = '<tr id="row' + index + '"><input type="hidden" name="list_price[]" value="' + product[2] + '"><td><input type="hidden" name="list_products[]" value="' +
                    product[0] + '"><input type="hidden" name="list_quantity[]" value="' + quantity + '">' + i++ +
                    '</td><td>' + product[1] + '</td><td>' + quantity + '</td><td><button onclick="remove(' +
                    index + ' , ' + (product[2] *
                        quantity) + ' )" class="btn btn-danger"><i class="fas fa-minus"></i></button></td></tr>';
                $('#error').removeClass('d-block');
                $('#detalle').append(row);
                total += (product[2] * quantity);
                list_Product[index] = [product[0]];
                $('#total').val(total);
                index++;
                $('#quantity').val(1);
                $('#error-exists').removeClass('d-block');
            }
        });

        function remove(row, price) {
            $('#row' + row).remove();
            total -= price;
            list_Product.splice(row);
            $('#total').html(total);
            index--;
            i--;
        }

        function validate(units, id, stock) {
            console.log(units + ' ' + stock);
            if (parseInt(units) <= parseInt(stock)) {
                if (parseInt(units) != 0) {
                    for (let count = 0; count < list_Product.length; count++) {
                        const element = list_Product[count];
                        if (element == id) {
                            $('#error-exists').addClass('d-block');
                            return false;
                        }
                    }
                    return true;
                } else {
                    $('#error').addClass('d-block');
                    return false;
                }
            } else {
                $('#error-stock').addClass('d-block');
                return false;
            }
        }
    </script>
@stop
