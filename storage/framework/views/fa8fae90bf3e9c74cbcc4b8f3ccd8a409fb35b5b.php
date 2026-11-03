<?php $__env->startSection('admin_content'); ?>
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">
                            <div class="d-flex justify-content-between">
                                <div>Customers Lists</div>
                                <div>
                                    <a href="<?php echo e(route('admin.search.user')); ?>" class="btn btn-success"><i class="bx bx-user"></i> Search A User</a>
                                </div>
                            </div>
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="mes">

                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped dataex-html5-selectors">
                                    <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Photo</th>
                                        <th>Referred by</th>
                                        <th>Referral id</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Active VIPs</th>
                                        <th>Balance</th>
                                        <th>Status</th>
                                        <th>Active</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key + 1); ?></td>
                                            <td>
                                                <a href="<?php echo e(asset($row->photo ? view_image($row->photo) : not_found_img())); ?>"
                                                   target="_blank">
                                                    <img width="40"
                                                         src="<?php echo e(asset($row->photo ? view_image($row->photo) : not_found_img())); ?>"
                                                         alt="Package Photo">
                                                </a>
                                            </td>
                                            <td><?php echo e($row->ref_by ?? 'Not Use'); ?></td>
                                            <td><?php echo e($row->ref_id); ?></td>
                                            <td><?php echo e($row->name); ?></td>
                                            <td><?php echo e($row->username); ?></td>
                                            <td>
                                                <?php $__currentLoopData = my_vips(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="badge badge-secondary">
                                                        <?php echo e(\App\Models\Package::find($id)->name ?? '---'); ?>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>
                                            <td><?php echo e(number_format($row->balance, 2)); ?></td>
                                            <td><?php echo e($row->status); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('admin.customer.login', $row->id)); ?>"
                                                   target="_blank"
                                                   class="btn btn-info"
                                                   style="padding: 3px 7px;font-size: 20px"
                                                   data-toggle="tooltip" title='Login Into User Account'>
                                                    <i class="bx bx-user"></i></a>

                                                <a href="javascript:void(0)"
                                                   class="btn btn-primary"
                                                   data-target="#myModal<?php echo e($row->id); ?>"
                                                   style="padding: 3px 7px;font-size: 20px"
                                                   data-toggle="modal" title='Change Password'>
                                                    <i class="bx bx-lock"></i></a>

                                                <a href="<?php echo e(route('admin.customer.status', $row->id)); ?>"
                                                   class="btn <?php if($row->status == 'active'): ?> btn-success <?php else: ?> btn-danger <?php endif; ?>"
                                                   style="padding: 3px 7px;font-size: 20px"
                                                   data-toggle="tooltip"
                                                   title='<?php if($row->status == 'active'): ?> User status inactive after click <?php else: ?> User status active after click <?php endif; ?>'>
                                                    <i class="bx <?php if($row->status == 'active'): ?> bx-up-arrow <?php else: ?> bx-down-arrow <?php endif; ?>"></i></a>
                                            </td>
                                        </tr>

                                        <form action="javascript:void(0)" method="POST"><?php echo csrf_field(); ?>
                                            <div class="modal fade" id="myModal<?php echo e($row->id); ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Set New Password</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="password">Password </label>
                                                                <input name="password" id="password" class="form-control is-valid" placeholder="Set User Password Again">
                                                            </div>
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <input type="submit" value="Submit" onclick="resetPassword('<?php echo e($row->id); ?>')" class="btn btn-primary">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>


                                        <form action="javascript:void(0)" method="POST"><?php echo csrf_field(); ?>
                                            <div class="modal fade" id="bonusModal<?php echo e($row->id); ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Gift a bonus</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="bonus">Enter bonus code </label>
                                                                <input type="text" name="bonus" id="bonus" required class="form-control is-valid" placeholder="Bonus code">
                                                            </div>
                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <input type="submit" value="Submit" onclick="submitBonus('<?php echo e($row->id); ?>')" class="btn btn-primary">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                                <?php echo e($users->links("pagination::bootstrap-4")); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <script>
        function submitBonus(id)
        {
            var bonus = document.querySelector('input[name="bonus"]').value;
            var data = {
                id: id,
                bonus: bonus
            }
            fetch('<?php echo e(route('admin.customer.bonus')); ?>',
                {
                    method:"POST",
                    body:JSON.stringify(data),
                    headers: {'Content-type': 'application/json; charset=UTF-8', 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}})
                .then(response => response.json())
                .then(data => {
                    if (data.status === true){
                        document.querySelector('.mes').innerHTML = `<div class="alert alert-success">${data.message}</div>`
                        document.querySelector('#bonusModal'+id).style.display = 'none'
                        document.querySelector('.modal-backdrop.show').style.display = 'none'
                    }else {
                        document.querySelector('.mes').innerHTML = `<div class="alert alert-success">Something went wrong</div>`
                    }
                });
        }
    </script>


    <script>
        function resetPassword(id)
        {
            var password = document.querySelector('input[name="password"]').value;
            var data = {
                id: id,
                password: password
            }
            fetch('<?php echo e(route('admin.customer.change-password')); ?>',
                {
                    method:"POST",
                    body:JSON.stringify(data),
                    headers: {'Content-type': 'application/json; charset=UTF-8', 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}})
                .then(response => response.json())
                .then(data => {
                    if (data.status === true){
                        document.querySelector('.mes').innerHTML = `<div class="alert alert-success">${data.message}</div>`
                        window.location.reload();
                    }else {
                        document.querySelector('.mes').innerHTML = `<div class="alert alert-success">Something went wrong</div>`
                    }
                });
        }
    </script>
<?php $__env->stopSection(); ?>






<?php echo $__env->make('admin.partials.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vol1000_8/infinityfree.com/if0_43010282/htdocs/resources/views/admin/pages/users/users.blade.php ENDPATH**/ ?>