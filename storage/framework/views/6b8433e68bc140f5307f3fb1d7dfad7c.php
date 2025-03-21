<?php $__env->startSection('title'); ?>

<?php echo app('translator')->get('Onboardings'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- select2 css -->

<link href="<?php echo e(URL::asset('build/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />

<!-- DataTables -->

<link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->

<link href="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>

<?php $__env->slot('li_1'); ?>

Merchant Application

<?php $__env->endSlot(); ?>

<?php $__env->slot('title'); ?>

Merchant Application

<?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>

<div class="row">
    <?php echo $__env->make('flash_msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <div class="col-lg-12">

        <div class="row mb-1">

            <div class="col-sm-4">

                <div class="search-box me-2 mb-2 d-inline-block">

                    <div class="position-relative">

                    </div>

                </div>

            </div>

            <div class="col-sm-8">

                <div class="text-sm-end">

                    <a href="<?php echo e(route('merchant.application.form')); ?>">

                        <button type="button" class="btn btn-success btn-rounded waves-effect waves-light addContact-modal mb-2">
                            
                            <i class="mdi mdi-plus me-1"></i> Add New

                        </button>

                    </a>

                </div>

            </div>

        </div>

        <div class="card">

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table align-middle table-nowrap table-hover dt-responsive nowrap w-100 display" id="example">

                        <thead class="table-light">

                            <tr>

                                <th scope="col">#</th>

                                <th scope="col">Full Name</th>

                                <th scope="col">Email</th>

                                <th scope="col">Phone</th>

                                <th scope="col">Website</th>

                                <th scope="col">Edit</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>

                                <td><?php echo e(++$key); ?></td>

                                <td><?php echo e($data->name); ?></td>

                                <td><?php echo e($data->email); ?></td>

                                <td><?php echo e($data->phone); ?></td>

                                <td><?php echo e($data->website_URL); ?></td>

                                <td>

                                    <a href="<?php echo e(route('merchant.application.detail', encrypt($data->id))); ?>" class="btn-sm btn btn-primary"><i class="bi bi-eye-fill"></i></a>
                                    
                                    <a href="<?php echo e(route('merchant.application.edit', encrypt($data->id))); ?>" class="btn-sm btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                </td>

                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>

                    </table>

                    <!-- end table -->

                </div>



            </div>



        </div>



    </div>



</div>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>

<!-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> -->
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
<script>
    jQuery(document).ready(function() {
        new DataTable('#example');
    });
</script>

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



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/payit123crm/public_html/CRM/resources/views/PYY/index.blade.php ENDPATH**/ ?>