<div class="row">
    <div class="col-md-6">
        <ul id="thumbnails" class="col-md-4 list-unstyled">
            <li>
                <a href="javascript: void(0)">
                    <?php if(isset($product->cover)): ?>
                    <img class="img-responsive img-thumbnail"
                         src="<?php echo e(asset("storage/$product->cover")); ?>"
                         alt="<?php echo e($product->{'name_' . $locale}); ?>" />
                    <?php else: ?>
                    <img class="img-responsive img-thumbnail"
                         src="<?php echo e(asset("https://placehold.it/180x180")); ?>"
                         alt="<?php echo e($product->{'name_' . $locale}); ?>" />
                    <?php endif; ?>
                </a>
            </li>
            <?php if(isset($images) && !$images->isEmpty()): ?>
                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <a href="javascript: void(0)">
                    <img class="img-responsive img-thumbnail"
                         src="<?php echo e(asset("storage/$image->src")); ?>"
                         alt="<?php echo e($product->{'name_' . $locale}); ?>" />
                    </a>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </ul>
        <figure class="text-center product-cover-wrap col-md-8">
            <?php if(isset($product->cover)): ?>
                <img id="main-image" class="product-cover img-responsive"
                     src="<?php echo e(asset("storage/$product->cover")); ?>?w=400"
                     data-zoom="<?php echo e(asset("storage/$product->cover")); ?>?w=1200">
            <?php else: ?>
                <img id="main-image" class="product-cover" src="https://placehold.it/300x300"
                     data-zoom="<?php echo e(asset("storage/$product->cover")); ?>?w=1200" alt="<?php echo e($product->{'name_' . $locale}); ?>">
            <?php endif; ?>
        </figure>
    </div>
    <div class="col-md-6">
        <div class="product-description">
            <h1><?php echo e($product->{'name_' . $locale}); ?>

                <small><?php echo e(config('cart.currency')); ?> <?php echo e($product->price); ?></small>
            </h1>
            <div class="description"><?php echo $product->{'description_' . $locale}; ?></div>
            <div class="excerpt">
                <hr><?php echo str_limit($product->{'description_' . $locale}, 100, ' ...'); ?></div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <?php echo $__env->make('layouts.errors-and-messages', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form action="<?php echo e(route('cart.store')); ?>" class="form-inline" method="post">
                        <?php echo e(csrf_field()); ?>

                        <?php if(isset($productAttributes) && !$productAttributes->isEmpty()): ?>
                            <div class="form-group">
                                <label for="productAttribute">Choose Combination</label> <br />
                                <select name="productAttribute" id="productAttribute" class="form-control select2">
                                    <?php $__currentLoopData = $productAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productAttribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($productAttribute->id); ?>">
                                            <?php $__currentLoopData = $productAttribute->attributesValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($value->attribute->name); ?> : <?php echo e(ucwords($value->value)); ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!is_null($productAttribute->price)): ?>
                                                ( <?php echo e(config('cart.currency_symbol')); ?> <?php echo e($productAttribute->price); ?>)
                                            <?php endif; ?>
                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div><hr>
                        <?php endif; ?>
                        <div class="form-group">
                            <!-- <input type="text"
                                   class="form-control"
                                   name="quantity"
                                   id="quantity"
                                   placeholder="Quantity"
                                   value="<?php echo e(old('quantity')); ?>" /> -->
                            <input type="hidden" name="quantity" value="1" />
                            <input type="hidden" name="product" value="<?php echo e($product->id); ?>" />
                        </div>
                        <button type="submit" class="btn btn-warning"><i class="fa fa-cart-plus"></i> <?php echo e(__('main.add_to_cart')); ?>

                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->startSection('js'); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            var productPane = document.querySelector('.product-cover');
            var paneContainer = document.querySelector('.product-cover-wrap');

            new Drift(productPane, {
                paneContainer: paneContainer,
                inlinePane: false
            });
        });
    </script>
<?php $__env->stopSection(); ?>