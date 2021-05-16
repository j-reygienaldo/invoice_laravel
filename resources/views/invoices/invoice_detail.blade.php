@extends('layouts/app')

{{-- @push('scripts')
  <script type="text/javascript" src="/detail.js"></script>
@endpush --}}
@section('main')
{{-- {{dd($invoice_detail)}}; --}}

<div class="container">
    {{-- <form class="form-inline" action="/invoice_detail" method="GET">
        <div class="form-group pt-5">
            <label for="invoice_no" class="mr-3">Invoice No: </label>
            <input type="text" id="find" name="find" class="form-control" placeholder="" value={{$invoice_detail->invoice_id}}>
    <button type="submit" value="find" class="btn btn-primary ml-1">View</button>
</div>
</form>
<br> --}}

<form class="form-group" action="/invoice_detail" enctype="multipart/form-data" method="POST">
    @csrf
    <div class="form-group row">
        <div class="card col-md-12">
            <div class="card-header">
                <h3 class="">Invoice Detail</h3>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6">
                        <form class="form-inline">
                            <div class="form-group form-inline">
                                <label for="invoice_date" class="pr-3">Invoice Date</label>
                                <label id="inv_id" for="invoice_id" class="invisible">{{$invoice_detail->invoice_id}}</label>
                                <input type="text" id="inv_date" class="form-control" value="{{$invoice_detail->invoice_date}}" style="width:30%">
                            </div>
                            <div class="form-group form-inline mt-3">
                                <label for="" class="pr-5">To</label>
                                <textarea class="form-control" id="inv_kepada" aria-label="With textarea" style="width:50%">{{$invoice_detail->kepada}}</textarea>
                            </div>
                            <div class="form-inline btn-group mt-3">
                                <label for="" class="pr-3">Sales Name:</label>
                                <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="sales_dropdown" id="sales_dropdown">
                                    @foreach($sales as $sale)
                                    <option value="{{ $sale->sales_name }}">{{ $sale->sales_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-inline btn-group mt-3">
                                <label for="" class="pr-3">Courier:</label>
                                <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="courier_dropdown" id="courier_dropdown">
                                    @foreach($courier as $cour)
                                    <option value="{{ $cour->courier_name }}" data-fee="{{$cour->courier_fee }}">{{ $cour->courier_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <label for="" class="pr-5">Ship To</label>
                            <textarea class="form-control" id="inv_kirim" aria-label="With textarea">{{$invoice_detail->alamat_kirim}}</textarea>
                        </div>
                        <div class="d-flex mt-4">
                            <label for="" class="pr-3">Payment Type:</label>
                            <select class="form-control" id="inv_payment" style="width:30%">
                                <option value="Cash">Cash</option>
                                <option value="Pay Later">Pay Later</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 pt-3">
            <table class="table" id="product_table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Item</th>
                        <th scope="col">Weight (Kg)</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                @foreach ($table as $tab)
                <tbody>
                    <tr>
                        <th scope="row">{{$tab->product_name}}</th>
                        <td>{{$tab->weight}}</td>
                        <td>{{$tab->buy_qty}}</td>
                        <td>{{$tab->price}}</td>
                        <td>{{$tab->buy_qty * $tab->price}}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>

    <div class="row">
        <div class="d-flex ml-auto">
            <fieldset disabled>
                <div class="form-group d-flex">
                    <label for="disabledTextInput" class="pr-3">Sub Total</label>
                    <input type="text" id="sub_total" class="form-control" style="width:40%" value="">
                </div>
                <div class="form-group d-flex">
                    <label for="" class="pr-3">Courier Fee</label>
                    <input type="text" id="cour_fee" class="form-control" style="width:40%" value="">
                </div>
                <div class="form-group d-flex ml-auto">
                    <label for="" class="pr-3">Total</label>
                    <input type="text" id="total" class="form-control" style="width:40%" value="">
                    <label for="" id="pr_sub_total" class="invisible"></label>
                </div>
        </div>
    </div>

    <div class="input-group row">
        <button type="submit " name="button" id="update" class="btn btn-primary">Save</button>
    </div>
</form>
</div>


<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    var product_sub_total = 0;
    var sub_total = 0;

    // hitung total biaya kurir
    $(document).ready(function() {
        // var sub_total = 0;
        // var product_sub_total = 0;
        $("#product_table tr").not(':first').each(function() {
            sub_total += getnum($(this).find("td:eq(3)").text());
            product_sub_total += getnum($(this).find("td:eq(1)").text()) * getnum($(this).find("td:eq(0)").text());

            function getnum(t) {
                if (isNumeric(t)) {
                    return parseInt(t, 10);
                }
                return 0;

                function isNumeric(n) {
                    return !isNaN(parseFloat(n)) && isFinite(n);
                }
            }
        })
        $('#sub_total').val(sub_total);
    });

    // hitung total biaya semuanya
    $(document).on('change', '#courier_dropdown', function() {
        var cour_drop = $(this).val();
        var cour_total_fee = 0;

        console.log(cour_drop);

        if (cour_drop == 'Express') {
            cour_total_fee = product_sub_total * 10000;
            $('#cour_fee').val(cour_total_fee);
        } else {
            cour_total_fee = product_sub_total * 11000;
            $('#cour_fee').val(cour_total_fee);
        }
        var total = sub_total + cour_total_fee;
        $('#total').val(total);
        console.log(total);
    });

    //update parent invoice
    $(document).on("click", "#update", function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var edit_id = {{$invoice_detail->invoice_id}};

        console.log(edit_id);
        var inv_date = $('#inv_date').val();
        var inv_kepada = $('#inv_kepada').val();
        var inv_sales = $('#sales_dropdown').val();
        var inv_courier = $('#courier_dropdown').val();
        var inv_kirim = $('#inv_kirim').val();
        var inv_payment = $('#inv_payment').val();

        var sub_total = $('#sub_total').val();
        var total_courier_fee = $('#cour_fee').val();
        var grand_total = $('#total').val();
        console.log(inv_date);

        if (inv_date != '' && inv_kepada != '') {
            $.ajax({
                //url: 'invoice_detail?find=1',
                // url: 'invoice_detail?find=' + edit_id,
                url: 'invoice_detail',
                type: 'POST',
                data: {
                    invoice_id: edit_id,
                    invoice_date: inv_date,
                    kepada: inv_kepada,
                    sales_name: inv_sales,
                    courier_name: inv_courier,
                    alamat_kirim: inv_kirim,
                    payment_type: inv_payment
                    // sub_total: sub_total,
                    // courier_fee: total_courier_fee,
                    // total: grand_total
                },
                success: function(response) {
                    console.log(response);
                }
            })
        } else {
            alert('Fill all fields');
        }
    });
</script>
@endsection
