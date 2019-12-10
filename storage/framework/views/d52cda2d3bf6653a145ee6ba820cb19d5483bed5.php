<?php if(!$productAttributes->isEmpty()): ?>
    <p class="alert alert-info">You can only set 1 default combination</p>
    <ul class="list-unstyled">
        <li>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Sale Price</th>
                    <th>Attributes</th>
                    <th>Is default?</th>
                    <th>Remove</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $productAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($pa->id); ?></td>
                        <td><?php echo e($pa->quantity); ?></td>
                        <td><?php echo e($pa->price); ?></td>
                        <td><?php echo e($pa->sale_price); ?></td>
                        <td>
                            <ul class="list-unstyled">
                                <?php $__currentLoopData = $pa->attributesValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($item->attribute->name); ?> : <?php echo e($item->value); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </td>
                        <td>
                            <?php if($pa->default == 1): ?>
                                <button class="btn btn-success"><i class="fa fa-check"></i></button>
                            <?php else: ?>
                                <button class="btn btn-danger"><i class="fa fa-remove"></i></button>
                            <?php endif; ?>
                        </td>
                        <td class="btn-group">
                            <a
                                    onclick="return confirm('Are you sure?')"
                                    href="<?php echo e(route('admin.products.edit', [$product->id, 'combination' => 1, 'delete' => 1, 'pa' => $pa->id])); ?>"
                                    class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </li>
    </ul>
<?php else: ?>
    <p class="alert alert-warning">No combination yet.</p>
<?php endif; ?>