<?php $__env->startSection('title'); ?>



    <?php echo app('translator')->get('Leave'); ?>



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




<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>



    <?php $__env->startComponent('components.breadcrumb'); ?>



        <?php $__env->slot('li_1'); ?>



            Home



        <?php $__env->endSlot(); ?>



        <?php $__env->slot('title'); ?>



           Leave



        <?php $__env->endSlot(); ?>



    <?php echo $__env->renderComponent(); ?>



    <div class="row">



        <div class="col-lg-12">



            <div class="card">



                <div class="card-body">

                    <div class="row">

                        <?php if($users): ?>
                        <div class="col-md-2">

                            <form action="" method="get">
                                <select class="form-control" name="user"  onchange="this.form.submit()" required>
                                    <option value="">Select User</option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>" <?php if($request->user==$user->id): echo 'selected'; endif; ?>><?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </form>
                            
                        </div>
                        <?php else: ?>
                        <div class="col-md-2"></div>
                        <?php endif; ?>

                        <div class="col-md-7">
                            
                        </div>

                        <div class="col-md-3 text-end">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Leave.Create')): ?>
                            <a href="<?php echo e(url('leave/application')); ?>" class="btn btn-primary rounded-pill btn-sm"><strong>+ Leave Application</strong></a>
                            <?php endif; ?>
                            
                        </div>
                    </div>


                    <div class="row mt-2"> 

                        <div class="table-responsive">

                            <table class="table align-middle table-nowrap table-hover dt-responsive nowrap w-100" id="Leavetable">

                                <thead class="table-light">

                                    <tr>

                                        <th >SL</th>

                                        <th>Employee Name</th>

                                        <th>Leave Type</th>

                                        <th>Application Start Date</th>

                                        <th>Application End Date</th>

                                        <th>Apply Day</th>

                                        <th>Approve Start Date</th>

                                        <th>Approved End Date</th>

                                        <th>Approved Day</th>

                                    </tr>

                                </thead>


                                <tbody> 

                                    <?php if(!empty($leaves)): ?>

                                    <?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>

                                            <td><?php echo e(++$key); ?></td>

                                            <td><?php echo e($value->userName->name); ?></td>

                                            <td><?php echo e($value->LeaveType->leave_name); ?></td>

                                            <td><?php echo e(\Carbon\Carbon::parse($value->application_start_date)->format('d/m/Y')); ?></td>

                                            <td><?php echo e(\Carbon\Carbon::parse($value->application_end_date)->format('d/ m/Y')); ?></td>

                                            <td><?php echo e($value->apply_day); ?> Days</td>

                                            <td><?php echo e($value->approve_start_date); ?></td>

                                            <td><?php echo e($value->approve_end_date); ?></td>

                                            <td><?php echo e($value->approve_day); ?></td>

                                        </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php endif; ?>

                                    
                                </tbody>


                                <tfoot>

                                    <tr>

                                        <th >SL</th>

                                        <th>Employee Name</th>

                                        <th>Leave Type</th>

                                        <th>Application Start Date</th>

                                        <th>Application End Date</th>

                                        <th>Approve Start Date</th>

                                        <th>Approved End Date</th>

                                        <th>Apply Day</th>

                                        <th>Approved Day</th>

                                    </tr>
                                    
                                </tfoot>



                            </table> <!-- end table -->


                        </div><!-- end table responsive -->

                        
                        
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

    
    <!-- Buttons JavaScript -->
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.flash.min.js"></script>


    <script>

        $(document).ready(function() {
            $('#Leavetable').DataTable({

                dom: 'lBfrtip',
                buttons: ['csv']

            });
        });

    </script>



<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/payit123crm/public_html/CRM/resources/views/leave/index.blade.php ENDPATH**/ ?>