<?php if(!empty($products) && !collect($products)->isEmpty()): ?>
    <ul class="row text-center list-unstyled">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="col-md-3 col-sm-6 col-xs-12 product-list">
                <div class="single-product">
                    <div class="product">
                        <div class="product-overlay">
                            <div class="vcenter">
                                <div class="centrize">
                                    <ul class="list-unstyled list-group">
                                        <li>
                                            <form action="<?php echo e(route('cart.store')); ?>" class="form-inline" method="post">
                                                <?php echo e(csrf_field()); ?>

                                                <input type="hidden" name="quantity" value="1" />
                                                <input type="hidden" name="product" value="<?php echo e($product->id); ?>">
                                                <button id="add-to-cart-btn" type="submit" class="btn btn-warning" data-toggle="modal" data-target="#cart-modal"> <i class="fa fa-cart-plus"></i> <?php echo e(__('main.add_to_cart')); ?></button>
                                            </form>
                                        </li>
                                        <li>  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal_<?php echo e($product->id); ?>"> <i class="fa fa-eye"></i> <?php echo e(__('main.quick_view')); ?></button>
                                        <li>  <a class="btn btn-default product-btn" href="<?php echo e(route('front.get.product', str_slug($product->slug))); ?>"> <i class="fa fa-link"></i> <?php echo e(__('main.go_to_product')); ?></a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($product->cover)): ?>
                            <img src="<?php echo e(asset("storage/$product->cover")); ?>" alt="<?php echo e($product->{'name_' . $locale}); ?>" class="img-bordered img-responsive">
                        <?php else: ?>
                            <img src="https://placehold.it/263x330" alt="<?php echo e($product->{'name_' . $locale}); ?>" class="img-bordered img-responsive" />
                        <?php endif; ?>
                    </div>

                    <div class="product-text">
                        <h4><?php echo e($product->{'name_' . $locale}); ?></h4>
                        <p>
                            <?php echo e(config('cart.currency')); ?>

                            <?php if(!is_null($product->attributes->where('default', 1)->first())): ?>
                                <?php if(!is_null($product->attributes->where('default', 1)->first()->sale_price)): ?>
                                    <?php echo e(number_format($product->attributes->where('default', 1)->first()->sale_price, 2)); ?>

                                    <p class="text text-danger">Sale!</p>
                                <?php else: ?>
                                    <?php echo e(number_format($product->attributes->where('default', 1)->first()->price, 2)); ?>

                                <?php endif; ?>
                            <?php else: ?>
                                <?php echo e(number_format($product->price, 2)); ?>

                            <?php endif; ?>
                        </p>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal_<?php echo e($product->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <?php echo $__env->make('layouts.front.product', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if($products instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left"><?php echo e($products->links()); ?></div>
                </div>
            </div>
        <?php endif; ?>
    </ul>
<?php else: ?>
    <p class="alert alert-warning">No products yet.</p>
<?php endif; ?>