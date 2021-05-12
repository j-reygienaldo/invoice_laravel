@extends('layouts/app')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-4">
          <form class="" action="/invoice_detail" method="get">
            <label for="">No Invoice:</label>
            <input type="search" name="cari">
            <button type="submit" name="button">View</button>
          </form>
        </div>
    </div>
</div>
@endsection
