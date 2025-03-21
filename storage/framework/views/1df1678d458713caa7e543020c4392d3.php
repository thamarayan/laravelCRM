<?php $__env->startSection('title'); ?>



    <?php echo app('translator')->get('Attendance'); ?>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('css'); ?>



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



            Home



        <?php $__env->endSlot(); ?>



        <?php $__env->slot('title'); ?>



           Attendance



        <?php $__env->endSlot(); ?>



    <?php echo $__env->renderComponent(); ?>



    <div class="row">



        <div class="col-lg-12">



            <div class="card">



                <div class="card-body">



                    <div class="row mb-2">

                        <div class="col-sm-9">

                        </div><!-- end col-->

                        <div class="col-sm-3">



                            <div class="search-box me-2 mb-2 d-inline-block">



                                <div class="position-relative">



                                    <input type="text" class="form-control" id="searchTableList" placeholder="Search...">



                                    <i class="bx bx-search-alt search-icon"></i>



                                </div>



                            </div>



                        </div>


                    </div><!-- end row -->


                    <div class="card mt-2">

                        <ul class="nav nav-tabs" id="myTabs">

                            <li class="nav-item">
                                <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab" href="#tab1"><button class="btn btn-success">Check In</button></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2"><button class="btn btn-success">Check Out</button></a>
                            </li>
                            
                        </ul>


                        <div class="tab-content mt-2">

                            <div class="tab-pane fade show active" id="tab1">

                                <form action="<?php echo e(route('attendance.in.time')); ?>" method="post" enctype="multipart/form-data">

                                <?php echo csrf_field(); ?>    

                                    <div class="">

                                        <div class="form-group row mb-2">

                                            <label for="employee_name" class="col-sm-4 col-form-label">Employee Name<span class="text-danger">*</span></label>
                                                
                                            <div class="col-sm-4">

                                                <input type="text" class="form-control" name="employee_name" value="<?php echo e(Auth::user()->name); ?>" readonly>
                                                <input type="hidden" name="employee_id" value="<?php echo e(Auth::user()->id); ?>">

                                            </div>
                                            

                                        </div>

                                        <div class="form-group row mb-2">

                                            <label for="punch_in_time" class="col-sm-4 col-form-label">Punch Time<span class="text-danger">*</span></label>

                                    
                                            <div class="col-sm-4">

                                                <input type="datetime-local" class="form-control" name="punch_in_time" required>

                                            </div>

                                            <div class="col-sm-2"></div>

                                            <div class="col-sm-2">

                                                <button type="submit" class="btn btn-primary btn-soft ">Check In</button>
                 
                                            </div>


                                        </div>    
                                         
                                    </div>

                                </form>

                            </div>

                            <div class="tab-pane fade" id="tab2">

                                <form action="<?php echo e(route('attendance.out.time')); ?>" method="post" enctype="multipart/form-data">

                                <?php echo csrf_field(); ?> 

                                    <div class="">

                                        <div class="form-group row mb-2">

                                            <label for="employee_name" class="col-sm-4 col-form-label">Employee Name<span class="text-danger">*</span></label>
                                                
                                            <div class="col-sm-4">

                                                <input type="text" class="form-control" name="employee_name" value="<?php echo e(Auth::user()->name); ?>" readonly>
                                                <input type="hidden" name="employee_id" value="<?php echo e(Auth::user()->id); ?>">

                                            </div>
                                            

                                        </div>

                                        <div class="form-group row mb-2">

                                            <label for="punch_out_time" class="col-sm-4 col-form-label">Punch Time<span class="text-danger">*</span></label>

                                    
                                            <div class="col-sm-4">

                                                <input type="datetime-local" class="form-control" name="punch_out_time" required>

                                            </div>

                                            <div class="col-sm-2"></div>

                                            <div class="col-sm-2">

                                                <button type="submit" class="btn btn-primary btn-soft ">Check Out</button>
                 
                                            </div>


                                        </div>    
                                         
                                    </div>

                                </form>

                            </div>

                        </div>         

                    </div><!-- end row -->

                    <hr>
                    <br>


                

                    <div class="row mt-2"> 

                        <div class="table-responsive">

                            <table class="table align-middle table-nowrap table-hover dt-responsive nowrap w-100" id="userList-table">

                                <thead class="table-light">

                                    <tr>

                                        <th >SL</th>

                                        <th>Employee Name</th>

                                        <th>In Time</th>

                                        <th>Date</th>

                                        <th>Last In Time</th>

                                        <th>Last Out Time</th>

                                        <th>Worked Hours</th>

                                       

                                    </tr>

                                </thead>


                                <tbody> 

                                    <?php if(!empty($attendances)): ?>

                                    <?php $__currentLoopData = $attendances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>

                                            <td><?php echo e(++$key); ?></td>

                                            <td><?php echo e($value->userName->name); ?></td>

                                            <td><?php echo e($value->time_in); ?></td>

                                            <td><?php echo e(\Carbon\Carbon::parse($value->date)->format('d-m-Y')); ?></td>

                                            <td><?php echo e($value->time_in); ?></td>

                                            <td><?php echo e($value->time_out); ?></td>

                                            <td><?php echo e($value->working_hours); ?>:<?php echo e($value->working_minutes); ?> Minutes</td>

                                           

                                        </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php endif; ?>

                                    
                                </tbody>


                                <tfoot>

                                    <tr>

                                        <th >SL</th>

                                        <th>Employee Name</th>

                                        <th>In Time</th>

                                        <th>Date</th>

                                        <th>Last In Time</th>

                                        <th>Last Out Time</th>

                                        <th>Worked Hours</th>

                                      

                                    </tr>
                                    
                                </tfoot>



                            </table> <!-- end table -->


                        </div><!-- end table responsive -->

                        <?php echo e($attendances->links()); ?>

                        
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



<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/payit123crm/public_html/CRM/resources/views/attendance/index.blade.php ENDPATH**/ ?>