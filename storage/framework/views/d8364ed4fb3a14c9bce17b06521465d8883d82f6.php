<?php $__env->startSection('admin_content'); ?>
    <section id="dashboard-ecommerce">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title">
                            <div class="d-flex justify-content-between">
                                <div>Search User</div>
                                <div><a href="<?php echo e(route('admin.customer.index')); ?>" class="btn btn-primary btn-sm"> <i class="bx bx-plus"></i> Customer List </a> </div>
                            </div>
                        </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <form action="<?php echo e(route('admin.search.submit')); ?>" method="get">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="search">Referral ID OR Phone Number</label>
                                    <input type="text" id="search" name="search" class="form-control is-valid" placeholder="Search a user details using username or referal id">
                                </div>
                                <div class="form-group text-center">
                                    <input type="submit" value="Go for Search" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php if(isset($user) && !empty($user)): ?>
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title">
                                <div class="d-flex justify-content-between">
                                    <div>See Result</div>
                                </div>
                            </h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <table class="table-bordered table">
                                    <tr>
                                        <td>User Name</td>
                                        <td><?php echo e($user->name); ?></td>
                                    </tr>
                                    <tr>
                                        <td>phone</td>
                                        <td><?php echo e($user->phone); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Referral Id</td>
                                        <td><?php echo e($user->ref_id); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Referral By</td>
                                        <td><?php echo e($user->ref_by ?? '--'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>User Email</td>
                                        <td><?php echo e($user->email); ?></td>
                                    </tr>
                                    <tr>
                                        <td>User ID</td>
                                        <td>
                                            <?php echo e($user->id ?? '--'); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>User withdraw Balance</td>
                                        <td><?php echo e(price($user->balance)); ?></td>
                                    </tr>
                                    <tr>
                                        <td>User Status</td>
                                        <td><?php echo e($user->status); ?></td>
                                    </tr>
                                    <tr>
                                        <td>User Create Date & Time</td>
                                        <td><?php echo e($user->created_at); ?></td>
                                    </tr>



                                      <tr>
                                        <td>User Withdraw balance add</td>
                                        <td>
                                            <form action="<?php echo e(route('admin.customization.balancewww', 'plus')); ?>" method="">
                                                <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                                                <?php echo e(price($user->balance)); ?> <input type="text" name="plus"><button type="submit">Submit</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>User Withdraw balance minus</td>
                                        <td>
                                            <form action="<?php echo e(route('admin.customization.balancewww', 'minus')); ?>" method="">
                                                <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">
                                                <?php echo e(price($user->balance)); ?> <input type="text" name="minus"><button type="submit">Submit</button>
                                            </form>
                                        </td>
                                    </tr>






                                    <tr>
                                        <td>User <span style="color: <?php if($user->status == 'active'): ?> green <?php else: ?> red <?php endif; ?>"><?php if($user->status == 'active'): ?> Active <?php else: ?> Inactive <?php endif; ?></span> </td>
                                        <td>
                                            <a href="<?php echo e(route('admin.customer.status', $user->id)); ?>"
                                               class="btn <?php if($user->status == 'active'): ?> btn-success <?php else: ?> btn-danger <?php endif; ?>"
                                               style="padding: 3px 7px;font-size: 20px"
                                               data-toggle="tooltip"
                                               title='<?php if($user->status == 'active'): ?> User status inactive after click <?php else: ?> User status active after click <?php endif; ?>'>
                                                <i class="bx <?php if($user->status == 'active'): ?> bx-up-arrow <?php else: ?> bx-down-arrow <?php endif; ?>"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Login Into User Panel</td>
                                        <td>
                                            <a href="<?php echo e(route('admin.customer.login', $user->id)); ?>"
                                               target="_blank"
                                               class="btn btn-info"
                                               style="padding: 3px 7px;font-size: 20px"
                                               data-toggle="tooltip" title='Login Into User Account'>
                                                <i class="bx bx-user"></i></a>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>Give Bonus</td>
                                        <td>
                                            <a href="javascript:void(0)"

                                               class="btn btn-info"
                                               data-target="#bonusModal<?php echo e($user->id); ?>"
                                               data-toggle="modal"
                                               data-toggle="tooltip" title='bonus'>
                                                <i class="bx bx-gift"></i></a>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>Change Password</td>
                                        <td>
                                            <a href="<?php echo e(route('admin.customer.login', $user->id)); ?>"
                                               data-target="#myModal<?php echo e($user->id); ?>"

                                               data-toggle="modal">
                                                <i class="bx bx-lock"></i></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>



                    <form action="<?php echo e(route('admin.customer.change-password')); ?>" method="POST"><?php echo csrf_field(); ?>
                        <div class="modal fade" id="myModal<?php echo e($user->id); ?>">
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
                                            <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <input type="submit" value="Submit" onclick="resetPassword('<?php echo e($user->id); ?>')" class="btn btn-primary">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>




                    <form action="<?php echo e(route('admin.customer.bonus')); ?>" method="POST"><?php echo csrf_field(); ?>
                        <div class="modal fade" id="bonusModal<?php echo e($user->id); ?>">
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
                                            <input type="hidden" name="id" value="<?php echo e($user->id); ?>">
                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <input type="submit" value="Submit" onclick="submitBonus('<?php echo e($user->id); ?>')" class="btn btn-primary">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </section>



<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.partials.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vol1000_8/infinityfree.com/if0_43010282/htdocs/resources/views/admin/pages/users/search.blade.php ENDPATH**/ ?>