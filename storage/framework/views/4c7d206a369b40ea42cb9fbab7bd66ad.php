<?php $__env->startSection('title'); ?>

    <?php echo app('translator')->get('Customer List'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

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

           Customer

        <?php $__env->endSlot(); ?>

        <?php $__env->slot('title'); ?>

            Customer List

        <?php $__env->endSlot(); ?>

    <?php echo $__env->renderComponent(); ?>

    <div class="row">

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

                            </div>

                        </div><!-- end col-->

                    </div>

                    <!-- end row -->

                    <div class="table-responsive">

                        <table class="table align-middle table-nowrap table-hover dt-responsive nowrap w-100">

                            <thead class="table-light">

                                <tr>

                                    <th scope="col" style="width: 40px;">Image</th>

                                    <th scope="col">Name</th>

                                    <th scope="col">Email</th>

                                    <th scope="col">Phone</th>

                                    <th scope="col">DOB</th>

                                    <th scope="col" style="width: 200px;">Action</th>

                                </tr>

                            </thead>

                            <tbody>
                                <?php if(!empty($users)): ?>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>

                                    <td> <img src="<?php echo e($value->avatar); ?>" alt="" class="member-img img-fluid d-block rounded-circle" /> </td>

                                    <td><?php echo e($value->name); ?></td>

                                    <td><?php echo e($value->email); ?></td>

                                    <td><?php echo e($value->phone); ?></td>

                                    <td><?php echo e($value->dob); ?></td>

                                    <td>

                                    <ul class="list-unstyled hstack gap-1 mb-0">

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View Account">

                                            <a href="<?php echo e(route('view.more',encrypt($value->id))); ?>" class="btn btn-sm btn-soft-info"><i class='fas fa-user-alt'></i> View Account</a>

                                        </li>

                                     
                                    </ul>

                                 </td>

                                </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                   <?php if($users->count() == 0): ?>

                                            <tr class="text-center">

                                                <td colspan="6">No Customer to display.</td>

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

    <!-- removeItemModal -->

    <!-- end removeItemModal -->

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

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/payit123crm/public_html/CRM/resources/views/accountants/index.blade.php ENDPATH**/ ?>