



<?php $__env->startSection('title'); ?>

<?php echo app('translator')->get('Weekly Reports'); ?>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('css'); ?>

<!-- Bootstrap CSS -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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

    .card2 {
        background-color: #F5EFFF !important;
    }

    #clientModal1 {
        max-width: 100%; /* Adjust as needed */
        width: 100%;
    }

    #clientModal1 table td{
        padding: 2px !important;
    }

    #clientModal1 th:first-child {
        width: 15%; /* Adjust as needed */
        white-space: nowrap;
    }

    #clientModal1 th:not(:first-child) {
        width: 10%; /* Adjust as needed */
        white-space: nowrap;
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

        <div class="card card2">

            <div class="card-body">

                

                
                    <input type="hidden" name="regenerationToken" value="">
                    <div class="row">

                        <div class="col-lg-4 d-inline-block">
                            <h4 class="card-title mb-3">Client - Agent Commission Setup</h4>
                            <label>Select Merchant</label>

                            <select name="client_Name" id="client_name" class="form-control" required>
                                <option value="">
                                    Select Client
                                </option>
                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($client->name); ?>">
                                    <?php echo e(strtoupper($client->name)); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                            <!-- Agent Modal -->
                            <div class="modal fade" id="clientModal" tabindex="-1" aria-labelledby="clientModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="clientModalLabel"></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <table class="table" id="agentDetailsTable">
                                            <thead>
                                                <tr>
                                                    <th>Agent</th>
                                                    <th>Share</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3">No data available</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button class="btn btn-success" id="addRow">Add New Row</button>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" id="saveChanges" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-lg-4">
                            <h4 class="card-title mb-3">Client - PSP Commission Setup</h4>
                            <label>Select Merchant</label>

                            <select name="client_Name1" id="client_name1" class="form-control" required>
                                <option value="">
                                    Select Client
                                </option>
                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($client->name); ?>">
                                    <?php echo e(strtoupper($client->name)); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                            <!-- PSP Modal -->
                            <div class="modal modal-lg fade" id="clientModal1" tabindex="-1" aria-labelledby="clientModalLabel1" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title1 fs-5" id="clientModalLabel1"></h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <table class="table" id="pspDetailsTable">
                                            <thead>
                                                <tr>
                                                    <th>PSP</th>
                                                    <th>USD</th>
                                                    <th>EUR</th>
                                                    <th>AUD</th>
                                                    <th>AED</th>
                                                    <th>JPY</th>
                                                    <th>GBP</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3">No data available</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button class="btn btn-success" id="addRow1">Add New Row</button>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" id="saveChanges1" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                                </div>
                            </div>

                        </div>

                    </div>

                

            </div>

        </div>

    </div>

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



<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

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



<script>
$(document).ready(function() {

    // Agents Config Portion
    
    $('#client_name').on('change', function() {
        
        var clientId = $(this).val();
        
        if (clientId) {
            $.ajax({
                url: "<?php echo e(url('get_agent_details')); ?>/" + clientId, 
                type: "GET",
                cache: false,
                success: function(response)     {

                    console.log(response);

                    // Ensure response is an array
                    let agents = typeof response === "string" ? JSON.parse(response) : response;

                    if (!Array.isArray(agents)) {
                        console.error("Invalid response format:", response);
                        return;
                    }

                    let tableBody = $("#agentDetailsTable tbody");
                    tableBody.empty();

                    if (agents.length > 0) {
                        agents.forEach(function(agent) {
                            tableBody.append(`
                                <tr>
                                    <td><input type="text" class="form-control" name="agent[]" value="${agent.agent}"></td>
                                    <td><input type="number" class="form-control" name="share[]" value="${agent.share}"></td>
                                    <td>
                                        <button class="btn btn-danger deleteRow">X</button>
                                    </td>
                                </tr>
                            `);
                        });
                    } else {
                        tableBody.html("<tr><td colspan='3'>No records found</td></tr>");
                    }
                    $('.modal-title').text("Agents of " + clientId);
                    $('#clientModal').modal('show');
                    
                }
                })
            };
        })
    });

    $('#addRow').on('click', function() {
        $("#agentDetailsTable tbody").append(`
            <tr>
                <td><input type="text" class="form-control" name="agent[]" required placeholder="Enter Agent Name"></td>
                <td><input type="number" class="form-control" name="share[]" required placeholder="Enter Share"></td>
                <td><button class="btn btn-danger removeRow">X</button></td>
            </tr>
        `);
    });

    // Remove a row dynamically
    $(document).on('click', '.removeRow', function() {
        $(this).closest('tr').remove();
    });
   
    // Save changes to the database
    $('#saveChanges').on('click', function() {
        var agentData = [];

        $('#agentDetailsTable tbody tr').each(function() {
            var agent = $(this).find('input[name="agent[]"]').val();
            var share = $(this).find('input[name="share[]"]').val();

            if (agent && share) {
                agentData.push({ agent: agent, share: share });
            }
        });

        $.ajax({
            url: "<?php echo e(url('updateAgentDetails')); ?>",
            type: "POST",
            data: {
                _token: "<?php echo e(csrf_token()); ?>",
                clientName: $('#client_name').val(),
                agents: agentData
            },
            success: function(response) {
                alert('Data updated successfully!');
                $('#clientModal').modal('hide');
            },
            error: function(xhr, status, error) {
                console.error("Update Error:", error);
            }
        });
    });

    
    $(document).on("click", ".deleteRow", function() {
    
        let row = $(this).closest("tr"); // Get the row
        let pspName = row.find("input[name='psp[]']").val(); // Get the agent's name

        $.ajax({
            url: "<?php echo e(url('deletePSP')); ?>",
            type: "POST",
            data: {
                _token: "<?php echo e(csrf_token()); ?>", // CSRF protection
                agent: agentName, 
                clientName: $('#client_name').val(),
            },
            success: function(response) {
                if (response.success) {
                    row.remove(); // Remove row on success
                } else {
                    alert("Failed to delete.");
                }
            },
            error: function(xhr) {
                alert("Something went wrong!");
            }
        });
    });

    // PSP Config Portions

    $('#client_name1').on('change', function() {
        
        var clientId = $(this).val();
        
        if (clientId) {
            $.ajax({
                url: "<?php echo e(url('get_psp_details')); ?>/" + clientId, 
                type: "GET",
                cache:false,
                success: function(response){

                      // Ensure response is an array
                      let psps;
                        try {
                            psps = typeof response === "string" ? JSON.parse(response) : response;
                        } catch (error) {
                            psps = []; // If JSON.parse fails, assign an empty array
                        }
                        psps = psps && typeof psps === "object" ? psps : [];

                        let tableBody = $("#pspDetailsTable tbody");
                        tableBody.empty();

                        if (psps.length > 0) {
                            psps.forEach(function(psp) {
                                tableBody.append(`
                                    <tr>
                                        <td><input type="text" class="form-control" name="pspName[]" value="${psp.pspName}"></td>
                                        <td><input type="number" class="form-control" name="usd[]" value="${psp.usd}"></td>
                                        <td><input type="number" class="form-control" name="eur[]" value="${psp.eur}"></td>
                                        <td><input type="number" class="form-control" name="aud[]" value="${psp.aud}"></td>
                                        <td><input type="number" class="form-control" name="aed[]" value="${psp.aed}"></td>
                                        <td><input type="number" class="form-control" name="jpy[]" value="${psp.jpy}"></td>
                                        <td><input type="number" class="form-control" name="gbp[]" value="${psp.gbp}"></td>
                                        <td>
                                            <button class="btn btn-danger deleteRow1">X</button>
                                        </td>
                                    </tr>
                                `);
                            });
                        } else {
                            tableBody.html("<tr><td colspan='8'>No records found</td></tr>");
                        }                                                           
                    $('.modal-title1').text("PSPs of " + clientId);
                    $('#clientModal1').modal('show');
            
                }
                })
        };
    });
    

    $('#addRow1').on('click', function() {
        $("#pspDetailsTable tbody").append(`
            <tr>
                <td><input type="text" class="form-control" name="pspName[]" required placeholder="Enter PSP Name"></td>
                <td><input type="number" class="form-control" name="usd[]" required placeholder="USD"></td>
                <td><input type="number" class="form-control" name="eur[]" required placeholder="EUR"></td>
                <td><input type="number" class="form-control" name="aud[]" required placeholder="AUD"></td>
                <td><input type="number" class="form-control" name="aed[]" required placeholder="AED"></td>
                <td><input type="number" class="form-control" name="jpy[]" required placeholder="JPY"></td>
                <td><input type="number" class="form-control" name="gbp[]" required placeholder="GBP"></td>
                <td><button class="btn btn-danger removeRow1">X</button></td>
            </tr>
        `);
    });

    // Remove a row dynamically
    $(document).on('click', '.removeRow1', function() {
        $(this).closest('tr').remove();
    });
    
    // Save changes to the database
    $('#saveChanges1').on('click', function() {
        var pspData = [];
        
        $('#pspDetailsTable tbody tr').each(function() {
            var pspName = $(this).find('input[name="pspName[]"]').val();
            var usd = $(this).find('input[name="usd[]"]').val() || "0.00";
            var eur = $(this).find('input[name="eur[]"]').val() || "0.00";
            var aed = $(this).find('input[name="aed[]"]').val() || "0.00";
            var aud = $(this).find('input[name="aud[]"]').val() || "0.00";
            var jpy = $(this).find('input[name="jpy[]"]').val() || "0.00";
            var gbp = $(this).find('input[name="gbp[]"]').val() || "0.00";


            console.log("Hello");

            console.log("USD: " + usd);
            console.log("EUR: " + eur);
            console.log("AED: " + aed);
            console.log("AUD: " + aud);
            console.log("JPY: " + jpy);
            console.log("GBP: " + gbp);

            if (pspName && usd && eur && aed && aud && jpy && gbp) {
                pspData.push({ 
                    pspName: pspName, 
                    usd: usd,
                    eur: eur,
                    aed: aed,
                    aud: aud,
                    jpy: jpy,
                    gbp: gbp 
                });
            }
        });

        console.log(pspData);

        $.ajax({
            url: "<?php echo e(url('updatePSPDetails')); ?>",
            type: "POST",
            data: {
                _token: "<?php echo e(csrf_token()); ?>",
                clientName: $('#client_name1').val(),
                psps: pspData
            },
            success: function(response) {
                alert('Data updated successfully!');
                $('#clientModal1').modal('hide');
            },
            error: function(xhr, status, error) {
                console.error("Update Error:", error);
            }
        });
    });

    $(document).on("click", ".deleteRow1", function() {
    
        let row = $(this).closest("tr"); // Get the row
        let pspName = row.find("input[name='pspName[]']").val(); // Get the agent's name

        $.ajax({
            url: "<?php echo e(url('deletePSP')); ?>",
            type: "POST",
            cache:false,
            data: {
                _token: "<?php echo e(csrf_token()); ?>", // CSRF protection
                psp: pspName, 
                clientName: $('#client_name1').val(),
            },
            success: function(response) {
                if (response.success) {
                    row.remove(); // Remove row on success
                } else {
                    alert("Failed to delete.");
                }
            },
            error: function(xhr) {
                alert("Something went wrong!");
            }
        });

    });


</script>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelCRM\resources\views/reporting/weeklyreports.blade.php ENDPATH**/ ?>