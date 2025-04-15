

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Routings - Merchants'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- select2 css -->
    <link href="<?php echo e(URL::asset('build/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- bootstrap-datepicker css -->
    <link href="<?php echo e(URL::asset('build/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet">

    <!-- DataTables -->
    <link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>"
        rel="stylesheet" type="text/css" />

    <style>
        .flex-1 {
            display: none;
        }

        .w-5 {
            display: none;
        }

        th,
        td {
            white-space: nowrap;
        }

        thead {
            background-color: #e8edea;
        }

        div.dataTables_wrapper div.dataTables_length select {

            min-width: 50px;

        }

        .loader {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -25px;
            margin-left: -25px;
            z-index: 9999;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .nav-tabs {
            background-color: #d2fae5;
            /* Light gray background */
            border: 1px solid #dee2e6;
            /* Border color */
            border-radius: 5px;
            /* Rounded corners */
        }

        .nav-link {
            color: #495057;
            /* Text color */
        }

        .nav-link.active,
        .nav-link:focus,
        .nav-link:hover {
            background-color: #c4f1f5;
            /* Active, focus, and hover background color */
            color: #fff;
            /* Active, focus, and hover text color */
        }

        .tab-content {
            border: 1px solid #dee2e6;
            /* Border color */
            border-radius: 5px;
            /* Rounded corners */
            padding: 15px;
            margin-top: 10px;
        }

        .dataTables_filter {
            display: none;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Transactions
        <?php $__env->endSlot(); ?>

        <?php $__env->slot('title'); ?>
            Transactions
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <?php echo $__env->make('flash_msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container-fluid cf-main">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Date</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Currency</th>
                            <th scope="col">Status</th>
                            
                            <th scope="col">Bank</th>
                            <th scope="col">Card Type</th>
                            <th scope="col">Card Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($trx->orderId); ?></td>
                                <td><?php echo e($trx->orderDate); ?></td>
                                <td><?php echo e($trx->invoiceNumber); ?></td>
                                <td><?php echo e($trx->amount); ?></td>
                                <td><?php echo e($trx->currency); ?></td>
                                <td><?php echo e($trx->orderStatus); ?></td>
                                
                                <td><?php echo e($trx->bank_name); ?></td>
                                <td><?php echo e($trx->card_type); ?></td>
                                <td><?php echo e($trx->cardnum); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

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



<!-- New Script -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


<!-- DataTables CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script>

<!-- DataTables Buttons CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
<script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js">
</script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
</script>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelCRM\resources\views/transactions/index.blade.php ENDPATH**/ ?>