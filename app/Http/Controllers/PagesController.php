<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;


use App\Product;

class PagesController extends Controller
{
    // 
   public function home () {

    $produits = Product::inRandomOrder()->paginate(3);
    return view('pages.home')->with('produits',$produits);
    }

    public function apropos () {
        //return '<h1>Bienvenue dans la page apropos</h1>';
        return view('pages.apropos');
    }

    public function services () {
        $produits = Product::orderBy('product_name','desc')->paginate(4);
        return view('pages.services')->with('produits',$produits);
    }

    public function show($id){
      /*  $produit = DB:: table('products')       
                    ->where('id',$id)
                    ->first();
                    */
        $produit= Product::find($id);

        return view ('pages.show')->with('produit', $produit);


    }

    public function ajouterproduit(){ 
        return view('pages.create');

    }

    public function saveproduct(Request $request){


        $fileNameWithExt= $request->file('product_image')->getClientOriginalName();

        $fileName= pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        $ext= $request->file('product_image')->getClientOriginalExtension();

        $fileNameToStore= $fileName. '_'. time(). '.' .$ext;


        print($fileNameWithExt);
        echo '<pre></pre>';
        print($fileName);

        echo '<pre></pre>';
        print($ext);

        echo '<pre></pre>';
        print('le nom du fichier à sauvegarder est'.$fileNameToStore);


        /*
        $this->validate($request, ['product_name'=>'required',
        'product_price'=>'required',
        'description'=>'required',
        'product_image'=>'image|nullable|max:2999'
          ]);

          $fileNameWithExt= $request->input('product_image')->getClientOriginalName();
    print($fileNameWithExt);*/
        

        /*
       $produit= new Product();

       $produit->product_name= $request->input('product_name');
       $produit->product_price=$request->input('product_price');
       $produit->description=$request->input('product_description');


       $produit->save();

       Session::put('message','Le produit '.$request->product_name.'  a été inséré avec succès');
       return redirect('/create');

       */

       /*
       $data = array();
       $data['product_name'] = $request-> input('product_name');
       $data['product_price'] = $request-> input('product_price');
       $data['description'] = $request-> input('product_description');

       DB::table('products')
            ->insert($data);
        */
 }

    public function edit($id){

        $produit= Product::find($id);

        return view('pages.edit_produit')->with('produit', $produit);

    }

    public function modifierproduct(Request $request){

        $produit= Product::find($request->input('id'));

        $produit->product_name=$request->input('product_name');
        $produit->product_price= $request->input('product_price');
        $produit->description=$request->input('product_description');

        $produit->update();
 
        return redirect('/services')->with('message', 'Le produit'.' '.  $produit->product_name. ' '.'a été modifieé avec succès');

    }

    public function delete($id){
        $produit= Product:: find($id);

        $produit->delete();

        return redirect('/services')->with('message', 'Le produit'.' '.  $produit->product_name.
         ' '.'a été supprimé avec succès');


    }


}
