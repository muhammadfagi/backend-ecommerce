<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo('App\Model\User','user_id','id');
    }

    public function product() {
        return $this->belongsTo('App\Models\Order', 'product_id', 'id');
    }
}
