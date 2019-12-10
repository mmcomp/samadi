<?php if(isset($status)): ?>
    <?php if($status == 1): ?>
        <span style="display: none; visibility: hidden">1</span>
        <button type="button" class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
        <?php else: ?>
        <span style="display: none; visibility: hidden">0</span>
        <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
    <?php endif; ?>
<?php endif; ?>