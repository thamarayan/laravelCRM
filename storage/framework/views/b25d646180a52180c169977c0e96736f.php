<!-- JAVASCRIPT -->
<script src="<?php echo e(url('build/libs/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(url('build/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(url('build/libs/metismenu/metisMenu.min.js')); ?>"></script>
<script src="<?php echo e(url('build/libs/simplebar/simplebar.min.js')); ?>"></script>
<script src="<?php echo e(url('build/libs/node-waves/waves.min.js')); ?>"></script>

<?php echo $__env->yieldContent('script'); ?>

<!-- App js -->
<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>

<!-- Include Axios for making AJAX requests -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<!-- Your JavaScript code for tracking tab focus and blur events -->
<script>
    let timerIsActive = false;

    // Function to start the timer
    function startTimer() {
        if (!timerIsActive) {
            timerIsActive = true;
            // Send a request to your server to start the timer
            axios.post('/CRM/public/start-timer')
                .then(response => {
                    console.log('Timer started on the server');
                })
                .catch(error => {
                    console.error('Error starting timer:', error);
                });
        }
    }

    // Function to stop the timer
    function stopTimer() {
        if (timerIsActive) {
            timerIsActive = false;
            // Send a request to your server to stop the timer
            axios.post('/CRM/public/stop-timer')
                .then(response => {
                    console.log('Timer stopped on the server');
                })
                .catch(error => {
                    console.error('Error stopping timer:', error);
                });
        }
    }

    // Listen for tab focus and blur events
    window.addEventListener('focus', startTimer);
    window.addEventListener('blur', stopTimer);

    // Initially start the timer when the page is loaded or the tab is active
    startTimer();
</script>

<script>
    function hideCC(argument) {
        
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
       
        $.ajax({
            url: "<?php echo e(url('admin/hide')); ?>",
            type: 'POST',
            data: {_token: CSRF_TOKEN, id:argument},
            dataType: 'JSON',
            success: function (data) { 
                $('.hide_section').html(data.modal_view);
            }
        }); 
    }
</script>

<script>
    function getCustomerPay(argument) {
        
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
       
        $.ajax({
            url: "<?php echo e(route('get.customer.payment')); ?>",
            type: 'POST',
            data: {_token: CSRF_TOKEN, customer_id:argument},
            dataType: 'JSON',
            success: function (data) { 
                console.log(data);
                $('.payment_list').html('');
                $('.payment_list').html(data);
            }
        }); 
    }
</script>







<?php echo $__env->yieldContent('script-bottom'); ?><?php /**PATH D:\laravelCRM\resources\views/layouts/vendor-scripts.blade.php ENDPATH**/ ?>