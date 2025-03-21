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

Tasks

<?php $__env->endSlot(); ?>

<?php $__env->slot('title'); ?>

Tasks

<?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>

<div class="card">

    <?php echo $__env->make('flash_msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <form action="<?php echo e(route('task_master_store')); ?>" method="post">

        <?php echo csrf_field(); ?>
         
        <div class="card-body row">

            <div class="col-md-8">

                <label>Tasks</label>

                <input type="text" name="title" placeholder="Enter Task" class="form-control" required>
                
            </div>

            <div class="col-md-4 mt-4"> 

                <button type="submit" class="btn btn-primary">Submit</button>
                 
            </div>
            
        </div>
    
    </form>
    

</div>

<div class="card">

    <div class="card-body">

        <table class="table table-striped">

            <thead>
                
                <th>#</th>
                <th>Title</th>
                <th class="text-end">Action</th>

            </thead>

            <tbody>
                <?php if(!empty($tasks)): ?>

                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr id="rowid<?php echo e($value->id); ?>">

                            <td><?php echo e(++ $key); ?></td>
                            <td><?php echo e($value->title); ?></td>
                            <td class="text-end">

                               <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Task.Update')): ?>
                                <button type="button" class="btn btn-success rounded-pill btn-sm" data-toggle="modal" data-target="#EditTaskModal<?php echo e($key); ?>"><i class='bi bi-alarm-fill'></i> Edit</button>
                               <?php endif; ?>
                                
                               <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Task.Remove')): ?>
                                <a href="<?php echo e(route('taskMaster.delete',$value->id)); ?>" class="btn btn-danger rounded-pill btn-sm">Delete</a>
                               <?php endif; ?>
                                

                            </td>

                                 <!-- Edit Task MODAL -->
                                <div class="modal fade EdittaskMdl" id="EditTaskModal<?php echo e($key); ?>" tabindex="-1" role="dialog" aria-labelledby="EditTaskModallabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="EditTaskModallabel">Edit Task</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <form  action="<?php echo e(route('task_master_update')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                          <div class="modal-body">
                                            <div class="row">                                        
                                                <label class="col-md-2 form-group">Task<span class="text-danger">*</span></label>  

                                                <div class="col-md-8">

                                                    <input type="hidden" name="task_id" value="<?php echo e($value->id); ?>">
                                                    <input type="text" name="title" value="<?php echo e($value->title); ?>" class="form-control" placeholder="Enter Task" required> 

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
                                <!-- CLOSE Edit Task MODAL -->
                            
                        </tr>

                                
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>

                <?php if($tasks->count()==0): ?>

                    <tr>
                        <td>No Tasks To Display</td>
                    </tr>

                <?php endif; ?>
                    
            </tbody>
            
        </table>
        
    </div>

    <?php echo e($tasks->links()); ?>

    
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script type="text/javascript">
    
    function deleteTask(id)
   {
    if(confirm('Do you Want to delete this Task'))
    {
         $.ajax({
                type: 'DELETE',
                url: '/taskMaster/delete/' + id,
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                },

                success: function (response) {
                    $("#rowid"+id).remove();
                },
                error: function (error) {
                    // Handle errors
                    console.log(error.responseJSON);
                }
            });
    }
   }

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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/payit123crm/public_html/CRM/resources/views/task/index.blade.php ENDPATH**/ ?>