<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaction Unsuccessful</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #fff0f0, #fceaea);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .fail-container {
            min-height: 100vh;
        }

        .card {
            background: #fff;
            border: none;
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        .logo-container {
            background-color: #343a40;
            padding: 0.75rem;
            border-radius: 0.75rem;
            display: inline-block;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .logo-container:hover {
            background-color: #495057;
            transform: scale(1.05);
        }

        .logo {
            max-width: 120px;
        }

        .fail-icon {
            font-size: 5rem;
            color: #dc3545;
            animation: pop 0.5s ease forwards;
        }

        @keyframes pop {
            0% {
                transform: scale(0.7);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .btn-outline-danger {
            padding: 0.75rem 2rem;
            font-size: 1.1rem;
            border-radius: 2rem;
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center fail-container">
        <div class="card text-center">
            <!-- Company Logo -->
            <div class="logo-container mb-4">
                <img src="{{ asset('images/cruisepay-logo.png') }}" alt="Company Logo" class="logo">
            </div>

            <!-- Failure Icon -->
            <div class="fail-icon mb-3">⚠️</div>

            <!-- Failure Message -->
            <h2 class="mb-3 text-danger">Something went wrong</h2>
            <p class="lead">We couldn't complete your transaction at this moment. Please check your details and try
                again later.</p>

            <!-- Optional button -->
            <a href="{{ route('payment.page') }}" class="btn btn-outline-danger mt-4">Return to payment page?</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
