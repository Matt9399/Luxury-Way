@extends('layouts.appReservation')

@section('title')
    Luxury Way Shop
@endsection

@section('content')
<script type="text/javascript"> function refresh() { window.location.reload(false); } </script>

<div class="container">
    <form action="{{ url('course/info') }}" method="post">
        {{ csrf_field() }}
        <h1>Verify informations</h1>
        <br>
        <h3>Name : </h3>
        <input class="form-control" readonly type="text" id="name" name="name" value="{{ Auth::user()->name }}">
        <br>
        <h3>Email : </h3>
        <input class="form-control" readonly type="text" id="email" name="email" value="{{ Auth::user()->email }}">
        <br>
        <h3>Adress Start : </h3>
        <input class="form-control" readonly type="text" id="address_start" name="address_start" value="{{ $address_start }}">
        <br>
        <h3>Address Arrival : </h3>
        <input class="form-control" readonly type="text" id="address_arrival" name="address_arrival" value="{{ $address_arrival }}">
        <br>
        <h3>Distance : </h3>
        <input class="form-control" readonly type="text" id="distance_text" name="distance_text" value="{{ $distance_text }}">
        <br>
        <h3>Duration : </h3>
        <input class="form-control" readonly type="text" id="duration_text" name="duration_text" value="{{ $duration_text }}">
        <br>
        <h3>Date start : </h3>
        <input class="form-control" readonly type="datetime-local" id="date_start" name="date_start" value="{{ $date_start }}">
        <br>

        <!-- HIDDEN -->

        <input class="form-control" readonly type="hidden" id="id_utilisateur" name="id_utilisateur" value="{{ Auth::user()->id }}">
        <input class="form-control" readonly type="hidden" id="distance" name="distance" value="{{ $distance }}">
        <input class="form-control" readonly type="hidden" id="duration" name="duration" value="{{ $duration }}">
        <input class="form-control" readonly type="hidden" id="price" name="price" value="{{ $price }}">

        <!-- END HIDDEN -->

        <input class="btn btn-dark" onclick="refresh()" type="button" value="Previous">
        <input class="btn btn-success" type="submit" id="submit" value="Order">
    </form>
</div>

@endsection

