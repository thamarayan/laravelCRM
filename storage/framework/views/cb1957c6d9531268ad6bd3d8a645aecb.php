<?php $__env->startSection('title'); ?>



<?php echo app('translator')->get('Client Add'); ?>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<style>
    .flot-right {
        float: right;
    }

    .select-w {
        width: 100% !important;
    }

    .dropdown-menu {
        max-height: 200px !important;
    }

    .remove_field {
        width: 20% !important;
    }
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">

<?php $__env->startComponent('components.breadcrumb'); ?>



<?php $__env->slot('li_1'); ?>



Add Merchant



<?php $__env->endSlot(); ?>



<?php $__env->slot('title'); ?>



Add Merchant



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

                                <?php if($agentid): ?>

                                <a href="<?php echo e(route('customer.index',$agentid)); ?>">

                                    <button type="button" class="btn btn-success btn-rounded waves-effect waves-light addContact-modal mb-2"><i

                                            class="mdi mdi-arrow-left me-1"></i> Back</button>

                                </a>

                                <?php else: ?>

                                <a href="<?php echo e(url('/admin/allclients')); ?>">

                                    <button type="button" class="btn btn-success btn-rounded waves-effect waves-light addContact-modal mb-2"><i

                                            class="mdi mdi-arrow-left me-1"></i> Back</button>

                                </a>

                                <?php endif; ?>

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
                    <form autocomplete="off" action="<?php echo e(route('admin.client.store')); ?>" method="Post">

                        <?php echo csrf_field(); ?>

                        <!-- Modal body -->
                        <div class="row">
                            <input type="hidden" name="role" value="<?php echo e($role->id); ?>">
                            <input type="hidden" value="1" name="new_row[]">

                            <?php if($agentid): ?>
                            <input type="hidden" name="registered_by" value="<?php echo e($agentid); ?>">
                            <?php else: ?>
                            <input type="hidden" name="registered_by" value="<?php echo e(Auth::user()->id); ?>">
                            <?php endif; ?>

                            <div class="form-group col-lg-6">
                                <label>Name <small class="text-muted">(The name should be same as it is in the transaction)</small> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" value="" placeholder="Name" required />
                            </div>

                            <div class="form-group col-lg-6 ">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="email" value="" placeholder="Email" required />
                            </div>

                            <div class="form-group col-lg-6 mt-1">
                                <label>Phone <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" name="phone" placeholder="Enter Phone No" maxlength="10" required />
                            </div>

                            <div class="form-group col-lg-6 mt-1">
                                <label>Password<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="password" class="form-control" name="password" value="" placeholder="Enter password" required />
                                </div>
                            </div>

                            <h5 class="mt-1">Commissions</h5>

                            <div class="form-group col-lg-4">
                                <label>Client (Fee) Commission<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="text" step="0.01" class="form-control" name="client_commission" value="" placeholder="Client (Fee) Commission" required />
                                </div>
                            </div>

                            <div class="form-group col-lg-4">
                                <label>Extra Client Fee (PP Friend)</label>
                                <div class="input-group mb-2">
                                    <input type="text" step="0.01" class="form-control" name="extra_client" value="" placeholder="Extra Client (Fee)" />
                                </div>
                            </div>
                            
                            <div class="form-group col-lg-4">
                                <label>Crypto Settlement Fee<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="number" step="0.01" class="form-control" name="crypto_fee" value="" placeholder="Crypto Fee Value" required />
                                </div>
                            </div>

                            <div class="form-group col-lg-3">
                                <label>Chargeback Fee ($)<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="number" class="form-control" name="chargeback_fee" value="" placeholder="Chargeback Value" required />
                                </div>
                            </div>

                            <div class="form-group col-lg-3">
                                <label>Refund Fee ($)<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="number" class="form-control" name="refund_fee" value="" placeholder="Refund Fee Value" required/>
                                </div>
                            </div>

                            <div class="form-group col-lg-3">
                                <label>High Risk Fee ($)<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="number" class="form-control" name="highRisk_fee" value="" placeholder="High Risk Value" required />
                                </div>
                            </div>

                            <div class="form-group col-lg-3">
                                <label>Fraud Warning Fee ($)<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="number" class="form-control" name="fraudWarning_fee" value="" placeholder="Fraud Warning Fee Value" required/>
                                </div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Before Rolling Reserve<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="text" step="0.01" class="form-control" name="before_rolling_reserve" value="" placeholder="Before Rolling Reserve" required />
                                </div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Rolling Reserve<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="text" step="0.01" class="form-control" name="rolling_reserve" value="" placeholder="Rolling Reserve" required />
                                </div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Payable to Client<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="payabletoclient" value="" placeholder="Payable to Client" required />
                                </div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>PSP<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="psp" value="" placeholder="PSP" required />
                                </div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Net After PSP & Client<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="net_after_psp_client" value="" placeholder="Net After PSP & Client" required />
                                </div>
                            </div>

                            <!-- <div class="form-group col-lg-6">
                                <label>PP Friend<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="pp_friend" value="" placeholder="PP Friend" required />
                                </div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Majestic<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="majestic" value="" placeholder="Majestic" required />
                                </div>
                            </div> -->

                            <div class="form-group col-lg-6">
                                <div class="form-group">
                                    <label>Agent<span class="text-danger">*</span></label>
                                    <select class="selectpicker select-w" name="agents[]" multiple data-live-search="true" required>
                                        <option value="">Select Agents</option>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Payit123 Share<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="payit123share" value="" placeholder="Payit123 Share" required />
                                </div>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Transaction Fee<span class="text-danger">*</span></label>
                                <div class="input-group mb-2">
                                    <input type="number" step="0.01" class="form-control" name="transaction_fee" value="" placeholder="Transaction Fee" required />
                                </div>
                            </div>

                            <div class="form-group col-lg-6 d-none">
                                <label>Merchant ID</label>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="marchant_id" value="" placeholder="Merchant ID" />
                                </div>
                            </div>

                            <div class="form-group col-lg-6 d-none">
                                <label>Payment Gateway</label>
                                <select class="selectpicker select-w mb-2" name="payment_gateway_id[]" multiple data-live-search="true">
                                    <option value="">Select Payment Gateway</option>
                                    <?php $__currentLoopData = $payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->payment_gateway); ?> (<?php echo e($value->doman_name); ?>)</option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Card Limit</label>
                                <div class="input-group mb-2">
                                    <input type="number" class="form-control" name="card_limit" value="" placeholder="Card Limit" />
                                </div>
                            </div>

                            <div class="col-lg-6 mb-4 mt-4">
                                <div class="form-check form-switch">
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Merchant Active</label>
                                    <input class="form-check-input" name="merchant_active" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                                </div>
                            </div>

                        </div>

                        <div class="card mt-4">

                            <div class="card-header">
                                <h5 class="card-title">Payment Section</h5>
                            </div>

                            <div class="card-body">

                                <div class="row">

                                    <div class="col-lg-4">

                                        <div class="form-group">

                                            <label>Payment Gateway<span class="text-danger">*</span></label>
                                            <select class="form-control select2 mb-2" name="payment_gateway_id[]" required>
                                                <option value="">Select Payment Gateway</option>
                                                <?php $__currentLoopData = $payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->payment_gateway); ?> (<?php echo e($value->doman_name); ?>)</option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-lg-4">

                                        <div class="form-group">

                                            <label>Is Live<span class="text-danger">*</span></label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="is_live_1" id="is_live_yes" value="Yes" checked>
                                                <label class="form-check-label" for="is_live_yes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="is_live_1" id="is_live_no" value="No">
                                                <label class="form-check-label" for="is_live_no">No</label>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-lg-4">

                                        <div class="form-group">

                                            <label>Request URL<span class="text-danger">*</span></label>
                                            <input type="text" name="request_url[]" class="form-control" placeholder="Enter Request URL" required>

                                        </div>

                                    </div>

                                    <div class="col-lg-4">

                                        <div class="form-group">

                                            <label>Return URL</label>
                                            <input type="text" name="return_url[]" class="form-control" placeholder="Enter Payment Secret" required>

                                        </div>

                                    </div>

                                    <div class="col-lg-4">

                                        <div class="form-group">

                                            <label>Country<span class="text-danger">*</span></label>
                                            <select class="selectpicker select-w" name="country_1[]" multiple data-live-search="true" required>
                                                <option value="">Select Country</option>
                                                <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label>Amount Limit</label>
                                        <div class="input-group mb-2">
                                            <input type="number" class="form-control" name="amount_limit[]" value="" placeholder="Amount Limit" / required>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label>Currency</label>
                                        <select class="form-control" name="currency[]" required>
                                            <option value="">Select Currency</option>
                                            <option value="USD">($) USD</option>
                                            <option value="EURO">(€) EURO</option>
                                            <option value="GBP">(£) GBP</option>
                                            <option value="INR">(₹) INR</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-4 mt-4">

                                        <div class="form-group">

                                            <label>Is Active<span class="text-danger">*</span></label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="is_active_1" id="is_active_enable" value="Enable" checked>
                                                <label class="form-check-label" for="is_active_enable">Enable</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="is_active_1" id="is_active_disable" value="Disable">
                                                <label class="form-check-label" for="is_active_disable">Disable</label>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="input_fields_wrap"></div>

                            </div>

                        </div>



                        <button class="add_field_button btn btn-info" type="button">Add More Payment</button>

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


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
    $('.selectpicker').selectpicker();
</script>

<script>
    $(document).ready(function() {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="row mt-4"><div class="col-lg-4"><input type="hidden" value="' + x + '" name="new_row[]"><div class="form-group"><label>Payment Gateway<span class="text-danger">*</span></label><select class="form-control select2 mb-2" name="payment_gateway_id[]" required><option value="">Select Payment Gateway</option><?php $__currentLoopData = $payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($value->id); ?>"><?php echo e($value->payment_gateway); ?> (<?php echo e($value->doman_name); ?>)</option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div></div><div class="col-lg-4"><div class="form-group"><label>Is Live<span class="text-danger">*</span></label><br><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="is_live_' + x + '" id="is_live_yes' + x + '" value="Yes" checked><label class="form-check-label" for="is_live_yes' + x + '">Yes</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="is_live_' + x + '" id="is_live_no' + x + '" value="No"><label class="form-check-label" for="is_live_no' + x + '">No</label></div></div></div><div class="col-lg-4"><div class="form-group"><label>Request URL<span class="text-danger">*</span></label><input type="text" name="request_url[]" class="form-control" placeholder="Enter Request URL" required></div></div><div class="col-lg-4"><div class="form-group"><label>Return URL</label><input type="text" name="return_url[]" class="form-control" placeholder="Enter Payment Secret" required></div></div><div class="col-lg-4"><div class="form-group"><label>Country<span class="text-danger">*</span></label><select class="selectpicker select-w" name="country_' + x + '[]" multiple data-live-search="true" required><option value="">Select Country</option><?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select></div></div><div class="form-group col-lg-4"><label>Amount Limit</label><div class="input-group mb-2"><input type="number" class="form-control" name="amount_limit[]" value="" placeholder="Amount Limit"/ required></div></div><div class="form-group col-lg-4"><label>Currency</label><select class="form-control" name="currency[]" required><option value="">Select Currency</option><option>($) USD</option><option>(€) EURO</option><option>(£) GBP</option><option>(₹) INR</option></select></div><div class="col-lg-4 mt-4"><div class="form-group"><label>Is Active<span class="text-danger">*</span></label><br><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="is_active_' + x + '" id="is_active_en' + x + '" value="Enable" checked><label class="form-check-label" for="is_active_en' + x + '">Enable</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="is_active_' + x + '" id="is_active_di' + x + '" value="Disable"><label class="form-check-label" for="is_active_di' + x + '">Disable</label></div></div></div><div class="col-lg-4"><button class="remove_field btn btn-info float-right" onclick="removeHere(this)" type="button">Remove</button></div></div>'); //add input box

                setTimeout(function() {

                    $('.currency').selectpicker();
                    $('.selectpicker').selectpicker();

                }, 100);
            }
        });

        // $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
        //     e.preventDefault();
        //     $(this).parent('div').remove();
        //     x--;
        // })
    });
</script>
<script>
    $('.currency').selectpicker();
    $('.selectpicker').selectpicker();
</script>

<script>
    function removeHere(btn) {
        $(btn).closest('.row').remove();
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelCRM\resources\views/adminclients/create.blade.php ENDPATH**/ ?>