<!DOCTYPE html>
<html class="pixel-ratio-3 retina android android-5 android-5-0 watch-active-state">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Balance Record</title>
    
    <link rel="stylesheet" href="/static/home/css/app.css?v=5.8">
    <link rel="stylesheet" href="/static/home/css/iconfont.css">
    
    <script type="text/javascript" src="/static/home/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="/static/home/layui/layui.js"></script>

    <style type="text/css">
    :root {
        --accent-blue: #318cdf;
        --bg-light: #fafafa;
    }
    * { margin: 0; padding: 0; list-style: none; box-sizing: border-box; }
    
    body { background: var(--bg-light); font-family: sans-serif; overflow-x: hidden; }

    /* --- Blue Theme Preloader --- */
    #preloader {
        position: fixed; top: 0; left: 0; width: 100%; height: 100%;
        background: #fff; display: flex; justify-content: center;
        align-items: center; z-index: 10000;
    }
    #preloader img { width: 100px; }

    /* --- Navbar Styling (Fixed Overlap) --- */
    .navbar { 
        background-color: var(--accent-blue) !important; 
        height: 50px; color: #fff;
        position: fixed; top: 0; width: 100%; z-index: 100;
        display: flex; align-items: center; justify-content: space-between;
        padding: 0 10px;
    }
    .navbar .left { width: 80px; display: flex; align-items: center; }
    .navbar .left a { color: #fff; text-decoration: none; font-size: 14px; display: flex; align-items: center; }
    .navbar .center { flex: 1; text-align: center; font-weight: bold; font-size: 16px; }
    .navbar .right { width: 80px; }

    /* Balance Top Info */
    .tixianlog-index-top { 
        margin-top: 65px; 
        background: var(--accent-blue); 
        margin: 65px 15px 15px 15px; 
        padding: 20px; 
        border-radius: 12px; 
        text-align: center; 
        color: #fff;
        box-shadow: 0 4px 10px rgba(49, 140, 223, 0.2);
    }
    .tixianlog-index-top-title { font-size: 14px; opacity: 0.9; margin-bottom: 5px; }
    .tixianlog-index-top-mull { font-size: 24px; font-weight: 800; }

    /* Record List Styling */
    .rlist { padding: 0 15px; margin-bottom: 80px; }
    .tixianlog-item { 
        background: #fff; 
        border-radius: 12px; 
        padding: 15px; 
        margin-bottom: 12px; 
        box-shadow: 0 2px 5px rgba(0,0,0,0.03);
        border: 1px solid #eee;
    }
    .tixianlog-log-top1 { display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px; }
    .tixianlog-log-top1-title { font-weight: 700; font-size: 15px; color: #333; }
    .tixianlog-log-top1-time { font-size: 11px; color: #999; }
    
    .tixianlog-log-boy1 { display: flex; justify-content: space-between; align-items: center; }
    .tixianlog-log-boy1-money { font-weight: 800; font-size: 16px; }
    .tixianlog-log-boy1-balance { font-size: 12px; color: #666; font-weight: 500; }

    .get { color: #318cdf; } /* Income Color */
    .out { color: #f44336; } /* Expense Color */
    
    .nodata { text-align: center; padding: 50px; color: #999; }

    /* --- 5-Bar Footer --- */
    footer {
        position: fixed; bottom: 0; width: 100%; background: #fff;
        display: flex; justify-content: space-around; padding: 10px 0;
        border-top: 1px solid #eee; z-index: 999;
    }
    .foot_bo { text-align: center; flex: 1; text-decoration: none; }
    .foot_bo img { width: 24px; height: 24px; }
    .foot_bo p { font-size: 12px; color: #666; margin-top: 2px; }
    .xz { color: var(--accent-blue) !important; font-weight: bold; }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <img src="<?php echo e(asset('public/loading.gif')); ?>" alt="Loading...">
    </div>

    <div class="views">
        <!-- Navbar -->
        <div class="navbar">
            <div class="left">
                <a href="<?php echo e(url('/my-profile')); ?>" class="external link">
                    <i class="icon iconfont icon-angleleft" style="font-size: 18px;"></i> Back
                </a>
            </div>
            <div class="center">Balance Record</div>
            <div class="right"></div>
        </div>

        <div class="page navbar-fixed">
            <!-- Balance Card -->
            <div class="tixianlog-index-top">
                <p class="tixianlog-index-top-title">Current Balance</p>
                <p class="tixianlog-index-top-mull">৳ <?php echo e(number_format(auth()->user()->balance ?? 0, 2)); ?></p>
            </div>
            
            <!-- Combined Record List -->
            <div class="rlist">
                <?php
                    // সব ইনকাম এবং লেজার রেকর্ড একসাথে আনা হলো
                    $ledgers = \App\Models\UserLedger::where('user_id', auth()->id())
                                ->latest()
                                ->get();
                ?>

                <?php $__empty_1 = true; $__currentLoopData = $ledgers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="tixianlog-item">
                    <div class="tixianlog-log-top1">
                        <div class="tixianlog-log-top1-title"><?php echo e($item->reason ?? 'Transaction'); ?></div>
                        <div class="tixianlog-log-top1-time"><?php echo e($item->created_at->format('d M Y, h:i A')); ?></div>
                    </div>
                    <div class="tixianlog-log-boy1">
                        <div class="tixianlog-log-boy1-money <?php echo e($item->amount >= 0 ? 'get' : 'out'); ?>">
                            <?php echo e($item->amount >= 0 ? '+' : ''); ?><?php echo e(number_format($item->amount, 2)); ?>

                        </div>
                        <div class="tixianlog-log-boy1-balance">Balance: <?php echo e(number_format($item->balance_after ?? 0, 2)); ?></div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="nodata">
                    <img src="/static/home/img/no-data.png" style="width: 80px; opacity: 0.4; margin-bottom:10px;"><br>
                    No Data Found
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- 5 Bar Footer Applied -->
    <footer>
        <div class="foot_bo">
            <a href="<?php echo e(route('dashboard')); ?>">
                <img src="/static/home/img/i2.png" />
                <p>Home</p>
            </a>
        </div>
        <div class="foot_bo">
            <a href="<?php echo e(route('vip')); ?>">
                <img src="/static/home/img/i11.png" />
                <p>Earnings</p>
            </a>
        </div>
        <div class="foot_bo">
            <a href="<?php echo e(route('publish.records')); ?>">
                <img src="/static/home/img/i5.png" />
                <p>Publish</p>
            </a>
        </div>
        <div class="foot_bo">
            <a href="<?php echo e(route('user.invite')); ?>">
                <img src="/static/home/img/i7.png" />
                <p>Share</p>
            </a>
        </div>
        <div class="foot_bo">
            <a href="<?php echo e(route('profile')); ?>">
                <img src="/static/home/img/i9.png" />
                <p class="xz">My</p>
            </a>
        </div>
    </footer>

    <script type="text/javascript">
        window.addEventListener('load', function() {
            setTimeout(function(){
                $('#preloader').fadeOut('slow');
            }, 600);
        });
    </script>
</body>
</html><?php /**PATH /home/vol1000_8/infinityfree.com/if0_43010282/htdocs/resources/views/app/main/allrecord.blade.php ENDPATH**/ ?>