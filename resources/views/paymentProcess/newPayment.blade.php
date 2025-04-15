<!-- resources/views/payment-form.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payment Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #33bfff;
            /* overflow: hidden; */
        }

        .background-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            overflow: hidden;
        }

        .symbol {
            position: absolute;
            font-size: 2rem;
            color: rgba(0, 0, 0, 0.1);
            animation: floatCurrency 15s infinite linear;
        }

        @keyframes floatCurrency {
            0% {
                transform: translateY(100vh) scale(0.5);
                opacity: 0;
            }

            50% {
                opacity: 0.7;
            }

            100% {
                transform: translateY(-10vh) scale(1.2);
                opacity: 0;
            }
        }

        .branding {
            padding: 30px 20px 10px 20px;
            background-color: rgb(0, 0, 0) !important;
            border-radius: 5px !important;
        }

        .branding p {
            margin-bottom: 10px;
            color: lightyellow !important;
        }

        .form-wrapper {
            padding-left: 20px;
            padding-right: 20px;
        }

        .logo-img {
            max-height: 120px;
            padding: 10px;
        }

        .sideHeading {
            color: #004c6f !important;
        }

        .hrLine {
            height: 1px;
            background-color: #33bfff;
            margin: 20px auto 30px;
            width: 75%
        }

        @media (max-width: 767.98px) {
            .border-end {
                border-right: none !important;
                border-bottom: 1px solid #dee2e6;
                margin-bottom: 20px;
                padding-bottom: 20px;
            }

            .btn-center-mobile {
                width: 100% !important;
            }

            .form-wrapper {
                padding-left: 10px;
                padding-right: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="background-animation">
        <div class="symbol" style="left: 10%; animation-delay: 0s;">$</div>
        <div class="symbol" style="left: 25%; animation-delay: 3s;">€</div>
        <div class="symbol" style="left: 40%; animation-delay: 6s;">₹</div>
        <div class="symbol" style="left: 60%; animation-delay: 2s;">£</div>
        <div class="symbol" style="left: 75%; animation-delay: 4s;">¥</div>
        <div class="symbol" style="left: 90%; animation-delay: 1s;">₩</div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow p-4">
                    <div class="text-center branding">
                        <p class="mb-2">Powered by</p>
                        <img src="{{ asset('images/cruisepay-logo.png') }}" alt="PayIT123 Logo"
                            class="img-fluid logo-img">
                    </div>
                    <div class="hrLine"></div>
                    <form action="{{ route('processPayment.store') }}" method="Post">
                        @csrf
                        <div class="row gx-4 form-wrapper">
                            <div class="col-md-6 border-end">
                                <h5 class="mb-3 sideHeading">Billing Details</h5>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}" placeholder="John Doe"
                                        required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}"
                                        placeholder="john@example.com" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" value="{{ old('phone') }}"
                                        placeholder="9876543210" required pattern="[0-9]{10,15}">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="number" class="form-control @error('amount') is-invalid @enderror"
                                        id="amount" name="amount" value="{{ old('amount') }}" placeholder="1000"
                                        required min="1">
                                    @error('amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="currency" class="form-label">Currency</label>
                                    <select class="form-select @error('currency') is-invalid @enderror" id="currency"
                                        name="currency" required>
                                        <option value="">Select Currency</option>
                                        @foreach ($currencies as $currency)
                                            <option value="{{ $currency->code }}"
                                                {{ old('currency') == $currency->code ? 'selected' : '' }}>
                                                {{ $currency->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('currency')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="street" class="form-label">Street Address</label>
                                    <input type="text" class="form-control @error('street') is-invalid @enderror"
                                        id="street" name="street" value="{{ old('street') }}"
                                        placeholder="123 Main St" required>
                                    @error('street')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror"
                                            id="city" name="city" value="{{ old('city') }}" required>
                                        @error('city')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="state" class="form-label">State</label>
                                        <input type="text"
                                            class="form-control @error('state') is-invalid @enderror" id="state"
                                            name="state" value="{{ old('state') }}" required>
                                        @error('state')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="country" class="form-label">Country</label>
                                    <select class="form-select @error('country') is-invalid @enderror" id="country"
                                        name="country" required>
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $count)
                                            <option value="{{ $count->code }}"
                                                {{ old('country') == $count->code ? 'selected' : '' }}>
                                                {{ $count->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="postal" class="form-label">Postal Code</label>
                                    <input type="text" class="form-control @error('postal') is-invalid @enderror"
                                        name="postal" id="postal" value="{{ old('postal') }}" required
                                        pattern="[0-9A-Za-z\-\s]{3,10}">
                                    @error('postal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Payment Details -->
                            <div class="col-md-6">
                                <h5 class="mb-3 sideHeading">Payment Details</h5>

                                <div class="mb-3">
                                    <label for="cardNumber" class="form-label">Card Number</label>
                                    <input type="text"
                                        class="form-control @error('cardNumber') is-invalid @enderror"
                                        name="cardNumber" id="cardNumber" value="{{ old('cardNumber') }}"
                                        placeholder="1234567890123456" required pattern="[0-9\s]{13,19}">
                                    @error('cardNumber')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                    <div class="mt-2">
                                        <img src="https://img.icons8.com/color/48/000000/visa.png" width="40"
                                            alt="Visa">
                                        <img src="https://img.icons8.com/color/48/000000/mastercard-logo.png"
                                            width="40" alt="MasterCard">
                                        <img src="https://img.icons8.com/color/48/000000/amex.png" width="40"
                                            alt="Amex">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="expiry" class="form-label">Expiry Date</label>
                                        <input type="text"
                                            class="form-control @error('expiry') is-invalid @enderror" name="expiry"
                                            id="expiry" value="{{ old('expiry') }}" placeholder="MM/YY" required
                                            pattern="(0[1-9]|1[0-2])\/\d{2}">
                                        @error('expiry')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="cvv" class="form-label">CVV</label>
                                        <input type="text" class="form-control @error('cvv') is-invalid @enderror"
                                            name="cvv" id="cvv" value="{{ old('cvv') }}"
                                            placeholder="123" required pattern="\d{3,4}">
                                        @error('cvv')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="iNumber" class="form-label">Invoice Number</label>
                                        <input type="text"
                                            class="form-control @error('iNumber') is-invalid @enderror"
                                            name="iNumber" id="iNumber" value="{{ old('iNumber') }}" required>
                                        @error('iNumber')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="mt-4 text-center">
                            <button type="submit" class="btn btn-primary w-33 btn-center-mobile"
                                style="width: 33%;">Pay Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-latest.min.js"></script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Generate a 8-digit number starting with 1
            const randomNum = "1" + Math.floor(1000000 + Math.random() * 90000);
            document.getElementById("iNumber").value = randomNum;
        });
    </script>



</body>

</html>
