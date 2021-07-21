<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits = Product::orderBy('product_name','desc')->paginate(4);
        //
        return view('products.services')->with('produits',$produits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $produit= new Product();

        $produit->product_name= $request->input('product_name');
        $produit->product_price=$request->input('product_price');
        $produit->description=$request->input('product_description');
 
        $produit->save();
 
        /*
        $data = array();
        $data['product_name'] = $request-> input('product_name');
        $data['product_price'] = $request-> input('product_price');
        $data['description'] = $request-> input('product_description');
 
        DB::table('products')
             ->insert($data);
 */
        
        Session::put('message','Le produit '.$request->product_name.'  a été inséré avec succès');
        return redirect('/products');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $produit= Product::find($id);

        return view ('products.show')->with('produit', $produit); 
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
        
        $produit= Product::find($id);

        return view('products.edit_produit')->with('produit', $produit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $produit= Product::find($id);

        $produit->product_name=$request->input('product_name');
        $produit->product_price= $request->input('product_price');
        $produit->description=$request->input('product_description');

        $produit->update();
 
        return redirect('/products')->with('message', 'Le produit'.' '.  $produit->product_name. ' '.'a été modifieé avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $produit= Product:: find($id);

        $produit->delete();

        return redirect('/products')->with('message', 'Le produit'.' '.  $produit->product_name.
         ' '.'a été supprimé avec succès');
    }
}
