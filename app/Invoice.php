<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable=[
      'invoice_date', 'kepada', 'sales_name', 'courier_name', 'alamat_kirim', 'payment_type'
    ];
}
