<?php $__env->startSection('title'); ?>



    <?php echo app('translator')->get('Request Payment'); ?>



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



            Request Payment



        <?php $__env->endSlot(); ?>



        <?php $__env->slot('title'); ?>



            Request Payment



        <?php $__env->endSlot(); ?>



    <?php echo $__env->renderComponent(); ?>







    <div class="row">



        <div class="col-lg-12">



            <div class="card">



                <div class="card-body">

                    <form autocomplete="off" action="<?php echo e(route('request.payment.post')); ?>" method="Post">
                        <?php echo csrf_field(); ?>

                        <div class="row">
                            
                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                            
                                    <label>Existing Beneficiary</label><br>

                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="beneficiary" id="inlineRadio1" value="Yes" onclick="getBeneficiary('Yes')" checked>
                                      <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="beneficiary" id="inlineRadio2" value="No" onclick="getBeneficiary('No')">
                                      <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                            
                                    <label>Currency</label><br>

                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="currency" id="EUR" value="EUR">
                                      <label class="form-check-label" for="EUR">EUR</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="currency" id="USD" value="USD" checked>
                                      <label class="form-check-label" for="USD">USD</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="currency" id="GBP" value="GBP">
                                      <label class="form-check-label" for="GBP">GBP</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="currency" id="AED" value="AED">
                                      <label class="form-check-label" for="AED">AED</label>
                                    </div>

                                </div>

                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Customer <a href="<?php echo e(route('admin.client.create')); ?>"><b title="Create Customer" class="text-info"><i class="mdi mdi-plus me-1"></i></b></a> </label>

                                    <select class="form-control" name="customer_id" onchange="getCustomerPay(this.value)" required>
                                        <option>Select Customer</option>
                                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Key => $cust): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($cust->id); ?>"><?php echo e($cust->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div>

                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Customer Payment</label>

                                    <select class="form-control payment_list" name="customer_payment_id" required>
                                        <option value="">Select Customer Payment</option>
                                    </select>

                                </div>

                            </div>

                            <div class="col-lg-6 mt-2 beneficiary_section">
                                
                                <div class="form-group">
                                    
                                    <label>Recipient Name</label>

                                    <input type="text" name="recipient_name" class="form-control" placeholder="Recipient Name">

                                </div>

                            </div>

                            <div class="col-lg-6 mt-2 beneficiary_section">
                                
                                <div class="form-group">
                                    
                                    <label>IBAN</label>

                                    <input type="text" name="iban" class="form-control" placeholder="IBAN">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2 beneficiary_section">
                                
                                <div class="form-group">
                                    
                                    <label>BIC</label>

                                    <input type="text" name="bic" class="form-control" placeholder="BIC">

                                </div>
                                
                            </div>

                            

                        </div>

                        <div class="text-center mt-4">
                            
                            <button class="btn btn-success">Submit</button>

                        </div>

                    </form>

                </div>



            </div>



        </div>



    </div>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>



    <script src="<?php echo e(URL::asset('build/libs/select2/js/select2.min.js')); ?>"></script>







    <!-- Required datatable js -->



    <script src="<?php echo e(URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>



    <script src="<?php echo e(URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>







    <!-- Responsive examples -->



    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>



    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>







    <!-- ecommerce-customer-list init -->



    <script src="<?php echo e(URL::asset('build/js/pages/contact-user-list.init.js')); ?>"></script>

    <script>

        function getBeneficiary(argument) {

            if(argument=='Yes'){
                $('.beneficiary_section').show();
            } else {
                $('.beneficiary_section').hide();
            }
        }
    </script>


<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/payit123crm/public_html/CRM/resources/views/payment/request_payment.blade.php ENDPATH**/ ?>