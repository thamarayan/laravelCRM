<?php $__env->startSection('title'); ?>

    <?php echo app('translator')->get('User'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

    <!-- select2 css -->

    <link href="<?php echo e(URL::asset('build/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />



    <!-- bootstrap-datepicker css -->

    <link href="<?php echo e(URL::asset('build/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">



    <!-- DataTables -->

    <link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />



    <!-- Responsive datatable examples -->

    <link href="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css"/>

    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Add Bootstrap JavaScript and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>

        <?php $__env->slot('li_1'); ?>

           Employee More Details

        <?php $__env->endSlot(); ?>

        <?php $__env->slot('title'); ?>

            Employee More Details

        <?php $__env->endSlot(); ?>

    <?php echo $__env->renderComponent(); ?>
    <style>
        .tablinks:hover 
        {
            background-color: #89f76a; /* Specify your desired hover color */
            color: white; /* Specify your desired text color on hover */
        }
        .ml-10{
            margin-left: 63px;
        }
        .spancost{
            background-color: #e9fc79;
        }
    </style>
    <section>

        <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">

               <a href="<?php echo e(url('/employee/users')); ?>">

               <button type="button" class="btn btn-success btn-rounded waves-effect waves-light addContact-modal mb-2"><i

                class="mdi mdi-arrow-left me-1"></i> Back</button>

            </a>

        </div>

        <div class="row">

            <div class="col-xl-4">

                <div class="card overflow-hidden">

                    <div class="bg-primary-subtle">

                        <div class="row">

                            <div class="col-7">

                                <div class="text-primary p-3">

                                    <h5 class="text-primary">Welcome Back !</h5>

                                    <p>PayIT</p>

                                </div>

                            </div>

                            <div class="col-5 align-self-end">

                                <img src="<?php echo e(URL::asset('build/images/profile-img.png')); ?>" alt="" class="img-fluid">

                            </div>

                        </div>

                    </div>

                    <div class="card-body pt-0">

                        <div class="row">

                            <div class="col-sm-12">

                                <div class="avatar-md profile-user-wid mb-2 d-flex">

                                    <img src="<?php echo e(isset($users->avatar) ? asset($users->avatar) : asset('build/images/users/profile.png')); ?>" alt="" class="img-thumbnail rounded-circle">

                                    <div class="ml-10">
                                        
                                       <h6 class="ml-10 mt-5"><?php if($totalcost->cost!=null): ?> <span class="spancost"><?php echo e($totalcost->currency); ?><?php echo e($totalcost->cost); ?>/hours</span>  <?php endif; ?></h6>

                                    </div>

                                </div>

                                <h4 class="font-size-20 mb-1 text-truncate"><?php echo e($users->name); ?></h4>

                                <p class="m-0"><strong class="m-0">Phone:&nbsp;&nbsp;</strong><?php echo e($users->phone); ?></p>
                                <p class="m-0"><strong class="m-0">Email:&nbsp;&nbsp;</strong><?php echo e($users->email); ?></p>
                               
                                <p class="m-0"><strong class="m-0">Status:&nbsp;&nbsp;</strong><?php echo e($users->status == 1 ? 'Active' : 'Inactive'); ?></p> 

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-xl-8">

                <div class="row">

                    <div class="col-md-4">

                        <div class="card mini-stats-wid">

                            <div class="card-body">

                                <div class="d-flex">

                                    <div class="flex-grow-1">

                                        <p class="text-muted fw-medium">Working Hours</p>

                                        <h4 class="mb-0"><?php echo e($totalhours); ?></h4>

                                    </div>



                                    <div class="flex-shrink-0 align-self-center">

                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">

                                            <span class="avatar-title">

                                                <i class='bi bi-alarm-fill font-size-24'></i>

                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="card mini-stats-wid">

                            <div class="card-body">

                                <div class="d-flex">

                                    <div class="flex-grow-1">

                                        <p class="text-muted fw-medium">Revenue</p>

                                        <h4 class="mb-0">$ <?php echo e($revenue); ?></h4>

                                    </div>



                                    <div class="flex-shrink-0 align-self-center ">

                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">

                                            <span class="avatar-title rounded-circle bg-primary">

                                                <i class="bx bx-archive-in font-size-24"></i>

                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-4">

                        <div class="card mini-stats-wid">

                            <div class="card-body">

                                <div class="d-flex">

                                    <div class="flex-grow-1">

                                        <p class="text-muted fw-medium">Tasks</p>

                                        <h4 class="mb-0"><?php echo e($tasks->count()); ?></h4>

                                    </div>



                                    <div class="flex-shrink-0 align-self-center ">

                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">

                                            <span class="avatar-title rounded-circle bg-primary">

                                                <i class="bx bx-copy-alt font-size-24"></i>

                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>                    

                </div>

                <div class="row">

                    <div class="col-md-4">

                        <div class="card mini-stats-wid">

                            <div class="card-body">

                                <div class="d-flex">

                                    <div class="flex-grow-1">


                                        <p class="text-muted fw-medium"><a href="<?php echo e(url('user/attendance', encrypt($users->id))); ?>" class="text-muted">Attendance</a></p>

                                        <h5 class="mb-0"><?php echo e($t_hours); ?>: <?php echo e($t_minutes); ?> </h5>

                                    </div>



                                    <div class="flex-shrink-0 align-self-center">

                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">

                                            <span class="avatar-title">

                                                <i class="bx bx-copy-alt font-size-24"></i>

                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div> 

                    <!-- <div class="col-md-4">

                        <div class="card mini-stats-wid">

                            <div class="card-body">

                                <div class="d-flex">

                                    <div class="flex-grow-1">

                                        <p class="text-muted fw-medium">Total Cost</p>

                                        <h4 class="mb-0"></h4>

                                    </div>



                                    <div class="flex-shrink-0 align-self-center">

                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">

                                            <span class="avatar-title rounded-circle bg-primary">

                                                <i class="bi bi-currency-dollar font-size-24"></i>

                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div> -->

                    

                    <!-- <div class="col-md-4">

                        <div class="card mini-stats-wid">

                            <div class="card-body">

                                <div class="d-flex">

                                    <div class="flex-grow-1">

                                        <p class="text-muted fw-medium">Reports</p>

                                        <h4 class="mb-0">$16.2</h4>

                                    </div>



                                    <div class="flex-shrink-0 align-self-center">

                                        <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">

                                            <span class="avatar-title rounded-circle bg-primary">

                                                <i class="bx bx-purchase-tag-alt font-size-24"></i>

                                            </span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div> -->

                </div>

            </div>

        </div>

        <div class="tab">
            <button class="tablinks active" onclick="openCity(event, 'London')">Project Tasks</button>
            <button class="tablinks" onclick="openCity(event, 'Paris')">Time</button>
        </div>

        <div id="London" class="tabcontent Active active">
            <h5>Tasks</h5>
             <table class="table align-middle table-nowrap dt-responsive nowrap w-100" id="">
                    <thead class="table-light">
                         <tr>
                            <th scope="col">S.no</th>
                            <th scope="col">Name</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-end">Action</th>
                          </tr>
                    </thead>

                    <tbody>
                        <?php if(!empty($tasks)): ?>
                            <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>

                                    <td><?php echo e(++$key); ?></td>

                                    <td><?php echo e($value->title); ?></td>

                                    <td><?php echo e(\Carbon\Carbon::parse($value->start_date)->format('d M Y')); ?></td>

                                    <td class="<?php echo e($value->mark_done == 1 ? 'text-success' : 'text-danger'); ?>">
                                    <?php echo e($value->mark_done == 1 ? 'completed' : 'pending'); ?>

                                    </td>

                                    <td class="text-end">

                                        <button type="button" class="btn btn-sm btn-soft-info" data-toggle="modal" data-target="#AddHoursModal<?php echo e($key); ?>"><i class='bi bi-alarm-fill'></i> Add Hours</button>

                                        <button type="button" class="btn btn-sm btn-soft-info" data-toggle="modal" data-target="#ViewHoursModal<?php echo e($key); ?>"><i class="bi bi-eye-fill"></i>View Hours</button>

                                        <button type="button" class="btn btn-sm btn-soft-info" data-toggle="modal" data-target="#ShowCommentsModal<?php echo e($key); ?>"><i class="bi bi-chat-dots-fill"></i> Comments</button>

                                       
                                    
                                    </td>


                                    <!-- Show Comments modal start -->

                                    <div class="modal fade " id="ShowCommentsModal<?php echo e($key); ?>" tabindex="-1" role="dialog" aria-labelledby="ShowCommentsModallabel" aria-hidden="true" style="height:500px;">
                                      <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="ShowCommentsModallabel">Tasks Comments </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                         
                                              <div class="modal-body">
                                                
                                                    <?php if($value->TaskComment!=null): ?>
                                                    <?php $__currentLoopData = $value->TaskComment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="row" style="background-color:#e8eaed; margin:1px;">

                                                    <div class="col-md-3 mt-1">
                                                        <p><?php echo e(\Carbon\Carbon::parse($comment->created_at)->format('d M Y')); ?></p>
                                                    </div>

                                                    <div class="col-md-9 mt-1">    

                                                        <p><?php echo e($comment->comments); ?></p>
                                                        
                                                    </div>

                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                                    <?php endif; ?>  
                                                    <?php if($value->TaskComment->count()==0): ?>
                                                      <div class="text-center">No Cooments Found!</div>
                                                    <?php endif; ?>
                                                 
                                              </div>

                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                               <!-- <button type="submit" class="btn btn-info">Submit</button> -->
                                              </div> 
                                        </div>
                                      </div>
                                    </div>

                                    <!-- close Show Comments Modal -->


                                    <!-- ADD HOURS MODAL -->
                                    <div class="modal fade AddHoursMdl" id="AddHoursModal<?php echo e($key); ?>" tabindex="-1" role="dialog" aria-labelledby="AddHoursModallabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="AddHoursModallabel">Add Working Task Hours</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form id="hoursForm" action="<?php echo e(route('SaveTaskWorkingHours')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                              <div class="modal-body">
                                                <div class="row">                                        
                                                    <label class="col-md-2 form-group">Hours<span class="text-danger">*</span></label>  

                                                    <div class="col-md-8">

                                                        <input type="hidden" name="task_id" value="<?php echo e($value->id); ?>">
                                                        <select class="form-control" name="hours" required>

                                                                <option value="">Working Hours</option>
                                                                <?php
                                                                    for ($hour = 0; $hour <= 23; $hour++) {
                                                                        for ($minute = 0; $minute <= 59; $minute += 30) {
                                                                            $time = sprintf('%02d:%02d', $hour, $minute);
                                                                            echo "<option value=\"$time\">$time</option>";
                                                                        }
                                                                    }
                                                                ?>

                                                        </select>

                                                    </div> 
                                                </div> 
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-info">Submit</button>
                                              </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- CLOSE ADD HOURS MODAL -->

                                    <!-- view HOURS MODAL -->
                                    <div class="modal fade" id="ViewHoursModal<?php echo e($key); ?>" tabindex="-1" role="dialog" aria-labelledby="ViewHoursModallabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="ViewHoursModallabel">Total Working Task Hours&nbsp;
                                            <?php if($value->TaskHours!=null): ?> 
                                                <strong><?php echo e($value->taskhours); ?> Minutes, <?php echo e($value->taskcost); ?>(<?php echo e($value->currency); ?>)</strong>  
                                            <?php endif; ?>  
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                         
                                          <div class="modal-body">
                                             
                                                <?php if($value->TaskHours!=null): ?>
                                                    <?php $__currentLoopData = $value->TaskHours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taskhour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="row" style="background-color:#e8eaed; margin:1px;">
                                                        
                                                        <div class="col-md-3 mt-1">
                                                            <p><?php echo e(\Carbon\Carbon::parse($taskhour->created_at)->format('d M Y')); ?></p>
                                                        </div>
                                                        <div class="col-md-9 mt-1">
                                                            <p><?php echo e($taskhour->hours); ?> Hours</p>
                                                        </div>

                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>

                                                <?php if($value->TaskHours->count()==0): ?>
                                                <div class="text-center">No Hours!</div>
                                                <?php endif; ?>
                                            
                                          
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <!-- <button type="submit" class="btn btn-info">Submit</button> -->
                                          </div>
                                          
                                        </div>
                                      </div>
                                    </div>
                                    <!-- CLOSE view HOURS MODAL -->
                                    
                                </tr>
                             
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php if($tasks->count() == 0): ?>
                                <tr class="text-center">
                                    <td colspan="6">No Tasks to display.</td>
                                </tr>

                            <?php endif; ?>

                        <?php endif; ?>
                    </tbody>
            </table>
        </div>

        <div id="Paris" class="tabcontent">
            <h5>Times</h5>

            <div class="table-responsive">

                <table class="table align-middle table-nowrap table-hover dt-responsive nowrap w-100">

                    <thead class="table-light">

                        <tr>

                            <th scope="col">#</th>

                            <th scope="col">Name</th>

                            <th scope="col">Date</th>

                            <th scope="col">Time In</th>

                            <th scope="col">Time Out</th>

                            <th scope="col">Total Hours</th>

                        </tr>

                    </thead>

                    <tbody>

                            <?php if(!empty($timers)): ?>

                            <?php $__currentLoopData = $timers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>

                                    <td><?php echo e(++$key); ?></td>
       
                                    <td><?php echo e($value->User->name); ?></td>

                                    <td><?php echo e(\Carbon\Carbon::parse($value->date)->format('j M Y')); ?></td>

                                    <td>
                                        <?php if($value->start_time): ?>
                                        <?php echo e(\Carbon\Carbon::parse($value->start_time)->format('H:i:s')); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php if($value->end_time): ?>
                                        <?php echo e(\Carbon\Carbon::parse($value->end_time)->format('H:i:s')); ?>

                                            <?php endif; ?>
                                    </td>

                                    <td>
                                    <?php echo e(floor($value->total_hours / 60)); ?> hrs <?php echo e($value->total_hours % 60); ?> min
                                    </td>

                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php if($timers->count() == 0): ?>

                                        <tr class="text-center">

                                            <td colspan="6">No Timer to display.</td>

                                        </tr>

                            <?php endif; ?>

                            <?php endif; ?>

                    </tbody>

                </table><!-- end table -->

            </div>

        </div><!-- end row -->

<?php $__env->stopSection(); ?>

<script type="text/javascript">
   
  
        $('#hoursForm').on('submit', function (e) {
            e.preventDefault(); // Prevent the default form submission

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(), // Serialize the form data
                success: function (response) {
                
                     $(".AddHoursMdl").hide();

                    // Handle the success response (e.g., display a success message)
                }
            });
        });
   

</script>

<script>
        function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }
</script>

<script type="text/javascript">
    
    function setActiveTabByDefault() {
    var defaultTab = document.querySelector('.tablinks.active');
    var defaultContent = document.querySelector('.tabcontent.active');
    
    if (defaultTab && defaultContent) {
        defaultTab.className += '';
        defaultContent.style.display = 'block';
    }
}

window.addEventListener('load', setActiveTabByDefault);
</script>

<?php $__env->startSection('script'); ?>

    <!-- select2 -->

    <script src="<?php echo e(URL::asset('build/libs/select2/js/select2.min.js')); ?>"></script>

    <!-- bootstrap-datepicker js -->

    <script src="<?php echo e(URL::asset('build/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>

    <!-- Required datatable js -->

    <script src="<?php echo e(URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>

    <!-- Responsive examples -->

    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>

    <!-- init js -->

    <script src="<?php echo e(URL::asset('build/js/pages/crypto-orders.init.js')); ?>"></script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/payit123crm/public_html/CRM/resources/views/employee/view_more.blade.php ENDPATH**/ ?>