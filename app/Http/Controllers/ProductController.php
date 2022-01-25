<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\inf_movimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return response()->json($products); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create($request->post());
        return response()->json([
            'producto'=>$product
        ]); 
    }    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product )
    {
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, Product $product)
   // {
      //$product->fill($request->post())->save();
      public function update(Request $request , $id)
    {   

        $product = Product::findOrFail($id)->update($request->all());
      $comentario = Auth::user()->name.' realizo la modificacion en ,el producto ' .$request->nombrep ;
      inf_movimiento::create([
        "comentario" => $comentario,
        "product_id" => $id,
        
    "user_id" =>  Auth::id(),
    ]);

    




      return response()->json([
          'product'=>$product
      ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'mesaje'=>'product eliminado'
        ]);
    }
}
