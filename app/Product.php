<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "tb_product";

    protected $primaryKey = "id_products";

    //Mass Asignment
    protected $fillable = ['name','price','status','description','image','id_category'];

    public function category() {
        return $this->hasMany('App\Category', 'id_category');
    }
}
