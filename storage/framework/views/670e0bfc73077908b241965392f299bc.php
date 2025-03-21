<?php $__env->startSection('title'); ?>

    <?php echo app('translator')->get('Crypto'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

    <link href="<?php echo e(URL::asset('build/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo e(URL::asset('build/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>

        <?php $__env->slot('li_1'); ?>

            Crypto

        <?php $__env->endSlot(); ?>

        <?php $__env->slot('title'); ?>

            Crypto

        <?php $__env->endSlot(); ?>

    <?php echo $__env->renderComponent(); ?>

    <div class="row">

        <div class="col-lg-12">

            <?php echo $__env->make('flash_msg', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="row mb-1">

                <div class="col-sm-4">

                    <div class="search-box me-2 mb-2 d-inline-block">

                        <div class="position-relative">

                        </div>

                    </div>

                </div>

                <div class="col-sm-8">

                    <div class="text-sm-end">

                        <a href="<?php echo e(route('crypto.create')); ?>">

                            <button type="button" class="btn btn-success btn-rounded waves-effect waves-light addContact-modal mb-2">
                                
                                <i class="mdi mdi-plus me-1"></i> Add New

                            </button>

                        </a>

                    </div>

                </div>

            </div>

            <div class="card">

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table align-middle table-nowrap table-hover dt-responsive nowrap w-100 display" id="example">

                            <thead class="table-light">

                                <tr>

                                    <th scope="col">#</th>

                                    <th scope="col">Name</th>

                                    <th scope="col">Status</th>

                                    <th scope="col">Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <tr>
                                    
                                        <td><?php echo e(++$key); ?></td>

                                        <td><?php echo e($data->crypto); ?></td>

                                        <td class="text-success">
                                            <?php if($data->status=='1'): ?>
                                                <a href="<?php echo e(route('crypto.status',$data->id)); ?>" class="btn btn-sm btn-success">Active</a>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('crypto.status',$data->id)); ?>" class="btn btn-sm btn-danger">Inactive</a>
                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            
                                            <ul class="list-unstyled hstack gap-1 mb-0">

                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">

                                                    <a href="<?php echo e(route('crypto.edit',$data->id)); ?>" class="btn btn-sm btn-soft-info"><i class="mdi mdi-pencil-outline"></i></a>

                                                </li>

                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                    <a href="<?php echo e(route('crypto.delete',$data->id)); ?>" class="delete-link btn btn-sm btn-soft-danger" onclick="return confirm('Are you sure you want to delete this crypto?')"><i class="mdi mdi-delete-outline"></i></a>

                                                </li>

                                            </ul>

                                        </td>

                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>

    <script>
        jQuery(document).ready(function(){
            new DataTable('#example');
        });
    </script>

    <script src="<?php echo e(URL::asset('build/libs/select2/js/select2.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/js/pages/contact-user-list.init.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home2/payit123crm/public_html/CRM/resources/views/crypto/index.blade.php ENDPATH**/ ?>