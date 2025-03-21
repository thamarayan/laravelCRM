<?php $__env->startSection('title'); ?>

<?php echo app('translator')->get('Projects'); ?>

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

Projects

<?php $__env->endSlot(); ?>

<?php $__env->slot('title'); ?>

Projects

<?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>

<div class="row">

    <?php echo $__env->make('flash_msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('multiselect', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="col-lg-6">

        <div class="row">

            <ul class="nav nav-tabs" id="myTab" role="tablist">

                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false"><i class="mdi mdi-folder">&nbsp;&nbsp;</i>Projects</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" id="my-tasks" data-toggle="tab" href="#tasks" role="tab" aria-controls="tasks" aria-selected="false"><i class="mdi mdi-checkbox-marked-circle">&nbsp;&nbsp;</i>My Tasks</a>
                  </li>

            </ul>   
          
            <div class="tab-content">

                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <div class="row">

                        <div class="col-sm-4">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Projects.New')): ?>
                                <div class="position-relative m-2">
                                  
                                    <button type="button" class="btn btn-success rounded-pill btn-sm add-project"><span class="rounded-circle">+ New Project</span></button>
                                  
                                </div>
                                <?php endif; ?>
                        </div>

                        <div class="col-sm-8">

                            <div class="text-sm-end">

                            </div>

                        </div><!-- end col-->

                    </div><!-- end row -->

                    <div class="table-responsive" >

                        <table class="table align-middle table-nowrap dt-responsive w-100" id="">

                            <thead class="table-light">

                                <tr>

                                    <th scope="col">Project Title</th>

                                    <th scope="col">Date</th>

                                    <th scope="col" >Action</th>

                                </tr>

                            </thead>


                            <tbody>

                                <?php if(!empty($projects)): ?>

                                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if($value->mark_done==1): ?>

                                <tr id="pid<?php echo e($value->id); ?>" style="background-color: #cbe9dd;">

                                    <td>
                                        
                                        <!-- <a class="pname<?php echo e($value->id); ?>" value="<?php echo e($value->name); ?>" href="<?php echo e(route('projects.details',encrypt($value->id))); ?>">click</a> -->
                                       
                                        <a  class="toggle-tasks"> <i class="fa fa-folder-open" aria-hidden="true"></i> <?php echo e($value->name); ?></a>


                                    </td>


                                    <td><?php echo e(\Carbon\Carbon::parse($value->start_date)->format('d M Y')); ?></td>

                                    <td style="text-align: center;">

                                        <ul class="list-unstyled hstack gap-1 mb-0">

                                            <li>
                                                <div class="dropdown dropend">

                                                    <a id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"><i class="mdi mdi-dots-vertical"></i></a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" data-bs-auto-end="true">

                                                        <li><a class="dropdown-item" data-toggle="modal" data-target="#addTask<?php echo e($value->id); ?>" onclick="showAddTest(<?php echo e($value->id); ?>)">Add Sub-task</a></li>

                                                        <li><a class="dropdown-item edit-project" onclick="editForm(<?php echo e($value->id); ?>)">View/Edit</a></li>


                                                        <li id="p_li<?php echo e($value->id); ?>">
                                                            <?php if ($value->mark_done == 1) : ?>
                                            
                                                                <a href="javascript:void(0)" onclick="markNotDoneProject(<?php echo e($value->id); ?>)" class="dropdown-item text-danger">Mark As Incomplete</a>

                                                            <?php else : ?>
                                                                <a href="javascript:void(0)" onclick="markDoneProject(<?php echo e($value->id); ?>)" class="dropdown-item text-success">Mark As Done</a>
                                                            <?php endif; ?>
                                                        </li>

                                                        <li>
                                                            <a href="javascript:void(0)" onclick="deleteProject(<?php echo e($value->id); ?>)" class="dropdown-item text-danger">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <span class="text-success" id="project-complete<?php echo e($value->id); ?>"></span>
                                        </ul>
                                    </td>



                                </tr>


                                <?php else: ?>

                                <tr id="pid<?php echo e($value->id); ?>">

                                    <td>
                                       
                                        <!-- <input type="hidden" class="pname<?php echo e($value->id); ?>" value="<?php echo e($value->name); ?>" href="<?php echo e(route('projects.details',encrypt($value->id))); ?>">  -->
                                        <a class="toggle-tasks"><i class="fa fa-folder-open" aria-hidden="true"></i> <?php echo e($value->name); ?></a>
                                        
                                    </td>



                                    <td><?php echo e(\Carbon\Carbon::parse($value->start_date)->format('d M Y')); ?></td>

                                    <td style="text-align: center;">

                                        <ul class="list-unstyled hstack gap-1 mb-0">

                                            <li>
                                                <div class="dropdown dropend">
                                                    <a id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"><i class="mdi mdi-dots-vertical"></i></a>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" data-bs-auto-end="true">

                                                        <li><a class="dropdown-item" data-toggle="modal" data-target="#addTask<?php echo e($value->id); ?>" onclick="showAddTest(<?php echo e($value->id); ?>)">Add Sub-task</a></li>

                                                        <li><a class="dropdown-item edit-project" onclick="editForm(<?php echo e($value->id); ?>)">View/Edit</a></li>

                                                        <li id="p_li<?php echo e($value->id); ?>">
                                                            <?php if ($value->mark_done == 1) : ?>
                                                                <a href="javascript:void(0)" onclick="markNotDoneProject(<?php echo e($value->id); ?>)" class="dropdown-item text-danger">Mark As Incomplete</a>
                                                            <?php else : ?>
                                                                <a href="javascript:void(0)" onclick="markDoneProject(<?php echo e($value->id); ?>)" class="dropdown-item text-success">Mark As Done</a>
                                                            <?php endif; ?>
                                                        </li>

                                                        <li>
                                                            <a href="javascript:void(0)" onclick="deleteProject(<?php echo e($value->id); ?>)" class="dropdown-item text-danger">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <span id="project-complete<?php echo e($value->id); ?>" class="text-success"></span>
                                        </ul>
                                    </td>

                                </tr>

                                <?php endif; ?>

                                <!-- Modal ADD Task -->
                                <div class="modal fade" id="addTask<?php echo e($value->id); ?>" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header btns primary-btn">
                                                <h5 class="modal-title" id="addModalLabel">Add Task</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form action="<?php echo e(route('projects.task.store', ['id' => $value->id])); ?>" method="post">
                                                <?php echo e(csrf_field()); ?>


                                                <div class="modal-body">
                                                    <div class="row">

                                                        <div class="form-group col-lg-12 mt-2">

                                                            <select class="form-control" id="setTaskValue<?php echo e($value->id); ?>" onchange="displayAddSelectedTask(<?php echo e($value->id); ?>)">
                                                                <option>Select Task</option>
                                                                <?php $__currentLoopData = $taskList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $links): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($links->title); ?>"><?php echo e($links->title); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                
                                                            </select>
                                                            
                                                        </div>

                                                        <div class="form-group col-lg-12 mt-2">
                                                            <label>Task Title<span class="text-danger"></span></label>
                                                            <input type="text" class="form-control" name="title" id="DisplayTaskValue<?php echo e($value->id); ?>" value="" placeholder="Task Title" required />
                                                        </div>

                                                        <div class="form-group col-lg-6 mt-2">
                                                            <label>Start Date <span class="text-danger"></span></label>
                                                            <input type="date" class="form-control" name="start_date" value="" placeholder="Select Date" required />
                                                        </div>

                                                        <div class="form-group col-lg-6 mt-2">
                                                            <label for="designation-input" class="form-label">End Date</label>
                                                            <input type="date" class="form-control" placeholder="" name="end_date" required />
                                                        </div>


                                                        <div class="form-group col-lg-4 mt-2">
                                                                <label>Assign To <span class="text-danger"></span></label>
                                                                <select class="form-control assign_to_select" name="assign_to" id="assign_to">
                                                                    <option value="">Select</option>
                                                                    <?php if($value->team_ids): ?>
                                                                    <?php $__currentLoopData = json_decode($value->team_ids); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php
                                                                            $user = \App\Models\User::find($id); 
                                                                        ?>
                                                                        <option value="<?php echo e($id); ?>"><?php echo e($user ? $user->name : 'Unknown User'); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                </select>
                                                        </div>

                                                        <div class="form-group col-lg-4 mt-2">
                                                            <label>Developer Cost<span class="text-danger"></span></label>
                                                            <input type="text" class="form-control" name="cost" value="" placeholder="Developer Cost" required />
                                                        </div>

                                                        <div class="form-group col-lg-4 mt-2">
                                                            <label>Currency<span class="text-danger"></span></label>
                                                            <select class="form-control" name="currency" required>
                                                                <option value="$">($) USD</option>
                                                                <option value="€">(€) EURO</option>
                                                                <option value="£">(£) GBP</option>
                                                                <option value="₹">(₹) INR</option>
                                                                
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="hideAddTaskModal(<?php echo e($value->id); ?>)">Close</button>
                                                    <button type="submit" class="btn btn-success">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Model Close -->

                                <!-- Nested tasks table -->
                                <tr class="tasks-table-row">
                                    <td colspan="4">
                                        <table class="tasks-table table w-100">
                                            <thead></thead>
                                            
                                            <tbody>
                                                <?php $__currentLoopData = $value->tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($task->mark_done==1): ?>
                                                <tr id="tid<?php echo e($task->id); ?>" style="background-color: #cbe9dd;">

                                                    <td>
                                                    <input type="checkbox" id="exampleRadios<?php echo e($task->id); ?>" onclick="addComment(<?php echo e($task->id); ?>)">
                                                    <input type="hidden" class="tname<?php echo e($task->id); ?>" value="<?php echo e($task->title); ?>">
                                                        <?php echo e($task->title); ?>


                                                    </td>

                                                    <td><?php echo e(\Carbon\Carbon::parse($task->start_date)->format('d M')); ?></td>

                                                    <td>

                                                        <ul class="list-unstyled hstack gap-1 mb-0">

                                                            <li>
                                                                <div class="dropdown dropend">
                                                                    <a id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"><i class="mdi mdi-dots-vertical"></i></a>
                                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" data-bs-auto-end="true">



                                                                        <li id="t_li<?php echo e($task->id); ?>">

                                                                            <?php if ($task->mark_done == 1) : ?>
                                                                             <a href="javascript:void(0)" onclick="markNotDoneTask(<?php echo e($task->id); ?>)" class="dropdown-item text-danger">Mark As Incomplete</a>
                                                                            <?php else : ?>
                                                                             <a href="javascript:void(0)" onclick="markDoneTask(<?php echo e($task->id); ?>)" class="dropdown-item text-success">Mark As Done</a>
                                                                            <?php endif; ?>
                                                                        
                                                                        </li>

                                                                        <li><a class="dropdown-item" data-toggle="modal" data-target="#editTask<?php echo e($task->id); ?>">View/Edit</a></li>


                                                                        <li><a href="javascript:void(0)" onclick="deleteTask(<?php echo e($task->id); ?>)" class="dropdown-item text-danger">Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            
                                                        </ul>
                                                    </td>
                                                        
                                                </tr>

                                                <?php else: ?>

                                                <tr id="tid<?php echo e($task->id); ?>">

                                                    <td>
                                                    <input type="checkbox" id="exampleRadios<?php echo e($task->id); ?>" onclick="addComment(<?php echo e($task->id); ?>)">
                                                    <input type="hidden" class="tname<?php echo e($task->id); ?>" value="<?php echo e($task->title); ?>">
                                                        <?php echo e($task->title); ?>

                                                    </td>

                                                    <td><?php echo e(\Carbon\Carbon::parse($task->start_date)->format('d M')); ?></td>

                                                    <td>

                                                        <ul class="list-unstyled hstack gap-1 mb-0">

                                                            <li>
                                                                <div class="dropdown dropend">
                                                                    <a id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"><i class="mdi mdi-dots-vertical"></i></a>
                                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" data-bs-auto-end="true">



                                                                        <li id="t_li<?php echo e($task->id); ?>">
                                                                            
                                                                            <?php if ($task->mark_done == 1) : ?>
                                                                             <a href="javascript:void(0)" onclick="markNotDoneTask(<?php echo e($task->id); ?>)" class="dropdown-item text-danger">Mark As Incomplete</a>
                                                                            <?php else : ?>
                                                                             <a href="javascript:void(0)" onclick="markDoneTask(<?php echo e($task->id); ?>)" class="dropdown-item text-success">Mark As Done</a>
                                                                            <?php endif; ?>

                                                                        </li>

                                                                        <li><a class="dropdown-item" data-toggle="modal" data-target="#editTask<?php echo e($task->id); ?>">View/Edit</a></li>


                                                                        <li><a href="javascript:void(0)" onclick="deleteTask(<?php echo e($task->id); ?>)" class="dropdown-item text-danger">Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </li>

                                                        </ul>
                                                    </td>
                
                                                </tr>
                                                <?php endif; ?>


                                                <!-- Modal Edit Task Task -->
                                                <div class="modal fade" id="editTask<?php echo e($task->id); ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header btns primary-btn">
                                                                <h5 class="modal-title" id="editModalLabel">Edit Task</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <form action="<?php echo e(route('projects.task.update', ['id' => $task->id])); ?>" method="post">
                                                                <?php echo e(csrf_field()); ?>


                                                                <div class="modal-body">
                                                                    <div class="row">

                                                                        <div class="form-group col-lg-12 mt-2">

                                                                            <select class="form-control" id="setEditTaskValue<?php echo e($task->id); ?>" onchange="displayEditOneSelectedTask(<?php echo e($task->id); ?>)">
                                                                                <option>Select Task</option>
                                                                                <?php $__currentLoopData = $taskList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $links): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <option value="<?php echo e($links->title); ?>"><?php echo e($links->title); ?></option>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                
                                                                            </select>
                                                                            
                                                                        </div>

                                                                        <div class="form-group col-lg-12 mt-2">
                                                                            <label>Task Title<span class="text-danger"></span></label>
                                                                            <input type="text" class="form-control" name="title" value="<?php echo e($task->title); ?>" id="DisplayEditTaskValue<?php echo e($task->id); ?>" placeholder="Task Title" required />
                                                                        </div>

                                                                        <div class="form-group col-lg-6 mt-2">
                                                                            <label>Start Date <span class="text-danger"></span></label>
                                                                            <input type="date" class="form-control" name="start_date" value="<?php echo e($task->start_date); ?>" placeholder="Select Date" required/>
                                                                        </div>

                                                                        <div class="form-group col-lg-6 mt-2">
                                                                            <label for="designation-input" class="form-label">End Date</label>
                                                                            <input type="date" class="form-control" value="<?php echo e($task->end_date); ?>" placeholder="" name="end_date" required/>
                                                                        </div>

                                                                
                                                                        <div class="form-group col-lg-4 mt-2">
                                                                        <label>Assign To <span class="text-danger"></span></label>
                                                                        <select class="form-control" name="assign_to">
                                                                            <option value="">Select</option>
                                                                            <?php if($value->team_ids): ?>
                                                                            <?php $__currentLoopData = json_decode($value->team_ids); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php
                                                                            $user = \App\Models\User::find($id); 
                                                                            ?>
                                                                            <option value="<?php echo e($id); ?>" <?php echo e($task->assign_to == $id ? 'selected' : ''); ?>><?php echo e($user ? $user->name : 'Unknown User'); ?></option>>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php endif; ?>
                                                                        </select>
                                                                        </div>

                                                                        <div class="form-group col-lg-4 mt-2">
                                                                            <label>Developer Cost<span class="text-danger"></span></label>
                                                                            <input type="text" class="form-control" name="cost" value="<?php echo e($task->cost); ?>" placeholder="Developer Cost" required />
                                                                        </div>

                                                                        <div class="form-group col-lg-4 mt-2">
                                                                            <label>Currency<span class="text-danger"></span></label>
                                                                            <select class="form-control" name="currency" required>
                                                                                <option value="$" <?php if('$' == $task->currency): echo 'selected'; endif; ?>>($) USD</option>
                                                                                <option value="€" <?php if('€' == $task->currency): echo 'selected'; endif; ?>>(€) EURO</option>
                                                                                <option value="£" <?php if('£' == $task->currency): echo 'selected'; endif; ?>>(£) GBP</option>
                                                                                <option value="₹" <?php if('₹' == $task->currency): echo 'selected'; endif; ?>>(₹) INR</option>
                                                                                
                                                                            </select>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-success">Save</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div> <!-- Model Edit Task close -->

                                                
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($value->tasks->count() == 0): ?>

                                                    <tr class="text-center">

                                                        <td colspan="6">No Tasks to display.</td>

                                                    </tr>

                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                        </td>
                                </tr>


                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php if($projects->count() == 0): ?>

                                <tr class="text-center">

                                    <td colspan="6">No projects to display.</td>

                                </tr>

                                <?php endif; ?>

                                <?php endif; ?>

                            </tbody>

                        </table>

                    </div> <!-- end table responsive -->
        
                </div>  

                <div class="tab-pane fade" id="tasks" role="tabpanel" aria-labelledby="my-tasks">

                    <div class="table-responsive" >

                        <table class="table  align-middle table-nowrap dt-responsive w-100" id="">

                            <thead class="table-light">

                                <tr>

                                    <th scope="col">#</th>

                                    <th scope="col">Project Title</th>

                                    <th scope="col">Deadline</th>

                                    <th scope="col" style="text-align: center;">Action</th>

                                </tr>

                            </thead>

                            <tbody>
                                <?php if(!empty($tasks)): ?>

                                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <?php if($value->mark_done==1): ?>

                                        <tr id="mtid<?php echo e($value->id); ?>" style="background-color: #cbe9dd;">

                                            <td><?php echo e(++$key); ?></td>

                                            <td><?php echo e($value->title); ?></td>

                                            <td><?php echo e(\Carbon\Carbon::parse($value->start_date)->format('d M')); ?></td>

                                            <td>

                                                <ul class="list-unstyled hstack gap-1 mb-0">

                                                    <li>
                                                        <div class="dropdown dropend">
                                                            <a id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"><i class="mdi mdi-dots-vertical"></i></a>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" data-bs-auto-end="true">



                                                                <li id="mt_li<?php echo e($value->id); ?>">
                                                                    
                                                                    <?php if ($value->mark_done == 1) : ?>
                                                                     <a href="javascript:void(0)" onclick="markNotDoneTask(<?php echo e($value->id); ?>)" class="dropdown-item text-danger">Mark As Incomplete</a>
                                                                    <?php else : ?>
                                                                     <a href="javascript:void(0)" onclick="markDoneTask(<?php echo e($value->id); ?>)" class="dropdown-item text-success">Mark As Done</a>
                                                                    <?php endif; ?>

                                                                </li>

                                                                <li><a class="dropdown-item" data-toggle="modal" data-target="#editMyTask-<?php echo e($value->id); ?>">View/Edit</a></li>


                                                                <li><a href="javascript:void(0)" onclick="deleteTask(<?php echo e($value->id); ?>)" class="dropdown-item text-danger">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </td>

                                        </tr>

                                        <?php else: ?>

                                        <tr id="mtid<?php echo e($value->id); ?>">

                                            <td><?php echo e(++$key); ?></td>

                                            <td><?php echo e($value->title); ?></td>

                                            <td><?php echo e(\Carbon\Carbon::parse($value->start_date)->format('d M')); ?></td>

                                            <td>

                                                <ul class="list-unstyled hstack gap-1 mb-0">

                                                    <li>
                                                        <div class="dropdown dropend">
                                                            <a id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="cursor: pointer;"><i class="mdi mdi-dots-vertical"></i></a>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" data-bs-auto-end="true">



                                                                <li id="mt_li<?php echo e($value->id); ?>">
                                                                    
                                                                    <?php if ($value->mark_done == 1) : ?>
                                                                     <a href="javascript:void(0)" onclick="markNotDoneTask(<?php echo e($value->id); ?>)" class="dropdown-item text-danger">Mark As Incomplete</a>
                                                                    <?php else : ?>
                                                                     <a href="javascript:void(0)" onclick="markDoneTask(<?php echo e($value->id); ?>)" class="dropdown-item text-success">Mark As Done</a>
                                                                    <?php endif; ?>

                                                                </li>

                                                                <li><a class="dropdown-item" data-toggle="modal" data-target="#editMyTask-<?php echo e($value->id); ?>">View/Edit</a></li>


                                                                <li><a href="javascript:void(0)" onclick="deleteTask(<?php echo e($value->id); ?>)" class="dropdown-item text-danger">Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </td>

                                        </tr>

                                        <?php endif; ?>


                                        <!-- Modal Edit Task Task -->
                                        <div class="modal fade" id="editMyTask-<?php echo e($value->id); ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header btns primary-btn">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Task</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <form action="<?php echo e(route('projects.task.update', ['id' => $value->id])); ?>" method="post">
                                                        <?php echo e(csrf_field()); ?>


                                                        <div class="modal-body">
                                                            <div class="row">

                                                                <div class="form-group col-lg-12 mt-2">

                                                                    <select class="form-control" id="setEditTwoTaskValue<?php echo e($value->id); ?>" onchange="displayEditTwoSelectedTask(<?php echo e($value->id); ?>)">
                                                                        <option>Select Task</option>
                                                                        <?php $__currentLoopData = $taskList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $links): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($links->title); ?>"><?php echo e($links->title); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        
                                                                    </select>
                                                                            
                                                                </div>

                                                                <div class="form-group col-lg-12 mt-2">
                                                                    <label>Task Title<span class="text-danger"></span></label>
                                                                    <input type="text" class="form-control" name="title" value="<?php echo e($value->title); ?>" id="DisplayEditTwoTaskValue<?php echo e($value->id); ?>" placeholder="Task Title" required />
                                                                </div>

                                                                <div class="form-group col-lg-6 mt-2">
                                                                    <label>Start Date <span class="text-danger"></span></label>
                                                                    <input type="date" class="form-control" name="start_date" value="<?php echo e($value->start_date); ?>" placeholder="Select Date" required />
                                                                </div>

                                                                <div class="form-group col-lg-6 mt-2">
                                                                    <label for="designation-input" class="form-label">End Date</label>
                                                                    <input type="date" class="form-control" value="<?php echo e($value->end_date); ?>" placeholder="" name="end_date" required />
                                                                </div>

                                                                <div class="form-group col-lg-4 mt-2">
                                                                    <label class="">Assign To<span class="text-danger"></span></label>
                                                                    <div> 
                                                                    <select class="form-control" name="assign_to" > 
                                                                       
                                                                    <option value="">Select</option>

                                                                    <?php if($value->team_ids): ?>
                                                                    <?php $__currentLoopData = json_decode($value->team_ids); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php
                                                                    $user = \App\Models\User::find($id); 
                                                                    ?>
                                                                    <option value="<?php echo e($id); ?>" <?php echo e($task->assign_to == $id ? 'selected' : ''); ?>><?php echo e($user ? $user->name : 'Unknown User'); ?>

                                                                    </option>>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php endif; ?>
                                                                        
                                                                    </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-lg-4 mt-2">
                                                                 <label>Developer Cost<span class="text-danger"></span></label>
                                                                 <input type="text" class="form-control" name="cost" value="<?php echo e($value->cost); ?>" placeholder="Developer Cost" required />
                                                                </div>

                                                                <div class="form-group col-lg-4 mt-2">
                                                                    <label>Currency<span class="text-danger"></span></label>
                                                                    <select class="form-control" name="currency" required>
                                                                        <option value="$" <?php if('$' == $task->currency): echo 'selected'; endif; ?>>($) USD</option>
                                                                        <option value="€" <?php if('€' == $task->currency): echo 'selected'; endif; ?>>(€) EURO</option>
                                                                        <option value="£" <?php if('£' == $task->currency): echo 'selected'; endif; ?>>(£) GBP</option>
                                                                        <option value="₹" <?php if('₹' == $task->currency): echo 'selected'; endif; ?>>(₹) INR</option>
                                                                        
                                                                    </select>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Model Edit Task close -->


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

                </div> 

            </div>

        </div>

    </div>

    <div class="col-lg-6">

         <div class="card">

            <ul class="nav nav-tabs" id="myTabComment" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link " id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="true"><i class="mdi mdi-alert-circle">&nbsp;&nbsp;</i></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" id="activity-tab" data-toggle="tab" href="#activity" role="tab" aria-controls="activity" aria-selected="false"><i class="mdi mdi-comment-account">&nbsp;&nbsp;</i>Activity</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link" id="files-tab" data-toggle="tab" href="#files" role="tab" aria-controls="files" aria-selected="false"><i class="mdi mdi-folder-upload">&nbsp;&nbsp;</i>Files</a>
                      </li>
            </ul>

            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                        <h6 class="mt-3 mb-3 text-center"><i class="mdi mdi-arrow-left-bold">&nbsp;</i>Select a project or a task from the left panel</h6>

                        <h5 class="ml-3"><span class="project-name"></span></h5>

                        <div class="row mt-4 ml-3 text-start">
                            <div class="col-6">
                                <p>Start date</p>
                                
                            </div>
                            <div class="col-6">
                                <p>Deadline</p>
                                    
                            </div>
                        </div>

                        <div class="row  ml-3 text-start">
                            <div class="col-6">
                                <p>Priority</p>
                                
                            </div>
                            <div class="col-6">
                                <p>Status</p>
                                    
                            </div>
                        </div>

                        <div class="row ml-3 text-start">
                            <div class="col-12">
                                <p>Created by</p>
                                
                            </div>
                        </div>

                        <div class="row ml-3 text-start">
                            <div class="col-12">
                                <p>Team & Clients</p>
                                
                            </div>
                        </div>


                        <div class="row ml-3 text-start">
                            <div class="col-3">
                                <p><i class="mdi mdi-link-variant">&nbsp;&nbsp;</i>Direct link</p> 
                            </div>
                            <div class="col-3">
                                <p><i class="mdi mdi-at">&nbsp;&nbsp;</i>Email link</p> 
                            </div>
                            <div class="col-3">
                                <p><i class="mdi mdi-calendar-plus">&nbsp;&nbsp;</i>Sync to Calendar</p> 
                            </div>
                            <div class="col-3">
                                <p><i class="mdi mdi-rss">&nbsp;&nbsp;</i>Project RSS Feed</p> 
                            </div>
                        </div>

                        <div class="row mb-4 ml-3 text-start ">
                            <div class="col-12">
                                <p>Description</p>
                                
                            </div>
                        </div>

                </div>

                <div class="tab-pane fade show active" id="activity" role="tabpanel" aria-labelledby="activity-tab">

                    <div class="card-body comment-section">

                        <h5>Comments on <span class="project-name"></span></h5>

                        <div class="row" id="projectForm">

                            <div class="col-sm-12 me-2 mb-2 d-inline-block">

                                <div class="position-relative">

                                    <div class="input-group">
                                        <input type="hidden" class="task_id" name="task_id" required>
                                        <textarea class="form-control comment" name="comments" aria-label="With textarea" placeholder="Write a comment, report progress or add files...." required></textarea>

                                        <!-- File input group-prepend -->
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="fileInput" style="cursor: pointer;">
                                            <i class="mdi mdi-paperclip"></i></label>
                                        </div>


                                        <!-- File input (hidden) -->
                                        <input type="file" id="fileInput" style="display: none;">

                                        <div class="input-group-prepend">
                                            <button class="input-group-text btn btn-outline-success submit-comment">
                                                Submit</button>
                                        </div>
                                    </div>

                                    <table class="table table-striped mt-4 comment-list">
                                        <tbody id="comment-list">

                                        </tbody>
                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>

                <!-- add product section -->
                </div>

                <div class="tab-pane fade ml-3" id="files" role="tabpanel" aria-labelledby="files-tab">

                        <div class="row mt-3">
                            <div class="col-sm-12">

                                <!-- <img id="preview-image" width="300px"> -->

                            </div>

                            <div class="col-sm-2">

                                <div class="position-relative">

                                    <div class="dropdown">
                                        <button class="mb-2 btn btn-success" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="rounded-circle">+</span>
                                        </button>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                           <a class="dropdown-item" >

                                            <label class="" for="DocsInput"><i class="mdi mdi-laptop-windows">&nbsp;&nbsp;</i>Computer</label>

                                           </a>
                                           
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-chemical-weapon">&nbsp;&nbsp;</i>SpiderScribe</a>

                                            <a class="dropdown-item" href="#"><i class="mdi mdi-hops">&nbsp;&nbsp;</i>FireFly</a>

                                            <a class="dropdown-item" href="#"><i class="mdi mdi-layers-off">&nbsp;&nbsp;</i>Dropbox</a>

                                            <a class="dropdown-item" href="#"><i class="mdi mdi-google-drive">&nbsp;&nbsp;</i>Google Drive</a>

                                            <a class="dropdown-item" href="#"><i class="mdi mdi-cloud-upload">&nbsp;&nbsp;</i>OneDrive</a>

                                            <a class="dropdown-item" href="#"><i class="mdi mdi-box">&nbsp;&nbsp;</i>Box</a>

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="col-sm-9">

                                        <form action="<?php echo e(route('documents.store')); ?>" method="POST" id="image-upload" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>

                                            <input type="hidden" class="docs_task_id" name="task_id" required>
                                        
                                            <div class="">
                                               
                                                <input type="file" id="DocsInput" name="document" class="form-control docs-cmt" style="display: none;" required>
                                                <span class="text-danger" id="image-input-error"></span>

                                            </div>
                                     
                                            <div class="text-end mt-1">
                                                <button type="submit" class="btn btn-success btn-outline-success btn-sm">Upload</button>
                                            </div>
                                        
                                        </form>


                            </div><!-- end col-->

                        </div>

                        <div class="table-responsive" style="padding-right: 15px;">

                            <table class="table align-middle table-nowrap dt-responsive nowrap w-100" id="">

                                <thead class="table-light">

                                    <tr>

                                        <th scope="col">S.no</th>

                                        <th scope="col">Name</th>

                                        <th scope="col">Documents</th>

                                        <th scope="col">Date</th>

                                    </tr>

                                </thead>


                                <tbody class="documents-list">

                                   
                                </tbody>

                            </table>

                            <p>no files…</p>
                        </div>
             
                </div>

            </div>

            <div class="card-body add-project-section">

                    <h5>Add Project</h5>

                    <form autocomplete="off" action="<?php echo e(route('projects.store')); ?>" method="Post">

                        <?php echo csrf_field(); ?>

                        <!-- Modal body -->
                        <div class="row">

                            <div class="form-group col-lg-12 mt-2">
                                <label>Project Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" value="" placeholder="Type Title" required />
                            </div>

                            <div class="form-group col-lg-6 mt-2" style="display: inline-block;">
                                <label>Start Date <span class="text-danger"></span></label>
                                <input type="date" class="form-control" name="start_date" value="" placeholder="Select Date" />
                            </div>

                            <div class="form-group col-lg-6 mt-2" style="display: inline-block;">
                                <label for="designation-input" class="form-label">Deadline</label>
                                <input type="date" class="form-control" placeholder="" name="deadline" />
                            </div>
                            
                            <div class="form-group col-lg-6 mt-2">
                                <div class="form-group">
                                    <label>Clients<span class="text-danger mr-2"></span></label>
                                    <select class="selectpicker multi-select" multiple data-live-search="true" name="multi_ids[]" required>
                                        <option value="">Select Client</option>
                                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group col-lg-6 mt-2">
                                <div class="form-group ">
                                    <label class="">Team</label>
                                    <select class="selectpicker multi-select" multiple data-live-search="true" name="team_ids[]" required>
                                        <option value="">Select Team</option>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-lg-6 mt-2">
                                <div class="form-group ">
                                    <label class="">Status <span class="text-danger"></span></label>
                                    <select class="form-control" name="status">
                                        <option>Open</option>
                                        <option>Closed</option>
                                        <option>Progress</option>
                                    </select>
                                </div>
                            </div>

                            <!-- <div class="form-group col-lg-6 mt-2">
                                <label>Status <span class="text-danger"></span></label>
                                <div class="btn-group">
                                    <button style="border: 1px solid; margin-left: 3px;" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <input type="radio" name="status" value="Open" checked> Open
                                    </button>
                                    <div class="dropdown-menu">
                                        <label class="dropdown-item">
                                            <input type="radio" name="status" value="Closed"> Closed
                                        </label>
                                        <label class="dropdown-item">
                                            <input type="radio" name="status" value="Progress"> Progress
                                        </label>
                                    </div>
                                </div>
                            </div> -->



                            <div class="form-group col-lg-6 mt-2">    
                                
                                    <div class="form-group text-right">
                                        <button type="button" class="mb-2 btn btn-success" data-toggle="modal" data-target="#addclientsModal"> + Add Clients</button>
                                    </div>
                                
                            </div>

                            <div class="text-center" style="margin-top:20px">

                                <button type="submit" class="btn btn-success">Create</button>

                            </div>

                        </div>

                    </form>

            </div>

            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $editp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- edit project section -->
            <div class="card-body edit-project-section<?php echo e($editp->id); ?>" style="display : none;">

                    <h5>Edit Project</h5>

                    <span id="edit_form">
                        <form autocomplete="off" action="<?php echo e(route('project.update')); ?>" method="Post">
                            <?php echo csrf_field(); ?>
                            <!-- Modal body -->
                            <div class="row">

                                <div class="form-group col-lg-12 mt-2">
                                    <label>Project Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control pro_name" name="name" value="<?php echo e($editp->name); ?>" placeholder="Type Title" required />
                                    <input type="hidden" name="id"  value="<?php echo e($editp->id); ?>">
                                </div>


                                <div class="form-group col-lg-6 mt-2">
                                    <label>Start Date <span class="text-danger"></span></label>
                                    <input type="date" class="form-control pro_start_date" value="<?php echo e($editp->start_date); ?>" name="start_date" placeholder="Select Date" />
                                </div>

                                <div class="form-group col-lg-6 mt-2">
                                    <label for="designation-input" class="form-label">Deadline</label>
                                    <input type="date" class="form-control pro_deadline" value="<?php echo e($editp->deadline); ?>" placeholder="" name="deadline" />
                                </div>

                                <div class=" col-lg-6 mt-2"> 
                                    <div class="form-group">
                                        <label>Client<span class="text-danger"></span></label>
                                        <select class="selectpicker multi-select" multiple data-live-search="true"  name="multi_ids[]">
                                            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <?php if(!empty($editp->multi_ids) && in_array($cdata->id, json_decode($editp->multi_ids))): ?>
                                                <option value="<?php echo e($cdata->id); ?>" selected><?php echo e($cdata->name); ?></option>
                                                <?php else: ?>
                                                <option value="<?php echo e($cdata->id); ?>"><?php echo e($cdata->name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class=" col-lg-6 mt-2">
                                    <div class="form-group">
                                        <label>Team</label>
                                        <select class="selectpicker multi-select" multiple data-live-search="true"  name="team_ids[]">
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $udata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(!empty($editp->team_ids) && in_array($udata->id, json_decode($editp->team_ids))): ?>
                                                <option value="<?php echo e($udata->id); ?>" selected><?php echo e($udata->name); ?></option>
                                                <?php else: ?>
                                                <option value="<?php echo e($udata->id); ?>"><?php echo e($udata->name); ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-lg-6 mt-2">
                                    <label>Status<span class="text-danger"></span></label>
                                    <select class="form-control" name="status">
                                        <option value="Open" <?php echo e($editp->status=='Open'?'selected':''); ?>>Open</option>
                                        <option value="Closed" <?php echo e($editp->status=='Closed'?'selected':''); ?>>Closed</option>
                                        <option value="Progress" <?php echo e($editp->status=='Progress'?'selected':''); ?>>Progress</option>
                                    </select>
                                </div>

                                <div class="text-center" style="margin-top:20px">

                                    <button type="submit" class="btn btn-success">Update</button>

                                </div>

                            </div>

                        </form>
                    </span>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>

    </div>



    <div class="modal fade" id="addclientsModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Client</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form autocomplete="off" action="<?php echo e(route('user.client.store')); ?>" method="Post">
                    <?php echo csrf_field(); ?>
                    <!-- Modal body -->
                    <div class="modal-body">

                        <!-- Modal body -->
                        <div class="row">

                            <div class="form-group col-lg-6">
                                <label>Name<span class="text-danger"></span></label>
                                <input type="text" class="form-control" name="name" value="" placeholder="Name" required />
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Role <span class="text-danger"></span></label>
                                <select class="form-control" name="role" disabled>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($role->name === 'Customer'): ?>
                                    <option value="<?php echo e($role->id); ?>" selected><?php echo e($role->name); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input type="hidden" name="role" value="<?php echo e($customerRoleId); ?>">
                            </div>

                            <div class="form-group col-lg-6 mt-3">
                                <label>Email <span class="text-danger"></span></label>
                                <input type="text" class="form-control" name="email" value="" placeholder="Email" required />
                            </div>

                            <div class="form-group col-lg-6 mt-3">
                                <label>Phone <span class="text-danger"></span></label>
                                <input type="tel" class="form-control" name="phone" placeholder="Enter Phone No" maxlength="10" required />
                            </div>

                            <div class="form-group col-lg-6 mt-3">
                                <label for="designation-input" class="form-label">DOB</label>
                                <input type="date" class="form-control" placeholder="Enter DOB" name="dob" required />
                            </div>

                            <div class="form-group col-lg-6 mt-3">
                                <label>Password<span class="text-danger"></span></label>
                                <div class="input-group mb-2">
                                    <input type="password" class="form-control" name="password" value="" placeholder="Enter password" required />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>
        </div>

    </div>

</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<!-- Required datatable js -->

<script src="<?php echo e(URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>

<!-- Responsive examples -->

<script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>

<!-- ecommerce-customer-list init -->

<script src="<?php echo e(URL::asset('build/js/pages/contact-user-list.init.js')); ?>"></script>

<script>
    var formVisible = false; // Track the form visibility state

    function toggleForm(event) {
        event.preventDefault(); // Prevent the default link behavior

        var projectForm = document.getElementById("projectForm");

        if (!formVisible) {
            projectForm.style.display = "block";
            formVisible = true;
        } else {
            projectForm.style.display = "none";
            formVisible = false;
        }
    }
</script>

<script>
  
 function displayAddSelectedTask(selectedTask) 
 {
    const selectElement = document.getElementById("setTaskValue" + selectedTask);
    const taskName = document.getElementById("DisplayTaskValue" + selectedTask);

    // Get the selected value from the select element
    const selectedValue = selectElement.value;

    // Set the selected value to the input field
    taskName.value = selectedValue;
 }

</script>

<script>

   function displayEditOneSelectedTask(selectedEditOneTask) 
   {

        const selectEditOneElement = document.getElementById("setEditTaskValue" + selectedEditOneTask);

        const edittaskOneName = document.getElementById("DisplayEditTaskValue" + selectedEditOneTask);

        // Get the selected value from the select element
        const selectedEditOneValue = selectEditOneElement.value;

        // Set the selected value to the input field
        edittaskOneName.value = selectedEditOneValue;
   }

</script>

<script>

    function displayEditTwoSelectedTask(selectedEditTwoTask) 
   {

        const selectEditTwoElement = document.getElementById("setEditTwoTaskValue" + selectedEditTwoTask);

        const edittaskTwoName = document.getElementById("DisplayEditTwoTaskValue" + selectedEditTwoTask);

        // Get the selected value from the select element
        const selectedEditTwoValue = selectEditTwoElement.value;

        // Set the selected value to the input field
        edittaskTwoName.value = selectedEditTwoValue;
   }

</script>


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
    // $('#DocsInput').change(function(){    
    //     let reader = new FileReader();
   
    //     reader.onload = (e) => { 
    //         $('#preview-image').attr('src', e.target.result); 
    //     }   
  
    //     reader.readAsDataURL(this.files[0]); 
     
    // });

  
    $('#image-upload').submit(function(e) {
            e.preventDefault();
            var formData = new FormData();
            var fileInput = $(".docs-cmt")[0].files[0];
            var tid = $('.docs_task_id').val();
            formData.append("tid", tid);
            formData.append("file", fileInput);

           $('#image-input-error').text('');
          

           $.ajax({
              type:'POST',
              url: "<?php echo e(route('documents.store')); ?>",
              data: formData,
              contentType: false,
              processData: false,
               success: (response) => {
                 if (response) {
                   this.reset();
                   $('#preview-image').remove(); 
                   getDocsList(tid);
                   alert('document has been uploaded successfully');
                 }
               },
               error: function(response){
                    $('#image-input-error').text(response.responseJSON.message);
               }
           });
    });
      
</script>

<script>
    function getDocsList(argument) {

        $.ajax({

            type: 'POST',

            url: "<?php echo e(route('get.docs')); ?>",

            data: {
                tid: argument
            },

            success: function(data) {

                $('.documents-list').html(data)

            }

        });
    }
</script>

<script>
    $(document).ready(function() {
        $('.tasks-table-row').hide();

        $('.toggle-tasks').click(function() {
            var tasksTable = $(this).closest('tr').next('.tasks-table-row');
            tasksTable.toggle();
        });
    });
</script>

<script>

   function deleteProject(id)
   {
    if(confirm('Do you Want to delete this Project'))
    {
         $.ajax({
                type: 'DELETE',
                url: 'projects/delete/'+id,
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                },

                success: function (response) {
                    $("#pid"+id).remove();
                },
                error: function (error) {
                    // Handle errors
                    console.log(error.responseJSON);
                }
            });
    }

   }

   function markNotDoneProject(id) 
   {

    if(confirm('Are you Sure You Want to Mark it as incomplete?'))
    {
         $.ajax({
                type: 'GET',
                url: 'projects/task/undone/'+id,
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                },

                success: function (response) {
        
                    $("#pid"+id).css('background-color', '');

                    updateProjectList(response.data,id);
                    $("#project-complete"+id).innerHTML="";

                },
                error: function (error) {
                    // Handle errors
                    console.log(error.responseJSON);
                }
            });
    }

   }

   function markDoneProject(id)
   {

    if(confirm('Are you Sure You Want to Mark it as Complete?'))
    {
         $.ajax({
                type: 'GET',
                url: 'projects/task/done/'+id,
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                },

                success: function (response) {
                   
                    $("#pid"+id).css('background-color', '#cbe9dd'); 

                    updateProjectList(response.data,id);
                    $("#project-complete"+id).innerHTML="100%";

                },
                error: function (error) {
                    // Handle errors
                    console.log(error.responseJSON);
                }
            });
    }

   }
                                                    

   function updateProjectList(data,id) {

        var list = '';
    
        if (data.mark_done == 1) {
            list = '<a href="javascript:void(0)" onclick="markNotDoneProject(' + data.id + ')" class="dropdown-item text-danger">Mark As Incomplete</a>';
        } else {
            list = '<a href="javascript:void(0)" onclick="markDoneProject(' + data.id + ')" class="dropdown-item text-success">Mark As Done</a>';
        }

        // Replace the content of the table element with the updated data.
        $("#p_li"+id).html(list);
    }

</script>

<script type="text/javascript">

    function deleteTask(id)
   {
    if(confirm('Do you Want to delete this Task'))
    {
         $.ajax({
                type: 'DELETE',
                url: 'projects/tasks/delete/'+id,
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                },

                success: function (response) {
                    $("#tid"+id).remove();

                    $("#mtid"+id).remove();

                },
                error: function (error) {
                    // Handle errors
                    console.log(error.responseJSON);
                }
            });
    }
   }

   function markNotDoneTask(id) 
   {

    if(confirm('Are you Sure You Want to Mark This Task as incomplete?'))
    {
         $.ajax({
                type: 'GET',
                url: 'projects/tasks/undone/'+id,
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                },

                success: function (response) {
        
                    $("#tid"+id).css('background-color', '');

                    $("#mtid"+id).css('background-color', '');


                    updateTaskList(response.data,id);
                },
                error: function (error) {
                    // Handle errors
                    console.log(error.responseJSON);
                }
            });
    }

   }

   function markDoneTask(id)
   {

    if(confirm('Are you Sure You Want to Mark This Task as Complete?'))
    {
         $.ajax({
                type: 'GET',
                url: 'projects/tasks/done/'+id,
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                },

                success: function (response) {
                   
                    $("#tid"+id).css('background-color', '#cbe9dd'); 

                    $("#mtid"+id).css('background-color', '#cbe9dd'); 

                    updateTaskList(response.data,id);

                },
                error: function (error) {
                    // Handle errors
                    console.log(error.responseJSON);
                }
            });
    }

   }

    function updateTaskList(data,id) {

        var list = '';
    
        if (data.mark_done == 1) {
            list = '<a href="javascript:void(0)" onclick="markNotDoneTask(' + data.id + ')" class="dropdown-item text-danger">Mark As Incomplete</a>';
        } else {
            list = '<a href="javascript:void(0)" onclick="markDoneTask(' + data.id + ')" class="dropdown-item text-success">Mark As Done</a>';
        }

        // Replace the content of the table element with the updated data.
        $("#t_li"+id).html(list);
        $("#mt_li"+id).html(list);

    }


</script>



<script>
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.submit-comment').click(function() {

        var $tid = $('.task_id').val();

        var $cmt = $('.comment').val();

        if ($tid && $cmt) {
            $.ajax({

                type: 'POST',

                url: "<?php echo e(route('comment.post')); ?>",

                data: {
                    tid: $tid,
                    cmt: $cmt
                },

                success: function(data) {

                    $('.comment').val('');

                    getComment($tid);

                }

            });

        }

    });

</script>

<script>
    function getComment(argument) {

        $.ajax({

            type: 'POST',

            url: "<?php echo e(route('get.comment')); ?>",

            data: {
                tid: argument
            },

            success: function(data) {

                $('#comment-list').html(data);

            }

        });
    }
</script>

<!-- <script>
    $(window).on('load', function() {
        var $pid = $('.product_id').val();

        getComment($pid);

        $('.edit-project-section').hide();

        $('.edit-project').click(function() {

            $('.comment-section').hide();
            $('.edit-project-section').show();
        });
    });
</script> -->


<script>
    document.getElementById('fileInput').addEventListener('change', function(e) {

        const selectedFile = e.target.files[0];
        const commentTextarea = document.querySelector('.comment');
        commentTextarea.value = selectedFile ? selectedFile.name : '';
    });
</script>

<script>
    $(document).ready(function() {
        $("#edit-button").on("click", function() {

            $.ajax({
                url: "",
                type: "Post",
                dataType: "html",
                success: function(response) {
                    $("#edit-form").html(response);
                },
                error: function() {
                    alert("Failed to load edit form.");
                }
            });
        });
    });
</script>

<script>
    let LastEditID = '';
    function editForm(argument) {
        // $('#myTabComment').hide();
        
        $('.edit-project-section'+LastEditID).css('display','none');
        $('.edit-project-section'+argument).css('display','block');
        LastEditID = argument;
       // if(argument){
       //      $.ajax({
       //          url: "<?php echo e(route('edit.project')); ?>",
       //          type: "Post",
       //          data: {id:argument},
       //          dataType: "json",
       //          success: function(response) {
                  
       //              console.log(response);
       //              if(response){
       //                  $('.pro_id').val(response.id);
       //                  $('.pro_name').val(response.name);
       //                  $('.pro_start_date').val(response.start_date);
       //                  $('.pro_deadline').val(response.deadline);

       //                  $.ajax({
       //                      url: "<?php echo e(route('edit.status')); ?>",
       //                      type: "Post",
       //                      data: {multi_ids:response.multi_ids, team_ids:response.team_ids, status:response.status},
                            
       //                      success: function(response) {
       //                          // $(".status_drop").html('');
       //                          $(".status_drop").html(response.team_drop);
       //                      },
       //                  });

       //              } else {
       //                  alert("Failed to load edit form.");
       //              }                },
       //          error: function() {
       //              alert("Failed to load edit form.");
       //          }
       //      });
       // }
    }
</script>

<script>

    let lastcheck = null;
    function addComment(itemid) {

        $('#myTabComment').show();

        $("#projectForm").show();

        var pname = $('.tname' + itemid).val();

        $('.project-name').text(pname);

        $('.task_id').val(itemid);

        $('.docs_task_id').val(itemid);

        $('.comment-section').show();

        $('.add-project-section').hide();

        $('.edit-project-section').hide();
        
        $('.edit-project-section'+LastEditID).hide();

        getComment(itemid);

        getDocsList(itemid);

        $("#exampleRadios"+lastcheck).prop('checked', false);

        lastcheck = itemid;
    }
</script>

<script>
    $(window).on('load', function() {
        $('.add-project-section').hide();
        $('.edit-project-section').hide();
        $('.add-project').click(function() {
            $('.comment-section').hide();
            $('#myTabComment').hide();
            $('.edit-project-section'+LastEditID).hide();
            $('.add-project-section').show();
        });
        $('.edit-project').click(function() {
            $('.comment-section').hide();
            $('.add-project-section').hide();
            $('.edit-project-section').show();
        });
    });
</script>
<script>
    function showAddTest(itm) {
        $('#addTask'+itm).modal('show');
    }
</script>
<script>
    function hideAddTaskModal(itm) {
        $('#addTask'+itm).modal('hide');
    }
</script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/payit123crm/public_html/CRM/resources/views/projects/index.blade.php ENDPATH**/ ?>