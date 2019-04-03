@extends('layouts.appReservation')

@section('title')
    Luxury Way Shop
@endsection

@section('content')
<div class="container">
    <div id="floating-panel">
    </div>
    <div id="map"></div>
    <strong>Start:</strong>
    <input class="form-control" width="200" id="start" type="textbox" value="Paris">
    <strong>End:</strong>
    <input class="form-control" id="end" type="textbox" value="Noisy le Grand">
    <br>
    <input class="btn btn-primary" id="submit" type="button" value="Simulate">
    <br>
    <div id="directions-panel"></div>
</div>
@endsection

