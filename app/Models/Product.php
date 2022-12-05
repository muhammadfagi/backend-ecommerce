<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function order() {
        return $this->hasMany('App\Models\Order', 'product_id', 'id');
    }

    public function category() {
        return $this->hasMany('App\Models\Category','id', 'category_id');
    }
}
