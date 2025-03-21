<?php $__env->startSection('title'); ?>

    <?php echo app('translator')->get('New Merchant Application Form'); ?>

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

            Edit Merchant Application Form

        <?php $__env->endSlot(); ?>

    <?php echo $__env->renderComponent(); ?>
    <style>
        .card-header {
            background-color: lightgrey !important;
        }
    </style>

    <div class="row">

        <div class="col-lg-12">

            <form autocomplete="off" action="<?php echo e(route('merchant.application.store')); ?>" method="Post">
                <?php echo csrf_field(); ?>

                <div class="card">

                    <div class="card-header">
                        Business Information
                    </div>

                    <div class="card-body">                    

                        <div class="row">

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Name <b class="text-danger">*</b></label>

                                    <input type="text" name="name" class="form-control" value="<?php echo e($data->name); ?>" placeholder="Name" required>

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Email <b class="text-danger">*</b></label>

                                    <input type="email" name="email" class="form-control" value="<?php echo e($data->email); ?>" placeholder="Email" required>

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Phone <b class="text-danger">*</b></label>

                                    <input type="number" name="phone" class="form-control" value="<?php echo e($data->phone); ?>" placeholder="Phone" required>

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Website URL <b class="text-danger">*</b></label>

                                    <input type="text" name="website_URL" class="form-control" value="<?php echo e($data->website_URL); ?>" placeholder="Website URL" required>

                                </div>
                                
                            </div>

                        </div>                        

                    </div>

                </div>

                <?php $__currentLoopData = $commission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $comm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card">

                    <div class="card-header">
                        Commissions (Currency#<?php echo e(++$key); ?>)
                    </div>

                    <div class="card-body">                    

                        <div class="row">

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Transaction ID <b class="text-danger">*</b></label>

                                    <input type="text" name="trans_id[]" class="form-control" value="<?php echo e($comm->trans_id); ?>" placeholder="Transaction ID" required>

                                    <input type="hidden" name="form_count[]" value="1">
                                    <input type="hidden" name="form_count[]" value="2">
                                    <input type="hidden" name="form_count[]" value="3">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Date & Time <b class="text-danger">*</b></label>

                                    <input type="datetime-local" name="date_time[]" value="<?php echo e($comm->date_time); ?>" class="form-control" placeholder="Date & Time" required>

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Invoice Number <b class="text-danger">*</b></label>

                                    <input type="text" name="invoice_number[]" value="<?php echo e($comm->invoice_number); ?>" class="form-control" placeholder="Invoice Number" required>

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Amount Paid <b class="text-danger">*</b></label>

                                    <input type="text" name="amount_paid[]" value="<?php echo e($comm->amount_paid); ?>" class="form-control" placeholder="Amount Paid" required>

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Client (Fee) Commission (MDR) <b class="text-danger">*</b></label>

                                    <input type="text" name="client_fee_commission[]" value="<?php echo e($comm->client_fee_commission); ?>" class="form-control" placeholder="Client (Fee) Commission (MDR)" required>

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Rolling Reserves (%)</label>

                                    <input type="text" name="rolling_reserves[]" class="form-control" value="<?php echo e($comm->rolling_reserves); ?>" placeholder="Rolling Reserves (%)">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Rolling Reserves Released Days</label>

                                    <input type="text" name="rolling_reserves_released_days[]" class="form-control" value="<?php echo e($comm->rolling_reserves_released_days); ?>" placeholder="Rolling Reserves Released Days">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Rolling Reserves Cap</label>

                                    <input type="text" name="rolling_reserves_cap[]" class="form-control" value="<?php echo e($comm->rolling_reserves_cap); ?>" placeholder="Rolling Reserves Cap">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Payable to client <b class="text-danger">*</b></label>

                                    <input type="text" name="payable_to_cleint[]" class="form-control" value="<?php echo e($comm->payable_to_cleint); ?>" placeholder="Payable to client" required>

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Chargebacks</label>

                                    <input type="text" name="chargebacks[]" class="form-control" value="<?php echo e($comm->chargebacks); ?>" placeholder="Chargebacks">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Refunds</label>

                                    <input type="text" name="refunds[]" class="form-control" value="<?php echo e($comm->refunds); ?>" placeholder="Refunds">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Partial Refunds</label>

                                    <input type="text" name="partial_refunds[]" class="form-control" value="<?php echo e($comm->partial_refunds); ?>" placeholder="Partial Refunds">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>PSP Fees #1</label>

                                    <input type="text" name="PSP_fees_1[]" class="form-control" value="<?php echo e($comm->PSP_fees_1); ?>" placeholder="PSP Fees #1">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>PSP transaction Fees #1</label>

                                    <input type="text" name="PSP_transaction_fees_1[]" class="form-control" value="<?php echo e($comm->PSP_transaction_fees_1); ?>" placeholder="PSP transaction Fees #1">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>PSP Fees #2</label>

                                    <input type="text" name="PSP_fees_2[]" class="form-control" value="<?php echo e($comm->PSP_fees_2); ?>" placeholder="PSP Fees #2">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>PSP transaction Fees #2</label>

                                    <input type="text" name="PSP_transaction_fees_2[]" class="form-control" value="<?php echo e($comm->PSP_transaction_fees_2); ?>" placeholder="PSP transaction Fees #2">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>PSP Fees #3</label>

                                    <input type="text" name="PSP_fees_3[]" class="form-control" value="<?php echo e($comm->PSP_fees_3); ?>" placeholder="PSP Fees #3">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>PSP transaction Fees #3</label>

                                    <input type="text" name="PSP_transaction_fees_3[]" class="form-control" value="<?php echo e($comm->PSP_transaction_fees_3); ?>" placeholder="PSP transaction Fees #3">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>PSP Fees #4</label>

                                    <input type="text" name="PSP_fees_4[]" class="form-control" value="<?php echo e($comm->PSP_fees_4); ?>" placeholder="PSP Fees #4">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>PSP transaction Fees #4</label>

                                    <input type="text" name="PSP_transaction_fees_4[]" class="form-control" value="<?php echo e($comm->PSP_transaction_fees_4); ?>" placeholder="PSP transaction Fees #4">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Agent #1</label>

                                    <input type="text" name="agent_1[]" class="form-control" value="<?php echo e($comm->agent_1); ?>" placeholder="Agent #1">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Agent #2</label>

                                    <input type="text" name="agent_2[]" class="form-control" value="<?php echo e($comm->agent_2); ?>" placeholder="Agent #2">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Agent #3</label>

                                    <input type="text" name="agent_3[]" class="form-control" value="<?php echo e($comm->agent_3); ?>" placeholder="Agent #3">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Agent #4</label>

                                    <input type="text" name="agent_4[]" class="form-control" value="<?php echo e($comm->agent_4); ?>" placeholder="Agent #4">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>PYY Share 50% </label>

                                    <input type="text" name="PYY_share_50[]" class="form-control" value="<?php echo e($comm->PYY_share_50_p); ?>" placeholder="PYY Share 50%">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Limegrove Share 50% </label>

                                    <input type="text" name="limegrove_share_50[]" class="form-control" value="<?php echo e($comm->limegrove_share_50_p); ?>" placeholder="Limegrove Share 50%">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Sanabil Share 50% </label>

                                    <input type="text" name="sanabil_share_50[]" class="form-control" value="<?php echo e($comm->sanabil_share_50_p); ?>" placeholder="Sanabil Share 50%">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Gateway Fees</label>

                                    <input type="text" name="gateway_fees[]" class="form-control" value="<?php echo e($comm->gateway_fees); ?>" placeholder="Gateway Fees">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Crypto settlement (USDT) <b class="text-danger">*</b></label>

                                    <input type="text" name="crypto_settlement_USDT[]" class="form-control" value="<?php echo e($comm->crypto_settlement_USDT); ?>" placeholder="Crypto settlement (USDT)" required>

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Fiat Settlement <b class="text-danger">*</b></label>

                                    <input type="text" name="fial_settlement[]" value="<?php echo e($comm->fial_settlement); ?>" class="form-control" value="<?php echo e($comm->client_fee_commission); ?>" placeholder="Fiat Settlement" required>

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Chargebacks Fees</label>

                                    <input type="text" name="chargebacks_fees[]" class="form-control" value="<?php echo e($comm->chargebacks_fees); ?>" placeholder="Chargebacks Fees">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Refunds Fees</label>

                                    <input type="text" name="refunds_fees[]" class="form-control" value="<?php echo e($comm->refunds_fees); ?>" placeholder="Refunds Fees">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Partial Refunds Fees</label>

                                    <input type="text" name="partial_refunds_fees[]" class="form-control" value="<?php echo e($comm->partial_refunds_fees); ?>" placeholder="Partial Refunds Fees">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>50 cents per transaction</label>

                                    <input type="text" name="cents_per_trans[]" class="form-control" value="<?php echo e($comm->cents_per_trans); ?>" placeholder="50 cents per transaction">

                                </div>
                                
                            </div>



                        </div>                        

                    </div>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="card">

                    <div class="card-header">
                        Financial Information (Payment Section)
                    </div>

                    <div class="card-body">                    

                        <div class="row">

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Payment Gateway <b class="text-danger">*</b></label>

                                    <select class="form-control" name="payment_gateway" required>
                                        <option value="">Select Payment Gateway</option>
                                        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($pay->id); ?>" <?php echo e($financial->payment_gateway==$pay->id?'selected':''); ?>><?php echo e($pay->payment_gateway); ?> (<?php echo e($pay->doman_name); ?>)</option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Is Live <b class="text-danger">*</b></label><br>

                                    <div class="row mt-2">
                                        
                                        <div class="custom-control custom-radio custom-control-inline col-lg-6">
                                            <input type="radio" id="customRadioInline1" name="is_live" class="custom-control-input" <?php echo e($financial->is_live=='1'?'checked':''); ?> required>
                                            <label class="custom-control-label" for="customRadioInline1">Yes</label>
                                        </div>
                                       
                                        <div class="custom-control custom-radio custom-control-inline col-lg-6">
                                            <input type="radio" id="customRadioInline2" name="is_live" class="custom-control-input" <?php echo e($financial->is_live=='0'?'checked':''); ?> required>
                                            <label class="custom-control-label" for="customRadioInline2">No</label>
                                        </div>

                                    </div>

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Request URL <b class="text-danger">*</b></label>

                                    <input type="text" name="request_URL" class="form-control" value="<?php echo e($financial->request_URL); ?>" placeholder="Request URL" required>

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Return URL</label>

                                    <input type="text" name="return_URL" class="form-control" value="<?php echo e($financial->return_URL); ?>" placeholder="Return URL">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Country</label>

                                    <select class="form-control" name="country">
                                        <option value="">Select Country</option>
                                        <?php $__currentLoopData = $countrie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($cou->id); ?>" <?php echo e($financial->country==$cou->id?'selected':''); ?>><?php echo e($cou->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Amount Limit</label>

                                    <input type="text" name="amount_limit" value="<?php echo e($financial->amount_limit); ?>" class="form-control" placeholder="Amount Limit">

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                    
                                    <label>Currency</label>

                                    <select class="form-control" name="currency">
                                        <option value="">Select Currency</option>
                                        <?php $__currentLoopData = $countrie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $coun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($coun->id); ?>" <?php echo e($financial->currency==$coun->id?'selected':''); ?>><?php echo e($cou->code); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                </div>
                                
                            </div>

                            <div class="col-lg-6 mt-2">
                                
                                <div class="form-group">
                                        
                                    <label>Is Active <b class="text-danger">*</b></label><br>

                                    <div class="row mt-2">
                                        
                                        <div class="custom-control custom-radio custom-control-inline col-lg-6">
                                            <input type="radio" id="customRadioInline4" name="is_active" class="custom-control-input" value="1" <?php echo e($financial->is_active=='1'?'checked':''); ?> required>
                                            <label class="custom-control-label" for="customRadioInline4">Enable</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline col-lg-6">
                                            <input type="radio" id="customRadioInline5" name="is_active" class="custom-control-input" value="0"<?php echo e($financial->is_active=='0'?'checked':''); ?> required>
                                            <label class="custom-control-label" for="customRadioInline5">Disable</label>
                                        </div>

                                    </div>

                                </div>
                                
                            </div>

                        </div>                        

                    </div>

                </div>

                <div class="card">
                    
                    <div class="card-body">

                        <div class="text-center mt-4">
                                
                            <button class="btn btn-success" type="submit">Update</button>

                        </div>
                        
                    </div>

                </div>

            </form>

        </div>



    </div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/payit123crm/public_html/CRM/resources/views/PYY/edit.blade.php ENDPATH**/ ?>