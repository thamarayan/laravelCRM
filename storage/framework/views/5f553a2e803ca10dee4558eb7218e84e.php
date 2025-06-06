<?php $__env->startSection('title'); ?>



    <?php echo app('translator')->get('User Add'); ?>



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



            User



        <?php $__env->endSlot(); ?>



        <?php $__env->slot('title'); ?>



        Add New User 



        <?php $__env->endSlot(); ?>



    <?php echo $__env->renderComponent(); ?>


    <div class="content-wrapper" style="margin-top: 15px">

    <div class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-body">

                     <div class="row mb-2">



                        <div class="col-sm-4">



                            <div class="search-box me-2 mb-2 d-inline-block">



                            </div>



                        </div>



                        <div class="col-sm-8">



                            <div class="text-sm-end">


                                   <a href="<?php echo e(url('users')); ?>">

                                       <button type="button" class="btn btn-success btn-rounded waves-effect waves-light addContact-modal mb-2"><i

                                       class="mdi mdi-arrow-left me-1"></i> Back</button>

                                    </a>



                            </div>



                        </div><!-- end col-->



                    </div>

                       <form autocomplete="off" action="<?php echo e(route('user.store')); ?>" method="Post">

                        <?php echo csrf_field(); ?>

                        <!-- Modal body -->
                        <div class="row">
                           
                            <div class="form-group col-lg-6">
                                <label>Name<span class="text-danger"></span></label>
                                   <input type="text" class="form-control" name="name" value="" placeholder="Name" required/>
                            </div>

                            <div class="form-group col-lg-6">
                                    <label>Role <span class="text-danger"></span></label>
                                     <select class=" form-control dropdown-toggle" name="role" type="button" data-toggle="dropdown">
                                        <option value="">Select Role</option>
                                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($rol->id); ?>"><?php echo e($rol->name); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </select>
                            </div>

                            <div class="form-group col-lg-6 mt-3">
                                <label>Email <span class="text-danger"></span></label>
                                   <input type="text" class="form-control" name="email" value="" placeholder="Email" required/>
                            </div>

                            <div class="form-group col-lg-6 mt-3">
                                <label>Phone <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" name="phone" placeholder="Enter Phone No" maxlength="10" required/>
                            </div>

                            

                            <div class="form-group col-lg-6 mt-3">
                                <label>Password<span class="text-danger"></span></label>
                                <div class="input-group mb-2">
                                    <input type="password" class="form-control" name="password" value="" placeholder="Enter password" required/>
                                </div>
                            </div>

                            

                        </div>

                        <div class="text-center" style="margin-top:20px">

                            <button type="submit" class="btn btn-success">Submit</button>

                        </div>

                    </form>

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




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelCRM\resources\views/user/create.blade.php ENDPATH**/ ?>