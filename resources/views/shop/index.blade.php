@extends('layouts.app')

@section('title')
    Luxury Way Shop
@endsection

@section('content')
        <div class="container">
            <div class="row">
                @foreach($allProducts as $product)
                    <div class="col-sm-6 col-md-4 d-flex align-items-stretch">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" height="250" src="{{ $product->imagePath }}" alt="">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->title }}</h5>
                                <p class="card-text description">{{ $product->description }}</p>
                                <div class="pull-right price"><strong>{{ $product->price }} €</strong></div>
                                <br>
                                <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-warning pull-right">Add to cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
@endsection

