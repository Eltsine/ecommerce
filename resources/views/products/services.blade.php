@extends('layouts.app')

@section('titre')
    Services
 @endsection

@section('contenu')

    <h1>Welcome to the services pages</h1>

    @if (Session::has('message'))
    <div class="alert alert-success">
    {{Session::get('message')}}
    {{Session::put('message', null)}}

    </div>
    
    @endif

    @foreach ($produits as $produit)
        <div class="well">
            <h1><a href="/basiclessons/public/products/{{$produit->id}}">{{$produit->product_name}}</a></h1>

        </div>
        
    @endforeach
    {{ $produits->links() }}

 @endsection
