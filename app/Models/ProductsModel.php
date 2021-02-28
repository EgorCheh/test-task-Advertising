<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    public $timestamps = false;
    protected $table='article';
    protected $fillable=[
        'id',
        'title',
        'description',
        'image',
        'price',
        'time',
        'image1',
        'image2'
    ];
}
