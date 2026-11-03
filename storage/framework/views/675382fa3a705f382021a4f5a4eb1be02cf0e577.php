<?php $__env->startSection('admin_content'); ?>
    <style>
        .card-body {
            background: #0fff55;
        }

        .text-muted {
            color: #fff !important;
        }

        h3 {
            color: #fff;
        }
    </style>
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-xl-12 col-12 dashboard-users">
                <div class="row  ">
                    <div class="col-12">

                            <div class="col-sm-6 col-12 dashboard-users-danger">
                                <div class="card text-center">
                                    <div class="card-content">
                                        <div class="card-body py-1">
                                            <div
                                                class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                                <i class="bx bx-circle font-medium-5"></i>
                                            </div>
                                            <div class="text-muted line-ellipsis">Submit Today Salary</div>
                                            <h3 class="my-1">
                                                <?php if(\App\Models\Admin::first()->salary_date != date('Y-m-d')): ?>
                                                    <div class="alert alert-warning" style="font-size: 20px;margin-bottom: 15px;">When clicked this button please wait minimum 1 minutes</div>
                                                <?php endif; ?>
                                                <a href="<?php echo e(route('admin.salary.submit')); ?>" onclick="this.innerText = 'Processing...'" class="btn  btn-success">Submit Salary</a>
                                            </h3>
                                            <?php if(\App\Models\Admin::first()->salary_date == date('Y-m-d')): ?>
                                                <div class="alert alert-danger" style="font-size: 20px;margin-top: 15px;">Today Salary already submitted</div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.partials.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vol1000_8/infinityfree.com/if0_43010282/htdocs/resources/views/admin/salary.blade.php ENDPATH**/ ?>