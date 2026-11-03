<nav class="nav" style="background-size:100% 100%; height:60px; ">
    <div onclick="window.location.href='<?php echo e(route('dashboard')); ?>'" <?php if(\Route::currentRouteName() == 'dashboard'): ?> style="color: #00A478 !important; font-weight: bold;" <?php endif; ?>>
        <?php if(\Route::currentRouteName() == 'dashboard'): ?>
            <img src="<?php echo e(asset('public')); ?>/ui3/nav/1.png" style="height: 28px;"> <br>
            <span id="nav_btn1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Home</font></font></span>
        <?php else: ?>
            <img src="<?php echo e(asset('public')); ?>/ui3/nav/1.png" class="gray" style="height: 28px;"> <br>
            <span id="nav_btn1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Home</font></font></span>
        <?php endif; ?>
    </div>
    <div class="navtab " onclick="window.location.href='<?php echo e(route('vip')); ?>'" <?php if(\Route::currentRouteName() == 'vip'): ?> style="color: #00A478 !important; font-weight: bold;" <?php endif; ?>>
        <?php if(\Route::currentRouteName() == 'vip'): ?>
            <img src="<?php echo e(asset('public')); ?>/ui3/nav/2.png" class="" style="height: 28px;"> <br>
            <span id="nav_btn2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">The product</font></font></span>
        <?php else: ?>
            <img src="<?php echo e(asset('public')); ?>/ui3/nav/2.png" class="gray" style="height: 28px;"> <br>
            <span id="nav_btn2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">The product</font></font></span>
        <?php endif; ?>
    </div>
    <div class="navtab" onclick="window.location.href='<?php echo e(route('user.team')); ?>'" <?php if(\Route::currentRouteName() == 'user.team'): ?> style="color: #00A478 !important; font-weight: bold;" <?php endif; ?>>
        <?php if(\Route::currentRouteName() == 'user.team'): ?>
            <img src="<?php echo e(asset('public')); ?>/ui3/nav/3.png" class="" style="height:28px;"> <br>
            <span id="nav_btn3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">the team</font></font></span>
        <?php else: ?>
            <img src="<?php echo e(asset('public')); ?>/ui3/nav/3.png" class="gray" style="height:28px;"> <br>
            <span id="nav_btn3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">the team</font></font></span>
        <?php endif; ?>
    </div>
    <div class="navtab" onclick="window.location.href='<?php echo e(route('profile')); ?>'" <?php if(\Route::currentRouteName() == 'profile'): ?> style="color: #00A478 !important; font-weight: bold;" <?php endif; ?>>
        <?php if(\Route::currentRouteName() == 'profile'): ?>
            <img src="<?php echo e(asset('public')); ?>/ui3/nav/4.png" class="" style="height: 28px;"> <br>
            <span id="nav_btn4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">I-Am</font></font></span>
        <?php else: ?>
            <img src="<?php echo e(asset('public')); ?>/ui3/nav/4.png" class="gray" style="height: 28px;"> <br>
            <span id="nav_btn4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">I-Am</font></font></span>
        <?php endif; ?>
    </div>
</nav>
<?php /**PATH /home/vol1000_8/infinityfree.com/if0_43010282/htdocs/resources/views/app/layout/menu.blade.php ENDPATH**/ ?>