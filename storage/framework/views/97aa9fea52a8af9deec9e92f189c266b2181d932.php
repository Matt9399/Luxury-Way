<?php $__env->startSection('title'); ?>
Luxury Way Shopping Cart
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(Session::has('cart')): ?>
<style>

    .quantity {
        float: left;
        margin-right: 15px;
        background-color: #eee;
        position: relative;
        width: 80px;
        overflow: hidden
    }

    .quantity input {
        margin: 0;
        text-align: center;
        width: 15px;
        height: 15px;
        padding: 0;
        float: right;
        color: #000;
        font-size: 20px;
        border: 0;
        outline: 0;
        background-color: #F6F6F6
    }

    .quantity input.qty {
        position: relative;
        border: 0;
        width: 100%;
        height: 40px;
        padding: 10px 25px 10px 10px;
        text-align: center;
        font-weight: 400;
        font-size: 15px;
        border-radius: 0;
        background-clip: padding-box
    }

    .quantity .minus, .quantity .plus {
        line-height: 0;
        background-clip: padding-box;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
        -webkit-background-size: 6px 30px;
        -moz-background-size: 6px 30px;
        color: #bbb;
        font-size: 20px;
        position: absolute;
        height: 50%;
        border: 0;
        right: 0;
        padding: 0;
        width: 25px;
        z-index: 3
    }

    .quantity .minus:hover, .quantity .plus:hover {
        background-color: #dad8da
    }

    .quantity .minus {
        bottom: 0
    }
    .shopping-cart {
        margin-top: 20px;
    }
</style>


<script src="https://use.fontawesome.com/c560c025cf.js"></script>
<div class="container">
    <div class="card shopping-cart">
        <div class="card-header bg-dark text-light">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Shipping cart
            <a href="<?php echo e(route('shop')); ?>" class="btn btn-outline-info btn-sm pull-right">Continue shopping</a>
            <div class="clearfix"></div>
        </div>
        <div class="card-body">
            <!-- PRODUCT -->
            <div class="row">
                <!--
                <div class="col-12 col-sm-12 col-md-2 text-center">
                    <img class="img-responsive" src="http://placehold.it/120x80" alt="prewiew" width="120" height="80">
                </div>
                -->
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($product['qty'] > 0): ?>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h4 class="product-name"><strong><?php echo e($product['item']['title']); ?></strong></h4>
                            <h4>
                                <small><?php echo e($product['item']['description']); ?></small>
                            </h4>
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                <h6><strong><?php echo e($product['price']); ?> <span class="text-muted">€</span></strong></h6>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4">
                                <div class="quantity">
                                    <input type="button" onclick="window.location.href = '<?php echo e(route('product.addToCart', ['id' => $product['item']])); ?>';" value="+" class="plus">
                                    <input type="text" readonly step="1" max="99" min="1" value="<?php echo e($product['qty']); ?>" title="Qty" class="qty"
                                           size="4">
                                    <input onclick="window.location.href = '<?php echo e(route('product.delCart', ['id' => $product['item']])); ?>';" type="button" value="-" class="minus">
                                </div>
                            </div>
                            <div class="col-2 col-sm-2 col-md-2 text-right">
                                <button onclick="window.location.href = '<?php echo e(route('product.delCart', ['id' => $product['item']])); ?>'" type="button" class="btn btn-outline-danger btn-xs">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <hr>
            <!-- END PRODUCT -->

        </div>
        <div class="card-footer">
            <div class="coupon col-md-5 col-sm-5 no-padding-left pull-left">
                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="coupon code">
                    </div>
                    <div class="col-6">
                        <input type="submit" class="btn btn-default" value="Use coupon">
                    </div>
                </div>
            </div>
            <div class="pull-right" style="margin: 10px">
                <a href="" class="btn btn-success pull-right">Checkout</a>
                <div class="pull-right" style="margin: 5px">
                    Total price: <b><?php echo e($totalPrice); ?>  €</b>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>