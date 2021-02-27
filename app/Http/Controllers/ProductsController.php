<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsModel;
use Ramsey\Uuid\Guid\Fields;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sort)
    {
        //pagination

        switch ($sort){
            case 0:
                $data=ProductsModel::Orderby('price', 'desc')->get(array('title','image','price'));
                break;
            case 1:
                $data=ProductsModel::Orderby('price', 'asc')->get(array('title','image','price'));
                break;
            case 2:
                $data=ProductsModel::Orderby('time', 'desc')->get(array('title','image','price'));
                break;
            case 3:
                $data=ProductsModel::Orderby('time', 'asc')->get(array('title','image','price'));
                break;
            default:
                $data=ProductsModel::get(array('title','image','price'));
        }

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation

        $product =ProductsModel::create($request->all());
        return $product;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        // show fields


       /* echo "$id <br>";
        $fields = $request->input('fields');
        if(is_array($fields)&count($fields)==1);
        dd($fields);*/

        return ProductsModel::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
