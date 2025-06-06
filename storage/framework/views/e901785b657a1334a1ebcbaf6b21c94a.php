<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API Health Monitor</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <style>
        .cf-main, .cf-cards{
            padding: 2% 7% 2% !important;  
            align-items: center !important;
            text-align: center !important;
            margin-bottom: 2% !important;
        }

        .mainHead{
            font-family: "Bebas Neue", serif;
            font-weight: 400;
            font-size: 3em !important;
            color: #344CB7 !important;
        }

        .container{
            background-color: #FFFAEC !important;
            padding-bottom: 2% !important;
        }

        .cf-main{
            background-color: #E8F9FF !important;
        }

        .card{
            margin: auto !important;
        }

        .text-bg-orange{
            background-color: orangered !important;
            color: white !important;
        }
    </style>
</head>
<body>

    <div class="container-fluid cf-main d-flex">
            <div class="col-md-12">
                <h1 class="mainHead">API HEALTH MONITOR</h1>
            </div>
    </div>

    
                <div class="container mt-4 mb-4">
                 
                    <form action="<?php echo e(route('addNewApi')); ?>" method="post" class="row g-3">
                        <?php echo csrf_field(); ?>
                        <div class="col-md-5">
                            <label for="apiName" class="form-label">API Name</label>
                            <input type="text" name="apiName" class="form-control" id="apiName" placeholder="Enter API name">
                        </div>
                
                        <!-- Input Field 2 -->
                        <div class="col-md-5">
                            <label for="apiUrl" class="form-label">API URL</label>
                            <input type="text" class="form-control" id="apiUrl" name="apiUrl" placeholder="Enter API URL">
                        </div>
                
                        <!-- Submit Button -->
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </div>
                
                    </form>
                
            </div>
           

    <div class="container-fluid cf-cards">
        <div class="row">
            <div class="col-md-12 row">
                <?php $__currentLoopData = $allApis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $api): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <div class="col-md-4 mb-5">

                    <div class="card shadow-lg <?php echo e($api->currentStatus == 'Good Health' ? 'text-bg-success' : 
       ($api->currentStatus == 'Degraded' ? 'text-bg-orange' : 'text-bg-danger')); ?> mb-3" style="max-width: 22rem;">
                        <div class="card-header"><?php echo e($api->urlName); ?></div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($api->API); ?></h5>
                            <p class="card-text">
                                Response Time : <?php echo e($api->responseTime); ?> secs <br>
                                Current Status : <strong><?php echo e($api->currentStatus); ?></strong>
                            </p>
                        </div>
                        <div class="card-footer">
                            <?php if($api->currentStatus == "Good Health"): ?>
                            <p>Last Healthy Time : <?php echo e(\Carbon\Carbon::parse($api->lastHealthyStatus, 'Europe/Nicosia')->setTimezone('Asia/Kolkata')->format('Y-m-d H:i:s')); ?></p>
                            <?php elseif($api->currentStatus == "Degraded"): ?>
                            <p>Last Degraded Time : <?php echo e(\Carbon\Carbon::parse($api->lastDegradedStatus, 'Europe/Nicosia')->setTimezone('Asia/Kolkata')->format('Y-m-d H:i:s')); ?></p>
                            <?php elseif($api->currentStatus == "Unhealththy"): ?>
                            <p>Last Tested Time : <?php echo e(\Carbon\Carbon::parse($api->lastDegradedStatus, 'Europe/Nicosia')->setTimezone('Asia/Kolkata')->format('Y-m-d H:i:s')); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>




    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        setTimeout(function(){
           location.reload();
        }, 60000); // Refresh every 60 seconds (1 minute)
    </script>
    

</body>
</html><?php /**PATH /home2/payit123crm/public_html/CRM/resources/views/apiHealthCheck/index.blade.php ENDPATH**/ ?>