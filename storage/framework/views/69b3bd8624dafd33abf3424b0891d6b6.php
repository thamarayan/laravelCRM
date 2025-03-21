<?php $__env->startSection('title'); ?>

    <?php echo app('translator')->get('Merchant Payment'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>


    <!-- select2 css -->

    <link href="<?php echo e(URL::asset('build/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- bootstrap-datepicker css -->

    <link href="<?php echo e(URL::asset('build/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet">

    <!-- DataTables -->

    <link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->

    <link href="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet"

        type="text/css" />

    <style>
        .flex-1
        {
            display: none;
        }
         .w-5
        {
          display: none;
        }   

    </style>   

    <style>
.switch {
  position: relative;
  display: inline-block;
  width: 57px;
  height: 25px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 25px;
  width: 26px;
  left: 4px;
  bottom: 0px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #008000a1;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.redio-border {
    border: ridge;
}
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>


        <?php $__env->slot('li_1'); ?>

           Merchant Payment

        <?php $__env->endSlot(); ?>

        <?php $__env->slot('title'); ?>

            Merchant Payment/List

        <?php $__env->endSlot(); ?>

    <?php echo $__env->renderComponent(); ?>



    <div class="row">
        
        <?php echo $__env->make('flash_msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="col-lg-12">

            <div class="row mb-1">

                        <div class="col-sm-4">

                            <div class="search-box me-2 mb-2 d-inline-block">

                                <div class="position-relative">

                                    <!-- <input type="text" class="form-control" id="searchTableList" placeholder="Search...">

                                    <i class="bx bx-search-alt search-icon"></i> -->

                                </div>

                            </div>

                        </div>

                        <div class="col-sm-8">

                        </div><!-- end col-->

            </div>


           

            <div class="card">


                <div class="card-body">

                    

                    <!-- end row -->

                    <div class="table-responsive">

                        <table class="table align-middle table-nowrap table-hover dt-responsive nowrap w-100">

                            <thead class="table-light">

                                <tr>

                                    <th scope="col">#</th>

                                    <th scope="col">Merchant</th>

                                    <th scope="col">Payment Gateway</th>

                                    <th scope="col">Payment Currency</th>

                                    <th scope="col">Payment Country</th>

                                    <th scope="col">Status</th>

                                    <th scope="col" style="width: 200px;">Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php if(!empty($payments)): ?>

                                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>

                                    <td><?php echo e(++$key); ?></td>
                                    
                                    <td><?php echo e($value->client?$value->client->name:''); ?></td>

                                    <td><?php echo e($value->payment?$value->payment->payment_gateway:''); ?></td>

                                    <td>
                                        <?php if($value->payment && $value->payment->currency && json_decode($value->payment->currency, true)): ?>

                                            <?php $__currentLoopData = json_decode($value->payment->currency, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cc => $pay_cur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <?php if($value->currency_hide_id && $pay_cur && json_decode($value->currency_hide_id, true) && in_array($pay_cur, json_decode($value->currency_hide_id, true))): ?>

                                                <span class="text-danger"><?php echo e(App\Models\Currencies::whereId($pay_cur)->value('symbol')); ?></span>,

                                                <?php else: ?>

                                                <?php echo e(App\Models\Currencies::whereId($pay_cur)->value('symbol')); ?>,

                                                <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <?php if($value->payment && json_decode($value->payment->country, true)): ?>

                                            <?php $__currentLoopData = json_decode($value->payment->country, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cc => $pay_cur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <?php if($value->country_hide_id && $pay_cur && json_decode($value->country_hide_id, true) && in_array($pay_cur, json_decode($value->country_hide_id, true))): ?>

                                                <span class="text-danger"><?php echo e(App\Models\Countrie::whereId($pay_cur)->value('name')); ?></span>,

                                                <?php else: ?>

                                                <?php echo e(App\Models\Countrie::whereId($pay_cur)->value('name')); ?>,

                                                <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td>

                                        <?php if($value->is_active == 1): ?>
                                        
                                            <label class="switch">
                                                <a href="<?php echo e(url('client/payment/status/'.'0'.'/'.$value->id)); ?>" onclick="return confirm('Are You Sure ?')">
                                                    <input type="checkbox" checked>
                                                    <span class="slider round"></span>
                                                </a>
                                            </label>
                                        
                                        <?php else: ?>
                                        <label class="switch">
                                                <a href="<?php echo e(url('client/payment/status/'.'1'.'/'.$value->id)); ?>" onclick="return confirm('Are You Sure ?')">
                                                    <input type="checkbox">
                                                    <span class="slider round"></span>
                                                </a>
                                            </label>
                                        <?php endif; ?>

                                    </td>

                                    <td>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary ml-2 btn-sm" onclick="hideCC(<?php echo e($value->id); ?>)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Edit
                                        </button>

                                    </td>

                                </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php if($payments->count() == 0): ?>

                                    <tr class="text-center">

                                        <td colspan="11">No Clients to display.</td>

                                    </tr>

                                    <?php endif; ?>

                                <?php endif; ?>

                            </tbody>

                        </table>

                        <!-- end table -->

                    </div>

                    <div><?php echo e($payments->links()); ?></div>
                    <!-- end table responsive -->

                </div>

            </div>

        </div>

    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hide Country/Currency</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo e(route('store_hide_cc')); ?>" method="Post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="hide_section">
                                
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
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

    <!-- init js -->

    <script src="<?php echo e(URL::asset('build/js/pages/crypto-orders.init.js')); ?>"></script>



<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/payit123crm/public_html/CRM/resources/views/client_payment/index.blade.php ENDPATH**/ ?>