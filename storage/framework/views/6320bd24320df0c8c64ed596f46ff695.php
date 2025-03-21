<?php $__env->startSection('title'); ?>



    <?php echo app('translator')->get('Role Permission'); ?>



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



            Contacts



        <?php $__env->endSlot(); ?>



        <?php $__env->slot('title'); ?>



            Role List



        <?php $__env->endSlot(); ?>



    <?php echo $__env->renderComponent(); ?>



    <div class="row">



        <div class="col-lg-12">



            <div class="card">



                <div class="card-body">



                    <div class="row mb-2">



                        <div class="col-sm-4">



                            <div class="search-box me-2 mb-2 d-inline-block">



                            </div>



                        </div>



                        <div class="col-sm-8">



                            <div class="text-sm-end">


                                   <a href="<?php echo e(url('roles')); ?>">

                                       <button type="button" class="btn btn-success btn-rounded waves-effect waves-light addContact-modal mb-2"><i

                                        class="mdi mdi-arrow-left me-1"></i> Back</button>

                                    </a>



                            </div>



                        </div><!-- end col-->



                    </div>



                    <!-- end row -->


                    <form action="<?php echo e(route('assign.permission')); ?>" method="POST" id="vendor_register">
                                    <?php echo csrf_field(); ?>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Role<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" value="<?php echo e($dats->name); ?>" readonly>
                                            <input type="hidden" name="role_id" value="<?php echo e($dats->id); ?>">
                                        </div>
                                    </div>
                                    <div class="row mt-4 ">
                                      
                                        <table class="permissionTable table">
                                            <th>
                                                <?php echo e(__('Section')); ?>

                                            </th>

                                            <th>
                                                <label>
                                                    
                                                    <?php echo e(__('Select All')); ?>

                                                </label>
                                            </th>
                                
                                            <th>
                                                <?php echo e(__("Available permissions")); ?>

                                            </th>
                                
                                
                                           
                                            <tbody class="role-permission">
                                               <?php $__currentLoopData = $custom_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <b><?php echo e(ucfirst($key)); ?></b>
                                                    </td>

                                                    <td width="30%">
                                                        <label>
                                                            <input class="selectall" onclick="selectAll(this.value)" value="<?php echo e($key); ?>" type="checkbox">
                                                            <?php echo e(__('Select All')); ?>

                                                        </label>
                                                    </td>

                                                    <td>
                                                        
                                                        <?php $__empty_1 = true; $__currentLoopData = $group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                            
                                                           <label>
                                                                <?php if(in_array($permission->id, $permissionIds)): ?>
                                                                   <input name="permissions[]" class="permissioncheckbox <?php echo e($key); ?>" type="checkbox" checked value="<?php echo e($permission->id); ?>">
                                                                   &nbsp; <?php echo e(ucfirst($permission->name)); ?> &nbsp;&nbsp;
                                                                <?php else: ?>
                                                                    <input name="permissions[]" class="permissioncheckbox <?php echo e($key); ?>" type="checkbox" value="<?php echo e($permission->id); ?>">
                                                                   &nbsp; <?php echo e(ucfirst($permission->name)); ?> &nbsp;&nbsp;
                                                                <?php endif; ?>
                                                           </label>
                                
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                            <?php echo e(__("No permission in this group !")); ?>

                                                        <?php endif; ?>
                                
                                                    </td>
                                
                                                </tr>
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success bg-grad-4">Update</button>
                                        <input type="reset" class="btn btn-danger" value="Reset">
                                    </div>

                                </form>



                    <!-- end table responsive -->



                </div>



            </div>



        </div>



    </div>





    <!-- removeItemModal -->




    <!-- end removeItemModal -->



<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>
    
    <script>
        function selectAll(argument) {
           
            var cls = "."+argument;

            if($(cls).prop('checked')==true){
               
                $(cls).prop('checked', false);
            } else {
               
                $(cls).prop('checked', true); 
            }
            
        }
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




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelCRM\resources\views/role/permissions.blade.php ENDPATH**/ ?>