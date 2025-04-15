@extends('layouts.master')

@section('title')
    @lang('Routings - Merchants')
@endsection

@section('css')
    {{-- Bootstrap CSS --}}
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
            background-color: #007bff !important;
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
    </style>
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Routings
        @endslot

        @slot('title')
            Merchants Configurations
        @endslot
    @endcomponent

    @include('flash_msg')

    <div class="container mt-3">
        <div class="d-flex justify-content-end">
            <input type="text" id="search" class="form-control search-box w-25" placeholder="Search...">
        </div>
    </div>

    <div>
        <input type="checkbox" id="show-enabled" checked>
        <label for="show-enabled">Show Enabled</label>

        <input type="checkbox" id="show-disabled">
        <label for="show-disabled">Show Disabled</label>
    </div>

    <div class="container row mt-5" id="clientsContainer">
        {{-- Main content goes here.. --}}
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script>
        console.log(typeof bootstrap);
        console.log(bootstrap.Collapse); // should not be undefined
    </script>




    <script>
        $(document).ready(function() {


            // Function to fetch clients based on search input
            function fetchClients(search = "") {
                $.ajax({
                    url: "{{ route('merchantsConfig') }}",
                    type: "GET",
                    data: {
                        search: search
                    },
                    success: function(response) {
                        console.log(response);
                        let clientsContainer = $("#clientsContainer");
                        clientsContainer.empty();

                        let clientHtml = "";

                        if (response.clients.length > 0) {
                            $.each(response.clients, function(index, client) {

                                let configHtml = ''; // Store configuration details
                                const safeClientId = client.client.replace(/\s+/g, '-').replace(
                                    /[^a-zA-Z0-9-_]/g, '');

                                configHtml = (client.configuration ?? []).map(config => `
                                               <div class="position-relative d-inline-block me-2 mb-3">
                                                    <!-- Delete Button (Top Right Corner) -->
                                                    <button class="btn btn-danger btn-sm position-absolute delete-btn" 
                                                            data-id="${config.bank}" data-client-name="${client.client}"
                                                            style="top: -10px; right: -10px; z-index: 2; padding: 2px 6px; font-size: 12px; line-height: 1;">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>

                                                    <!-- Config Button -->
                                                    <button class="btn btn-sm btn-primary config-button" 
                                                            data-success="${config.success ?? 0}" 
                                                            data-failure="${config.failed ?? 0}" 
                                                            data-incomplete="${config.incomplete ?? 0}" 
                                                            data-client="${config.bank}" 
                                                            data-limit="${config.limit ?? 0}"
                                                            data-perDay="${config.perDay === "true" ? 'true' : 'false'}"
                                                            data-lifeTime="${config.lifeTime === "true" ? 'true' : 'false'}">
                                                        ${config.bank || 'N/A'}
                                                    </button>
                                                </div>


                                            `).join("");

                                configHtml += `
                                                        <div class="d-inline-block me-2 mb-3">
                                                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#configModal-${index}">
                                                                    <i class="bi bi-plus-lg"></i>
                                                                </button>
                                                            </div>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="configModal-${index}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">${client.client}</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <select class="form-select dynamicSelect" id="dynamicSelect-${index}" data-client-id="${client.client}" aria-label="Default select example">
                                                                        <option selected>Loading...</option>
                                                                        <input type="number" min=0 class=" mt-3 form-control success-input" id="success-input-${index}" placeholder="Success Count">
                                                                        <input type="number" min=0 class=" mt-3 form-control fail-input" id="fail-input-${index}" placeholder="Fail Count">
                                                                        <input type="number" min=0 class=" mt-3 form-control incomplete-input" id="incomplete-input-${index}" placeholder="Incomplete Count">
                                                                        <input type="number" min=0 class=" mt-3 form-control limit-input" id="limit-input-${index}" placeholder="Limit Count">
                                                                    </select>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-sm btn-primary save-config" data-client-id="${client.client}" data-index="${index}">Save changes</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        
                                                `;


                                clientsContainer.append(
                                    `
                                                <div class="col-md-4 mb-3 client-wrapper">
                                                   <div class="card client-Card custom-card mb-3" data-enabled="${client.enabled.toLowerCase() === 'yes' ? 'yes' : 'no'}">
                                                        <div class="card-header d-flex align-items-center">
                                                            <!-- Left side: Client Name + Info Icon -->
                                                            <div class="d-flex align-items-center">
                                                                <span class="fw-bold me-2">${client.client}</span>
                                                                <span class="info-icon" data-bs-toggle="modal" data-bs-target="#infoModal-${client.client}">
                                                                    <i class="bi bi-clipboard-data"></i>
                                                                </span>
                                                            </div>

                                                            <!-- Right side: Toggle Switch -->
                                                            <div class="form-check form-switch m-0">
                                                                <input class="form-check-input toggle-switch" type="checkbox" role="switch"  data-client-id="${client.client}" id="toggle-ClientName" ${client.enabled === 'Yes' ? 'checked' : ''}>
                                                            </div>
                                                        </div>
                                                        <div class="card-body">
                                                            <h3 class="cardBodyHead mb-3">PRIMARY ROUTING</h3>
                                                            ${configHtml} 

                                                        </div>
                                                        <div class="card-footer text-center">
                                                            <h4 class="footer-heading mb-3 client-name">Velocity</h4>
                                                            <span class="config-name badge text-bg-secondary ms-2" style="display:none;"></span>
                                                            <div class="row">
                                                                <div class="col-md-3 mb-3">
                                                                    <input type="hidden" class="bankNameInput" value="">
                                                                    <div class="d-flex align-items-center">
                                                                        <input type="text" class="form-control text-center value-input successInput" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Success Count" value="0" data-original-value="0" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 mb-3">
                                                                    <div class="d-flex align-items-center">
                                                                        
                                                                        <input type="text" class="form-control text-center value-input failureInput" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Failure Count" value="0" data-original-value="0" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 mb-3">
                                                                    <div class="d-flex align-items-center">
                                                                        
                                                                        <input type="text" class="form-control text-center value-input incompleteInput" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Incomplete Count" value="0" data-original-value="0" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 mb-3">
                                                                    <div class="d-flex align-items-center">
                                                                        
                                                                        <input type="text" class="form-control text-center value-input limitInput" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Merchant Limit" value="0" data-original-value="0" d-none disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="accordion" id="accordion-${client.client}">
                                                                    <div class="accordion-item">
                                                                        <h2 class="accordion-header" id="heading-${client.client}">
                                                                        <button class="accordion-button collapsed" type="button"
                                                                                data-bs-target="#collapse-${client.client}"
                                                                                aria-expanded="false"
                                                                                aria-controls="collapse-${client.client}">
                                                                            Error Types for 
                                                                        </button>
                                                                        </h2>
                                                                        <div id="collapse-${client.client}" class="accordion-collapse collapse"
                                                                            aria-labelledby="heading-${client.client}"
                                                                            >
                                                                        <div class="accordion-body">
                                                                            <div class="row mb-2">
                                                                                <div class="col-6">
                                                                                    <div class="form-check">
                                                                                    <input class="form-check-input perDay value-input" type="checkbox" id="perDay">
                                                                                    <label class="form-check-label" for="perDay">Per Day</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <div class="form-check">
                                                                                    <input class="form-check-input lifeTime value-input" type="checkbox" id="lifeTime">
                                                                                    <label class="form-check-label" for="lifeTime">Lifetime</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>                         

                                                                </div>
                                                            </div>
                                                            
                                                            <button class="btn btn-sm btn-primary update-button mb-2" data-client-id="${client.client}" style="display: none;">Update</button>
                                                        </div>
                                                    </div>
                                                    

                                                    <!-- Info Modal -->
                                                    <div class="modal fade" id="infoModal-${client.client}" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header insideModalHeader">
                                                                    <h5 class="modal-title" id="infoModalLabel">${client.client} - Details</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table">
                                                                        <tbody>
                                                                            <tr><td>Payment Bank</td><td>${client.payment_bank}</td></tr>
                                                                            <tr><td>Processing Countries</td><td>${client.process_country}</td></tr>
                                                                            <tr><td>Allowed Countries</td><td>${client.currency}</td></tr>
                                                                            <tr><td>Enabled</td><td>${client.enabled}</td></tr>
                                                                            <tr><td>Alert Mail</td><td>${client.alert_mail}</td></tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            `
                                )
                            }).join("");


                            $('[data-bs-toggle="tooltip"]').tooltip();
                            populateDropdowns(response.pspList);

                        } else {
                            clientsContainer.append(
                                "<div class='col-md-12 text-center'><p>No records found</p></div>");
                        }

                        filterClients();

                        let activeCard = null;

                        document.querySelectorAll(".config-button").forEach(button => {

                            button.addEventListener("click", function(event) {
                                event.stopPropagation();
                                const currentCard = this.closest(".card");
                                const currentFooter = currentCard.querySelector(
                                    ".card-footer");

                                // console.log("Current Card:", currentCard);
                                // console.log("Current Footer:", currentFooter);
                                // console.log(currentFooter.querySelector(".perDay"));
                                // console.log(currentFooter.querySelector(".lifeTime"));


                                if (!currentCard || !currentFooter) return;

                                // Step 1: Disable & Reset ALL cards first
                                document.querySelectorAll(".card").forEach(card => {
                                    const footer = card.querySelector(
                                        ".card-footer");
                                    footer.querySelectorAll(".value-input")
                                        .forEach(input => {

                                            if (input.type === "checkbox") {
                                                input.checked =
                                                    false; // Uncheck it
                                            } else {
                                                input.value =
                                                    "0"; // Reset text/number inputs
                                                input.setAttribute(
                                                    "data-original-value",
                                                    "0");
                                            }

                                            input.setAttribute("disabled",
                                                true); // Disable

                                        });



                                    const updateBtn = footer.querySelector(
                                        ".update-button");
                                    if (updateBtn) updateBtn.style.display =
                                        "none";

                                    const nameSpan = footer.querySelector(
                                        ".client-name");
                                    if (nameSpan) nameSpan.textContent =
                                        "VELOCITY";
                                });

                                // Collapse ALL other open accordions first
                                document.querySelectorAll(".accordion-collapse")
                                    .forEach(section => {
                                        const instance = bootstrap.Collapse
                                            .getOrCreateInstance(section, {
                                                toggle: false
                                            });
                                        instance.hide();
                                    });


                                // Step 2: Enable current card inputs
                                const inputs = {
                                    success: currentFooter.querySelector(
                                        ".successInput"),
                                    failure: currentFooter.querySelector(
                                        ".failureInput"),
                                    incomplete: currentFooter.querySelector(
                                        ".incompleteInput"),
                                    limit: currentFooter.querySelector(
                                        ".limitInput"),
                                    perDay: currentFooter.querySelector(".perDay"),
                                    lifeTime: currentFooter.querySelector(
                                        ".lifeTime"),
                                };
                                const updateButton = currentFooter.querySelector(
                                    ".update-button");

                                if (Object.values(inputs).some(i => !i)) return;

                                inputs.success.value = this.getAttribute("data-success")
                                    ?.trim() || "0";
                                inputs.failure.value = this.getAttribute("data-failure")
                                    ?.trim() || "0";
                                inputs.incomplete.value = this.getAttribute(
                                    "data-incomplete")?.trim() || "0";
                                inputs.limit.value = this.getAttribute("data-limit")
                                    ?.trim() || "0";
                                inputs.perDay.checked = String(this.getAttribute(
                                    "data-perDay")).toLowerCase() === "true";
                                inputs.lifeTime.checked = String(this.getAttribute(
                                    "data-lifeTime")).toLowerCase() === "true";


                                console.log(inputs);

                                // Remove old listeners
                                Object.entries(inputs).forEach(([key, input]) => {
                                    if (!input) return;
                                    const newInput = input.cloneNode(true);
                                    input.parentNode.replaceChild(newInput,
                                        input);
                                    inputs[key] =
                                        newInput; // re-assign reference
                                });

                                // Now enable and set data-original-value
                                Object.values(inputs).forEach(input => {
                                    if (input.type === 'checkbox') {
                                        input.setAttribute(
                                            "data-original-value", input
                                            .checked ? "true" : "false");
                                    } else {
                                        input.setAttribute(
                                            "data-original-value", input
                                            .value);
                                    }
                                    input.removeAttribute("disabled");
                                });

                                const clientName = this.getAttribute("data-client") ||
                                    "VELOCITY";

                                const nameSpan = currentFooter.querySelector(
                                    ".client-name");
                                if (nameSpan) nameSpan.textContent = "Velocity in " +
                                    clientName;

                                updateButton.style.display = "none";

                                currentFooter.querySelector(".bankNameInput") && (
                                    currentFooter.querySelector(".bankNameInput")
                                    .value = clientName);

                                // Remove any previous input listeners to avoid duplicates
                                Object.values(inputs).forEach(input => {
                                    const newInput = input.cloneNode(
                                        true); // clone to remove old listeners
                                    input.parentNode.replaceChild(newInput,
                                        input);
                                });

                                // Re-assign inputs after replacement
                                const updatedInputs = {
                                    success: currentFooter.querySelector(
                                        ".successInput"),
                                    failure: currentFooter.querySelector(
                                        ".failureInput"),
                                    incomplete: currentFooter.querySelector(
                                        ".incompleteInput"),
                                    limit: currentFooter.querySelector(
                                        ".limitInput"),
                                };

                                // Change tracking
                                Object.values(inputs).forEach(input => {
                                    input.addEventListener("input", () => {
                                        const changed = Object.values(
                                            updatedInputs).some(i =>
                                            i.value !== i
                                            .getAttribute(
                                                "data-original-value"
                                            )
                                        );
                                        updateButton.style.display =
                                            changed ? "block" : "none";
                                    });
                                });

                                activeCard = currentCard;

                                const newTooltip = document.querySelector(
                                    '[data-bs-toggle="tooltip"]');
                                if (newTooltip) {
                                    new bootstrap.Tooltip(newTooltip);
                                }

                                $('[data-bs-toggle="tooltip"]').tooltip();
                            });
                        });

                        // Outside click handler
                        document.addEventListener("click", function(e) {
                            console.log("Clicked element:", e.target);

                            // Get the nearest config button, if any
                            const clickedAConfigButton = e.target.closest(".config-button");
                            const clickedInsideActiveCard = activeCard && activeCard.contains(e
                                .target);

                            console.log("clickedAConfigButton:", clickedAConfigButton);
                            console.log("clickedInsideActiveCard:", clickedInsideActiveCard);

                            const clickedInsideAccordion = e.target.closest(".accordion") || e
                                .target.closest(".accordion-button");
                            const isAccordionButton = e.target.classList.contains(
                                "accordion-button") || e.target.closest(".accordion-button");

                            if (clickedInsideActiveCard || clickedAConfigButton ||
                                clickedInsideAccordion || isAccordionButton) {
                                console.log(
                                    "Click was inside the active card or on a config/accordion button, skipping reset."
                                );
                                return;
                            }

                            console.log("Click was outside, resetting all cards...");

                            // Reset everything
                            document.querySelectorAll(".card").forEach(card => {
                                const footer = card.querySelector(".card-footer");

                                footer.querySelectorAll(".value-input").forEach(
                                    input => {
                                        input.value = "0";
                                        input.setAttribute("disabled", true);
                                    });

                                const updateBtn = footer.querySelector(
                                    ".update-button");
                                if (updateBtn) updateBtn.style.display = "none";

                                const nameSpan = footer.querySelector(".client-name");
                                if (nameSpan) nameSpan.textContent = "VELOCITY";

                                const bankNameInput = footer.querySelector(
                                    ".bankNameInput");
                                if (bankNameInput) bankNameInput.value = "";

                                const accordion = footer.querySelector(
                                    ".accordion-collapse");
                                if (accordion) {
                                    const collapseInstance = bootstrap.Collapse
                                        .getInstance(accordion);
                                    if (collapseInstance) {
                                        collapseInstance.hide();
                                    } else {
                                        new bootstrap.Collapse(accordion, {
                                            toggle: false
                                        }).hide();
                                    }
                                }


                            });

                            activeCard = null;



                        });

                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching clients:", error);
                    }
                });

            }

            // Function to populate the PSP Inputs
            function populateDropdowns(pspList) {
                $(".dynamicSelect").each(function() {
                    let select = $(this);
                    select.empty(); // Clear previous options
                    select.append('<option selected>Open this select menu</option>');

                    pspList.forEach(item => {
                        select.append(`<option value="${item.bank}">${item.bank}</option>`);
                    });
                });
            }

            $(document).on("click", ".save-config", function() {
                let clientId = $(this).data("client-id"); // Get client ID
                let index = $(this).data("index"); // Get modal index
                let selectedBank = $(`#dynamicSelect-${index}`).val(); // Get selected value

                let successValue = $(`#success-input-${$(this).data("index")}`).val();
                let failValue = $(`#fail-input-${$(this).data("index")}`).val();
                let incompleteValue = $(`#incomplete-input-${$(this).data("index")}`).val();
                let limitValue = $(`#limit-input-${$(this).data("index")}`).val();
                // let perDayChecked = $(`#perDay-${$(this).data("index")}`).is(':checked');
                // let lifeTimeChecked = $(`#lifeTime-${$(this).data("index")}`).is(':checked');


                var newConfig = [];
                newConfig.push({
                    bank: selectedBank,
                    success: successValue ?? 0,
                    failed: failValue ?? 0,
                    incomplete: incompleteValue ?? 0,
                    limit: limitValue ?? 0
                });

                if (!selectedBank || selectedBank === "Loading..." || selectedBank ===
                    "Open this select menu") {
                    alert("Please select a valid bank.");
                    return;
                }

                $.ajax({
                    url: "{{ route('addMerchantConfig') }}", // Update this with your actual update route
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        client_id: clientId,
                        newConfig: newConfig
                    },
                    success: function(response) {
                        if (response) {
                            alert("Configuration updated successfully!");

                            let modalSelector = "#configModal-" + index;

                            // Listen for when Bootstrap completely hides the modal
                            $(modalSelector).on("hidden.bs.modal", function() {
                                console.log("Modal fully hidden, cleaning up...");

                                // Remove any lingering backdrops
                                $(".modal-backdrop").remove();
                                $("body").removeClass("modal-open").css({
                                    "overflow": "auto",
                                    "padding-right": "0px"
                                });

                                // Fetch updated client list
                                fetchClients();

                                // // Reload page after a short delay
                                // setTimeout(() => {
                                //     location.reload();
                                // }, 1000);
                            });

                            // Close the modal (triggers 'hidden.bs.modal' event)
                            $(modalSelector).modal("hide");

                        } else {
                            alert("Failed to update. Try again.");
                        }
                    },
                    error: function() {
                        alert("Error updating configuration.");
                    }
                });


            });

            fetchClients();

            // Call AJAX when typing in the search box
            $('#search').on('keyup', function() {
                let search = $(this).val();
                fetchClients(search);
                // Re-initialize tooltip
                filterClients();
                $(cardFooter).find('[data-bs-toggle="tooltip"]').tooltip();
            });

            $(document).on('input', '.value-input', function() {
                let cardFooter = $(this).closest('.card-footer');
                let updateButton = cardFooter.find('.update-button');
                const isCheckbox = this.type === 'checkbox';
                const currentValue = isCheckbox ? this.checked : $(this).val();
                let originalValue = $(this).data('original-value');

                const original = isCheckbox ? String(originalValue) === "true" : String(originalValue);

                if (String(currentValue) !== String(originalValue)) {
                    updateButton.show();
                } else {
                    // Check if ANY input or checkbox changed
                    let anyChanged = cardFooter.find('.value-input').toArray().some(inp => {
                        if (inp.type === 'checkbox') {
                            return String(inp.checked) !== String($(inp).data('original-value'));
                        } else {
                            return String($(inp).val()) !== String($(inp).data('original-value'));
                        }
                    });

                    if (!anyChanged) {
                        updateButton.hide();
                    }
                }
            });

            $(document).on("click", ".update-button", function() {


                const cardFooter = this.closest(".card-footer");
                if (!cardFooter) return;

                // Grab values
                const success = cardFooter.querySelector(".successInput")?.value ?? "0";
                const failure = cardFooter.querySelector(".failureInput")?.value ?? "0";
                const incomplete = cardFooter.querySelector(".incompleteInput")?.value ?? "0";
                const limit = cardFooter.querySelector(".limitInput")?.value ?? "0";
                const perDay = cardFooter.querySelector(".perDay")?.checked ?? false;
                const lifeTime = cardFooter.querySelector(".lifeTime")?.checked ?? false;
                const clientId = this.getAttribute("data-client-id");

                const bankName = cardFooter.querySelector(".bankNameInput")?.value ?? "";

                // Optional: Show loader or disable button temporarily
                this.disabled = true;
                this.textContent = "Updating...";

                let newConfig = [];
                newConfig.push({
                    bank: bankName,
                    success: success,
                    failed: failure,
                    incomplete: incomplete,
                    limit: limit,
                    perDay: perDay,
                    lifeTime: lifeTime
                });

                // AJAX call
                $.ajax({
                    url: "/updateMerchantConfig", // Your endpoint
                    method: "POST",
                    data: {
                        client_id: clientId,
                        newConfig: newConfig,
                        _token: $('meta[name="csrf-token"]').attr('content') // CSRF token

                    },
                    success: (response) => {
                        // Success feedback
                        this.textContent = "Updated!";
                        setTimeout(() => {
                            this.textContent = "Update";
                            this.disabled = false;
                            this.style.display = "none"; // Hide again
                        }, 1500);

                        const perDay = cardFooter.querySelector(".perDay");
                        const lifeTime = cardFooter.querySelector(".lifeTime");

                        // Optional: Reset original values
                        cardFooter.querySelectorAll(".value-input").forEach(input => {
                            input.setAttribute("data-original-value", input.value);
                        });

                        console.log("perDay checked:", perDay.checked);
                        console.log("lifeTime checked:", lifeTime.checked);

                        document.querySelectorAll(".config-button").forEach(button => {
                            if (button.getAttribute("data-client") === bankName) {
                                button.setAttribute("data-success", success);
                                button.setAttribute("data-failure", failure);
                                button.setAttribute("data-incomplete", incomplete);
                                button.setAttribute("data-limit", limit);
                                button.setAttribute("data-perDay", perDay.checked ?
                                    "true" : "false");
                                button.setAttribute("data-lifeTime", lifeTime.checked ?
                                    "true" : "false");
                            }
                        });


                    },
                    error: (xhr) => {
                        console.error("Update failed", xhr);
                        alert("Update failed. Please try again.");
                        this.textContent = "Update";
                        this.disabled = false;
                    }
                });

            });

            $(document).on("click", ".delete-btn", function() {

                const id = $(this).data("id");
                const client = $(this).data("client-name");


                if (!id || !client) {
                    alert("Missing bank ID or client name.");
                    return;
                }

                if (confirm("Are you sure you want to delete this item?")) {
                    // AJAX call to delete
                    $.ajax({
                        url: `/deleteBank/${id}/${client}`, // Your backend route
                        type: "DELETE",
                        data: {
                            _token: $('meta[name="csrf-token"]').attr("content")
                        },
                        success: function(response) {
                            alert("Deleted successfully!");
                            // Optionally remove the item from DOM
                            // $(this).closest(".some-wrapper").remove();
                            location.reload(); // or just refresh
                        },
                        error: function(xhr) {
                            console.error(xhr);
                            alert("Delete failed. Please try again.");
                        }
                    });
                }
            });

            $(document).ready(function() {
                $(document).on("change", ".toggle-switch", function() {

                    const clientId = $(this).data("client-id");
                    const isEnabled = $(this).is(":checked");

                    // Optional: Disable toggle temporarily
                    $(this).prop("disabled", true);

                    // Send AJAX request to update the toggle status
                    $.ajax({
                        url: "/enableDisableClient", // Change to your actual route
                        method: "POST",
                        data: {
                            client_id: clientId,
                            enabled: isEnabled ? "Yes" :
                            "No", // or true/false based on backend needs
                            _token: $('meta[name="csrf-token"]').attr(
                                "content") // CSRF token
                        },
                        success: function(response) {
                            console.log("Toggle updated successfully:", response);
                            alert("Successfully updated status");
                            filterClients();
                        },
                        error: function(xhr, status, error) {
                            console.error("Toggle update failed:", error);
                            alert("Failed to update toggle status. Try again.");

                            // Revert the toggle switch if needed
                            $(`.toggle-switch[data-client-id='${clientId}']`).prop(
                                "checked", !isEnabled);
                        },
                        complete: function() {
                            // Re-enable toggle
                            $(`.toggle-switch[data-client-id='${clientId}']`).prop(
                                "disabled", false);
                        }
                    });
                });
            });

            function filterClients() {

                const showEnabled = $('#show-enabled').is(':checked');
                const showDisabled = $('#show-disabled').is(':checked');

                $('.client-Card').each(function() {
                    const isEnabled = $(this).data('enabled') === 'yes';

                    if ((isEnabled && showEnabled) || (!isEnabled && showDisabled)) {
                        $(this).closest('.col-md-4').fadeIn();
                    } else {
                        $(this).closest('.col-md-4').fadeOut();
                    }
                });
            }

            $('#show-enabled, #show-disabled').on('change', filterClients);
            filterClients();

            $(document).on('click', '.accordion-button', function(e) {

                const targetId = $(this).attr('data-bs-target'); // e.g. #collapse-Acq_v1

                const target = document.querySelector(targetId);


                // Create collapse instance
                const collapseInstance = bootstrap.Collapse.getInstance(target) ||
                    new bootstrap.Collapse(target, {
                        toggle: false
                    });

                // Toggle manually
                if (target.classList.contains('show')) {
                    collapseInstance.hide();

                } else {
                    collapseInstance.show();
                }
            });

        });
    </script>
@endsection
