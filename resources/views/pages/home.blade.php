@extends('layouts.app')

@section('titre')
    Home
 @endsection

@section('contenu')

    <div class="jumbotron">
        <h1>Welcome to the Green-Shop</h1>
    </div>

    @foreach ($produits as $produit)
        <div class="well">
            <h1><a href="/basiclessons/public/show/{{$produit->id}}">{{$produit->product_name}}</a></h1>
            <h3>${{$produit->product_price}}</h3>
             <p>{{$produit->description}}</p>
             <h6>{{$produit->created_at}}</h6>

        </div>
        
    @endforeach
    {{ $produits->links() }}
    
@endsection

      

