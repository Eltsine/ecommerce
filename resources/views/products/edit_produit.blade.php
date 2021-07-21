
@extends('layouts.app')

@section('titre')
    Enregistrement Produit
@endsection

@section('contenu')

    @if (Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
            {{Session::put('message', null)}}

        </div>
        
    @endif

    {{--<form action="{{url('/saveproduct')}}" method="POST" class="form-horizontal">--}}
        {!!Form::open(['action'=>['ProductController@update',$produit->id], 'method'=>'POST', 'classe'=>'form-horizontal'])!!}
        {{csrf_field()}}

        <div class="form-group">
            {{Form::label('', 'Product')}} 
            {{Form::text('product_name', $produit->product_name,['placeholder'=>'Product Name', 'class'=>'form-control'])}}

           {{-- <label>Product</label>
            <input type="text" name="product_name" placeholder="Product Name" class="form-control" required>--}}

        </div>
        <div class="form-group">

            {{Form::label('', 'Product Price')}}
            {{Form::text('product_price', $produit->product_price ,['placeholder'=>'Product Price', 'class'=>'form-control'])}}


            {{--<label>Product Price</label>
            <input type="text" name="product_price" placeholder="Product Price" class="form-control" required>
            --}}

        </div>
        <div class="form-group">

            {{Form::label('', 'Product Description')}}
            {{Form::text('product_description', $produit->description ,['placeholder'=>'Description','class'=>'form-control'])}}


           {{-- <label>Product description</label>
            <textarea name="product_description" cols="10" rows="10" class="form-control"></textarea>--}}
            {{Form::hidden('_method','PUT')}}

        </div>

            {{Form::submit('Modifier Produit', ['class'=>'btn  btn-primary'])}}

            {{--<input type="submit" value="Add Product" class="btn btn-primary">--}}
            {!!Form::close()!!}

    {{--</form>--}}

@endsection





