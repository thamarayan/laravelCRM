<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu"><?php echo app('translator')->get('translation.Menu'); ?></li>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage.dashboard')): ?>
                <li>
                    <a href="<?php echo e(url('/index')); ?>" class="waves-effect">
                        <i class="bx bx-grid-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php endif; ?>


                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Users.Users')): ?>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span key="t-contacts">Users</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Role.Manage')): ?>
                        <li><a href="<?php echo e(url('/roles')); ?>" key="">Roles</a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('User.Manage')): ?>
                        <li><a href="<?php echo e(url('/users')); ?>" key="">Users</a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Payment.Manage')): ?>
                        <li><a href="<?php echo e(url('/payments')); ?>" key="">Payment</a> </li>
                        <?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Agents.Agents')): ?>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span key="t-contacts">Agents</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Agent.Manage')): ?>
                        <li><a href="<?php echo e(url('/agent/users')); ?>" key="">Agent Account</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('AgentSetting.Manage')): ?>
                        <li><a href="<?php echo e(url('/agent/setting')); ?>" key="">Agent Setting</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Employees.Employees')): ?>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span key="t-contacts">Employees</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Employee.Manage')): ?>
                        <li><a href="<?php echo e(url('/employee/users')); ?>" key="">Employee</a></li>
                        <?php endif; ?>
                        <li><a href="#" key=""> </a></li>

                    </ul>

                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['payment.requested', 'payment.request'])): ?>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-card"></i>
                        <span key="t-contacts">Payment</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('payment.request')): ?>
                        <li><a href="<?php echo e(route('request.payment')); ?>" key="">Request Payment</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('payment.requested')): ?>
                        <li><a href="<?php echo e(route('requested.payment')); ?>" key="">Requested Payment</a></li>
                        <?php endif; ?>

                    </ul>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('crypto.manage')): ?>
                <li>
                    <a href="<?php echo e(route('crypto')); ?>" class="waves-effect">
                        <i class="bx bx-detail"></i>
                        <span>Crypto</span>
                    </a>
                </li>
                <?php endif; ?>

                <li>
                    <a href="<?php echo e(route('merchant.application')); ?>" class="waves-effect">
                        <i class="bx bx-detail"></i>
                        <span>Merchant Application</span>
                    </a>
                </li>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('network.manage')): ?>
                <li>
                    <a href="<?php echo e(route('network')); ?>" class="waves-effect">
                        <i class="bx bx-detail"></i>
                        <span>Network</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Clients.Clients')): ?>
                <!-- <li>
                        <a href="<?php echo e(url('/customer/clients')); ?>" class="waves-effect">
                            <i class="bx bx-chat"></i>
                            <span>Merchant</span>
                        </a>
                    </li> -->
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('All.Clients')): ?>
                <li>
                    <a href="<?php echo e(url('/admin/allclients')); ?>" class="waves-effect">
                        <i class="bx bx-chat"></i>
                        <span>All Merchants</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('onboarding.manage')): ?>
                <li>
                    <a href="<?php echo e(route('onboardings')); ?>" class="waves-effect">
                        <i class="bx bx-chat"></i>
                        <span>Onboardings</span>
                    </a>
                </li>
                <?php endif; ?>

                <!-- RK -->

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('onboarding.manage')): ?>
                <li>
                    <a href="<?php echo e(route('kycrequests')); ?>" class="waves-effect">
                        <i class="bx bx-chat"></i>
                        <span>KYC Requests</span>
                    </a>
                </li>
                <?php endif; ?>

                <!-- RK -->

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('merchant_payment.manage')): ?>
                <li>
                    <a href="<?php echo e(url('/admin/client/payment')); ?>" class="waves-effect">
                        <i class="bx bx-chat"></i>
                        <span>Merchant Payments</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('payment_method.manage')): ?>
                <li>
                    <a href="<?php echo e(route('payment.method')); ?>" class="waves-effect">
                        <i class="bx bx-chat"></i>
                        <span>Payment Method</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Attendance.Attendance')): ?>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-notepad"></i>
                        <span key="t-contacts">Attendance</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Attendance.Manage')): ?>
                        <li><a href="<?php echo e(url('employee/attendance')); ?>" key="">Attendance</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('MonthlyAttendance.Manage')): ?>
                        <li><a href="<?php echo e(url('monthly/attendance')); ?>" key="">Monthly Attendance</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Leave.Manage')): ?>
                        <li><a href="<?php echo e(url('employee/leaves')); ?>" key="">Leave</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('LeaveType.Manage')): ?>
                        <li><a href="<?php echo e(url('leave_types/index/')); ?>" key="">Leave Type</a></li>
                        <?php endif; ?>

                    </ul>

                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['accounting.accounts', 'accounting.account_create', 'accounting.deposit', 'accounting.expense', 'accounting.transfer', 'accounting.bills', 'accounting.times'])): ?>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span key="t-contacts">Accounting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('accounting.accounts')): ?>
                        <li><a href="<?php echo e(url('/accounts')); ?>" key="">Accounts</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('accounting.account_create')): ?>
                        <li><a href="<?php echo e(route('accounts.create')); ?>" key="">New Account</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('accounting.deposit')): ?>
                        <li><a href="<?php echo e(url('/deposit')); ?>" key="">New Deposit</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('accounting.expense')): ?>
                        <li><a href="<?php echo e(url('/expense')); ?>" key="">New Expense</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('accounting.transfer')): ?>
                        <li><a href="<?php echo e(url('/transfer')); ?>" key="">Transfer</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('accounting.bills')): ?>
                        <li><a href="<?php echo e(url('/bills')); ?>" key="">Bills</a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('accounting.times')): ?>
                        <li><a href="<?php echo e(url('/times')); ?>" key="">Time</a></li>
                        <?php endif; ?>
                        <li><a href="#" key="">View Transactions</a></li>
                        <li><a href="#" key="">Uncleared Transactions</a></li>
                        <li><a href="#" key="">Assets</a></li>

                    </ul>
                </li>
                <?php endif; ?>


                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Projects.Management')): ?>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-user-detail"></i>
                        <span key="t-contacts">Project Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Projects.Show')): ?>
                        <li><a href="<?php echo e(url('/projects')); ?>" key="">Projects</a></li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Task.Show')): ?>
                        <li><a href="<?php echo e(url('/tasks_master')); ?>" key="">Task Master</a></li>
                        <?php endif; ?>


                    </ul>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Sales.Manage')): ?>
                <li>
                    <a href="<?php echo e(url('/adminstatssales')); ?>" class="waves-effect">
                        <i class="bx bx-chat"></i>
                        <span>Sales</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Reports.Manage')): ?>
                <li>
                    <a href="<?php echo e(url('/new/adminstatsreports')); ?>" class="waves-effect">
                        <i class="bx bx-chat"></i>
                        <span>Reports</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Reports.Manage')): ?>
                <li>
                    <a href="<?php echo e(url('/weeklyreports')); ?>" class="waves-effect">
                        <i class="bx bx-chat"></i>
                        <span>Weekly Reports</span>
                    </a>
                </li>
                <?php endif; ?>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End --><?php /**PATH D:\CRM\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>