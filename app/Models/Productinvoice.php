<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productinvoice extends Model
{
    use HasFactory;

    public $guarded = [];

    public function productinvoiceitems(){
        return $this->hasMany(Productinvoiceitem::class);
    }
}
