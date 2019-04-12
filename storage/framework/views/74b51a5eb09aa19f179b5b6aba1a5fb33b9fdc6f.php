<?php $__env->startSection('title'); ?>
    Luxury Way Shop
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $allProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-6 col-md-4 d-flex align-items-stretch">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" height="250" src="<?php echo e($product->imagePath); ?>" alt="">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo e($product->title); ?></h5>
                                <p class="card-text description"><?php echo e($product->description); ?></p>
                                <div class="pull-right price"><strong><?php echo e($product->price); ?> €</strong></div>
                                <br>
                                <a href="<?php echo e(route('product.addToCart', ['id' => $product->id])); ?>" class="btn btn-warning pull-right">Add to cart</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>