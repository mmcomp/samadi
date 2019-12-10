<footer class="footer-section footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">

                <ul class="footer-menu">
                    <li> <a href="<?php echo e(route('accounts', ['tab' => 'profile'])); ?>"><?php echo e(__('main.my_account')); ?></a>  </li>
                    <li> <a href=""><?php echo e(__('main.contact_us')); ?></a>  </li>
                    <li> <a href=""><?php echo e(__('main.terms_of_service')); ?></a>  </li>
                </ul>

                <ul class="footer-social">
                    <li> <a href=""> <i class="fa fa-facebook" aria-hidden="true"></i>  </a> </li>
                    <li> <a href=""> <i class="fa fa-twitter" aria-hidden="true"></i>   </a> </li>
                    <li> <a href=""> <i class="fa fa-instagram" aria-hidden="true"></i>  </a> </li>
                    <li> <a href=""> <i class="fa fa-pinterest-p" aria-hidden="true"></i>  </a> </li>
                </ul>

                <p>&copy; <a href="<?php echo e(config('app.url')); ?>"><?php echo e(config('app.name')); ?></a> | <?php echo e(__('main.all_rights_reserved')); ?></p>

            </div>
        </div>
    </div>
</footer>