<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\InvoiceDetail;
use App\Courier;
use App\Product;
use App\Sales;
use Illuminate\Http\Request;
use App\Http\Requests;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      return view('invoices.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      // $invoice = \App\Invoice::where('invoice_id', 'LIKE', '%'.$id.'%')->first();

      $sales = \App\Sales::all();
      $courier = \App\Courier::all();

      return view('invoices.invoice_detail', compact('sales', 'courier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }

    public function sales_dropdown()
    {
      $sales = \App\Sales::pluck('sales_name');

      return view('invoices.invoice_detail', compact('sales'));
    }
}
