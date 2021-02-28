<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsModel;
use Illuminate\Support\Facades\DB;
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
        $validated = $request->validate([
            'title' => 'max:200',
            'description' => 'max:1000',
        ]);

        $product =ProductsModel::create($request->all());
        return response()->json(['id'=>$product['id']], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        if($request->filled('fields')){


            $fields = $request->input('fields');
            if(!is_array($fields))
            {
                switch ($fields){
                    case 'description':
                        $data =ProductsModel::where('id',$id)->get(array('title','image','price','description'));
                        break;
                    case 'image':
                        $data =ProductsModel::where('id',$id)->get(array('title','image','price','image1','image2'));
                        break;
                    default:
                        $data =ProductsModel::where('id',$id)->get(array('title','image','price'));
                }
            }
            elseif(count($fields)==2&& in_array("image", $fields)&&in_array("description", $fields)){

                $data = ProductsModel::where('id',$id)->get(array('title','image','price','description','image1','image2'));
            }
            else{
                switch ($fields[0]){
                    case 'description':
                        $data =ProductsModel::where('id',$id)->get(array('title','image','price','description'));
                        break;
                    case 'image':
                        $data =ProductsModel::where('id',$id)->get(array('title','image','price','image1','image2'));
                        break;
                    default:
                        $data =ProductsModel::where('id',$id)->get(array('title','image','price'));
                }
            }
        }
        else{
            $data =ProductsModel::where('id',$id)->get(array('title','image','price'));
        }

        return $data;
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
