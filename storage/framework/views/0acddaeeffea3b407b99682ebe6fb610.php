<?php $__env->startSection('title'); ?>



<?php echo app('translator')->get('Merchant'); ?>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

<style>
    .flot-right {
        float: right;
    }

    .select-w {
        width: 100% !important;
    }
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">

<?php $__env->startComponent('components.breadcrumb'); ?>



<?php $__env->slot('li_1'); ?>



Edit Merchant



<?php $__env->endSlot(); ?>



<?php $__env->slot('title'); ?>



Edit Merchant



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


                                <a href="<?php echo e(route('admin.allclients')); ?>">

                                    <button type="button" class="btn btn-success btn-rounded waves-effect waves-light addContact-modal mb-2"><i

                                            class="mdi mdi-arrow-left me-1"></i> Back</button>

                                </a>



                            </div>



                        </div><!-- end col-->



                    </div>
                    <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <form autocomplete="off" action="<?php echo e(route('admin.client.update',$user->id)); ?>" method="Post">

                        <?php echo csrf_field(); ?>

                        <!-- Modal body -->
                        <div class="row">


                            <div class="form-group col-lg-6">
                                <label>Name <small class="text-muted">(The name should be same as it is in the transaction)</small> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" value="<?php echo e($user->name); ?>" placeholder="Name" required />
                            </div>



                            <div class="form-group col-lg-6 ">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="email" value="<?php echo e($user->email); ?>" placeholder="Email" required />
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Phone <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" name="phone" value="<?php echo e($user->phone); ?>" placeholder="Enter Phone No" maxlength="10" required />
                            </div>

                            <div class="col-lg-6">

                            </div>

                            <h5 class="mt-1">Commissions</h5>

                            <div class="form-group col-lg-4">
                                <label>Client (Fee) Commission<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="number" step="0.01" class="form-control" name="client_commission" value="<?php echo e($client_details->client_commission); ?>" placeholder="Client Commission" required />
                                </div>
                            </div>

                            <div class="form-group col-lg-4">
                                <label>Extra Client Fee (PP Friend)</label>
                                <div class="input-group mb-2">
                                    <input type="text" step="0.01" class="form-control" name="extra_client" value="<?php echo e($client_details->extra_client_fee); ?>" placeholder="Extra Client (Fee)" />
                                </div>
                            </div>
                            
                            <div class="form-group col-lg-4">
                                <label>Crypto Settlement Fee<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="number" step="0.01" class="form-control" name="crypto_fee" value="<?php echo e($client_details->crypto_fee); ?>" placeholder="Crypto Fee" required />
                                </div>
                            </div>

                            <div class="form-group col-lg-3">
                                <label>Chargeback Fee ($)<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="number" class="form-control" name="chargeback_fee" value="<?php echo e($client_details->chargeback_fee); ?>" placeholder="Chargeback Value" required />
                                </div>
                            </div>

                            <div class="form-group col-lg-3">
                                <label>Refund Fee ($)<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="number" class="form-control" name="refund_fee" value="<?php echo e($client_details->refund_fee); ?>" placeholder="Refund Fee Value" required/>
                                </div>
                            </div>

                            <div class="form-group col-lg-3">
                                <label>High Risk Fee ($)<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="number" class="form-control" name="highRisk_fee" value="<?php echo e($client_details->highRisk_fee); ?>" placeholder="High Risk Value" required />
                                </div>
                            </div>

                            <div class="form-group col-lg-3">
                                <label>Fruad Warning Fee ($)<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="number" class="form-control" name="fraudWarning_fee" value="<?php echo e($client_details->fraudWarning_fee); ?>" placeholder="Fraud Warning Fee Value" required/>
                                </div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Before Rolling Reserve<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="text" step="0.01" class="form-control" name="before_rolling_reserve" value="<?php echo e($client_details->before_rolling_reserve); ?>" placeholder="Before Rolling Reserve" required />
                                </div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Rolling Reserve<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="number" step="0.01" class="form-control" name="rolling_reserve" value="<?php echo e($client_details->rolling_reserve); ?>" placeholder="Rolling Reserve" required />
                                </div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Payable to Client<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="payabletoclient" value="<?php echo e($client_details->payabletoclient); ?>" placeholder="Payable to Client" required />
                                </div>
                            </div>

                            <div class="form-group col-lg-6 ">
                                <label>PSP<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="psp" value="<?php echo e($client_details->psp); ?>" placeholder="PSP" required />
                                </div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Net After PSP & Client<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="net_after_psp_client" value="<?php echo e($client_details->net_after_psp_client); ?>" placeholder="Net After PSP & Client" required />
                                </div>
                            </div>

                            <div class="form-group col-lg-6 ">
                                <label>Agents<span class="text-danger">*</span></label>

                                <?php if($client_details->agents !== null): ?>
                                <div class="input-group mb-2">
                                    <select class="selectpicker select-w" name="agents[]" multiple data-live-search="true" required>
                                        <option value="">Select Agents</option>
                                        <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->id); ?>" <?php echo e(in_array($value->id, $client_details->agents) ? 'selected' : ''); ?>><?php echo e($value->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <?php else: ?>
                                <div class="input-group mb-2">
                                    <select class="selectpicker select-w" name="agents[]" multiple data-live-search="true" required>
                                        <option value="">Select Agents</option>
                                        <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <?php endif; ?>
                            </div>



                            <div class="form-group col-lg-6 ">
                                <label>Payit123 Share<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="payit123share" value="<?php echo e($client_details->payit123share); ?>" placeholder="Payit123 Share" required />
                                </div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Transaction Fee<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="number" step="0.01" class="form-control" name="transaction_fee" value="<?php echo e($client_details->transaction_fee); ?>" placeholder="Transaction Fee" required />
                                </div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Merchant ID</label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="marchant_id" placeholder="Merchant ID" value="<?php echo e($user->marchant_id); ?>" />
                                </div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Payment Gateway</label>
                                <select class="selectpicker select-w mb-2" name="payment_gateway_id[]" multiple data-live-search="true">

                                    <option value="">Select Select Payment Gateway</option>
                                    <?php $__currentLoopData = $payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($client_payment_ids): ?>
                                    <?php if($client_payment_ids && in_array($value->id, $client_payment_ids)): ?>
                                    <option value="<?php echo e($value->id); ?>" selected><?php echo e($value->payment_gateway); ?> (<?php echo e($value->doman_name); ?>)</option>
                                    <?php else: ?>
                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->payment_gateway); ?> (<?php echo e($value->doman_name); ?>)</option>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->payment_gateway); ?> (<?php echo e($value->doman_name); ?>)</option>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Amount Limit</label>
                                <div class="input-group mb-2">
                                    <input type="number" class="form-control" name="amount_limit" value="<?php echo e($client_details->amount_limit); ?>" placeholder="Amount Limit" />
                                </div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Card Limit</label>
                                <div class="input-group mb-2">
                                    <input type="number" class="form-control" name="card_limit" value="<?php echo e($client_details->card_limit); ?>" placeholder="Card Limit" />
                                </div>
                            </div>

                            <div class="form-check form-switch col-lg-6" style="margin-left: 1%;">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Merchant Active</label>
                                <?php if($user->merchant_active=='1'): ?>
                                <input class="form-check-input" name="merchant_active" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                <?php else: ?>
                                <input class="form-check-input" name="merchant_active" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                                <?php endif; ?>
                            </div>


                        </div>

                        <div class="text-center" style="margin-top:20px">

                            <button type="submit" class="btn btn-success">Update</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
    $('.selectpicker').selectpicker();
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelCRM\resources\views/adminclients/edit.blade.php ENDPATH**/ ?>