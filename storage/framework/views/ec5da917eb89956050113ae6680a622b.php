<?php $__env->startSection('title'); ?>

    <?php echo app('translator')->get('Merchant Application Details'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

    <link href="<?php echo e(URL::asset('build/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>

        <?php $__env->slot('li_1'); ?>

            Dashboard

        <?php $__env->endSlot(); ?>

        <?php $__env->slot('title'); ?>

            Merchant Application Details

        <?php $__env->endSlot(); ?>

    <?php echo $__env->renderComponent(); ?>
    <style>
        .card-header {
            background-color: lightgrey !important;
        }
    </style>

    <div class="row">

        <div class="col-lg-12">

            <div class="card">

                <div class="card-header">
                    Business Information
                </div>

                <div class="card-body">                    

                    <div class="row">
                        
                        <div class="col-lg-3 mt-2">
                            <b>Name</b>
                        </div>

                        <div class="col-lg-3 mt-2">
                            <span>: <?php echo e($data->name); ?></span>
                        </div>

                        <div class="col-lg-3 mt-2">
                            <b>Email</b>
                        </div>

                        <div class="col-lg-3 mt-2">
                            : <?php echo e($data->email); ?>

                        </div>

                        <div class="col-lg-3 mt-2">
                            <b>Phone </b>
                        </div>

                        <div class="col-lg-3 mt-2">
                            <span> : <?php echo e($data->phone); ?></span>
                        </div>

                        <div class="col-lg-3 mt-2">
                            <b>Website URL</b>
                        </div>

                        <div class="col-lg-3 mt-2">
                            : <?php echo e($data->website_URL); ?>

                        </div>

                    </div>                      

                </div>

            </div>

        </div>



    </div>

    <?php $__currentLoopData = $commission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="row">

            <div class="col-lg-12">

                <div class="card">

                    <div class="card-header">
                         Commissions (Currency#<?php echo e(++$key); ?>)
                    </div>

                    <div class="card-body">                    

                        <div class="row">
                            
                            <div class="col-lg-3 mt-2">
                                <b>Transaction ID</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <span>: <?php echo e($comm->trans_id); ?></span>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Date & Time</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                : <?php echo e($comm->date_time); ?>

                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Invoice Number </b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <span> : <?php echo e($comm->invoice_number); ?></span>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Amount Paid</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                : <?php echo e($comm->amount_paid); ?>

                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Client (Fee) Commission (MDR)</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <span>: <?php echo e($comm->client_fee_commission); ?></span>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Rolling Reserves (%)</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                : <?php echo e($comm->rolling_reserves); ?>

                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Rolling Reserves Released Days </b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <span> : <?php echo e($comm->rolling_reserves_released_days); ?></span>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Rolling Reserves Cap</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                : <?php echo e($comm->rolling_reserves_cap); ?>

                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Payable to client</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <span>: <?php echo e($comm->payable_to_cleint); ?></span>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Chargebacks</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                : <?php echo e($comm->chargebacks); ?>

                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Refunds</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <span> : <?php echo e($comm->refunds); ?></span>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Partial Refunds</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                : <?php echo e($comm->amount_paid); ?>

                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>PSP Fees #1</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <span>: <?php echo e($comm->PSP_fees_1); ?></span>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>PSP transaction Fees #1</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                : <?php echo e($comm->PSP_transaction_fees_1); ?>

                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>PSP Fees #2</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <span> : <?php echo e($comm->PSP_fees_2); ?></span>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>PSP transaction Fees #2</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                : <?php echo e($comm->PSP_transaction_fees_2); ?>

                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>PSP Fees #3</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <span>: <?php echo e($comm->PSP_fees_3); ?></span>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>PSP transaction Fees #3</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                : <?php echo e($comm->PSP_transaction_fees_3); ?>

                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>PSP Fees #4</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <span> : <?php echo e($comm->PSP_fees_4); ?></span>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>PSP transaction Fees #4</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                : <?php echo e($comm->PSP_transaction_fees_4); ?>

                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Agent #1</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <span>: <?php echo e($comm->agent_1); ?></span>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Agent #2</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                : <?php echo e($comm->agent_2); ?>

                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Agent #3</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <span> : <?php echo e($comm->agent_3); ?></span>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Agent #4</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                : <?php echo e($comm->agent_4); ?>

                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>PYY Share 50%</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <span>: <?php echo e($comm->PYY_share_50); ?></span>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Limegrove Share 50%</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                : <?php echo e($comm->limegrove_share_50); ?>

                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Sanabil Share 50%</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <span> : <?php echo e($comm->sanabil_share_50); ?></span>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Gateway Fees</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                : <?php echo e($comm->gateway_fees); ?>

                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Crypto settlement (USDT)</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <span>: <?php echo e($comm->crypto_settlement_USDT); ?></span>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Fiat Settlement</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                : <?php echo e($comm->fial_settlement); ?>

                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Chargebacks Fees</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <span> : <?php echo e($comm->chargebacks_fees); ?></span>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Refunds Fees</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                : <?php echo e($comm->refunds_fees); ?>

                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>Partial Refunds Fees</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <span> : <?php echo e($comm->partial_refunds_fees); ?></span>
                            </div>

                            <div class="col-lg-3 mt-2">
                                <b>50 cents per transaction</b>
                            </div>

                            <div class="col-lg-3 mt-2">
                                : <?php echo e($comm->cents_per_trans); ?>

                            </div>

                        </div>                      

                    </div>

                </div>

            </div>



        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <div class="row">

        <div class="col-lg-12">

            <div class="card">

                <div class="card-header">
                    Financial Information (Payment Section)
                </div>

                <div class="card-body">                    

                    <div class="row">
                        
                        <div class="col-lg-3 mt-2">
                            <b>Payment Gateway</b>
                        </div>

                        <div class="col-lg-3 mt-2">
                            <span>: </span>
                        </div>

                        <div class="col-lg-3 mt-2">
                            <b>Is Live</b>
                        </div>

                        <div class="col-lg-3 mt-2">
                            : <?php echo e($financial->is_live=='1'?'Yes':'No'); ?>

                        </div>

                        <div class="col-lg-3 mt-2">
                            <b>Request URL </b>
                        </div>

                        <div class="col-lg-3 mt-2">
                            <span> : <?php echo e($financial->request_URL); ?></span>
                        </div>

                        <div class="col-lg-3 mt-2">
                            <b>Return URL</b>
                        </div>

                        <div class="col-lg-3 mt-2">
                            : <?php echo e($data->website_URL); ?>

                        </div>

                        <div class="col-lg-3 mt-2">
                            <b>Country</b>
                        </div>

                        <div class="col-lg-3 mt-2">
                            <span> : </span>
                        </div>

                        <div class="col-lg-3 mt-2">
                            <b>Amount Limit</b>
                        </div>

                        <div class="col-lg-3 mt-2">
                            : <?php echo e($data->amount_limit); ?>

                        </div>

                        <div class="col-lg-3 mt-2">
                            <b>Currency</b>
                        </div>

                        <div class="col-lg-3 mt-2">
                            <span> : </span>
                        </div>

                        <div class="col-lg-3 mt-2">
                            <b>Is Active</b>
                        </div>

                        <div class="col-lg-3 mt-2">
                            : <?php echo e($financial->is_active=='1'?'Enable':'Disable'); ?>

                        </div>

                    </div>                      

                </div>

            </div>

        </div>



    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/payit123crm/public_html/CRM/resources/views/PYY/detail.blade.php ENDPATH**/ ?>