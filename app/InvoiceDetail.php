<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $fillable=[
      'buy_qty', 'sub_total', 'courier_fee', 'total'
    ];
}
