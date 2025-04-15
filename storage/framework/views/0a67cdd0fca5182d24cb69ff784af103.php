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



            Agent



        <?php $__env->endSlot(); ?>



        <?php $__env->slot('title'); ?>



        Add New Agent 



        <?php $__env->endSlot(); ?>



    <?php echo $__env->renderComponent(); ?>


    <div class="content-wrapper" style="margin-top: 15px">

    <div class="row">

        <?php echo $__env->make('multiselect', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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


                                   <a href="<?php echo e(url()->previous()); ?>">

                                       <button type="button" class="btn btn-success btn-rounded waves-effect waves-light addContact-modal mb-2"><i

                                       class="mdi mdi-arrow-left me-1"></i> Back</button>

                                    </a>



                            </div>



                        </div><!-- end col-->



                    </div>

                       <form autocomplete="off" action="<?php echo e(route('agent.store')); ?>" method="Post">

                        <?php echo csrf_field(); ?>

                        <!-- Modal body -->
                        <div class="row">
                           <input type="hidden" name="role" value="<?php echo e($roles->id); ?>">

                            <div class="form-group col-lg-6">
                                <label>Name<span class="text-danger"></span></label>
                                   <input type="text" class="form-control" name="name" value="" placeholder="Name" required/>
                            </div>

                            <div class="form-group col-lg-6">
                                    <label>Customers <span class="text-danger"></span></label>
                                     <select class="form-control selectpicker multiselect" name="customers[]" multiple data-live-search="true">
                                        <option value="">Select Customers</option>
                                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name); ?></option>   
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </select>
                            </div>

                            <div class="form-group col-lg-6 mt-3">
                                <label>Email <span class="text-danger"></span></label>
                                   <input type="text" class="form-control" name="email" value="" placeholder="Email" required/>
                            </div>

                            <div class="form-group col-lg-6 mt-3">
                                <label>Phone <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" name="phone" placeholder="Phone No" maxlength="10" required/>
                            </div>

                            <div class="form-group col-lg-6 mt-3">
                                <label>Commission (%)</label>
                                <input type="text" class="form-control" name="commission" placeholder="Commission in percentage (%)"/>
                            </div>

                            <div class="form-group col-lg-6 mt-3">
                                <label>Payout (USDT)</label>
                                <input type="text" class="form-control" name="payout" placeholder="Payout in USDT"/>
                            </div>

                            <div class="form-group col-lg-6 mt-3">
                                <label>Amount Limit</label>
                                <input type="text" class="form-control" name="amount_limit" placeholder="Amount Limit"/>
                            </div>

                            <div class="form-group col-lg-6 mt-3">
                                <label>Password<span class="text-danger"></span></label>
                                <div class="input-group mb-2">
                                    <input type="password" class="form-control" name="password" value="" placeholder="Password" required/>
                                </div>
                            </div>

                            <div class="form-group col-lg-6 mt-3">
                                <label>Commission Schedule<span class="text-danger"></span></label>
                                <div class="input-group mb-2">
                                    <input type="radio" id="fixed"  name="commission_schedule" value="Fixed">&ensp;
                                    <label for="fixed" class="mt-1">Fixed</label>
                                    &ensp;&ensp;&ensp;&ensp;
                                    <input type="radio" id="scalable" name="commission_schedule" value="Scalable">&ensp;
                                    <label for="scalable" class="mt-1">Scalable</label>
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




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelCRM\resources\views/user/create-agent.blade.php ENDPATH**/ ?>