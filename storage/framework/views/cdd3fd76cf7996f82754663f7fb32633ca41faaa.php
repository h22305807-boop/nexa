<html xmlns="http://www.w3.org/1999/xhtml" style="font-size: 55.2px;">
<head>
    <title>NEXA-Earnings</title>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- CSS Path हरू -->
    <link rel="stylesheet" href="/static/home/css/app.css?v=5.8">
    <link rel="stylesheet" href="/static/home/css/iconfont.css">
    <link rel="stylesheet" href="/static/ui/css/common.css">
    <link rel="stylesheet" href="/static/ui/css/signin.css">
    <link href="/static/ui/css/swiper.min.css" rel="stylesheet">
    <link href="/static/ui/css/lease.css" rel="stylesheet">
    <link rel="stylesheet" href="/static/basic.css">

    <script src="/static/home/js/jquery-1.11.3.min.js"></script>
    <script src="/static/ui/js/common.js"></script>
    <script src="/static/ui/js/swiper.min.js"></script>
    <script type="text/javascript" src="/static/home/js/layer.js"></script>

    <style>
        * {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            text-decoration: none;
            list-style: none;
            box-sizing: border-box;
        }
        body {
            background-color: #f4f6f9;
        }
        /* टपबार डिजाइन */
        .top-navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 48px;
            background: #318cdf;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 15px;
            z-index: 100;
        }
        .top-navbar a {
            color: #fff;
            font-size: 15px;
        }
        .top-navbar span {
            font-size: 17px;
            font-weight: bold;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }
        /* मुख्य कन्टेन्ट क्षेत्र */
        .main-content {
            padding: 60px 14px 140px 14px;
            min-height: 80vh;
        }
        .no-device {
            text-align: center;
            color: #999;
            font-size: 15px;
            margin-top: 60px;
        }
        /* कार्ड डिजाइन */
        .earning-card {
            background: #fff;
            border-radius: 14px;
            margin-bottom: 18px;
            box-shadow: 0 4px 18px rgba(0,0,0,0.06);
            overflow: hidden;
            position: relative;
            border: 1px solid #eaeaea;
        }
        .card-top-date {
            background: #318cdf;
            color: #fff;
            font-size: 12px;
            padding: 4px 12px;
            border-bottom-left-radius: 10px;
            position: absolute;
            top: 0;
            right: 0;
            font-weight: 500;
        }
        .card-stats {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 22px 18px 14px 18px;
        }
        .stat-item {
            text-align: center;
            flex: 1;
        }
        .stat-item h4 {
            font-size: 15px;
            color: #2e7d32;
            font-weight: bold;
            margin-bottom: 3px;
        }
        .stat-item p {
            font-size: 12px;
            color: #888;
        }
        .card-body-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 18px 16px 18px;
            border-top: 1px solid #f2f2f2;
        }
        .product-info {
            display: flex;
            align-items: center;
        }
        .product-info img {
            width: 60px;
            height: 42px;
            border-radius: 6px;
            object-fit: cover;
            border: 1px solid #eee;
        }
        .product-info .details {
            margin-left: 12px;
        }
        .product-info .details h3 {
            font-size: 14px;
            color: #333;
            font-weight: bold;
        }
        .product-info .details p {
            font-size: 11px;
            color: #888;
            margin-top: 2px;
        }
        .at-work-btn {
            background: #00c853;
            color: #fff;
            font-size: 13px;
            padding: 7px 18px;
            border-radius: 20px;
            font-weight: 500;
            display: inline-block;
        }
        .card-footer-row {
            background: #318cdf;
            color: #fff;
            display: flex;
            justify-content: space-between;
            padding: 8px 18px;
            font-size: 12px;
        }
        /* तलको रिसिभ बार */
        .bottom-receive-bar {
            position: fixed;
            bottom: 54px;
            left: 0;
            width: 100%;
            background: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            box-shadow: 0 -2px 12px rgba(0,0,0,0.08);
            z-index: 99;
        }
        .bottom-receive-bar .amount {
            font-size: 19px;
            color: #318cdf;
            font-weight: bold;
        }
        .bottom-receive-bar .receive-btn {
            background: #318cdf;
            color: #fff;
            border: none;
            padding: 10px 38px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }
        /* फुटर मेनु - आइकन र टेक्स्ट हल्का माथि मिलाइएको र बराबर साइज */
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: #fff;
            display: flex;
            justify-content: space-around;
            padding: 5px 0 6px 0;
            border-top: 1px solid #eee;
            z-index: 100;
        }
        .foot_bo {
            text-align: center;
            flex: 1;
        }
        .foot_bo a {
            display: block;
            padding-top: 2px;
        }
        .foot_bo img {
            width: 24px;
            height: 24px;
            object-fit: contain;
            display: inline-block;
        }
        .foot_bo p {
            font-size: 11px;
            color: #666;
            margin-top: 1px;
        }
        .foot_bo p.xz {
            color: #318cdf !important;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <!-- टपबार -->
    <div class="top-navbar">
        <a href="javascript:history.back();">&lt; Back</a>
        <span>Earnings</span>
        <span></span>
    </div>

    <!-- कन्टेन्ट बडी -->
    <div class="main-content">
        <div class="lease wrap">
            <?php
                $activePackages = \App\Models\Package::whereIn('id', my_vips())->where('status', 'active')->get();
            ?>

            <?php if($activePackages->count() > 0): ?>
                <?php $__currentLoopData = $activePackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $myPackage = \App\Models\Purchase::where('user_id', auth()->id())->where('package_id',$element->id)->where('status', 'active')->first();
                    ?>
                    
                    <div class="earning-card">
                        <!-- मिति ब्याज -->
                        <div class="card-top-date"><?php echo e($myPackage->date ?? '2026-09-25'); ?></div>

                        <!-- माथिल्लो भाग: आय र मूल्य -->
                        <div class="card-stats">
                            <div class="stat-item">
                                <h4>NPR <?php echo e(number_format($element->commission_with_avg_amount / $element->validity, 2)); ?></h4>
                                <p>Day Income</p>
                            </div>
                            <div class="stat-item">
                                <h4>NPR <?php echo e(number_format($element->commission_with_avg_amount, 2)); ?></h4>
                                <p>Total Income</p>
                            </div>
                            <div class="stat-item">
                                <h4>NPR <?php echo e(number_format($element->price, 2)); ?></h4>
                                <p>Price</p>
                            </div>
                        </div>

                        <!-- बीचको भाग: फोटो, नाम र At Work बटन -->
                        <div class="card-body-row">
                            <div class="product-info">
                                <img src="<?php echo e(asset($element->photo)); ?>" alt="">
                                <div class="details">
                                    <h3><?php echo e($element->name); ?></h3>
                                    <p>Working For 22 Days</p>
                                </div>
                            </div>
                            <div>
                                <span class="at-work-btn">At Work</span>
                            </div>
                        </div>

                        <!-- तल्लो नीलो पट्टी: कलेक्सन र स्टेटस -->
                        <div class="card-footer-row">
                            <span>Collection: Daily</span>
                            <span>Status : Active</span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="no-device">No active devices found.</div>
            <?php endif; ?>
        </div>
    </div>

    <!-- तलको रिसिभ बार -->
    <div class="bottom-receive-bar">
        <div class="amount">NPR 0.00</div>
        <button class="receive-btn" onclick="receiveEarnings()">Receive</button>
    </div>

    <?php echo $__env->make('alert-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- फुटर मेनु -->
    <footer> 
        <div class="foot_bo"> 
            <a href="<?php echo e(url('dashboard')); ?>"> 
                <img src="/static/home/img/i1.png" /> 
                <p>Home</p> 
            </a> 
        </div> 
        <div class="foot_bo"> 
            <a href="<?php echo e(route('vip')); ?>"> 
                <img src="/static/home/img/i11.png" /> 
                <p class="xz">Earnings</p> 
            </a> 
        </div> 
        <div class="foot_bo"> 
            <a href="<?php echo e(url('publish/records')); ?>"> 
                <img src="/static/home/img/i5.png" /> 
                <p>Publish</p> 
            </a> 
        </div> 
        <div class="foot_bo"> 
            <a href="<?php echo e(route('user.invite')); ?>"> 
                <img src="/static/home/img/i8.png" /> 
                <p>Share</p> 
            </a> 
        </div> 
        <div class="foot_bo"> 
            <a href="<?php echo e(route('profile')); ?>"> 
                <img src="/static/home/img/i9.png" /> 
                <p>My</p> 
            </a> 
        </div> 
    </footer>

    <script>
        function receiveEarnings() {
            layer.open({
                content: 'No earnings to collect yet!',
                skin: 'msg',
                time: 2
            });
        }
    </script>
</body>
</html>
        <?php /**PATH /home/vol1000_8/infinityfree.com/if0_43010282/htdocs/resources/views/app/main/earning.blade.php ENDPATH**/ ?>