<?php $__env->startSection('title'); ?>
Luxury Way Checkout
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 d-flex align-items-stretch">
                <h1>Checkout</h1>
                <h4>Your total: <?php echo e($total); ?>€</h4>
                <div class="container">
                    <form action="<?php echo e(route('checkout')); ?>" method="post" id="checkout_form">
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
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="card-cvc">CVC</label>
                                    <input type="text" id="card-cvc" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <?php echo e(csrf_field()); ?>

                        <button type="submit" class="btn btn-success">Buy now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>