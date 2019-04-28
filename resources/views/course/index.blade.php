@extends('layouts.appReservation')

@section('title')
    Luxury Way Shop
@endsection

@section('content')
<div class="container">
    <div id="floating-panel">
    </div>
    <div id="map" style="margin: 0 auto;"></div>
    <form action="{{ url('course') }}" method="POST">
        {{ csrf_field() }}
        <strong>Start:</strong>
        <input class="form-control" width="200" type="text" name="start" id="start">
        <strong>End:</strong>
        <input class="form-control" type="text" name="end" id="end">
        <strong>Date:</strong>
        <input class="form-control" type="datetime-local" name="date" id="date">
        <!-- Pass data -->
        <input class="form-control" readonly type="hidden" name="price" id="price">
        <input class="form-control" readonly type="hidden" name="distance" id="distance">
        <input class="form-control" readonly type="hidden" name="duration" id="duration">
        <input class="form-control" readonly type="hidden" name="duration_text" id="duration_text">
        <input class="form-control" readonly type="hidden" name="distance_text" id="distance_text">
        <br>
        <input class="btn btn-warning" id="simulate" type="button" value="Simulate">
        <input class="btn btn-warning" type="hidden" id="submit" value="Next">
        <br>
        <div id="directions-panel"></div>
    </form>

    <?php
       echo "<script>document.writeln(resultPrice);</script>";
    ?>

</div>
@endsection

