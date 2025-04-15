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



<link href="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet"



    type="text/css" />



<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>



    <?php $__env->startComponent('components.breadcrumb'); ?>



            <?php $__env->slot('li_1'); ?>



            Onboardings



            <?php $__env->endSlot(); ?>



            <?php $__env->slot('title'); ?>



            Onboardings



            <?php $__env->endSlot(); ?>



    <?php echo $__env->renderComponent(); ?>







        <div class="row">
            <?php echo $__env->make('flash_msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            <div class="col-lg-12">



                <div class="card">



                    <div class="card-body">


                        <div class="table-responsive">

                            <table class="table align-middle table-nowrap table-hover dt-responsive nowrap w-100 display" id="example">

                                <thead class="table-light">

                                    <tr>

                                        <th scope="col">#</th>

                                        <th scope="col">Full Name</th>

                                        <th scope="col">Email</th>

                                        <th scope="col">Company Name</th>

                                        <th scope="col">City</th>

                                        <th scope="col">Country</th>

                                        <th scope="col">Client Type</th>

                                        <th scope="col">Status</th>
                                        <!-- RK -->
                                        <th scope="col">View</th>

                                        <th scope="col">Edit</th>
                                        <!-- RK -->
                                        <th scope="col" style="width: 200px;">Applied On</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>

                                        <td><?php echo e(++$key); ?></td>

                                        <td><?php echo e($data->first_name); ?> <?php echo e($data->last_name); ?></td>

                                        <td><?php echo e($data->email); ?></td>

                                        <td><?php echo e($data->company_name); ?></td>

                                        <td><?php echo e($data->city); ?></td>

                                        <td><?php echo e($data->country); ?></td>

                                        <td><?php echo e($data->client_type); ?></td>

                                        <td>
                                            <?php if($data->rejectionFlag === 0): ?>
                                            <?php if($data->status=='0'): ?>
                                            <h3 class="badge bg-success">Approved</h3>
                                            <?php else: ?>
                                            <h3 class="badge bg-danger">Pending</h3>
                                            <?php endif; ?>
                                            <?php else: ?>
                                            <h3 class="badge bg-danger">Rejected</h3> <a href="<?php echo e(route('kycrequests.revertRejection',encrypt($data->id))); ?>" type="button" class="btn btn-sm btn-success">Revert?</a>
                                            <?php endif; ?>
                                        </td>

                                        <!-- RK -->

                                        <td>
                                            <a href="<?php echo e(route('onboarding.view', encrypt($data->id))); ?>" class="btn-sm btn btn-primary"><i class="bi bi-eye-fill"></i></a>
                                        </td>

                                        <td>
                                            <a href="<?php echo e(route('onboarding.edit', encrypt($data->id))); ?>" class="btn-sm btn btn-warning">Edit</a>
                                        </td>


                                        <!-- RK -->

                                        <td><?php echo e($data->created_at); ?></td>

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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelCRM\resources\views/onboarding/index.blade.php ENDPATH**/ ?>