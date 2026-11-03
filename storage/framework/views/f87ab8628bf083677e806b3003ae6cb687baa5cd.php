<!DOCTYPE html>
<html class="pixel-ratio-3 retina android android-5 android-5-0 watch-active-state">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <title>NEXA</title>
    <link rel="stylesheet" href="/static/home/css/app.css?v=5.8">
    <link rel="stylesheet" href="/static/home/css/iconfont.css">
    <link rel="stylesheet" href="/static/home/css/style.css?v=1">
    
    <script type="text/javascript" src="/static/home/js/TouchSlide.1.1.js"></script>
    <script type="text/javascript" src="/static/home/js/jquery-1.11.3.min.js"></script>
    
    <script src="https://cdn.bootcdn.net/ajax/libs/layer/2.3/mobile/layer.js"></script>
    
    <style type="text/css">
    * {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    body {
        background: #fafafa;
    }

    .index_top_img img {
        height: 10rem;
        width: 100%;
    }

    .page-content {
        background: #fff;
        padding: 20px 0 10px;
    }

    .bd .pic img {
        width: 100%;
        height: 160px;
    }

    .vip {
        background: #fc5f2e;
        color: #fff;
        font-size: 10px;
        border-radius: 8px;
        padding: 2px 5px;
        margin-left: 10px;
        letter-spacing: 1px;
    }

    .earnings_list {
        padding: 10px;
        margin-bottom: 50px;
    }

    .earnings_item {
        margin: 10px 0;
        background-color: #ffffff;
        border-radius: 10px;
        padding: 10px;
        position: relative;
        will-change: transform;
    }

    .earnings_item_top {
        display: flex;
        flex-direction: row;
    }

    .earnings_item_btn {
        width: 88%;
        height: 2rem;
        background: linear-gradient(90deg, #318cdf, rgb(107, 177, 243));
        display: block;
        margin: 1rem auto 0 auto;
        font-size: 14px;
        text-align: center;
        line-height: 2rem;
        border-radius: 2rem;
        color: #fff;
        position: relative;
        overflow: hidden;
        text-decoration: none;
    }

    .earnings_item_btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.2));
        transform: rotate(135deg);
        animation: shimmer 5s infinite;
    }

    @keyframes shimmer {
        0% { left: -100%; }
        50% { left: 100%; }
        100% { left: 100%; }
    }

    .earnings_img {
        width: 140px;
        height: 90px;
    }

    .earnings_img img {
        width: 100%;
        height: 100%;
        border-radius: 5px;
    }

    .earnings_message {
        padding-left: 10px;
        width: calc(100% - 80px);
    }

    .earnings_title {
        font-size: 14px;
        font-weight: bold;
        color: #318cdf;
    }

    .earnings_bq {
        margin-top: 6px;
    }

    .earnings_bq span {
        font-size: 10px;
        background-color: #fdfaf4;
        color: #318cdf;
        padding: 2px 3px;
        border-radius: 20px;
        margin-right: 2px;
    }

    .earnings_p_vertical {
        display: flex !important;
        flex-direction: column !important;
        width: 100% !important;
        gap: 8px !important;
    }

    .earnings_p_box_vertical {
        display: flex !important;
        flex-direction: row !important;
        justify-content: space-between !important;
        align-items: center !important;
        width: 100% !important;
        padding: 0px 5px 0px 0 !important;
        background-color: #ffffff !important;
        border-radius: 6px !important;
        box-sizing: border-box !important;
    }

    .price_amount {
        font-size: 16px !important;
        font-weight: bold !important;
        color: #318cdf !important;
    }

    .price_label {
        font-size: 12px !important;
        color: #7f8c8d !important;
        text-align: right !important;
    }

    .note_msg {
        width: 100%;
        max-height: 60vh;
        overflow: auto;
        word-wrap: break-word !important;
        line-height: 1.5 !important;
        padding: 10px 0 !important;
        text-align: left;
    }

    #new-button {
        height: 35px;
        margin-top: 15px;
        display: inline-block;
        padding: 0 15px;
        background-color: #318cdf;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        border: none;
        line-height: 35px;
        width: 100%;
        text-align: center;
        cursor: pointer;
        font-weight: bold;
    }

    .signIn {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        position: fixed;
        top: 400px;
        right: 10px;
        background-color: #fff;
        z-index: 9999;
        animation: ani 2s linear infinite;
        cursor: pointer;
    }

    .signIn img { width: 100%; height: 100%; border-radius: 50%; }

    @keyframes ani {
        0% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0); }
    }
    
    footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        background: #fff;
        display: flex;
        justify-content: space-around;
        padding: 10px 0;
        border-top: 1px solid #eee;
        z-index: 999;
    }
    .foot_bo { text-align: center; }
    .foot_bo img { width: 24px; height: 24px; }
    .foot_bo p { font-size: 12px; color: #666; margin-top: 2px; }
    .xz { color: #318cdf !important; font-weight: bold; }

    .layui-m-layercont { padding: 30px 20px !important; }
    </style>
</head>

<body>
    <div class="page-content">
        <div id="slideBox" class="slideBox">
            <div class="bd">
                <ul>
                    <li><a class="pic" href="javascript:void(0);"><img src="/uploads/image/20251018/5b0236d576455dfae5d3f2feb86c03d8.gif" loading="eager" /></a></li>
                </ul>
            </div>
            <div class="hd"><ul></ul></div>
        </div>
    </div>

    <div class="page-index-nav">
        <div class="page-index-nav-ul">
            <ul>
                <li><a href="<?php echo e(route('user.recharge')); ?>"><img id="recharge-icon" src="/static/home/img/index_ico7.png" /><p>Recharge</p></a></li>
                <li><a href="<?php echo e(route('user.withdraw')); ?>"><img src="/static/home/img/index_ico2.png" /><p>Withdrawal</p></a></li>
                <li><a href="<?php echo e(route('user.promo')); ?>"><img src="/static/home/img/index_ico3.png" /><p>Check-in</p></a></li>
                <li><a href="<?php echo e(route('user.drow')); ?>"><img src="/static/home/img/p20.png" /><p class="xz">Treasure</p></a></li>
            </ul>
        </div>
    </div>

    <div class="earnings_list">
        <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="earnings_item">
            <?php if($element->sub_photo): ?>
                <div style="position: absolute; right: 5px; top: 5px; z-index: 100; max-width: 60px;"><img src="/static/home/img/sale1.png" style="width:100%"/></div>
            <?php endif; ?>
            <div class="earnings_item_top">
                <div class="earnings_img">
                    <div class="earnings_vip"><img src="<?php echo e($element->sub_photo ? asset($element->sub_photo) : asset('static/home/img/VIP' . ($loop->index > 10 ? 10 :$loop->index) . '.gif')); ?>?q=1" style="height: 18px; width: 60px;"/></div>
                    <img src="<?php echo e(asset($element->photo)); ?>" onerror="this.src='/uploads/image/default.jpg'" loading="lazy"/>
                </div>
                <div class="earnings_message">
                    <div class="earnings_title"><?php echo e($element->name); ?></div>
                    <div class="earnings_bq"><span>Period</span><span><?php echo e($element->validity); ?> Days</span></div>
                    <div class="earnings_p earnings_p_vertical">
                        <div class="earnings_p_box_vertical"><span class="price_amount">NPR <?php echo e(number_format($element->commission_with_avg_amount / $element->validity, 2)); ?></span><div class="price_label">Day Income</div></div>
                        <div class="earnings_p_box_vertical"><span class="price_amount">NPR <?php echo e(number_format($element->commission_with_avg_amount, 2)); ?></span><div class="price_label">Total Income</div></div>
                        <div class="earnings_p_box_vertical"><span class="price_amount">NPR <?php echo e(number_format($element->price, 0)); ?></span><div class="price_label">Purchase Price</div></div>
                    </div>
                </div>
            </div>
            <a class="earnings_item_btn" href="<?php echo e(route('package.details', $element->id)); ?>">Invest Now</a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <a href="<?php echo e(url('promo')); ?>" class="signIn"><img src="/static/home/img/index_ico5.png" /></a>

    <footer>
        <div class="foot_bo"><a href="<?php echo e(route('dashboard')); ?>"><img src="/static/home/img/i2.png" /><p class="xz">Home</p></a></div>
        <div class="foot_bo"><a href="<?php echo e(route('vip')); ?>"><img src="/static/home/img/i11.png" /><p>Earnings</p></a></div>
        <div class="foot_bo"><a href="<?php echo e(route('publish.records')); ?>"><img src="/static/home/img/i5.png" /><p>About us</p></a></div>
        <div class="foot_bo"><a href="<?php echo e(route('user.invite')); ?>"><img src="/static/home/img/i7.png" /><p>Share</p></a></div>
        <div class="foot_bo"><a href="<?php echo e(route('profile')); ?>"><img src="/static/home/img/i9.png" /><p>My</p></a></div>
    </footer>

    <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        if(document.getElementById("slideBox")){
            TouchSlide({ slideCell: "#slideBox", titCell: ".hd ul", mainCell: ".bd ul", effect: "leftLoop", autoPage: true, autoPlay: true });
        }

        function disclaimer() {
            var content = `
                <div class="note_msg">
                    <p style="font-size: 18px; font-weight: 700; color: #318cdf; text-align: center; margin-bottom: 10px;">এখন বের করছে</p>
                    <p>Welcome to our platform! Enjoy stable returns and participate in daily events to earn more rewards.</p>
                    <button id="new-button" onclick="window.open('https://t.me/BoschRexrothDiscussionGroup', '_blank')">Jump Now</button>
                </div>
            `;

            layer.open({
                type: 1,
                content: content,
                btn: ['OK'],
                shadeClose: false,
                yes: function(index) {
                    layer.close(index);
                }
            });
        }

        setTimeout(disclaimer, 300);
    });
    </script>
</body>
</html>
        <?php /**PATH /home/vol1000_8/infinityfree.com/if0_43010282/htdocs/resources/views/app/main/index.blade.php ENDPATH**/ ?>