@extends('layouts/app')

{{-- @push('scripts')
  <script type="text/javascript" src="/detail.js"></script>
@endpush --}}

@section('main')
{{-- {{dd($invoice_detail)}}; --}}
<div class="container">
    <form class="form-inline" action="/invoice_detail" method="get">
        <div class="form-group pt-5">
            <label for="invoice_no" class="mr-3">Invoice No: </label>
            <input type="text" name="find" class="form-control" placeholder={{$invoice_detail->invoice_id}}>
            <button type="submit" value="find" class="btn btn-primary ml-1">View</button>
        </div>
    </form>
    <br>
    <div class="form-group row">
        <div class="card">
            <div class="card-header">
                <h3 class="">Invoice Detail</h3>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-4">
                        <form class="form-inline">
                            <div class="form-group">
                                <label for="invoice_date" class="pr-3">Invoice Date</label>
                                <input type="text" class="form-control" value="{{$invoice_detail->invoice_date}}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="" class="pr-5">To</label>
                                <textarea class="form-control" aria-label="With textarea">{{$invoice_detail->kepada}}</textarea>
                            </div>
                            <div class="btn-group mt-3">
                                <label for="" class="pr-3">Sales Name:</label>
                                <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="sales_dropdown" id="sales_dropdown">
                                    @foreach($sales as $sale)
                                    <option value="{{ $sale->sales_id }}">{{ $sale->sales_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="btn-group mt-3">
                                <label for="" class="pr-3">Courier:</label>
                                <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="courier_dropdown" id="courier_dropdown">
                                    @foreach($courier as $cour)
                                    <option value="{{ $cour->courier_id }}" data-fee="{{$cour->courier_fee }}">{{ $cour->courier_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <label for="" class="pr-5">Ship To</label>
                            <textarea class="form-control" aria-label="With textarea">{{$invoice_detail->alamat_kirim}}</textarea>
                        </div>
                        <div class="d-flex mt-4">
                            <label for="" class="pr-3">Payment Type:</label>
                            <select class="form-control" name="" style="width:30%">
                                <option value="cash">Cash</option>
                                <option value="pay_later">Pay Later</option>
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
                </div>
        </div>
    </div>
    <div class="row">
        <button type="button" name="button" class="btn btn-primary">Save</button>
    </div>
</div>

<script>
    $(document).ready(function() {
        var sub_total = 0;
        var product_sub_total = 0;
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
        });
        $('#sub_total').val(sub_total);

        $(document).on('change', '#courier_dropdown', function() {
            var cour_drop = $(this).val();

            console.log(cour_drop);

            if (cour_drop == '1') {
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
    });
</script>
@endsection
