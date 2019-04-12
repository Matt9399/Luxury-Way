<?php $__env->startSection('title'); ?>
    Luxury Way Shop
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <form method="POST" action="<?php echo e(('course/create')); ?>">
        <strong>Verify informations</strong>
        <br>
        <input class="form-control" readonly type="text" id="address_start" value="<?php echo e($address_start); ?>">
        <input class="form-control" readonly type="text" id="address_arrival" value="<?php echo e($address_arrival); ?>">
        <input class="form-control" readonly type="text" id="distance_text" value="<?php echo e($distance_text); ?>">
        <input class="form-control" readonly type="datetime-local" id="date_start" value="<?php echo e($date_start); ?>">
        <br>
        <button class="btn btn-dark" href="<?php echo e(('course')); ?>" type="button">Previous</button>
        <input class="btn btn-success" type="submit" id="submit" value="Order">
    </form>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.appReservation', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>