@extends('layouts.app')

@section('title')
Luxury Way Checkout
@endsection

@section('content')
    <div class="container" style="color: lightgrey; ">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4 "style="margin: 0 auto;">
                <h1>Checkout</h1>
                <h4>Your total: {{ $total }}€</h4>
                <div class="container">
                    <form action="{{ route('checkout') }}" method="post" id="checkout_form">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="card-name">Card Holder Name</label>
                                    <input type="text" id="card-name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="card-number">Credit Card Number</label>
                                    <input type="text" id="card-number" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="card-expiry-month">Expiration Month</label>
                                            <input type="text" id="card-expiry-month" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="card-expiry-year">Expiration Year</label>
                                            <input type="text" id="card-expiry-year" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="card-cvc">CVC</label>
                                    <input type="text" id="card-cvc" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-warning">Buy now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<script type="text/javascript" src="{{ URL::to('js/checkout.js')}}"></script>
@endsection
