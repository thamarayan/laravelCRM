<?php $__env->startSection('title'); ?>



    <?php echo app('translator')->get('LeaveType'); ?>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('css'); ?>



    <!-- select2 css -->



    <link href="<?php echo e(URL::asset('build/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />


    <!-- DataTables -->



    <link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />


    <!-- Responsive datatable examples -->

    <link href="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />


    <!-- Buttons CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">


    <style type="text/css">

        .select2-container--default .select2-selection--single .select2-selection__arrow {

            background-color: #419e41;
            color: white;
        }

    </style>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>



    <?php $__env->startComponent('components.breadcrumb'); ?>



        <?php $__env->slot('li_1'); ?>



            Home



        <?php $__env->endSlot(); ?>



        <?php $__env->slot('title'); ?>



            Leave Type



        <?php $__env->endSlot(); ?>



    <?php echo $__env->renderComponent(); ?>



    <div class="row">



        <div class="col-lg-12">
            
                <!-- Table Card Start -->
                <div class="card">

                    <div class="card-body">

                        <div class="row mt-2 mb-1">

                            <div class="col-md-8">
                                
                            </div>

                            <div class="col-md-4 text-right text-end">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('LeaveType.Create')): ?>
                                <a href="<?php echo e(url('/leave_type/create/')); ?>" class="btn btn-success rounded-pill">+ Add Leave Type</a>
                                <?php endif; ?>
                                
                            </div>
                            
                        </div>

                        <div class="row mt-2"> 

                            <div class="table-responsive">

                                <table class="table align-middle table-nowrap table-hover dt-responsive nowrap w-100" id="Leavetable">

                                    <thead class="table-light">

                                        <tr>

                                            <th>SL</th>

                                            <th>Leave Name</th>

                                            <th>Total Days</th>

                                            <th>Action</th>

                                          

                                        </tr>

                                    </thead>


                                    <tbody> 

                                        <?php if(!empty($leaves)): ?>

                                        <?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr>

                                                <td><?php echo e(++$key); ?></td>

                                                <td><?php echo e($value->leave_name); ?></td>

                                                <td><?php echo e($value->no_of_days); ?> Days</td>

                                                <td>
                                                    
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('LeaveType.Edit')): ?>
                                                    <a href="<?php echo e(route('leave_type.edit', $value->id)); ?>" class="btn btn-primary rounded-pill btn-sm">Edit</a>
                                                    <?php endif; ?>
                                                    
                                                </td>


                                            </tr>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php endif; ?>

                                        
                                    </tbody>


                                    <tfoot>

                                        <tr>

                                            <th>SL</th>

                                            <th>Leave Name</th>

                                            <th>Total Days</th>

                                            <th>Action</th>
                                          

                                        </tr>
                                        
                                    </tfoot>



                                </table> <!-- end table -->


                            </div><!-- end table responsive -->

                            <?php echo e($leaves->links()); ?>

                            
                        </div>

                    </div>

                </div>
          

        </div>



    </div>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>

    <!-- select2 js -->



    <script src="<?php echo e(URL::asset('build/libs/select2/js/select2.min.js')); ?>"></script>


    <script type="text/javascript">
          $(".myselect").select2();
    </script>




    <!-- Required datatable js -->



    <script src="<?php echo e(URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>



    <script src="<?php echo e(URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>







    <!-- Responsive examples -->



    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>



    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>



    <!-- ecommerce-customer-list init -->

    <script src="<?php echo e(URL::asset('build/js/pages/contact-user-list.init.js')); ?>"></script>

    <!-- Buttons JavaScript -->
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.flash.min.js"></script>


    <script>

        $(document).ready(function() {
            $('#Leavetable').DataTable({

                dom: 'lBfrtip',
                buttons: ['copy','csv']

            });
        });

    </script>



<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/payit123crm/public_html/CRM/resources/views/leave_type/index.blade.php ENDPATH**/ ?>