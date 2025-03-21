



<?php $__env->startSection('title'); ?>

<?php echo app('translator')->get('Weekly Reports'); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('css'); ?>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- select2 css -->

<link href="<?php echo e(URL::asset('build/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<!-- bootstrap-datepicker css -->

<link href="<?php echo e(URL::asset('build/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet">



<!-- DataTables -->

<link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />

<!-- Animate CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<!-- Responsive datatable examples -->

<link href="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet"

    type="text/css" />

<style type="text/css">
    .card1 {
        background-color: #FFFDEC !important;
    }

    .card2 {
        background-color: #E2F1E7 !important;
    }
</style>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>

<?php $__env->slot('li_1'); ?>

Reports

<?php $__env->endSlot(); ?>

<?php $__env->slot('title'); ?>

Weekly Reports

<?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>



<div class="row">

    <div class="col-lg-12">

        <div class="card card1">

            <div class="card-body">

                <h4 class="card-title mb-3">Weekly Report Generation - Individual Client</h4>

                <form action="<?php echo e(route('exportDataSingle')); ?>" method="get">
                    <input type="hidden" name="regenerationToken" value="">
                    <div class="row">

                        <div class="col-lg-3">

                            <label>Merchant</label>

                            <select name="clientName" class="form-control" required>
                                <option value="">
                                    Select Client
                                </option>
                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($client->name); ?>">
                                    <?php echo e(strtoupper($client->name)); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        </div>

                        <div class="col-lg-3">

                            <label>From Date</label>
                            <input type="date" name="orderdatefrom" class="form-control from_date" required>

                        </div>

                        <div class="col-lg-3">

                            <label>To Date</label>
                            <input type="date" name="orderdateto" class="form-control to_date" required>

                        </div>

                        <div class="col-lg-3 mt-4">
                            <button type="submit" class="btn btn-success">Generate</button>
                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <!--<div class="col-lg-12">-->

    <!--    <div class="card card2">-->

    <!--        <div class="card-body">-->

    <!--            <form action="<?php echo e(route('exportData')); ?>" method="get">-->
    <!--                <input type="hidden" name="regenerationToken" value="">-->
    <!--                <div class="row">-->

                        
    <!--                    <div class="col-md-12">-->
                            <!-- Button trigger modal -->
    <!--                        <h4 class="card-title d-inline">Manual Weekly Report Generation - Whole Clients :   </h4>-->
    <!--                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">-->
    <!--                             Generate-->
    <!--                        </button>-->

                            <!-- Modal -->
    <!--                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
    <!--                            <div class="modal-dialog" role="document">-->
    <!--                                <div class="modal-content">-->
    <!--                                    <div class="modal-header">-->
    <!--                                        <h5 class="modal-title" id="exampleModalLabel">Weekly Report Generation</h5>-->
    <!--                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
    <!--                                            <span aria-hidden="true">&times;</span>-->
    <!--                                        </button>-->
    <!--                                    </div>-->
    <!--                                    <div class="modal-body">-->
    <!--                                        Are you sure to generate ?-->
    <!--                                        <span class="text-danger">(It will override the current reports)</span>-->
    <!--                                    </div>-->
    <!--                                    <div class="modal-footer">-->
    <!--                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
    <!--                                        <button type="submit" class="btn btn-success">Generate</button>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                </div>-->

    <!--            </form>-->

    <!--        </div>-->

    <!--    </div>-->

    <!--</div>-->

    <div class="col-lg-12">

        <div class="card card3">

            <div class="card-body">

                <h4 class="card-title mb-3">Weekly Reports</h4>

                <table class="table table-striped mt-5">
                    <thead>
                        <tr>
                             <th scope="col">CLIENT</th>
                            <th scope="col">START DATE</th>
                            <th scope="col">END DATE</th>
                            <th scope="col">WEEKLY REPORT</th>
                            <th scope="col">Current Payout Balance</th>
                            <th scope="col">Net Payout Balance</th>
                            <th scope="col">STATUS</th>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('WeeklyReports.Download')): ?>
                                <th scope="col">APPROVE</th>
                                <th scope="col">REGENERATE</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($report->filePath !== null): ?>
                        <tr>
                            <td><?php echo e(strtoupper(substr($report->clientName,11))); ?></td>
                            <td><?php echo e($report->startDate); ?></td>
                            <td><?php echo e($report->endDate); ?></td>                            
                            <td>
                               <?php if($report->status == 1 || auth()->user()->can('WeeklyReports.Download')): ?>
                                    <a type="button" class="btn btn-sm btn-primary" href="<?php echo e(url($report->filePath)); ?>" target="_blank">Download <i class="bi bi-download"></i></a>
                                <?php else: ?>                                    
                                    <a type="button" class="btn btn-sm btn-secondary disabled">Pending<i class="bi bi-download"></i></a>
                                <?php endif; ?>
                            </td>                               
                            <td>$<?php echo e(number_format((float) $report->payoutAmt ?? 0, 2)); ?></td>
                            <td>$<?php echo e(number_format(optional($report->clientDetails)->payOutBalance ?? 0, 2)); ?></td>
                            <td>
                                <?php if($report->status == null): ?>
                                <span class="badge bg-primary animate__animated animate__tada animate__slow">New</span>
                                <?php elseif($report->status == 0): ?>
                                <span class="badge bg-success">Rejected</span>
                                <?php elseif($report->status == 1): ?>
                                <span class="badge bg-success">Approved</span>
                                <?php endif; ?>
                            </td>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('WeeklyReports.Download')): ?>
                            <td>
                                <?php if($report->status !== 1): ?>
                                <form action="<?php echo e(route('approveReport', $report->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-sm btn-success" target="_blank">Approve <i class="bi bi-check-circle-fill"></i></button>
                                </form>
                                <?php else: ?>
                                <form action="<?php echo e(route('revertApproval', $report->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-sm btn-warning" target="_blank"><i class="bi bi-arrow-left-circle-fill"></i> Revert Approval</button>
                                </form>
                                <?php endif; ?>
                            </td>
                            <td>
                                <form action="<?php echo e(route('exportDataSingle')); ?>" method="get">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="orderdatefrom" value="<?php echo e($report->startDate); ?>">
                                    <input type="hidden" name="orderdateto" value="<?php echo e($report->endDate); ?>">
                                    <input type="hidden" name="clientName" value="<?php echo e($report->clientName); ?>">
                                    <input type="hidden" name="regenrationToken" value="Regeneration">

                                    <?php if($report->status !== 1): ?>
                                    <button type="submit" class="btn btn-sm btn-info">Regenerate <i class="bi bi-arrow-clockwise"></i></button>
                                    <?php else: ?>
                                    <button type="submit" class="btn btn-sm btn-secondary disabled">Regenerate <i class="bi bi-arrow-clockwise"></i></button>
                                    <?php endif; ?>
                                </form>
                            </td>
                            <?php endif; ?>
                        </tr>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>



            </div>

        </div>

    </div>

</div>

<!-- end row -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelCRM\resources\views/reporting/weeklyreports.blade.php ENDPATH**/ ?>