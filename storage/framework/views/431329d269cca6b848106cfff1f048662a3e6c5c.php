<?php $__env->startSection('title'); ?>
    Luxury Way Shop
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.appReservation', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>