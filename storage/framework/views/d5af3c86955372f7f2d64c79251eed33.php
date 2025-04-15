<?php $__env->startSection('title'); ?>



    <?php echo app('translator')->get('Requested Payment'); ?>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('css'); ?>



    <!-- select2 css -->



    <link href="<?php echo e(URL::asset('build/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />







    <!-- DataTables -->



    <link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />







    <!-- Responsive datatable examples -->



    <link href="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />

    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" rel="stylesheet" type="text/css" />

    <link href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css" rel="stylesheet" type="text/css" />

    <style>
        .buttons-excel {
            background: #34c38f !important;
            color: white !important;
        }
    </style>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>



    <?php $__env->startComponent('components.breadcrumb'); ?>



        <?php $__env->slot('li_1'); ?>



            Requested Payment



        <?php $__env->endSlot(); ?>



        <?php $__env->slot('title'); ?>



            Requested Payment



        <?php $__env->endSlot(); ?>



    <?php echo $__env->renderComponent(); ?>







    <div class="row">



        <div class="col-lg-12">



            <div class="card">



                <div class="card-body">


                    <div class="table-responsive">

                        <table class="table align-middle table-nowrap table-hover dt-responsive nowrap w-100 display" id="example">

                            <thead class="table-light">

                                <tr>

                                    <th scope="col">#</th>

                                    <th scope="col">Customer Name</th>

                                    <th scope="col">Customer Phone</th>

                                    <th scope="col">Customer Email</th>

                                    <th scope="col">Payment Name</th>

                                    <th scope="col">Currency</th>

                                    <th scope="col">Amount</th>

                                    <th scope="col">Beneficiary</th>

                                    <th scope="col">Status</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php $__currentLoopData = $payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    
                                    <td><?php echo e(++$key); ?></td>

                                    <td><?php echo e($val->customer->name ?? 'NA'); ?></td>

                                    <td><?php echo e($val->customer->phone ?? 'NA'); ?></td>

                                    <td><?php echo e($val->customer->email ?? 'NA'); ?></td>

                                    <td>
                                        <?php if($val->customerPayment && $val->customerPayment->payment): ?>
                                            <?php echo e($val->customerPayment->payment->doman_name); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td><?php echo e($val->currency); ?></td>

                                    <td>
                                        <?php if($val->customerPayment): ?>
                                            <?php if($val->currency=='USD'): ?>
                                                $
                                            <?php elseif($val->currency=='EURO'): ?>
                                                €
                                            <?php elseif($val->currency=='GBP'): ?>
                                                £
                                            <?php elseif($val->currency=='INR'): ?>
                                                ₹
                                            <?php endif; ?>

                                            <?php echo e($val->customerPayment->amount_limit); ?>

                                        <?php endif; ?>
                                    </td>

                                    <td><?php echo e($val->is_beneficiary); ?></td>

                                    <td>
                                        <?php if($val->status=='0'): ?>
                                            <a href="<?php echo e(route('change.request.payment.status',$val->id)); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure approved this?')">Disapproved</a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('change.request.payment.status',$val->id)); ?>" class="btn btn-success btn-sm" onclick="return confirm('Are you sure disapproved this?')">Approved</a>
                                        <?php endif; ?>
                                    </td>

                                </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>

                        </table>

                        <!-- end table -->

                    </div>



                </div>



            </div>



        </div>



    </div>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script>
        jQuery(document).ready(function(){
            new DataTable('#example', {
                layout: {
                    topStart: {
                        buttons: ['excelHtml5']
                    }
                }
            });
        });
    </script>

    <!-- select2 js -->



<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelCRM\resources\views/payment/requested_payment.blade.php ENDPATH**/ ?>