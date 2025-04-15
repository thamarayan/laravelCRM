

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Routings - Merchants'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        .container {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .custom-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
            position: relative;
            font-size: clamp(0.8rem, 2vw, 1rem);
            background-color: white !important;
            margin-bottom: 10px !important
        }

        .custom-card:hover {
            /* transform: scale(1.05); */
        }

        .card-footer {
            background-color: white !important;
            border-top: none;
            padding: 0% 0.5rem 0.25rem !important;
            border-radius: 0% !important;
        }

        .card-header {
            background-color: #007bff !important;
            color: #f8f9fa !important;
            font-weight: bold;
            font-size: clamp(1rem, 2.5vw, 1.3rem);
            text-align: center;
            padding: 15px;
            position: relative;
        }

        .info-icon {
            position: absolute;
            top: 10px;
            right: 15px;
            cursor: pointer;
            color: white;
            font-size: clamp(1.2rem, 3vw, 1.5rem);
        }

        .update-button {
            /* display: none !important; */
            margin-top: 10px !important;
        }

        .footer-heading {
            /* color: #dc3545; */
            font-weight: bold;
            text-transform: uppercase;
            background-color: #FDFBEE !important;
            padding: 5px 0px !important;
            border-radius: 0px;
            font-size: 1rem !important;
        }

        .search-container {
            display: flex;
            justify-content: flex-end;
            padding: 10px 20px;
        }

        .search-box {
            width: 250px;
        }

        .bIcon {
            color: #FDFAF6 !important;
        }

        .insideModalHeader {
            background-color: #b2d0f0 !important;
            color: white !important;
        }

        .cardBodyHead {
            font-size: 1.1rem !important;

        }

        .delete-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            z-index: 10;
            padding: 2px 6px;
            font-size: 14px;
            line-height: 1;
            border-radius: 50%;
        }

        /* Toggle ON - green */
        #toggle-ClientName.form-check-input:checked {
            background-color: #5CB338;
            /* Bootstrap's green */
            border-color: #5CB338;
        }

        /* Toggle OFF - red border with light background */
        #toggle-ClientName.form-check-input:not(:checked) {
            background-color: #f8d7da;
            /* light red/pink */
            border-color: #dc3545;
            /* Bootstrap's red */
        }

        .tooltip-inner {
            background-color: #0118D8 !important;
            color: white;
            font-weight: 500;
            font-size: 14px;
            border-radius: 6px;
            padding: 8px 10px;
        }

        .tooltip.bs-tooltip-top .tooltip-arrow::before,
        .tooltip.bs-tooltip-bottom .tooltip-arrow::before,
        .tooltip.bs-tooltip-start .tooltip-arrow::before,
        .tooltip.bs-tooltip-end .tooltip-arrow::before {
            border-color: violet !important;
        }

        .accordion-button {
            background-color: #F8F4E1 !important;
        }

        .successInput {
            background-color: #def7c4 !important;
        }

        .failureInput {
            background-color: #fcc4c1 !important;
        }

        .incompleteInput {
            background-color: #D6E5FA !important;
        }

        .limitInput {
            background-color: #fcf7cf !important;
        }

        .position-relative:hover .delete-btn {
            opacity: 1;
            pointer-events: auto;
        }

        .delete-btn {
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s ease;
        }

        .bodyHeads {
            background-color: lightyellow !important;
            padding-top: 5px !important;
            padding-left: 3px !important;
            font-weight: bold !important;
        }

        .client-Card[data-integrated="no"] .card-header {
            background-color: red !important;
            visibility: hidden !important;

        }

        .client-Card[data-integrated="yes"] .card-header {
            background-color: green !important;

        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Routings
        <?php $__env->endSlot(); ?>

        <?php $__env->slot('title'); ?>
            PSP
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <?php echo $__env->make('flash_msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container mt-3">
        <div class="d-flex justify-content-end">
            <input type="text" id="search" class="form-control search-box w-25" placeholder="Search...">
        </div>
    </div>

    <div>
        <input type="checkbox" id="show-integrated" checked>
        <label for="show-integrated" style="color: #5CB338 !important">Integrated</label>

        <input type="checkbox" id="show-notIntegrated">
        <label for="show-notIntegrated" style="color:#dc3545 !important">Not Integrated</label>
    </div>


    <div class="container row mt-5" id="pspsContainer">
        
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>


    <script>
        $(document).ready(function() {


            // Function to fetch clients based on search input
            function fetchClients(search = "") {
                $.ajax({
                    url: "<?php echo e(route('pspsConfig')); ?>",
                    type: "GET",
                    data: {
                        search: search
                    },
                    success: function(response) {

                        let pspsContainer = $("#pspsContainer");
                        pspsContainer.empty();

                        const finalPsps = response.finalPsps ?? [];
                        const psps = response.psps ?? [];

                        if (psps.length > 0) {
                            psps.forEach(function(psp, index) {
                                const bankName = psp?.bank?.trim()?.toLowerCase();

                                // Try to find the matching PSP from finalPsps
                                const match = finalPsps.find(item =>
                                    item?.psp?.trim()?.toLowerCase() === bankName
                                );

                                let clientHtml = '';
                                if (match && Array.isArray(match.configuredBanks) && match
                                    .configuredBanks.length > 0) {
                                    const badges = match.configuredBanks.map((bank, index) => {
                                        // const badgeClass = index % 2 === 0 ?
                                        //     'text-bg-primary' : 'text-bg-danger';
                                        return `<span class="badge text-bg-primary me-1 px-3 py-1">${bank}</span>`;
                                    }).join('');
                                    clientHtml = `<div>${badges}</div>`;
                                } else {
                                    clientHtml = `<div>No configured clients</div>`;
                                }

                                let currencyHtml = '';
                                if (psp.currency) {
                                    const currencies = psp.currency.split(',').map(curr =>
                                        `<span class="badge text-bg-success me-1">${curr.trim()}</span>`
                                    ).join('');
                                    currencyHtml = `<div>${currencies}</div>`;
                                } else {
                                    currencyHtml = `<div>No allowed currencies</div>`;
                                }


                                // Build and append the card HTML
                                const cardHtml = `
                                    <div class="col-md-4 mb-3 client-wrapper">
    <div class="card client-Card custom-card mb-3" data-integrated="${psp.integration_status?.toLowerCase() === 'yes' ? 'yes' : 'no'}">
        <div class="card-header d-flex align-items-center">
            <div class="d-flex align-items-center">
                <span class="fw-bold me-2">${psp.bank}</span>
                <!-- Button trigger modal -->
                <span class="info-icon" data-bs-toggle="modal" data-bs-target="#exampleModal-${index}">
                    <i class="bi bi-clipboard-data"></i>
                </span>
            </div>
        </div>
        <div class="card-body">
            <h6 class="bodyHeads">CONFIGURED BANKS</h6>
            ${clientHtml} 
            <h6 class="mt-3 bodyHeads">ALLOWED CURRENCIES</h6>
            ${currencyHtml}
        </div>
        <div class="card-footer d-flex text-center p-2" style="background-color: #FBFBFB !important; color: #333;">
            <div class="flex-fill me-2">
                <h6 class="bodyHeads">Amount Limits</h6>
                ${psp.amount_limits}
            </div>
            <div class="flex-fill ms-2">
                <h6 class="bodyHeads">Allowed Country</h6>
                ${psp.country}
            </div>
        </div>
    </div> <!-- Closing card div -->

   

</div> <!-- Closing col-md-4 div -->

                                                
                                `;

                                pspsContainer.append(cardHtml);


                            });
                        } else {
                            pspsContainer.append('<p class="text-muted">No PSPs found</p>');
                        }





                        filterClients();
                    }
                });
            }

            fetchClients();

            // Call AJAX when typing in the search box
            $('#search').on('keyup', function() {
                let search = $(this).val();
                fetchClients(search);
            });

            function filterClients() {

                const showIntegrated = $('#show-integrated').is(':checked');
                const shownotIntegrated = $('#show-notIntegrated').is(':checked');

                $('.client-Card').each(function() {
                    const isEnabled = $(this).data('integrated') === 'yes';

                    if ((isEnabled && showIntegrated) || (!isEnabled && shownotIntegrated)) {
                        $(this).closest('.col-md-4').fadeIn();
                    } else {
                        $(this).closest('.col-md-4').fadeOut();
                    }
                });
            }

            $('#show-integrated, #show-notIntegrated').on('change', filterClients);
            filterClients();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelCRM\resources\views/routings/psps.blade.php ENDPATH**/ ?>