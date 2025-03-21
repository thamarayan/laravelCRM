<?php if(session()->has('success')): ?>
    <div class="alert alert-success alert-dismissible">
    <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
        <?php echo e(session()->get('success')); ?>

    </div>
<?php endif; ?>
<?php if(session()->has('error')): ?>
<div class="alert alert-danger alert-dismissible">
<!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
        <?php echo e(session()->get('error')); ?>

    </div>
<?php endif; ?> 
<?php if(session()->has('info')): ?>
    <div class="alert alert-info alert-dismissible">
    <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
        <?php echo e(session()->get('info')); ?>

    </div>
<?php endif; ?>
<?php if(session()->has('warning')): ?>
    <div class="alert alert-warning alert-dismissible">
    <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
        <?php echo e(session()->get('warning')); ?>

    </div>
<?php endif; ?>              
<?php if($errors->any()): ?>
    <div class="alert alert-danger alert-dismissible">
        <!-- <button type="button" class="close" data-dismiss="alert">&times;</button> -->
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Automatically close the success and error alerts after 3 seconds
        $(".alert").fadeTo(3000, 0).slideUp(500, function(){
            $(this).remove();
        });
    });
</script>
<?php /**PATH C:\Users\kumar\Downloads\CRM_21stMarch\CRM\resources\views/flash_msg.blade.php ENDPATH**/ ?>