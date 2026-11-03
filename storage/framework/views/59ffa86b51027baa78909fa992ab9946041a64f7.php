<!DOCTYPE html>
<html class="pixel-ratio-3 retina android android-5 android-5-0 watch-active-state">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Recharge Record</title>

    <link rel="stylesheet" href="/static/home/css/app.css?v=5.8">
    <link rel="stylesheet" href="/static/home/css/iconfont.css">
    
    <script type="text/javascript" src="/static/home/js/jquery-1.11.3.min.js"></script>

    <style type="text/css">
    :root {
        --accent-blue: #318cdf;
        --bg-light: #fafafa;
        --success: #4caf50;
        --pending: #ff9800;
        --failed: #f44336;
    }
    * { margin:0; padding:0; list-style:none; box-sizing: border-box; }
    
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
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 10px;
    }
    .navbar .left { width: 80px; display: flex; align-items: center; }
    .navbar .left a { color: #fff; text-decoration: none; font-size: 14px; display: flex; align-items: center; }
    .navbar .center { flex: 1; text-align: center; font-weight: bold; font-size: 16px; }
    .navbar .right { width: 80px; }

    /* --- Record List Styling --- */
    .rlist { padding: 15px; margin-top: 55px; margin-bottom: 75px; }

    .ritem {
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 20px;
        overflow: hidden;
        border: 1px solid #eee;
    }

    .ritem_title {
        background-color: var(--accent-blue);
        color: #fff;
        padding: 10px 15px;
        font-size: 13px;
        font-weight: 500;
        display: flex;
        justify-content: space-between;
    }

    .ritem_box { padding: 15px 0; }

    .ritem_con {
        padding: 4px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 14px;
    }

    .ritem_con .title { color: #888; }
    .ritem_con .msg { color: #333; font-weight: 600; text-align: right; }

    .jine { font-weight: bold; color: var(--accent-blue); font-size: 17px; }

    /* --- New Status Footer Design --- */
    .ritem_footer { 
        padding: 10px;
        text-align: center;
        border-top: 1px dashed #eee;
        background-color: #fcfcfc;
    }

    .status_label {
        font-size: 12px;
        font-weight: bold;
        padding: 4px 15px;
        border-radius: 20px;
        color: #fff;
        display: inline-block;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-approved, .status-success { background-color: var(--success); box-shadow: 0 2px 6px rgba(76, 175, 80, 0.3); } 
    .status-pending { background-color: var(--pending); box-shadow: 0 2px 6px rgba(255, 152, 0, 0.3); }
    .status-rejected, .status-failed { background-color: var(--failed); box-shadow: 0 2px 6px rgba(244, 67, 54, 0.3); }

    .no-record { text-align: center; padding: 50px; color: #999; }

    /* --- 5-Bar Footer --- */
    footer {
        position: fixed; bottom: 0; width: 100%; background: #fff;
        display: flex; justify-content: space-around; padding: 10px 0;
        border-top: 1px solid #eee; z-index: 999;
    }
    .foot_bo { text-align: center; flex: 1; text-decoration: none; }
    .foot_bo img { width: 24px; height: 24px; }
    .foot_bo p { font-size: 11px; color: #666; margin-top: 2px; }
    .xz { color: var(--accent-blue) !important; font-weight: bold; }
    </style>
</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <img src="<?php echo e(asset('public/loading.gif')); ?>" alt="Loading...">
    </div>

    <div class="views">
        <!-- Blue Navbar -->
        <div class="navbar">
            <div class="left">
                <a href="<?php echo e(url('my-profile')); ?>" class="external link">
                    <i class="icon iconfont icon-angleleft" style="font-size: 18px;"></i> Back
                </a>
            </div>
            <div class="center">Recharge Record</div>
            <div class="right"></div>
        </div>

        <div class="page-content">
            <div class="rlist">
                <?php
                    $deposits = \App\Models\Deposit::where('user_id', auth()->id())->orderByDesc('id')->get();
                ?>

                <?php $__empty_1 = true; $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="ritem">
                        <div class="ritem_title">
                            <span>Order ID : #<?php echo e($element->id); ?></span>
                        </div>
                        <div class="ritem_box">
                            <div class="ritem_con">
                                <div class="title">Recharge Amount</div>
                                <div class="msg jine">৳<?php echo e(number_format($element->amount, 2)); ?></div>
                            </div>
                            <div class="ritem_con">
                                <div class="title">Date & Time</div>
                                <div class="msg"><?php echo e($element->created_at->format('d M Y, h:i A')); ?></div>
                            </div>
                        </div>
                        
                        <!-- Status Footer: Always Shown as requested -->
                        <div class="ritem_footer">
                            <span class="status_label status-<?php echo e(strtolower($element->status)); ?>">
                                <?php echo e($element->status == 'pending' ? 'Processing' : ucfirst($element->status)); ?>

                            </span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="no-record">
                        <img src="/static/home/img/no-data.png" style="width: 80px; opacity: 0.4; margin-bottom:10px;"><br>
                        No Data Found
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="foot_bo"><a href="<?php echo e(route('dashboard')); ?>"><img src="/static/home/img/i2.png" /><p>Home</p></a></div>
        <div class="foot_bo"><a href="<?php echo e(route('vip')); ?>"><img src="/static/home/img/i11.png" /><p>Earnings</p></a></div>
        <div class="foot_bo"><a href="<?php echo e(route('publish.records')); ?>"><img src="/static/home/img/i5.png" /><p>Publish</p></a></div>
        <div class="foot_bo"><a href="<?php echo e(route('user.invite')); ?>"><img src="/static/home/img/i7.png" /><p>Share</p></a></div>
        <div class="foot_bo"><a href="<?php echo e(route('profile')); ?>"><img src="/static/home/img/i9.png" /><p class="xz">My</p></a></div>
    </footer>

    <script type="text/javascript">
        window.addEventListener('load', function() {
            setTimeout(function(){
                $('#preloader').fadeOut('slow');
            }, 600);
        });
    </script>
</body>
</html><?php /**PATH /home/vol1000_8/infinityfree.com/if0_43010282/htdocs/resources/views/app/main/recharge/recharge_record.blade.php ENDPATH**/ ?>