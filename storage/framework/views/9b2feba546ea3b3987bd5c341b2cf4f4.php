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

           Payments

        <?php $__env->endSlot(); ?>

        <?php $__env->slot('title'); ?>

            Payments

        <?php $__env->endSlot(); ?>

    <?php echo $__env->renderComponent(); ?>



    <div class="row">
        
        <?php echo $__env->make('flash_msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="col-lg-12">

            <div class="card">

                <div class="card-body">

                    <div class="row mb-2">

                        <div class="col-sm-4">

                            <div class="search-box me-2 mb-2 d-inline-block">

                                <div class="position-relative">

                                    <input type="text" class="form-control" id="searchTableList" placeholder="Search...">

                                    <i class="bx bx-search-alt search-icon"></i>

                                </div>

                            </div>

                        </div>

                        <div class="col-sm-8">

                            <div class="text-sm-end">

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Payment.Create')): ?>

                                   <a href="<?php echo e(route('createpayments')); ?>">

                                       <button type="button" class="btn btn-success btn-rounded waves-effect waves-light addContact-modal mb-2"><i

                                        class="mdi mdi-plus me-1"></i> New Payment</button>

                                    </a>

                                <?php endif; ?>    
                            </div>

                        </div><!-- end col-->

                    </div>

                    <!-- end row -->

                    <div class="table-responsive">

                        <table class="table align-middle table-nowrap table-hover dt-responsive nowrap w-100">

                            <thead class="table-light">

                                <tr>

                                    <th scope="col">#</th>

                                    <th scope="col">Customer</th>

                                    <th scope="col">Amount</th>

                                    <th scope="col">Currency</th>

                                    <th scope="col">Crypto</th>

                                    <th scope="col">Convert Amount</th>

                                    <th scope="col">Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php if(!empty($payments)): ?>

                                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>

                                    <td><?php echo e(++$key); ?></td>

                                    <td><?php echo e($value->Customer->name ?? 'NA'); ?></td>

                                    <td><?php echo e($value->amount); ?></td>

                                    <td><?php echo e($value->currency); ?></td>

                                    <td><?php echo e($value->crypto); ?></td>

                                    <td><?php echo e($value->convert_amount); ?></td>

    
                                    <td>
                                        
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Payment.Edit')): ?>
                
                                            <a href="<?php echo e(route('payment.edit',encrypt($value->id))); ?>" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>

                                        <?php endif; ?>    
                                        
                                    </td>

                                </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php if($payments->count() == 0): ?>

                                    <tr class="text-center">

                                        <td colspan="6">No payments to display.</td>

                                    </tr>

                                    <?php endif; ?>

                                <?php endif; ?>

                            </tbody>

                        </table>

                        <!-- end table -->

                    </div>

                    <!-- end table responsive -->

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




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/payit123crm/public_html/CRM/resources/views/payment/index.blade.php ENDPATH**/ ?>