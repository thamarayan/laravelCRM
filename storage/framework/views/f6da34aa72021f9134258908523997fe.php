<?php $__env->startSection('title'); ?>

<?php echo app('translator')->get('Customer List'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>


<!-- select2 css -->

<link href="<?php echo e(URL::asset('build/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />

<!-- bootstrap-datepicker css -->

<link href="<?php echo e(URL::asset('build/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet">



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- DataTables -->

<link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->

<link href="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet"

    type="text/css" />

<style>
    .flex-1 {
        display: none;
    }

    .w-5 {
        display: none;
    }
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>


<?php $__env->slot('li_1'); ?>

Customers & Merchant

<?php $__env->endSlot(); ?>

<?php $__env->slot('title'); ?>

Customers & Merchant / List

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

                <div class="text-sm-end">

                    <a href="<?php echo e(route('admin.client.create')); ?>">

                        <button type="button" class="btn btn-success btn-rounded waves-effect waves-light addContact-modal mb-2"><i

                                class="mdi mdi-plus me-1"></i> New Merchant</button>

                    </a>



                </div>

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

                                <!-- <th scope="col" style="width: 40px;">Image</th> -->

                                <th scope="col">Name</th>

                                <th scope="col">Email</th>

                                <!--<th scope="col">Registered By</th>-->

                                <th scope="col">Phone</th>

                                <th scope="col">Client Com.</th>

                                <th scope="col">Rolling Res.</th>

                                <th scope="col">Trans. Fee</th>
                                
                                <th scope="col">PendingPayout</th>
                                
                                <th scope="col">History</th>

                                <th scope="col" style="width: 200px;">Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php if(!empty($users)): ?>

                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>

                                <td><?php echo e(++$key); ?></td>

                                <td><?php echo e($value->name); ?></td>

                                <td><?php echo e($value->email); ?></td>

                                <td><?php echo e($value->phone); ?></td>

                                <td><?php echo e($value->clientDetails->client_commission); ?></td>

                                <td><?php echo e($value->clientDetails->rolling_reserve); ?></td>

                                <td><?php echo e($value->clientDetails->transaction_fee); ?></td>
                                
                                <td class="text-end">$<?php echo e(number_format(optional($value->clientDetails)->payOutBalance ?? 0, 2)); ?></td>
                                
                                <td>
                                     <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#logModal<?php echo e($value->id); ?>">
                                        <i class="bi bi-info"></i>
                                    </button>
                                
                                    <!-- Modal -->
                                    <div class="modal modal-lg fade" id="logModal<?php echo e($value->id); ?>" tabindex="-1" aria-labelledby="logModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="logModalLabel"><?php echo e($value->name); ?> - Payout History - Amount to Pay - <strong>$<?php echo e($value->clientDetails->payOutBalance); ?></strong></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Start Date</th>
                                                        <th scope="col">End Date</th>
                                                        <th scope="col">Payout Amout</th>
                                                        <th scope="col">Payment Made</th>
                                                        <th scope="col">Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $__currentLoopData = $settlementLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($entry->clientName == "pay_orders_".$value->name): ?>
                                                            <tr>
                                                                <td><?php echo e($entry->startDate); ?></td>
                                                                <td><?php echo e($entry->endDate); ?></td>
                                                                <td style="color: green !important"><?php echo e($entry->payoutAmt); ?></td>
                                                                <td style="color: red !important"><?php echo e($entry->paymentMade); ?></td>
                                                                <td><?php echo e($entry->status); ?></td>
                                                            </tr>
                                                            <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>                                
                             
                                </td>

                                <td>

                                    <ul class="list-unstyled hstack gap-1 mb-0">

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">

                                            <a href="<?php echo e(route('admin.client.edit',encrypt($value->id))); ?>" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>

                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                            <a href="<?php echo e(route('admin.client.delete', encrypt($value->id))); ?>" class="delete-link text-danger" onclick="return confirm('Are you sure you want to delete this user?')"><i class="mdi mdi-delete-outline"></i></a>

                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View Account">

                                            <a href="<?php echo e(route('admin.client.view.more',encrypt($value->id))); ?>" class="btn btn-sm btn-soft-info"><i class='fas fa-user-alt'></i></a>

                                        </li>
                                    </ul>

                                </td>

                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php if($users->count() == 0): ?>

                            <tr class="text-center">

                                <td colspan="11">No Clients to display.</td>

                            </tr>

                            <?php endif; ?>

                            <?php endif; ?>

                        </tbody>

                    </table>

                    <!-- end table -->

                </div>

                <div><?php echo e($users->links()); ?></div>
                <!-- end table responsive -->

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

<!-- init js -->

<script src="<?php echo e(URL::asset('build/js/pages/crypto-orders.init.js')); ?>"></script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelCRM\resources\views/adminclients/index.blade.php ENDPATH**/ ?>