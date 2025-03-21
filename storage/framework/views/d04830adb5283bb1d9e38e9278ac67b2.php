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

    <style>
        .flex-1{
                display: none;
           }
         .w-5{
          display: none;
         }   
    </style>    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>


        <?php $__env->slot('li_1'); ?>

           Users

        <?php $__env->endSlot(); ?>

        <?php $__env->slot('title'); ?>

            Users Account

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
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('User.Create')): ?>

                                   <a href="<?php echo e(route('user.create')); ?>">

                                       <button type="button" class="btn btn-success btn-rounded waves-effect waves-light addContact-modal mb-2"><i

                                        class="mdi mdi-plus me-1"></i> New User</button>

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

                                    <!-- <th scope="col" style="width: 40px;">Image</th> -->

                                    <th scope="col">Name</th>

                                    <th scope="col">Email</th>

                                    <th scope="col">Role</th>

                                    <th scope="col">Phone</th>

                                   

                                    <th scope="col" style="width: 200px;">Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php if(!empty($users)): ?>

                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>

                                    <td><?php echo e(++$key); ?></td>
                                    
                                    <!-- <td> <img src="<?php echo e($value->avatar); ?>" alt="" class="member-img img-fluid d-block rounded-circle" /> </td> -->

                                    <td><?php echo e($value->name); ?></td>

                                    <td><?php echo e($value->email); ?></td>

                                    <td><?php echo e($value->Role->name); ?> </td>


                                    <td><?php echo e($value->phone); ?></td>

                                   

                                    <td>

                                    <ul class="list-unstyled hstack gap-1 mb-0">

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('User.Edit')): ?>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">

                                            <a href="<?php echo e(route('user.edit',encrypt($value->id))); ?>" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>

                                        </li>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('User.Delete')): ?>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">

                                           <a href="<?php echo e(route('user.delete', encrypt($value->id))); ?>" class="delete-link" onclick="return confirm('Are you sure you want to delete this user?')"><i class="mdi mdi-delete-outline"></i></a>

                                        </li>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('User.Account')): ?>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View Account">

                                            <a href="<?php echo e(route('user.view.more',encrypt($value->id))); ?>" class="btn btn-sm btn-soft-info"><i class='fas fa-user-alt'></i> View Account</a>

                                        </li>
                                        <?php endif; ?>

                                    </ul>

                                      </td>

                                </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php if($users->count() == 0): ?>

                                    <tr class="text-center">

                                        <td colspan="5">No User to display.</td>

                                    </tr>

                                    <?php endif; ?>

                                <?php endif; ?>

                            </tbody>

                        </table>

                        <!-- end table -->

                    </div>

                    <div><?php echo e($users->links()); ?></div>

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




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelCRM\resources\views/user/index.blade.php ENDPATH**/ ?>