<?php

namespace App\Http\Controllers;

use DB;
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
      $invoice_detail = null;
      $sales = \App\Sales::all();
      $courier = \App\Courier::all();

      return view('invoices.invoice_detail', compact('sales', 'courier', 'invoice_detail'));
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
    public function show(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
      $sales = \App\Sales::all();
      $courier = \App\Courier::all();

      $find = $request->find;

      $invoice_detail = \App\Invoice::where('invoice_id', 'LIKE', '%'.$find.'%')->first();

      // $product = \App\Product::where('invoice_id', 'LIKE', '%'.$find.'%')->first();
      if ($invoice_detail != '') {
        $table = DB::table('products')
        ->select('products.product_name', 'products.weight', 'invoice_details.buy_qty', 'products.price')
        ->join('invoice_details', 'invoice_details.invoice_id', '=', 'products.invoice_id')
        ->where('products.invoice_id', 'LIKE', '%'.$find.'%')
        ->get();

        return view('invoices.invoice_detail', compact('sales', 'courier', 'invoice_detail', 'table'));
      }else {
        echo "Data tidak ditemukan!";
      }

            // $table = DB::table('products')
            // ->select(DB::raw('(invoice_details.buy_qty * products.price) as totalPay'))
            // ->select('products.product_name', 'products.weight', 'invoice_details.buy_qty', 'products.price', 'products.totalPay')
            // ->join('invoice_details', 'invoice_details.invoice_id', '=', 'products.invoice_id')
            // ->where('products.invoice_id', 'LIKE', '%'.$find.'%')
            // ->get();
            //
            // return view('invoices.invoice_detail', compact('sales', 'courier', 'invoice_detail', 'table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->input('invoice_id');
        $invoice_date = $request->input('invoice_date');
        $kepada = $request->input('kepada');
        $sales_name = $request->input('sales_name');
        $courier_name = $request->input('courier_name');
        $alamat_kirim = $request->input('alamat_kirim');
        $payment_type = $request->input('payment_type');

        // $sub_total = $request->input('sub_total');
        // $courier_fee = $request->input('courier_fee');
        // $total = $request->input('total');

        $data = array('invoice_date' => $invoice_date, 'kepada' => $kepada, 'sales_name' => $sales_name, 'courier_name' => $courier_name, 'alamat_kirim' => $alamat_kirim, 'payment_type' => $payment_type);

        // $data2 = array('sub_total' => $sub_total, 'courier_fee' => $courier_fee, 'total' => $total);

        DB::table('invoices')->where('invoice_id', $id)->update($data);
        // DB::table('invoice_details')->where('invoice_id', $id)->update($data2);
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
}
