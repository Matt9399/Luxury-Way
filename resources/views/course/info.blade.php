@extends('layouts.appReservation')

@section('title')
    Luxury Way Shop
@endsection

@section('content')
<div class="container">
    <form method="POST" action="{{ ('course/create') }}">
        <strong>Verify informations</strong>
        <br>
        <input class="form-control" readonly type="text" id="address_start" value="{{ $address_start }}">
        <input class="form-control" readonly type="text" id="address_arrival" value="{{ $address_arrival }}">
        <input class="form-control" readonly type="text" id="distance_text" value="{{ $distance_text }}">
        <input class="form-control" readonly type="datetime-local" id="date_start" value="{{ $date_start }}">
        <br>
        <button class="btn btn-dark" href="{{ ('course') }}" type="button">Previous</button>
        <input class="btn btn-success" type="submit" id="submit" value="Order">
    </form>
</div>

@endsection

