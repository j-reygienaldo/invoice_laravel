<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $fillable=[
      'sub_total', 'courier_fee', 'total'
    ];

    public function Product()
    {
      return $this->hasMany(Product::class);
    }
}
