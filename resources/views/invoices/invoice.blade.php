@extends('layouts/app')

@section('main')
<div class="container">
    <div class="row">
        <div class="form-group pt-3 col-md-4">
            <form class="form-inline" action="/invoice_detail" method="get">
                <label for="" class="mr-3">Invoice No: </label>
                <input type="text" name="find" class="form-control">
                <button type="submit" value="find" class="btn btn-primary">View</button>
            </form>
        </div>
    </div>
</div>
@endsection
