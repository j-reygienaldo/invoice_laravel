@extends('layouts/app')

@section('main')
{{-- {{dd($sales)}} --}}
<div class="container">
    <form class="form-inline">
        <div class="form-group pt-5">
            <label for="" class="mr-3">Invoice No: </label>
            <input type="text" class="form-control">
            <button type="button" name="button" class="btn btn-primary ml-1">View</button>
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
                                <label for="" class="pr-3">Invoice Date</label>
                                <input type="text" class="form-control" value="">
                            </div>
                            <div class="form-group mt-3">
                                <label for="" class="pr-5">To</label>
                                <textarea class="form-control" aria-label="With textarea"></textarea>
                            </div>
                            <div class="btn-group mt-3">
                                <label for="" class="pr-3">Sales Name:</label>
                                <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="dropdown">
                                    @foreach($sales as $sale)
                                    <option value="{{ $sale->sales_id }}">{{ $sale->sales_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="btn-group mt-3">
                              <label for="" class="pr-3">Courier:</label>
                              <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="dropdown">
                                  @foreach($courier as $cour)
                                  <option value="{{ $cour->courier_id }}">{{ $cour->courier_name }} - {{$cour->courier_fee}}</option>
                                  @endforeach
                              </select>
                            </div>
                        </form>
                    </div>
                    <div class="form-group col-md-4">
                        <div class="input-group">
                            <label for="" class="pr-5">Ship To</label>
                            <textarea class="form-control" aria-label="With textarea"></textarea>
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
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Item</th>
                        <th scope="col">Weight (Kg)</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="d-flex ml-auto">
            <fieldset disabled>
                <div class="form-group d-flex">
                    <label for="disabledTextInput" class="pr-3">Sub Total</label>
                    <input type="text" id="disabledTextInput" class="form-control" placeholder="" style="width:40%">
                </div>
                <div class="form-group d-flex">
                    <label for="disabledTextInput" class="pr-3">Courier Fee</label>
                    <input type="text" id="disabledTextInput" class="form-control" placeholder="" style="width:40%">
                </div>
                <div class="form-group d-flex ml-auto">
                    <label for="disabledTextInput" class="pr-3">Total</label>
                    <input type="text" id="disabledTextInput" class="form-control" placeholder="" style="width:40%">
                </div>
        </div>
    </div>
    <div class="row">
        <button type="button" name="button" class="btn btn-primary">Save</button>
    </div>
</div>
@endsection
