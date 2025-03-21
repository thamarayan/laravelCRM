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



          Monthly Attendance



        <?php $__env->endSlot(); ?>



    <?php echo $__env->renderComponent(); ?>



    <div class="row">



        <div class="col-lg-12">



            <div class="card">

                <div class="card-body">


                    <div class="row mt-2">

                        <form action="" method="" >

                        <?php echo csrf_field(); ?>

                            <div class="">

                                <div class="form-group row mb-2">

                                    <label for="employee_name" class="col-sm-4 col-form-label"><strong>Employee Name<span class="text-danger">*</span></strong></label>
                                    <?php if($users): ?> 

                                        <div class="col-sm-4">

                                            <select class="form-control" name="employee_id" required>

                                                <option value="">Select Employee</option>
                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <?php if($user->id==$request->employee_id): ?>

                                                        <option value="<?php echo e($user->id); ?>" selected><?php echo e($user->name); ?></option>

                                                    <?php else: ?>

                                                        <option value="<?php echo e($user->id); ?>" ><?php echo e($user->name); ?></option>

                                                    <?php endif; ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                            </select>
                                            
                                        </div>  
                                        
                                    <?php else: ?>

                                        <div class="col-sm-4">

                                            <input type="text" class="form-control" name="employee_name" value="<?php echo e(Auth::user()->name); ?>" readonly>
                                            <input type="hidden" name="employee_id" value="<?php echo e(Auth::user()->id); ?>">

                                        </div>
                                        
                                    <?php endif; ?>

                                </div>

                                <div class="form-group row mb-2">

                                    <label for="year" class="col-sm-4 col-form-label"><strong>Year<span class="text-danger">*</span></strong></label>
                                        
                                    <div class="col-sm-4">

                                        <select class="form-control myselect" name="year" required>
                                            <option value="">Select Year</option>
                                            <option value="2019" <?php if('2019'==$request->year): echo 'selected'; endif; ?>>2019</option>
                                            <option value="2020" <?php if('2020'==$request->year): echo 'selected'; endif; ?>>2020</option>
                                            <option value="2021" <?php if('2021'==$request->year): echo 'selected'; endif; ?>>2021</option>
                                            <option value="2022" <?php if('2022'==$request->year): echo 'selected'; endif; ?>>2022</option>
                                            <option value="2023" <?php if('2023'==$request->year): echo 'selected'; endif; ?>>2023</option>
                                            <option value="2024" <?php if('2024'==$request->year): echo 'selected'; endif; ?>>2024</option>
                                            <option value="2025" <?php if('2025'==$request->year): echo 'selected'; endif; ?>>2025</option>
                                            <option value="2026" <?php if('2026'==$request->year): echo 'selected'; endif; ?>>2026</option>
                                            <option value="2027" <?php if('2027'==$request->year): echo 'selected'; endif; ?>>2027</option>
                                            <option value="2028" <?php if('2028'==$request->year): echo 'selected'; endif; ?>>2028</option>
                                            <option value="2029" <?php if('2029'==$request->year): echo 'selected'; endif; ?>>2029</option>
                                            <option value="2030" <?php if('2030'==$request->year): echo 'selected'; endif; ?>>2030</option>
                                        </select>

                                    </div>

                                </div>

                                <div class="form-group row mb-2">

                                    <label for="month" class="col-sm-4 col-form-label"><strong>Month<span class="text-danger">*</span></strong></label>
                                        
                                    <div class="col-sm-4">

                                        <select class="form-control myselect" name="month" required>
                                            <option value="">Select Month</option>
                                            <option value="01" <?php if('01'==$request->month): echo 'selected'; endif; ?>>January</option>
                                            <option value="02" <?php if('02'==$request->month): echo 'selected'; endif; ?>>February</option>
                                            <option value="03" <?php if('03'==$request->month): echo 'selected'; endif; ?>>March</option>
                                            <option value="04" <?php if('04'==$request->month): echo 'selected'; endif; ?>>April</option>
                                            <option value="05" <?php if('05'==$request->month): echo 'selected'; endif; ?>>May</option>
                                            <option value="06" <?php if('06'==$request->month): echo 'selected'; endif; ?>>June</option>
                                            <option value="07" <?php if('07'==$request->month): echo 'selected'; endif; ?>>July</option>
                                            <option value="08" <?php if('08'==$request->month): echo 'selected'; endif; ?>>August</option>
                                            <option value="09" <?php if('09'==$request->month): echo 'selected'; endif; ?>>September</option>
                                            <option value="10" <?php if('10'==$request->month): echo 'selected'; endif; ?>>October</option>
                                            <option value="11" <?php if('11'==$request->month): echo 'selected'; endif; ?>>November</option>
                                            <option value="12" <?php if('12'==$request->month): echo 'selected'; endif; ?>>December</option>

                                        </select>

                                    </div>

                                </div>

                                <!-- <div class="form-group row mb-2">

                                    <label for="in_time" class="col-sm-4 col-form-label"><strong>In Time<span class="text-danger">*</span></strong></label>
                                        
                                    <div class="col-sm-4">

                                        <select class="form-control myselect" name="in_time" required>

                                            <option value="">--:--</option>

                                            <?php
                                                for ($hour = 0; $hour <= 23; $hour++) {
                                                    for ($minute = 0; $minute <= 59; $minute += 5) {
                                                        $time = sprintf('%02d:%02d', $hour, $minute);
                                                        echo "<option value=\"$time\">$time</option>";
                                                    }
                                                }
                                            ?>
                                            
                                        </select>

                                    </div>

                                </div> -->


                                <!-- <div class="form-group row mb-2">

                                    <label for="out_time" class="col-sm-4 col-form-label"><strong>Out Time<span class="text-danger">*</span></strong></label>
                                        
                                    <div class="col-sm-4">

                                        <select class="form-control myselect" name="out_time" required>

                                           
                                            <option value="">--:--</option>

                                            
                                            <?php
                                                for ($hour = 0; $hour <= 23; $hour++) {
                                                    for ($minute = 0; $minute <= 59; $minute += 5) {
                                                        $time = sprintf('%02d:%02d', $hour, $minute);
                                                        echo "<option value=\"$time\">$time</option>";
                                                    }
                                                }
                                            ?>
                                            
                                       
                                            
                                        </select>

                                    </div>

                                </div> -->

                                <div class="form-group row mb-2">

                                   
                                    <div class="col-sm-7">

                                        

                                    </div>

                                    <div class="col-sm-2">

                                        <button type="submit" class="btn btn-success ">Details</button>
                                        
                                    </div>

                                </div>   
                                 
                            </div>

                        </form>
                    </div><!-- end row -->

                 
                </div>

            </div>

            <?php if($attendances): ?>
                <!-- Table Card Start -->
                <div class="card">

                    <div class="card-body">

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

                                        <?php if($attendances->count() == 0): ?>

                                            <tr class="text-center">

                                                <td colspan="6">No Attendance to display.</td>

                                            </tr>

                                        <?php endif; ?>

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
            <?php endif; ?>


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



<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/payit123crm/public_html/CRM/resources/views/attendance/monthly_attendance.blade.php ENDPATH**/ ?>