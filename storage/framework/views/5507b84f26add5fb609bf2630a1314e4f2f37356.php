<?php $__env->startSection('title'); ?>
    Luxury Way Shop
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div id="floating-panel">
    </div>
    <div id="map"></div>
    <form action="<?php echo e(url('course')); ?>" method="POST">
        <?php echo e(csrf_field()); ?>

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
        <input class="form-control" readonly type="hidden" name="distance_text" id="distance_text">
        <br>
        <input class="btn btn-primary" id="simulate" type="button" value="Simulate">
        <input class="btn btn-success" type="hidden" id="submit" value="Next">
        <br>
        <div id="directions-panel"></div>
    </form>

    <?php
       echo "<script>document.writeln(resultPrice);</script>";
    ?>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.appReservation', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>