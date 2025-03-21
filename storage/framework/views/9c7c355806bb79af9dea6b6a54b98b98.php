<?php $__env->startSection('title'); ?>

    <?php echo app('translator')->get('User List'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>


    <!-- select2 css -->

    <link href="<?php echo e(URL::asset('build/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- bootstrap-datepicker css -->

    <link href="<?php echo e(URL::asset('build/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet">

    <!-- DataTables -->

    <link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->

    <link href="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet"

        type="text/css" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>


        <?php $__env->slot('li_1'); ?>

           Agent

        <?php $__env->endSlot(); ?>

        <?php $__env->slot('title'); ?>

            Commission Schedule

        <?php $__env->endSlot(); ?>

    <?php echo $__env->renderComponent(); ?>



    <div class="row">
        
        <?php echo $__env->make('flash_msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="col-lg-12">

            <div class="card">

                <div class="card-body">

                    

                        <div class="row">

                            <h5>Fixed</h5>
                            <br>
                            <br>

                            <form action="<?php echo e(url('/updateCommissionSchedule')); ?>" method="post">
                                <?php echo csrf_field(); ?>

                                <input type="hidden" name="fixed_commission_id" value="<?php echo e($fixed_commission->id); ?>">

                                <div class="row">

                                    <div class="col-md-4">

                                        <label for="rate">Rate(%):&ensp;</label>

                                        <input type="text" name="rate" value="<?php echo e($fixed_commission->rate); ?>" size="10">
                                        
                                    </div>

                                    <div class="col-md-3">

                                        <button type="submit" class="btn btn-primary rounded-pill btn-sm">Update</button>

                                    </div>

                                </div>

                            </form>
                            
                        </div>

                        <hr>

                        <div class="row">

                            <h5>Scalable</h5>
                            <br>
                            <br>

                            <form action="<?php echo e(url('/updateCommissionSchedule')); ?>" method="post">

                                <?php echo csrf_field(); ?>

                                <div class="row">

                                    <?php $__currentLoopData = $scalable_commission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <input type="hidden" name="addmore[<?php echo e($key); ?>][commission_id]" value="<?php echo e($value->id); ?>">

 
                                        <div class="col-md-4">

                                            <label for="volume_from">Volume From:</label>

                                            <input type="text" name="addmore[<?php echo e($key); ?>][volume_from]" value="<?php echo e($value->volume_from); ?>" size="15">
                                            
                                        </div>

                                        <div class="col-md-4">

                                            <label for="volume_to">Volume To:</label>

                                            <input type="text" name="addmore[<?php echo e($key); ?>][volume_to]" value="<?php echo e($value->volume_to); ?>" size="15">
                                            
                                        </div>

                                        <div class="col-md-4">

                                            <label for="rate">Rate(%):</label>

                                            <input type="text" name="addmore[<?php echo e($key); ?>][rate]" value="<?php echo e($value->rate); ?>" size="10">
                                            
                                        </div>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

                                </div>

                                <div class="text-center mt-1">

                                    <button type="submit" class="btn btn-primary rounded-pill btn-sm">Update</button>
                                    
                                </div>
                                
                            </form>
                              
                        </div>

                   

                </div>

            </div>

        </div>

        <div class="col-lg-12">

            <div class="card">

                <div class="card-body">

                        <div class="row">

                            <h5>Charges</h5>
                            <br>
                            <br>

                            <form action="<?php echo e(url('/updateCharges')); ?>" method="post">

                                <?php echo csrf_field(); ?>

                                <div class="row">

                                    <?php $__currentLoopData = $charges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <input type="hidden" name="addcharges[<?php echo e($key); ?>][charges_id]" value="<?php echo e($value->id); ?>">

                                        <div class="col-md-4">
                                            <strong><?php echo e($value->type); ?></strong>
                                        </div>
 
                                        <div class="col-md-4">

                                            <label for="fixed_amt">Fixed Amt. :</label>

                                            <input type="text" name="addcharges[<?php echo e($key); ?>][fixed_amt]" value="<?php echo e($value->fixed_amt); ?>" size="15">
                                            
                                        </div>

                                        <div class="col-md-4">

                                            <label for="percent_amt">Percent Amt.(%) :</label>

                                            <input type="text" name="addcharges[<?php echo e($key); ?>][percent_amt]" value="<?php echo e($value->percent_amt); ?>" size="15">
                                            
                                        </div>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 

                                </div>

                                <div class="text-center mt-1">

                                    <button type="submit" class="btn btn-primary rounded-pill btn-sm">Update</button>
                                    
                                </div>
                                
                            </form>
                              
                        </div>

                   

                </div>

            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>



    <!-- select2 js -->

    <script src="<?php echo e(URL::asset('build/libs/select2/js/select2.min.js')); ?>"></script>

    <!-- Required datatable js -->

    <script src="<?php echo e(URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>

    <!-- Responsive examples -->

    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>

    <!-- ecommerce-customer-list init -->

    <script src="<?php echo e(URL::asset('build/js/pages/contact-user-list.init.js')); ?>"></script>

    <!-- init js -->

    <script src="<?php echo e(URL::asset('build/js/pages/crypto-orders.init.js')); ?>"></script>



<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/payit123crm/public_html/CRM/resources/views/setting/index.blade.php ENDPATH**/ ?>