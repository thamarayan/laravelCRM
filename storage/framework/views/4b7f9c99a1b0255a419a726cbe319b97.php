


<?php $__env->startSection('title'); ?>

<?php echo app('translator')->get('KYC Requests'); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('css'); ?>

<style>
    .editPage_h3 {
        text-align: center !important;
        text-transform: uppercase;
    }

    .editPage_h3 span {
        color: red !important;
    }

    .statusSpan {
        background-color: yellow !important;
        padding: 5px 10px 3px !important;
        border-radius: 20% !important;
    }

    .docBtn {
        width: 75%;
        align-items: center !important;
        margin: auto !important
    }

    .modalTable {
        text-align: center;
        vertical-align: center;
    }

    .card-img,
    .card-img-top,
    .card-img-bottom {
        width: 10% !important;
    }

    .card-title {
        text-transform: uppercase !important;
        color: blueviolet !important;
    }

    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
        transition: transform 0.5s;
    }

    .docHead {
        padding-left: 15px !important;
        font-weight: bold !important;
    }

    .cardAction {
        margin-right: 15px !important;
    }

    .cardAction1 {
        margin-right: 5px !important;
    }

    .card-footer {
        background-color: rgba(85, 110, 230, .25) !important;
    }

    .stageHead {
        margin-bottom: 0em !important;
        color: blue !important;
    }

    .modal-header {
        background-color: antiquewhite !important;
    }

    .cardTitle {
        border-bottom-left-radius: 0% !important;
        border-bottom-right-radius: 0% !important;
        pointer-events: none;
        text-transform: uppercase !important;
        font-size: larger !important;
        letter-spacing: 3px;
    }

    .preKYChead {
        text-transform: uppercase !important;
        text-align: center !important;
        color: red !important;
    }

    .qaDiv {
        font-size: 1rem !important;
    }

    .line {
        width: 100%;
        height: 1px;
        background-color: lightblue !important;
        border: none;
    }


    @media only screen and (min-width: 960px) {
        .card {
            width: 400px !important;
        }
    }
</style>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- select2 css -->
<link href="<?php echo e(URL::asset('build/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">

<!-- DataTables -->
<link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />

<!-- Animate CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>



<?php $__env->slot('li_1'); ?>



KYC Requests



<?php $__env->endSlot(); ?>



<?php $__env->slot('title'); ?>



KYC Requests



<?php $__env->endSlot(); ?>



<?php echo $__env->renderComponent(); ?>

<!-- <div class="row mb-3">

    <div class="col-sm-4"></div>

    <div class="col-sm-8">

        <div class="text-sm-end">

            <a href="<?php echo e(route('kycrequests.create')); ?>">
                <button type="button" class="btn btn-secondary btn-rounded waves-effect waves-light addContact-modal mb-2"><i class="mdi mdi-plus-box"></i> New KYC Request</button>
            </a>

        </div>

    </div>

</div> -->

<div class="row">
    <?php echo $__env->make('flash_msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="mb-4">
        <h3 class="editPage_h3">KYC Requests Management</span></h3>
    </div>

    <div class="accordion" id="accordionPanelsStayOpenExample">

        <!-- Pre-KYC World Check & Sumsub -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <h5 class="stageHead">STAGE 0 : PRE KYC - WORLD CHECK & SUMSUB</h5>
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show">
                <div class="accordion-body">

                    <!-- New Requests -->

                    <div class="row">
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-lg-12">
                            <div class="row mt-4">
                                <?php if($kycLists): ?>
                                <?php $__currentLoopData = $kycLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($list->status == 'PreKYC' && $list->rejectionFlag !== 1): ?>

                                <div class="col-md-4">
                                    <div class="card-deck">
                                        <div class="card">
                                            <button type="button" class="btn btn-dark position-relative cardTitle">
                                                <?php echo e($list->userName->client_type == 'Legal Entity' ? $list->userName->company_name : $list->userName->first_name . ' ' . $list->userName->last_name); ?>


                                                <?php if($list->status == 'PreKYC'): ?>
                                                <span class="position-absolute top-0 start-100 translate-middle badge bg-danger">
                                                    NEW
                                                </span>
                                                <?php endif; ?>
                                            </button>

                                            <!-- <img class="card-img-top" src="<?php echo e(asset('/images/profile.png')); ?>" alt="Card image cap"> -->
                                            <div class="card-body">
                                                <h5><label>Status : <span class="badge bg-sm bg-primary"><?php echo e($list->status); ?></span></label></h5>
                                                <p class="card-text"><?php echo e($list->userName->email); ?> | <?php echo e($list->userName->website); ?></p>

                                                <table class="table">
                                                    <!-- passport -->
                                                    <tr>
                                                        <td>
                                                            <a href="<?php echo e(url($list->userName->passport)); ?>" role="button" class="btn btn-sm btn-info <?php echo e($list->userName->passport_status === null ? 'animate__animated animate__slow animate__tada animate__repeat-3' : ''); ?>" target="_blank">Passport</a>
                                                            <?php if($list->userName->passport_status === null): ?>
                                                            <small id="textHelp" class="form-text text-muted">N/A</small>
                                                            <?php elseif($list->userName->passport_status === 0): ?>
                                                            <small id="textHelp" class="form-text  text-danger">Rejected</small>
                                                            <?php elseif($list->userName->passport_status === 1): ?>
                                                            <small id="textHelp" class="form-text  text-success">Approved</small>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo e(route('kycrequests.passportApprove', encrypt($list->clientId))); ?>" role="button" class="btn btn-sm btn-success"><i class="bi bi-check"></i></a>
                                                        </td>
                                                        <td>
                                                            <!-- Passport Rejection modal -->
                                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#passportRejectModal<?php echo e($list->id); ?>">
                                                                <i class="bi bi-x-lg"></i>
                                                            </button>

                                                            <!-- Passport Rejection modal -->
                                                            <div class="modal fade" id="passportRejectModal<?php echo e($list->id); ?>" tabindex="-1" aria-labelledby="passportRejectModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Reject Passport?</h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="<?php echo e(route('kycrequests.passportReject', encrypt($list->clientId))); ?>" method="post">
                                                                                <?php echo csrf_field(); ?>
                                                                                <div class="mb-3">
                                                                                    <label for="rejectReason" class="form-label">Rejection Reason</label>
                                                                                    <input type="text" class="form-control" name="rejectReason" id="rejectReason" placeholder="Please state the reason">
                                                                                </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="sumbit" class="btn btn-danger">Reject</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <!-- <a href="<?php echo e(route('kycrequests.passportReject', encrypt($list->clientId))); ?>" role="button" class="btn btn-sm btn-danger"></a> -->
                                                        </td>
                                                        <td>
                                                            <?php if($list->userName->passport_status === 0): ?>
                                                            <?php if($list->userName->passport_mail_sent_status === 0): ?>
                                                            <a href="<?php echo e(route('kycrequests.passportReask', encrypt($list->clientId))); ?>" role="button" class="btn btn-sm btn-danger animate__animated animate__slow animate__tada animate__repeat-3 ">Re-Ask</a>
                                                            <?php else: ?>
                                                            <a href="<?php echo e(route('kycrequests.passportReask', encrypt($list->clientId))); ?>" role="button" class="btn btn-sm btn-secondary">Re-Ask</a>
                                                            <?php endif; ?>
                                                            <?php else: ?>
                                                            <a href="" role="button" class="btn btn-sm btn-secondary disabled">Re-Ask</a>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <h6 style="font-weight:bold !important">Pre-KYC PROCESS</h6>

                                                <?php if($list->userName->passport_status == 1): ?>
                                                <!-- PreKYC Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-primary position-relative <?php echo e($list->userName->prekycclarification_status === 'Response Received' ? 'animate__animated animate__slow animate__flash animate__repeat-3' : ''); ?> " data-bs-toggle="modal" data-bs-target="#preKycModal<?php echo e($list->id); ?>">
                                                    Pre-KYC Process
                                                </button>
                                                <?php else: ?>
                                                <!-- PreKYC Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-secondary disabled" data-bs-toggle="tooltip" data-bs-placement="top" title="Please approve Passport to proceed further">
                                                    Pre-KYC Process
                                                </button>
                                                <?php endif; ?>


                                                <!-- PreKYC Modal -->
                                                <div class="modal fade" id="preKycModal<?php echo e($list->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="preKycModal<?php echo e($list->id); ?>">Pre-KYC Process - <?php echo e($list->userName->client_type == 'Legal Entity' ? $list->userName->company_name : $list->userName->first_name . ' ' . $list->userName->last_name); ?></h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table ">
                                                                    <tr>
                                                                        <td>Process</td>
                                                                        <td>Status</td>
                                                                        <td>Approve</td>
                                                                        <td>Reject</td>
                                                                    </tr>
                                                                    <!-- World Check -->
                                                                    <tr>
                                                                        <td>
                                                                            WORLD CHECK
                                                                        </td>
                                                                        <td>
                                                                            <?php if($list->worldCheck === null): ?>
                                                                            N/A
                                                                            <?php elseif($list->worldCheck == 0): ?>
                                                                            <span style="color: red !important;">Rejected</span>
                                                                            <?php elseif($list->worldCheck == 1): ?>
                                                                            <span style="color: green !important;">Approved</span>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo e(route('kycrequests.worldCheckApprove',encrypt($list->id))); ?>" class="btn btn-sm btn-success cardAction"><i class="bi bi-check"></i></a>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo e(route('kycrequests.worldCheckDecline',encrypt($list->id))); ?>" class="btn btn-sm btn-danger cardAction"><i class="bi bi-x-lg"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                    <!-- SumSub -->
                                                                    <tr>
                                                                        <td>
                                                                            SUMSUB
                                                                        </td>
                                                                        <td>
                                                                            <?php if($list->sumSub === null): ?>
                                                                            N/A
                                                                            <?php elseif($list->sumSub == 0): ?>
                                                                            <span style="color: red !important;">Rejected</span>
                                                                            <?php elseif($list->sumSub == 1): ?>
                                                                            <span style="color: green !important;">Approved</span>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo e(route('kycrequests.sumsubApprove',encrypt($list->id))); ?>" class="btn btn-sm btn-success cardAction"><i class="bi bi-check"></i></a>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo e(route('kycrequests.sumsubDecline',encrypt($list->id))); ?>" class="btn btn-sm btn-danger cardAction"><i class="bi bi-x-lg"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                </table>

                                                                <?php if($list->worldCheck === 0 || $list->sumSub === 0): ?>


                                                                <h5 class="preKYChead mb-3">Additional Clarifications on Pre-KYC from Client</h5>

                                                                <form action="<?php echo e(route('kycrequesets.preKycClarification', $list->id)); ?>" method="post" class="mb-3">
                                                                    <?php echo csrf_field(); ?>
                                                                    <div class="form-group">
                                                                        <label for="clarificationQs">Clarification needs on ?</label>
                                                                        <textarea type="text" class="form-control" id="clarificationQs" style="white-space: pre-wrap;" name="clarificationQs" aria-describedby="qsText" rows="3" placeholder="Clarification needs on ?" required></textarea>
                                                                        <small id="qsText" class="form-text text-muted mt-1">Please specify the clarification we needs from the Client here.</small>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-sm btn-primary mt-2">Add Query</button>
                                                                </form>

                                                                <?php endif; ?>

                                                                <h5 class="preKYChead mb-3">Clarifications & Responses</h5>

                                                                <?php if($prekycqs): ?>
                                                                <div class="mt-3 qaDiv">
                                                                    <?php $__currentLoopData = $prekycqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($qs->kyc_ID == $list->id): ?>
                                                                    <div class="question mt-3 mb-2"><span>Q :</span> <?php echo e($qs->question); ?> <span class="badge <?php echo e($qs->status == 'Open' ? 'bg-danger' : 'bg-success'); ?>"><?php echo e($qs->status); ?></span>

                                                                    </div>
                                                                    <?php if($qs->response !== null): ?>
                                                                    <div class="answer mt-2 mb-2"><span>R :</span> <?php echo e($qs->response); ?></div>
                                                                    <?php else: ?>
                                                                    <div class="answer"><span>R :</span> Yet to receive.</div>
                                                                    <?php endif; ?>
                                                                    <?php endif; ?>
                                                                    <div class="line"></div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                                </div>

                                                                <?php if(($list->worldCheck === 0 || $list->sumSub === 0) && $list->userName->prekycclarification_status == "Query Initiated"): ?>
                                                                <a type="button" href="<?php echo e(route('sendPrekycResponseLink.mail' , encrypt($list->userName->id))); ?>" class="btn btn-sm btn-warning mt-3 animate__animated animate__slow animate__tada animate__repeat-3">Ask for Clarification</a>
                                                                <?php else: ?>
                                                                <a type="button" href="#" class="btn btn-sm btn-secondary disabled mt-3">Ask for Clarification</a>
                                                                <?php endif; ?>


                                                                <?php endif; ?>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <?php if($list->sumSub === 1 && $list->worldCheck === 1 && $list->userName->passport_status == 1): ?>
                                                <!-- Proceed to KYC modal -->
                                                <button type="button" class="btn btn-sm btn-info float-end animate__animated animate__tada animate__repeat-3" data-bs-toggle="modal" data-bs-target="#clientModal_<?php echo e($list->id); ?>">
                                                    Proceed to KYC
                                                </button>
                                                <?php else: ?>
                                                <button type="button" class="btn btn-sm btn-secondary float-end disabled" data-bs-toggle="modal">
                                                    Proceed to KYC
                                                </button>
                                                <?php endif; ?>

                                                <!-- Proceed to KYC Modal -->
                                                <div class="modal fade" id="clientModal_<?php echo e($list->id); ?>" tabindex="-1" aria-labelledby="clientModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="clientModalLabel">Pre KYC - <?php echo e($list->userName->client_type == 'Legal Entity' ? $list->userName->company_name : $list->userName->first_name . ' ' . $list->userName->last_name); ?></h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure to proceed with this Clients' KYC Process?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <a href="<?php echo e(route('kycrequests.preKYCapproval',encrypt($list->id))); ?>" type="button" class="btn btn-success btn-sm">Proceed KYC</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-footer">
                                                <small class="text-muted">Last Updatd at <?php echo e($list->updated_at->todatestring()); ?></small>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger" style="position:absolute; bottom:0; right:0" data-bs-toggle="modal" data-bs-target="#rejectModal<?php echo e($list->id); ?>">
                                                    Reject Client</i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="rejectModal<?php echo e($list->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="rejectLabel">Reject Client - <?php echo e(($list->userName->client_type === 'Legal Entity' ? $list->userName->company_name : $list->userName->first_name . " " . $list->userName->last_name )); ?></h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure to reject the Client?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <a type="button" class="btn btn-danger" href="<?php echo e(route('kycrequests.rejectClient', encrypt($list->id))); ?>">Reject Client</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                        </div>

                                    </div>
                                </div>

                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-1"></div> -->
            </div>
        </div>

        <!-- KYC New / Pending Requests -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <h5 class="stageHead">STAGE 1 : KYC - NEW / PENDING REQUESTS</h5>
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse show">
                <div class="accordion-body">

                    <!-- New / Pending Requests -->

                    <div class="row">
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-lg-12">
                            <div class="row mt-4">
                                <?php if($kycLists): ?>
                                <?php $__currentLoopData = $kycLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(($list->status == 'Pending' || $list->status == 'New' || $list->status == 'newKYCPending') && $list->rejectionFlag !== 1): ?>
                                <?php if($list->sumSub == 1 && $list->worldCheck == 1): ?>
                                <div class="col-md-4">
                                    <div class="card-deck">
                                        <div class="card">
                                            <button type="button" class="btn btn-primary position-relative cardTitle">
                                                <?php echo e($list->userName->client_type == 'Legal Entity' ? $list->userName->company_name : $list->userName->first_name . ' ' . $list->userName->last_name); ?>


                                                <?php if($list->status == 'New'): ?>
                                                <span class="position-absolute top-0 start-100 translate-middle badge bg-danger">
                                                    NEW
                                                </span>
                                                <?php endif; ?>
                                            </button>

                                            <!-- <img class="card-img-top" src="<?php echo e(asset('/images/profile.png')); ?>" alt="Card image cap"> -->
                                            <div class="card-body">
                                                <h5><label>Status : <span class="badge bg-sm bg-primary"><?php echo e($list->status); ?></span></label></h5>
                                                <p class="card-text"><?php echo e($list->userName->email); ?> | <?php echo e($list->userName->website); ?></p>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <h6 class="docHead">Recent Replies</h6>

                                                <li class="list-group-item"><?php echo e($list->comments); ?></li>



                                            </ul>
                                            <div class="card-body">
                                                <h6 style="font-weight:bold !important">KYC PROCESS</h6>


                                                <?php if($list->status == 'New' || $list->status == 'newKYCPending'): ?>
                                                <?php if($list->first_mail_sent == 0): ?>
                                                <a href="<?php echo e(route('NewKYCMail.mail',encrypt($list->id))); ?>" class="btn btn-sm btn-primary cardAction animate__animated animate__slow animate__tada animate__repeat-3">Initiate KYC</a>
                                                <?php else: ?>
                                                <a href="<?php echo e(route('NewKYCMail.mail',encrypt($list->id))); ?>" class="btn btn-sm btn-secondary cardAction">Resend KYC</a>
                                                <?php endif; ?>
                                                <?php else: ?>
                                                <a class="btn btn-sm btn-secondary disabled cardAction">Resend KYC</a>
                                                <?php endif; ?>

                                                <?php if($list->status !== 'newKYCPending' && $list->status !== 'New' ): ?>

                                                <?php if($list->first_mail_sent): ?>
                                                <a href="<?php echo e(route('send.mail',$list->id)); ?>" class="btn btn-sm btn-secondary cardAction">Resend</a>
                                                <?php else: ?>
                                                <a href="<?php echo e(route('send.mail',$list->id)); ?>" class="btn btn-sm btn-danger cardAction  animate__animated animate__slow animate__tada animate__repeat-3">Inform</a>
                                                <?php endif; ?>
                                                <!--<a href="#" class="btn btn-sm btn-secondary disabled cardAction">Inform</a>-->
                                                
                                                
                                                <?php else: ?>
                                                <a href="#" class="btn btn-sm btn-secondary disabled cardAction">Inform</a>
                                                <?php endif; ?>

                                                <!-- <a href="<?php echo e(route('kycrequests.view', encrypt($list->id))); ?>" class="btn btn-sm btn-info cardAction"><i class="bi bi-eye"></i></a> -->

                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">Last Updatd at <?php echo e($list->updated_at->todatestring()); ?></small>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger" style="position:absolute; bottom:0; right:0" data-bs-toggle="modal" data-bs-target="#rejectModal<?php echo e($list->id); ?>">
                                                    Reject Client</i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="rejectModal<?php echo e($list->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="rejectLabel">Reject Client - <?php echo e(($list->userName->client_type === 'Legal Entity' ? $list->userName->company_name : $list->userName->first_name . " " . $list->userName->last_name )); ?></h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure to reject the Client?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <a type="button" class="btn btn-danger" href="<?php echo e(route('kycrequests.rejectClient', encrypt($list->id))); ?>">Reject Client</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Close Request Modal -->


                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-1"></div> -->
            </div>
        </div>

        <!-- KYCs in Review -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <h5 class="stageHead">STAGE 2 : KYC - REQUESTS IN REVIEW</h5>
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse show">
                <div class="accordion-body">

                    <!-- Open Requests -->

                    <div class="row">
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-lg-12">
                            <div class="row mt-4">
                                <?php if($kycLists): ?>
                                <?php $__currentLoopData = $kycLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($list->status == 'Files Received' && $list->rejectionFlag !== 1): ?>

                                <div class="col-md-4">
                                    <div class="card-deck">
                                        <div class="card">
                                            <button type="button" class="btn btn-info position-relative" style="pointer-events: none; text-transform:uppercase !important; font-size:larger !important; letter-spacing: 3px;">
                                                <?php echo e($list->userName->client_type == 'Individual' ? $list->userName->first_name . ' ' . $list->userName->last_name :   $list->userName->company_name); ?>

                                            </button>

                                            <div class="card-body">
                                                <h5><label>Status : <span class="badge bg-sm bg-success"><?php echo e($list->status); ?></span></label></h5>
                                                <p class="card-text"><?php echo e($list->userName->email); ?> | <?php echo e($list->userName->website); ?></p>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <h6 class="docHead">Recent Replies</h6>

                                                <li class="list-group-item"><?php echo e($list->comments); ?></li>



                                            </ul>
                                            <div class="card-body">
                                                <h6 style="font-weight:bold !important">KYC PROCESS</h6>

                                                <a type="button" class="btn btn-sm btn-info cardAction1 <?php echo e($list->status == 'Files Received' ? 'animate__animated animate__tada animate__repeat-3' : ''); ?>" id="docModal" data-bs-toggle="modal" data-bs-target="#docModal<?php echo e($list->id); ?>">
                                                    Documents
                                                </a>

                                                <!-- Check if all the documents are viewed and either approved or rejected -->
                                                <?php if($list->nationalID_status === null || $list->license_status === null || $list->otherID_status === null
                                                || $list->utilityBill_status === null || $list->bankStatement_status === null || $list->leaseAgreement_status === null ||
                                                $list->incorporation_status === null || $list->shareHolding_status === null || $list->coro_status === null || $list->processing_status === null
                                                || $list->refund_status === null): ?>

                                                <a href="#" type="button" class="btn btn-sm btn-secondary disabled cardAction1">Mark Pending</a>

                                                <!-- If all the documents are viewed and all of them are approved -->
                                                <?php elseif($list->nationalID_status === 1 && $list->license_status === 1 && $list->otherID_status === 1 &&
                                                $list->utilityBill_status === 1 && $list->bankStatement_status === 1 && $list->leaseAgreement_status === 1 &&
                                                $list->incorporation_status === 1 && $list->shareHolding_status === 1 && $list->coro_status === 1 && $list->processing_status === 1 &&
                                                $list->refund_status === 1): ?>

                                                <a href="#" type="button cardAction1" class="btn btn-sm btn-secondary disabled">Mark Pending</a>

                                                <!-- If any of the documents are rejected -->

                                                <?php elseif($list->nationalID_status === 0 || $list->license_status === 0 || $list->otherID_status === 0
                                                || $list->utilityBill_status === 0 || $list->bankStatement_status === 0 || $list->leaseAgreement_status === 0 ||
                                                $list->incorporation_status === 0 || $list->shareHolding_status === 0 || $list->coro_status === 0 || $list->processing_status === 0
                                                || $list->refund_status === 0): ?>

                                                <a href="<?php echo e(route('kycrequests.intimateClient', encrypt($list->id) )); ?>" type="button cardAction1" class="btn btn-sm btn-danger animate__animated animate__slow animate__tada animate__repeat-3">Mark Pending</a>

                                                <?php endif; ?>

                                                <?php if($list->nationalID_status === 1 && $list->license_status === 1 && $list->otherID_status === 1 &&
                                                $list->utilityBill_status === 1 && $list->bankStatement_status === 1 && $list->leaseAgreement_status === 1 &&
                                                $list->incorporation_status === 1 && $list->shareHolding_status === 1 && $list->coro_status === 1 && $list->processing_status === 1 &&
                                                $list->refund_status === 1): ?>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-success cardAction1 animate__animated animate__slow animate__tada animate__repeat-3" data-bs-toggle="modal" data-bs-target="#closeRequestModal<?php echo e($list->id); ?>">
                                                    Close Request
                                                </button>
                                                <?php else: ?>
                                                <a href="#" class="btn btn-sm btn-secondary disabled cardAction1">Close Request</a>
                                                <?php endif; ?>

                                                <a href="<?php echo e(route('kycrequests.view', encrypt($list->id))); ?>" class="btn btn-sm btn-info cardAction1"><i class="bi bi-eye"></i></a>

                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">Last Updatd at <?php echo e($list->updated_at->todatestring()); ?></small>

                                                <!-- Reject modal -->
                                                <button type="button" class="btn btn-danger" style="position:absolute; bottom:0; right:0" data-bs-toggle="modal" data-bs-target="#rejectModal<?php echo e($list->id); ?>">
                                                    Reject Client</i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="rejectModal<?php echo e($list->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="rejectLabel">Reject Client - <?php echo e(($list->userName->client_type === 'Legal Entity' ? $list->userName->company_name : $list->userName->first_name . " " . $list->userName->last_name )); ?></h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure to reject the Client?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <a type="button" class="btn btn-danger" href="<?php echo e(route('kycrequests.rejectClient', encrypt($list->id))); ?>">Reject Client</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- Doc Modal -->
                                            <div class="modal docModal fade" id="docModal<?php echo e($list->id); ?>" tabindex="-1" aria-labelledby="docModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" style="max-width: 900px !important;">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Documents of <?php echo e($list->userName->company_name); ?></h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5 style="text-align: center !important;" class="mb-3">Personal ID Documents</h5>
                                                            <table class="table modalTable mb-5">
                                                                <tbody class="justify-content-center">
                                                                    <tr>
                                                                        <td>Documents</td>
                                                                        <td>Issue Date</td>
                                                                        <td>Expiry Date</td>
                                                                        <td>Status</td>
                                                                        <td>Approve</td>
                                                                        <td>Reject</td>
                                                                    </tr>
                                                                    <!-- Passport -->
                                                                    <!-- <tr>
                                                                        <td>
                                                                            <?php if($list->passportt): ?>
                                                                            <a href="<?php echo e(url($list->passportt)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Passport</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Passport</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td><?php echo e($list->passportIssue); ?></td>
                                                                        <td><?php echo e($list->passportExpiry); ?></td>
                                                                        <td>
                                                                            <?php if($list->passportt === NULL && $list->passportt_status === NULL): ?>
                                                                            <h4><span class="badge bg-secondary">Not Uploaded</span></h4>
                                                                            <?php elseif($list->passportt === NULL && $list->passportt_status === 0): ?>
                                                                            <h4><span class="badge bg-secondary">Rejected</span></h4>
                                                                            <?php elseif($list->passportt_status === Null): ?>
                                                                            <h4><span class="badge bg-secondary">New</span></h4>
                                                                            <?php elseif($list->passportt_status === 0): ?>
                                                                            <h4><span class="badge bg-danger">Rejected</span></h4>
                                                                            <?php else: ?> <h4><span class="badge bg-success">Approved</span></h4>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo e(route('kycrequests.docApprove', [encrypt($list->id), 'passportt_status', 'passportt_reason'])); ?>" role="button" class="btn btn-success"><i class="bi bi-check"></i></a>
                                                                        </td>
                                                                        <td>
                                                                            <form action="<?php echo e(route('kycrequests.docReject', encrypt($list->id))); ?>" method="post" style="float: right !important;">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="hidden" name="docName" value="passportt_status">
                                                                                <input type="hidden" name="docReasonName" value="passportt_reason">
                                                                                <input type="text" class="form-control" style="width:80% !important; float:left !important;" name="reason" id="reason" placeholder="Reason"><button role="button" class="btn btn-danger" type="submit"><i class="bi bi-x-lg"></i></button>
                                                                            </form>
                                                                        </td>
                                                                    </tr> -->
                                                                    <!-- National ID Card -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->nationalID): ?>
                                                                            <a href="<?php echo e(url($list->nationalID)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">National ID</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">National ID</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td><?php echo e($list->nationalIDIssue); ?></td>
                                                                        <td><?php echo e($list->nationalIDExpiry); ?></td>
                                                                        <td>
                                                                            <?php if($list->nationalID === NULL && $list->nationalID_status === NULL): ?>
                                                                            <h4><span class="badge bg-secondary">Not Uploaded</span></h4>
                                                                            <?php elseif($list->nationalID === NULL && $list->nationalID_status === 0): ?>
                                                                            <h4><span class="badge bg-secondary">Rejected</span></h4>
                                                                            <?php elseif($list->nationalID_status === Null): ?>
                                                                            <h4><span class="badge bg-secondary">New</span></h4>
                                                                            <?php elseif($list->nationalID_status === 0): ?>
                                                                            <h4><span class="badge bg-danger">Rejected</span></h4>
                                                                            <?php else: ?> <h4><span class="badge bg-success">Approved</span></h4>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo e(route('kycrequests.docApprove',[encrypt($list->id), 'nationalID_status', 'nationalID_reason'])); ?>" role="button" class="btn btn-success"><i class="bi bi-check"></i></a>
                                                                        </td>
                                                                        <td>
                                                                            <form action="<?php echo e(route('kycrequests.docReject', encrypt($list->id))); ?>" method="post" style="float: right !important;">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="hidden" name="docName" value="nationalID_status">
                                                                                <input type="hidden" name="docReasonName" value="nationalID_reason">
                                                                                <input type="text" class="form-control" style="width:80% !important; float:left !important;" name="reason" id="reason" placeholder="Reason" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Please mention the reason')"><button role="button" class="btn btn-danger" type="submit"><i class="bi bi-x-lg"></i></button>
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                    <!-- Driving License -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->license): ?>
                                                                            <a href="<?php echo e(url($list->license)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Driving License</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Driving License</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td><?php echo e($list->licenseIssue); ?></td>
                                                                        <td><?php echo e($list->licenseExpiry); ?></td>
                                                                        <td>
                                                                            <?php if($list->license === NULL && $list->license_status === NULL): ?>
                                                                            <h4><span class="badge bg-secondary">Not Uploaded</span></h4>
                                                                            <?php elseif($list->license === NULL && $list->license_status === 0): ?>
                                                                            <h4><span class="badge bg-secondary">Rejected</span></h4>
                                                                            <?php elseif($list->license_status === Null): ?>
                                                                            <h4><span class="badge bg-secondary">New</span></h4>
                                                                            <?php elseif($list->license_status === 0): ?>
                                                                            <h4><span class="badge bg-danger">Rejected</span></h4>
                                                                            <?php else: ?> <h4><span class="badge bg-success">Approved</span></h4>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo e(route('kycrequests.docApprove', [encrypt($list->id), 'license_status', 'license_reason'])); ?>" role="button" class="btn btn-success"><i class="bi bi-check"></i></a>
                                                                        </td>
                                                                        <td>
                                                                            <form action="<?php echo e(route('kycrequests.docReject', encrypt($list->id))); ?>" method="post" style="float: right !important;">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="hidden" name="docName" value="license_status">
                                                                                <input type="hidden" name="docReasonName" value="license_reason">
                                                                                <input type="text" class="form-control" style="width:80% !important; float:left !important;" name="reason" id="reason" placeholder="Reason" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Please mention the reason')"><button role="button" class="btn btn-danger" type="submit"><i class="bi bi-x-lg"></i></button>
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                    <!-- Other IDs -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->otherID): ?>
                                                                            <a href="<?php echo e(url($list->otherID)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Other IDs</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Other IDs</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>-</td>
                                                                        <td>-</td>
                                                                        <td>
                                                                            <?php if($list->otherID === NULL && $list->otherID_status === NULL): ?>
                                                                            <h4><span class="badge bg-secondary">Not Uploaded</span></h4>
                                                                            <?php elseif($list->otherID === NULL && $list->otherID_status === 0): ?>
                                                                            <h4><span class="badge bg-secondary">Rejected</span></h4>
                                                                            <?php elseif($list->otherID_status === Null): ?>
                                                                            <h4><span class="badge bg-secondary">New</span></h4>
                                                                            <?php elseif($list->otherID_status === 0): ?>
                                                                            <h4><span class="badge bg-danger">Rejected</span></h4>
                                                                            <?php else: ?> <h4><span class="badge bg-success">Approved</span></h4>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo e(route('kycrequests.docApprove', [encrypt($list->id), 'otherID_status', 'otherID_reason'])); ?>" role="button" class="btn btn-success"><i class="bi bi-check"></i></a>
                                                                        </td>
                                                                        <td>
                                                                            <form action="<?php echo e(route('kycrequests.docReject', encrypt($list->id))); ?>" method="post" style="float: right !important;">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="hidden" name="docName" value="otherID_status">
                                                                                <input type="hidden" name="docReasonName" value="otherID_reason">
                                                                                <input type="text" class="form-control" style="width:80% !important; float:left !important;" name="reason" id="reason" placeholder="Reason" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Please mention the reason')"><button role="button" class="btn btn-danger" type="submit"><i class="bi bi-x-lg"></i></button>
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                    <!-- Utility Bill -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->utilityBill): ?>
                                                                            <a href="<?php echo e(url($list->utilityBill)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Utility Bill</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Utility Bill</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td><?php echo e($list->utilityBillIssue); ?></td>
                                                                        <td>-</td>
                                                                        <td>
                                                                            <?php if($list->utilityBill === NULL && $list->utilityBill_status === NULL): ?>
                                                                            <h4><span class="badge bg-secondary">Not Uploaded</span></h4>
                                                                            <?php elseif($list->utilityBill === NULL && $list->utilityBill_status === 0): ?>
                                                                            <h4><span class="badge bg-secondary">Rejected</span></h4>
                                                                            <?php elseif($list->utilityBill_status === Null): ?>
                                                                            <h4><span class="badge bg-secondary">New</span></h4>
                                                                            <?php elseif($list->utilityBill_status === 0): ?>
                                                                            <h4><span class="badge bg-danger">Rejected</span></h4>
                                                                            <?php else: ?> <h4><span class="badge bg-success">Approved</span></h4>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo e(route('kycrequests.docApprove',[encrypt($list->id), 'utilityBill_status', 'utilityBill_reason'])); ?>" role="button" class="btn btn-success"><i class="bi bi-check"></i></a>
                                                                        </td>
                                                                        <td>
                                                                            <form action="<?php echo e(route('kycrequests.docReject', encrypt($list->id))); ?>" method="post" style="float: right !important;">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="hidden" name="docName" value="utilityBill_status">
                                                                                <input type="hidden" name="docReasonName" value="utilityBill_reason">
                                                                                <input type="text" class="form-control" style="width:80% !important; float:left !important;" name="reason" id="reason" placeholder="Reason" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Please mention the reason')"><button role="button" class="btn btn-danger" type="submit"><i class="bi bi-x-lg"></i></button>
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                    <!-- Bank Statement -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->bankStatement): ?>
                                                                            <a href="<?php echo e(url($list->bankStatement)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Bank Statement</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Bank Statement</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td><?php echo e($list->bankStatementIssue); ?></td>
                                                                        <td>-</td>
                                                                        <td>
                                                                            <?php if($list->bankStatement === NULL && $list->bankStatement_status === NULL): ?>
                                                                            <h4><span class="badge bg-secondary">Not Uploaded</span></h4>
                                                                            <?php elseif($list->bankStatement === NULL && $list->bankStatement_status === 0): ?>
                                                                            <h4><span class="badge bg-secondary">Rejected</span></h4>
                                                                            <?php elseif($list->bankStatement_status === Null): ?>
                                                                            <h4><span class="badge bg-secondary">New</span></h4>
                                                                            <?php elseif($list->bankStatement_status === 0): ?>
                                                                            <h4><span class="badge bg-danger">Rejected</span></h4>
                                                                            <?php else: ?> <h4><span class="badge bg-success">Approved</span></h4>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo e(route('kycrequests.docApprove', [encrypt($list->id), 'bankStatement_status', 'bankStatement_reason'])); ?>" role="button" class="btn btn-success"><i class="bi bi-check"></i></a>
                                                                        </td>
                                                                        <td>
                                                                            <form action="<?php echo e(route('kycrequests.docReject', encrypt($list->id))); ?>" method="post" style="float: right !important;">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="hidden" name="docName" value="bankStatement_status">
                                                                                <input type="hidden" name="docReasonName" value="bankStatement_reason">
                                                                                <input type="text" class="form-control" style="width:80% !important; float:left !important;" name="reason" id="reason" placeholder="Reason" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Please mention the reason')"><button role="button" class="btn btn-danger" type="submit"><i class="bi bi-x-lg"></i></button>
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                    <!-- Lease Agreement -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->leaseAgreement): ?>
                                                                            <a href="<?php echo e(url($list->leaseAgreement)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Lease Agreement</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Lease Agreement</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td><?php echo e($list->leaseAgreementIssue); ?></td>
                                                                        <td>-</td>
                                                                        <td>
                                                                            <?php if($list->leaseAgreement === NULL && $list->leaseAgreement_status === NULL): ?>
                                                                            <h4><span class="badge bg-secondary">Not Uploaded</span></h4>
                                                                            <?php elseif($list->leaseAgreement === NULL && $list->leaseAgreement_status === 0): ?>
                                                                            <h4><span class="badge bg-secondary">Rejected</span></h4>
                                                                            <?php elseif($list->leaseAgreement_status === Null): ?>
                                                                            <h4><span class="badge bg-secondary">New</span></h4>
                                                                            <?php elseif($list->leaseAgreement_status === 0): ?>
                                                                            <h4><span class="badge bg-danger">Rejected</span></h4>
                                                                            <?php else: ?> <h4><span class="badge bg-success">Approved</span></h4>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo e(route('kycrequests.docApprove', [encrypt($list->id), 'leaseAgreement_status', 'leaseAgreement_reason'])); ?>" role="button" class="btn btn-success"><i class="bi bi-check"></i></a>
                                                                        </td>
                                                                        <td>
                                                                            <form action="<?php echo e(route('kycrequests.docReject', encrypt($list->id))); ?>" method="post" style="float: right !important;">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="hidden" name="docName" value="leaseAgreement_status">
                                                                                <input type="hidden" name="docReasonName" value="leaseAgreement_reason">
                                                                                <input type="text" class="form-control" style="width:80% !important; float:left !important;" name="reason" id="reason" placeholder="Reason" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Please mention the reason')"><button role="button" class="btn btn-danger" type="submit"><i class="bi bi-x-lg"></i></button>
                                                                            </form>
                                                                        </td>
                                                                    </tr>


                                                                </tbody>
                                                            </table>

                                                            <h5 style="text-align: center !important;" class="mb-3">Company Documents</h5>
                                                            <table class="table modalTable">
                                                                <tbody class="justify-content-center">
                                                                    <tr>
                                                                        <td>Documents</td>
                                                                        <td>Status</td>
                                                                        <td>Approve/Reject</td>
                                                                        <td>Reason</td>
                                                                    </tr>
                                                                    <!-- Certificate of Incorporation -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->incorporation): ?>
                                                                            <a href="<?php echo e(url($list->incorporation)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Certificate of Incorporation</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Certificate of Incorporation</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if($list->incorporation === NULL && $list->incorporation_status === NULL): ?>
                                                                            <h4><span class="badge bg-secondary">Not Uploaded</span></h4>
                                                                            <?php elseif($list->incorporation === NULL && $list->incorporation_status === 0): ?>
                                                                            <h4><span class="badge bg-secondary">Rejected</span></h4>
                                                                            <?php elseif($list->incorporation_status === Null): ?>
                                                                            <h4><span class="badge bg-secondary">New</span></h4>
                                                                            <?php elseif($list->incorporation_status === 0): ?>
                                                                            <h4><span class="badge bg-danger">Rejected</span></h4>
                                                                            <?php else: ?> <h4><span class="badge bg-success">Approved</span></h4>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo e(route('kycrequests.docApprove', [encrypt($list->id), 'incorporation_status', 'incorporation_reason'])); ?>" role="button" class="btn btn-success"><i class="bi bi-check"></i></a>
                                                                        </td>
                                                                        <td>
                                                                            <form action="<?php echo e(route('kycrequests.docReject', encrypt($list->id))); ?>" method="post" style="float: right !important;">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="hidden" name="docName" value="incorporation_status">
                                                                                <input type="hidden" name="docReasonName" value="incorporation_reason">
                                                                                <input type="text" class="form-control" style="width:80% !important; float:left !important;" name="reason" id="reason" placeholder="Reason" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Please mention the reason')"><button role="button" class="btn btn-danger" type="submit"><i class="bi bi-x-lg"></i></button>
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                    <!-- ShareHolding -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->shareHolding): ?>
                                                                            <a href="<?php echo e(url($list->shareHolding)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Certificate of Share Holding</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Certificate of Share Holding</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if($list->shareHolding === NULL && $list->shareHolding_status === NULL): ?>
                                                                            <h4><span class="badge bg-secondary">Not Uploaded</span></h4>
                                                                            <?php elseif($list->shareHolding === NULL && $list->cosh_status === 0): ?>
                                                                            <h4><span class="badge bg-secondary">Rejected</span></h4>
                                                                            <?php elseif($list->shareHolding_status === Null): ?>
                                                                            <h4><span class="badge bg-secondary">New</span></h4>
                                                                            <?php elseif($list->shareHolding_status === 0): ?>
                                                                            <h4><span class="badge bg-danger">Rejected</span></h4>
                                                                            <?php else: ?> <h4><span class="badge bg-success">Approved</span></h4>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo e(route('kycrequests.docApprove', [encrypt($list->id), 'shareHolding_status', 'shareHolding_reason'])); ?>" role="button" class="btn btn-success"><i class="bi bi-check"></i></a>
                                                                        </td>
                                                                        <td>
                                                                            <form action="<?php echo e(route('kycrequests.docReject', encrypt($list->id))); ?>" method="post" style="float: right !important;">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="hidden" name="docName" value="shareHolding_status">
                                                                                <input type="hidden" name="docReasonName" value="shareHolding_reason">
                                                                                <input type="text" class="form-control" style="width:80% !important; float:left !important;" name="reason" id="reason" placeholder="Reason" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Please mention the reason')"><button role="button" class="btn btn-danger" type="submit"><i class="bi bi-x-lg"></i></button>
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                    <!-- CORO -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->coro): ?>
                                                                            <a href="<?php echo e(url($list->coro)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Certificate of Registered Office</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Certificate of Registered Office</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if($list->coro === NULL && $list->coro_status === NULL): ?>
                                                                            <h4><span class="badge bg-secondary">Not Uploaded</span></h4>
                                                                            <?php elseif($list->coro === NULL && $list->coro_status === 0): ?>
                                                                            <h4><span class="badge bg-secondary">Rejected</span></h4>
                                                                            <?php elseif($list->coro_status === Null): ?>
                                                                            <h4><span class="badge bg-secondary">New</span></h4>
                                                                            <?php elseif($list->coro_status === 0): ?>
                                                                            <h4><span class="badge bg-danger">Rejected</span></h4>
                                                                            <?php else: ?> <h4><span class="badge bg-success">Approved</span></h4>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo e(route('kycrequests.docApprove', [encrypt($list->id), 'coro_status', 'coro_reason'])); ?>" role="button" class="btn btn-success"><i class="bi bi-check"></i></a>
                                                                        </td>
                                                                        <td>
                                                                            <form action="<?php echo e(route('kycrequests.docReject', encrypt($list->id))); ?>" method="post" style="float: right !important;">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="hidden" name="docName" value="coro_status">
                                                                                <input type="hidden" name="docReasonName" value="coro_reason">
                                                                                <input type="text" class="form-control" style="width:80% !important; float:left !important;" name="reason" id="reason" placeholder="Reason" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Please mention the reason')"><button role="button" class="btn btn-danger" type="submit"><i class="bi bi-x-lg"></i></button>
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                    <!-- 6 Months Processing History -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->processing): ?>
                                                                            <a href="<?php echo e(url($list->processing)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Six Month Processing History</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Six Month Processing History</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if($list->processing === NULL && $list->processing_status === NULL): ?>
                                                                            <h4><span class="badge bg-secondary">Not Uploaded</span></h4>
                                                                            <?php elseif($list->processing === NULL && $list->processing_status === 0): ?>
                                                                            <h4><span class="badge bg-secondary">Rejected</span></h4>
                                                                            <?php elseif($list->processing_status === Null): ?>
                                                                            <h4><span class="badge bg-secondary">New</span></h4>
                                                                            <?php elseif($list->processing_status === 0): ?>
                                                                            <h4><span class="badge bg-danger">Rejected</span></h4>
                                                                            <?php else: ?> <h4><span class="badge bg-success">Approved</span></h4>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo e(route('kycrequests.docApprove', [encrypt($list->id), 'processing_status', 'processing_reason'])); ?>" role="button" class="btn btn-success"><i class="bi bi-check"></i></a>
                                                                        </td>
                                                                        <td>
                                                                            <form action="<?php echo e(route('kycrequests.docReject', encrypt($list->id))); ?>" method="post" style="float: right !important;">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="hidden" name="docName" value="processing_status">
                                                                                <input type="hidden" name="docReasonName" value="processing_reason">
                                                                                <input type="text" class="form-control" style="width:80% !important; float:left !important;" name="reason" id="reason" placeholder="Reason" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Please mention the reason')"><button role="button" class="btn btn-danger" type="submit"><i class="bi bi-x-lg"></i></button>
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                    <!-- 6 Months Refund History -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->refund): ?>
                                                                            <a href="<?php echo e(url($list->refund)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Six Month Refund History</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Six Month Refund History</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if($list->refund === NULL && $list->refund_status === NULL): ?>
                                                                            <h4><span class="badge bg-secondary">Not Uploaded</span></h4>
                                                                            <?php elseif($list->refund === NULL && $list->refund_status === 0): ?>
                                                                            <h4><span class="badge bg-secondary">Rejected</span></h4>
                                                                            <?php elseif($list->refund_status === Null): ?>
                                                                            <h4><span class="badge bg-secondary">New</span></h4>
                                                                            <?php elseif($list->refund_status === 0): ?>
                                                                            <h4><span class="badge bg-danger">Rejected</span></h4>
                                                                            <?php else: ?> <h4><span class="badge bg-success">Approved</span></h4>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="<?php echo e(route('kycrequests.docApprove', [encrypt($list->id), 'refund_status', 'refund_reason'])); ?>" role="button" class="btn btn-success"><i class="bi bi-check"></i></a>
                                                                        </td>
                                                                        <td>
                                                                            <form action="<?php echo e(route('kycrequests.docReject', encrypt($list->id))); ?>" method="post" style="float: right !important;">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="hidden" name="docName" value="refund_status">
                                                                                <input type="hidden" name="docReasonName" value="refund_reason">
                                                                                <input type="text" class="form-control" style="width:80% !important; float:left !important;" name="reason" id="reason" placeholder="Reason" required oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Please mention the reason')"><button role="button" class="btn btn-danger" type="submit"><i class="bi bi-x-lg"></i></button>
                                                                            </form>
                                                                        </td>
                                                                    </tr>


                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Close Modal -->

                                            <div class="modal fade" id="closeRequestModal<?php echo e($list->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="closeRequestModal<?php echo e($list->id); ?>">Close Request</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            All files received ? Are you sure to close this request ? <br>
                                                            If so, please mention if the Client comes with High Risk Level or not.
                                                            <a href="<?php echo e(route('kycrequests.closeWithLowRisk',$list->id)); ?>" class="btn btn-success mt-3">Mark Low/Medium RisK & Close Request</a>
                                                            <a href="<?php echo e(route('kycrequests.closeWithHighRisk',$list->id)); ?>" class="btn btn-danger mt-3">Mark High RisK & Close Request</a>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-1"></div> -->
            </div>
        </div>

        <!-- KYC Risk Assesment -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                    <h5 class="stageHead">STAGE 3 : KYC - RISK ASSESSMENT</h5>
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse show">
                <div class="accordion-body">

                    <div class="row">
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-lg-12">

                            <div class="row mt-4">
                                <!-- <div class="col-md-12"> -->
                                <?php if($kycLists): ?>
                                <?php $__currentLoopData = $kycLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($list->rejectionFlag !== 1): ?>
                                <?php if($list->status == 'Closed' && $list->riskFactor == 1 || $list->status == 'EDD Completed' || $list->status == 'EDD Approved' || $list->status == 'EDD Queries Raised' || $list->status == 'EDD Response Received' && $list->riskFactor == 1): ?>

                                <div class="col-md-4">
                                    <div class="card-deck">
                                        <div class="card">
                                            <button type="button" class="btn btn-danger position-relative" style="pointer-events: none; text-transform:uppercase !important; font-size:larger !important; letter-spacing: 3px;">
                                                <?php echo e($list->userName->client_type == "Individual" ?  $list->userName->first_name . ' ' . $list->userName->last_name : $list->userName->company_name); ?>

                                            </button>
                                            <div class="card-body">
                                                <h5><label>Status : <span class="badge bg-sm bg-success"><?php echo e(($list->status == 'Closed') ? 'Docs Verified' : $list->status); ?></span></label></h5>
                                                <p class="card-text"><?php echo e($list->userName->email); ?> | <?php echo e($list->userName->website); ?></p>

                                                <a type="button" class="btn btn-sm btn-secondary cardAction mb-3" href="<?php echo e(route('kycrequests.riskFactorToggle',encrypt($list->id))); ?>">Revert High Risk?</a>

                                                <?php if($list->status !== 'EDD Completed' && $list->status !== 'EDD Response Received'): ?>

                                                <?php if($list->first_mail_sent == 0): ?>
                                                <a type="button" class="btn btn-sm btn-warning cardAction mb-3 animate__animated animate__slow animate__tada animate__repeat-3" href="<?php echo e(route('SendEDDMail.mail',encrypt($list->id))); ?>">Send EDD Link</a>
                                                <?php elseif($list->first_mail_sent == 1): ?>
                                                <a type="button" class="btn btn-sm btn-secondary cardAction mb-3" href="<?php echo e(route('SendEDDMail.mail',encrypt($list->id))); ?>">Resend EDD Link</a>
                                                <?php endif; ?>

                                                <?php else: ?>
                                                <a type="button" class="btn btn-sm btn-secondary cardAction mb-3 disabled">Resend EDD Link</a>
                                                <?php endif; ?>

                                                <?php if($list->status === 'EDD Completed' || $list->status === 'EDD Response Received'): ?>
                                                <a type="button" class="btn btn-sm btn-warning cardAction mb-3 animate__animated animate__slow animate__tada animate__repeat-3" href="<?php echo e(route('kycrequests.viewEDD',encrypt($list->id))); ?>">View EDD Reply</a>
                                                <?php elseif($list->status === 'EDD Queries Raised'): ?>
                                                <a type="button" class="btn btn-sm btn-warning cardAction mb-3" href="<?php echo e(route('kycrequests.viewEDD',encrypt($list->id))); ?>">View EDD Reply</a>
                                                <?php endif; ?>

                                                <?php if($list->status === 'EDD Approved'): ?>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-success cardAction mb-3  animate__animated animate__slow animate__tada animate__repeat-3" data-bs-toggle="modal" data-bs-target="#riskApproveModal<?php echo e($list->id); ?>">
                                                    Approve Risk?
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="riskApproveModal<?php echo e($list->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Approve Risk - <?php echo e($list->client_type == "Individual" ?  $list->userName->first_name . ' ' . $list->userName->last_name : $list->userName->company_name); ?></h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure to approve the risk of this Client?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <a type="button" class="btn btn-sm btn-success" href="<?php echo e(route('kycrequests.riskFactorToggle',encrypt($list->id))); ?>">Approve Risk</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php else: ?>
                                                <a type="button" class="btn btn-sm btn-secondary cardAction mb-3 disabled">Approve Risk</a>
                                                <?php endif; ?>

                                                <a type="button" class="btn btn-sm btn-info cardAction mb-3" data-bs-toggle="modal" data-bs-target="#docModal<?php echo e($list->id); ?>">Documents</a>

                                                <a href="<?php echo e(route('kycrequests.view', encrypt($list->id))); ?>" type="button" class="btn btn-sm btn-info cardAction mb-3"><i class="bi bi-eye"></i></a>
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">Last Updatd at <?php echo e($list->updated_at->todatestring()); ?></small>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger" style="position:absolute; bottom:0; right:0" data-bs-toggle="modal" data-bs-target="#rejectModal<?php echo e($list->id); ?>">
                                                    Reject Client</i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="rejectModal<?php echo e($list->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="rejectLabel">Reject Client - <?php echo e(($list->userName->client_type === 'Legal Entity' ? $list->userName->company_name : $list->userName->first_name . " " . $list->userName->last_name )); ?></h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure to reject the Client?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <a type="button" class="btn btn-danger" href="<?php echo e(route('kycrequests.rejectClient', encrypt($list->id))); ?>">Reject Client</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                            <!-- Doc Modal -->
                                            <div class="modal fade" id="docModal<?php echo e($list->id); ?>" tabindex="-1" aria-labelledby="docModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Documents of <?php echo e($list->userName->company_name); ?></h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body d-flex">
                                                            <table class="table modalTable mb-5">
                                                                <tbody class="justify-content-center">
                                                                    <tr>
                                                                        <td>Documents</td>
                                                                        <td>Issue Date</td>
                                                                        <td>Expiry Date</td>
                                                                    </tr>
                                                                    <!-- Passport -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->userName->passport): ?>
                                                                            <a href="<?php echo e(url($list->userName->passport)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Passport</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Passport</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td><?php echo e($list->passportIssue); ?></td>
                                                                        <td><?php echo e($list->passportExpiry); ?></td>

                                                                    </tr>
                                                                    <!-- National ID Card -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->nationalID): ?>
                                                                            <a href="<?php echo e(url($list->nationalID)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">National ID</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">National ID</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td><?php echo e($list->nationalIDIssue); ?></td>
                                                                        <td><?php echo e($list->nationalIDExpiry); ?></td>

                                                                    </tr>
                                                                    <!-- Driving License -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->license): ?>
                                                                            <a href="<?php echo e(url($list->license)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Driving License</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Driving License</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td><?php echo e($list->licenseIssue); ?></td>
                                                                        <td><?php echo e($list->licenseExpiry); ?></td>

                                                                    </tr>
                                                                    <!-- Other IDs -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->otherID): ?>
                                                                            <a href="<?php echo e(url($list->otherID)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Other IDs</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Other IDs</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>-</td>
                                                                        <td>-</td>

                                                                    </tr>
                                                                    <!-- Utility Bill -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->utilityBill): ?>
                                                                            <a href="<?php echo e(url($list->utilityBill)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Utility Bill</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Utility Bill</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td><?php echo e($list->utilityBillIssue); ?></td>
                                                                        <td>-</td>

                                                                    </tr>
                                                                    <!-- Bank Statement -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->bankStatement): ?>
                                                                            <a href="<?php echo e(url($list->bankStatement)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Bank Statement</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Bank Statement</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td><?php echo e($list->bankStatementIssue); ?></td>
                                                                        <td>-</td>

                                                                    </tr>
                                                                    <!-- Lease Agreement -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->leaseAgreement): ?>
                                                                            <a href="<?php echo e(url($list->leaseAgreement)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Lease Agreement</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Lease Agreement</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td><?php echo e($list->leaseAgreementIssue); ?></td>
                                                                        <td>-</td>



                                                                    </tr>

                                                                    <!-- Certificate of Incorporation -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->incorporation): ?>
                                                                            <a href="<?php echo e(url($list->incorporation)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Certificate of Incorporation</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Certificate of Incorporation</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>-</td>
                                                                        <td>-</td>
                                                                    </tr>

                                                                    <!-- Certificate of Share Holding -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->shareHolding): ?>
                                                                            <a href="<?php echo e(url($list->shareHolding)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Certificate of Share Holding</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Certificate of Share Holding</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>-</td>
                                                                        <td>-</td>
                                                                    </tr>

                                                                    <!-- Certificate of Registered Office -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->coro): ?>
                                                                            <a href="<?php echo e(url($list->coro)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Certificate of Registered Office</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Certificate of Registered Office</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>-</td>
                                                                        <td>-</td>
                                                                    </tr>

                                                                    <!-- 6 Months Processing History -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->processing): ?>
                                                                            <a href="<?php echo e(url($list->processing)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Six Months Processing History</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Six Months Processing History</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>-</td>
                                                                        <td>-</td>
                                                                    </tr>

                                                                    <!-- 6 Months Refund History -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->refund): ?>
                                                                            <a href="<?php echo e(url($list->refund)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Six Months Refund History</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Six Months Refund History</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>-</td>
                                                                        <td>-</td>
                                                                    </tr>


                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Contract Upload Modal -->
                                            <div class="modal fade" id="exampleModal<?php echo e($list->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Contract </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo e(route('sendContract.mail', $list->id)); ?>" method="post" enctype="multipart/form-data">
                                                                <?php echo csrf_field(); ?>
                                                                <div class="mb-3">
                                                                    <label for="formFile" class="form-label">Contract File Upload</label>
                                                                    <input class="form-control" type="file" name="contractFile" id="contractFile" required>
                                                                </div>
                                                                <?php $__errorArgs = ['contractFile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <div class="alertMessage"><?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                <div class="mb-3">
                                                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                                                </div>

                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-danger" style="position:absolute; bottom:0; right:0" data-bs-toggle="modal" data-bs-target="#rejectModal<?php echo e($list->id); ?>">
                                                                Reject Client</i>
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="rejectModal<?php echo e($list->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5" id="rejectLabel">Reject Client - <?php echo e(($list->userName->client_type === 'Legal Entity' ? $list->userName->company_name : $list->userName->first_name . " " . $list->userName->last_name )); ?></h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Are you sure to reject the Client?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <a type="button" class="btn btn-danger" href="<?php echo e(route('kycrequests.rejectClient', encrypt($list->id))); ?>">Reject Client</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Client Approval Modal -->
                                            <div class="modal fade" id="approveModal<?php echo e($list->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Approve Client</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Contracts Signed ? Are you sure to approve the client ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <a href="<?php echo e(route('kycrequests.approve',$list->id)); ?>" class="btn btn-sm btn-success">Approve</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <?php endif; ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <!-- </div> -->
                            </div>
                        </div>
                        <!-- <div class="col-md-1"></div> -->
                    </div>

                </div>
            </div>
        </div>

        <!-- KYC Closed Requests -->
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                    <h5 class="stageHead">STAGE 4 : KYC - CONTRACT SIGNING</h5>
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse show">
                <div class="accordion-body">

                    <div class="row">
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-lg-12">

                            <div class="row mt-4">
                                <!-- <div class="col-md-12"> -->
                                <?php if($kycLists): ?>
                                <?php $__currentLoopData = $kycLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($list->rejectionFlag !== 1): ?>
                                <?php if($list->riskFactor == 0 && ($list->status == 'Closed' || $list->status == 'Approved' || $list->status == 'Signed')): ?>

                                <div class="col-md-4">
                                    <div class="card-deck">
                                        <div class="card">
                                            <button type="button" class="btn btn-success position-relative" style="pointer-events: none; text-transform:uppercase !important; font-size:larger !important; letter-spacing: 3px;">
                                                <?php echo e($list->userName->client_type == 'Legal Entity' ? $list->userName->company_name : $list->userName->first_name . ' ' . $list->userName->last_name); ?>

                                            </button>
                                            <div class="card-body">
                                                <h5><label>Status : <span class="badge bg-sm bg-success"><?php echo e(($list->status == 'Closed') ? 'Docs Verified' : 'Approved'); ?></span></label></h5>
                                                <p class="card-text"><?php echo e($list->userName->email); ?> | <?php echo e($list->userName->website); ?></p>
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <h6 class="docHead">Comments from Clients</h6>
                                                <li class="list-group-item">
                                                    <?php if($list->contract_comment_flag==1): ?>
                                                    <p class="animate__animated animate__slow animate__flash animate__repeat-3"><?php echo e($list->contract_comments); ?></p>
                                                    <?php else: ?>
                                                    <p><?php echo e($list->contract_comments); ?></p>
                                                    <?php endif; ?>

                                                </li>
                                            </ul>
                                            <div class="card-body">



                                                <h6>Action</h6>
                                                <!-- <h6>Actions</h6> -->

                                                <?php if($list->riskFactor == 0 && $list->eddStatus !== 'Verified' && $list->status !== 'Approved'): ?>
                                                <a type="button" class="btn btn-sm btn-danger cardAction mb-3" href="<?php echo e(route('kycrequests.closeWithHighRisk',$list->id)); ?>">High Risk Client?</a>
                                                <?php endif; ?>

                                                <a type="button" class="btn btn-sm btn-info cardAction mb-3" data-bs-toggle="modal" data-bs-target="#docModal<?php echo e($list->id); ?>">
                                                    Documents
                                                </a>


                                                <!-- To Send Contract Document to Client -->
                                                <?php if(!($list->status == 'Signed' || $list->status == 'Approved')): ?>

                                                <?php if($list->contract_status == null): ?>
                                                <button type="button" class="btn btn-sm btn-primary cardAction mb-3 animate__animated animate__slow animate__flash animate__repeat-3" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo e($list->id); ?>">
                                                    Send Contract
                                                </button>
                                                <?php elseif(($list->contract_status == 'Sent')): ?>
                                                <button type="button" class="btn btn-sm btn-secondary cardAction mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo e($list->id); ?>">
                                                    Resend Contract
                                                </button>
                                                <?php endif; ?>

                                                <?php elseif($list->status == 'Approved' || $list->status == 'Signed' ): ?>
                                                <button type="button" class="btn btn-sm btn-secondary disabled cardAction mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo e($list->id); ?>">
                                                    Send Contract
                                                </button>
                                                <?php endif; ?>

                                                <?php if($list->contract): ?>
                                                <a href="<?php echo e(url($list->contract)); ?>" target="_blank" type="button" class="btn btn-sm btn-warning cardAction mb-3">Signed Contract</a>
                                                <?php else: ?>
                                                <a href="#" target="_blank" type="button" class="btn btn-sm btn-secondary disabled cardAction mb-3">Not Yet Signed</a>
                                                <?php endif; ?>

                                                <?php if($list->status == 'Signed'): ?>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-success cardAction mb-3 animate__animated animate__slow animate__tada animate__repeat-3" data-bs-toggle="modal" data-bs-target="#approveModal<?php echo e($list->id); ?>">
                                                    Approve Client
                                                </button>

                                                <?php elseif($list->status == 'Approved'): ?>
                                                <!--<a href="<?php echo e(route('kycrequests.disapprove',$list->id)); ?>" class="btn btn-sm btn-danger cardAction mb-3">Disapprove</a>-->
                                                <?php else: ?>
                                                <a href="#" class="btn btn-sm btn-secondary disabled cardAction mb-3">Approve</a>
                                                <?php endif; ?>

                                                <a href="<?php echo e(route('kycrequests.view', encrypt($list->id))); ?>" class="btn btn-sm btn-info cardAction mb-3"><i class="bi bi-eye"></i></a>
                                            </div>
                                            <div class="card-footer">
                                                <small class="text-muted">Last Updatd at <?php echo e($list->updated_at->todatestring()); ?></small>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger" style="position:absolute; bottom:0; right:0" data-bs-toggle="modal" data-bs-target="#rejectModal<?php echo e($list->id); ?>">
                                                    Reject Client</i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="rejectModal<?php echo e($list->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="rejectLabel">Reject Client - <?php echo e(($list->userName->client_type === 'Legal Entity' ? $list->userName->company_name : $list->userName->first_name . " " . $list->userName->last_name )); ?></h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure to reject the Client?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <a type="button" class="btn btn-danger" href="<?php echo e(route('kycrequests.rejectClient', encrypt($list->id))); ?>">Reject Client</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Doc Modal -->
                                            <div class="modal fade" id="docModal<?php echo e($list->id); ?>" tabindex="-1" aria-labelledby="docModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Documents of <?php echo e($list->userName->company_name); ?></h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body d-flex">
                                                            <table class="table modalTable mb-5">
                                                                <tbody class="justify-content-center">
                                                                    <tr>
                                                                        <td>Documents</td>
                                                                        <td>Issue Date</td>
                                                                        <td>Expiry Date</td>
                                                                    </tr>
                                                                    <!-- Passport -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->userName->passport): ?>
                                                                            <a href="<?php echo e(url($list->userName->passport)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Passport</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Passport</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td></td>
                                                                        <td></td>

                                                                    </tr>
                                                                    <!-- National ID Card -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->nationalID): ?>
                                                                            <a href="<?php echo e(url($list->nationalID)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">National ID</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">National ID</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td><?php echo e($list->nationalIDIssue); ?></td>
                                                                        <td><?php echo e($list->nationalIDExpiry); ?></td>

                                                                    </tr>
                                                                    <!-- Driving License -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->license): ?>
                                                                            <a href="<?php echo e(url($list->license)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Driving License</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Driving License</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td><?php echo e($list->licenseIssue); ?></td>
                                                                        <td><?php echo e($list->licenseExpiry); ?></td>

                                                                    </tr>
                                                                    <!-- Other IDs -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->otherID): ?>
                                                                            <a href="<?php echo e(url($list->otherID)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Other IDs</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Other IDs</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>-</td>
                                                                        <td>-</td>

                                                                    </tr>
                                                                    <!-- Utility Bill -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->utilityBill): ?>
                                                                            <a href="<?php echo e(url($list->utilityBill)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Utility Bill</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Utility Bill</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td><?php echo e($list->utilityBillIssue); ?></td>
                                                                        <td>-</td>

                                                                    </tr>
                                                                    <!-- Bank Statement -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->bankStatement): ?>
                                                                            <a href="<?php echo e(url($list->bankStatement)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Bank Statement</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Bank Statement</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td><?php echo e($list->bankStatementIssue); ?></td>
                                                                        <td>-</td>

                                                                    </tr>
                                                                    <!-- Lease Agreement -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->leaseAgreement): ?>
                                                                            <a href="<?php echo e(url($list->leaseAgreement)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Lease Agreement</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Lease Agreement</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td><?php echo e($list->leaseAgreementIssue); ?></td>
                                                                        <td>-</td>

                                                                    </tr>

                                                                    <!-- Certificate of Incorporation -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->incorporation): ?>
                                                                            <a href="<?php echo e(url($list->incorporation)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Certificate of Incorporation</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Certificate of Incorporation</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>-</td>
                                                                        <td>-</td>
                                                                    </tr>

                                                                    <!-- Certificate of Share Holding -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->shareHolding): ?>
                                                                            <a href="<?php echo e(url($list->shareHolding)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Certificate of Share Holding</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Certificate of Share Holding</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>-</td>
                                                                        <td>-</td>
                                                                    </tr>

                                                                    <!-- Certificate of Registered Office -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->coro): ?>
                                                                            <a href="<?php echo e(url($list->coro)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Certificate of Registered Office</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Certificate of Registered Office</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>-</td>
                                                                        <td>-</td>
                                                                    </tr>

                                                                    <!-- 6 Months Processing History -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->processing): ?>
                                                                            <a href="<?php echo e(url($list->processing)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Six Months Processing History</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Six Months Processing History</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>-</td>
                                                                        <td>-</td>
                                                                    </tr>

                                                                    <!-- 6 Months Refund History -->
                                                                    <tr>
                                                                        <td>
                                                                            <?php if($list->refund): ?>
                                                                            <a href="<?php echo e(url($list->refund)); ?>" target="_blank" type="button" class="btn btn-primary docBtn">Six Months Refund History</a>
                                                                            <?php else: ?>
                                                                            <a href="#" type="button" class="btn disabled docBtn">Six Months Refund History</a>
                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>-</td>
                                                                        <td>-</td>
                                                                    </tr>


                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Contract Upload Modal -->
                                            <div class="modal fade" id="exampleModal<?php echo e($list->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Contract </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo e(route('sendContract.mail', $list->id)); ?>" method="post" enctype="multipart/form-data">
                                                                <?php echo csrf_field(); ?>
                                                                <div class="mb-3">
                                                                    <label for="formFile" class="form-label">Contract File Upload</label>
                                                                    <input class="form-control" type="file" name="contractFile" id="contractFile" required>
                                                                </div>
                                                                <?php $__errorArgs = ['contractFile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                <div class="alertMessage"><?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                                <div class="mb-3">
                                                                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                                                </div>

                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Client Approval Modal -->
                                            <div class="modal fade" id="approveModal<?php echo e($list->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Approve Client</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Contracts Signed ? Are you sure to approve the client ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <a href="<?php echo e(route('kycrequests.approve',$list->id)); ?>" class="btn btn-sm btn-success">Approve</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <?php endif; ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <!-- </div> -->
                            </div>
                        </div>
                        <!-- <div class="col-md-1"></div> -->
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>

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


<?php if(session()->has('code')): ?>
<script type="text/javascript">
    $(document).ready(function() {

        $modalName = "#docModal" + "<?php echo e(Session::get('code')); ?>";
        $($modalName).modal('show');
    });
</script>
<?php endif; ?>

<?php if(session()->has('codes')): ?>
<script type="text/javascript">
    $(document).ready(function() {

        $modalName = "#preKycModal" + "<?php echo e(Session::get('codes')); ?>";
        $($modalName).modal('show');
    });
</script>
<?php endif; ?>

<?php if(session()->has('codess')): ?>
<script type="text/javascript">
    $(document).ready(function() {

        $modalName = "#preKycModal" + "<?php echo e(Session::get('codess')); ?>";
        $($modalName).modal('show');
    });
</script>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelCRM\resources\views/kycrequests/index.blade.php ENDPATH**/ ?>