<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="format-detection" content="telephone=no,email=no,adress=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Recharge</title>
    
    <link rel="stylesheet" href="/static/home/css/app.css?v=5.8">
    <link rel="stylesheet" href="/static/home/css/iconfont.css">
    
    <!-- Toastr for AgriCare style notifications -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <script type="text/javascript" src="/static/home/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="/static/home/js/layer.js"></script>
    
    <style type="text/css">
    * { margin: 0; padding: 0; }
    .cz-index-top { margin-top: 65px; }
    .page.navbar-fixed { padding-bottom: 100px; }
    .tixianlog-index-top-title { margin-top: 0.5rem; }
    .tixianlog-index-top-mull { height: 3rem; line-height: 3rem; text-align: left; padding-left: 1rem; }
    
    .Putforwardbox {
        width: 92%; margin-left: 4%; background: #fff; text-align: left;
        margin-top: 1rem; margin-bottom: 80px; word-wrap: break-word; word-break: break-word;
        white-space: normal; overflow-wrap: break-word; line-height: 1.4; padding: 15px;
        box-sizing: border-box; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .Putforwardbox * {
        word-wrap: break-word !important; word-break: break-word !important; white-space: normal !important;
        overflow-wrap: break-word !important; max-width: 100% !important;
    }
    
    .exchange { padding-top: 1rem; }
    .exchange input {
        height: 3rem; line-height: 3rem; width: 92%; margin-left: 4%; border-radius: 0.5rem;
        background: #fff; padding-left: 10px; color: #39393d; outline: none; border: 1px #318cdf solid;
        box-sizing: border-box; font-size: 20px;
    }
    
    .recharge-price-list { width: 92%; float: left; margin-left: 4%; margin-bottom: 1rem; }
    .recharge-price-list ul { width: 100%; list-style: none; }
    .recharge-price-list ul li {
        width: 30%; height: 2.5rem; line-height: 2.5rem; margin-top: 1rem; font-size: 16px;
        color: #8f8f8f; float: left; text-align: center; border: 1px solid #8f8f8f;
        border-radius: 5px; background: #fff; cursor: pointer;
    }
    .recharge-price-list .cur { color: #fff; background: #318cdf; border: 1px solid #318cdf; font-weight: 600; }
    .recharge-price-list ul li:nth-child(2), .recharge-price-list ul li:nth-child(5), .recharge-price-list ul li:nth-child(8) { margin-left: 4%; margin-right: 4%; }
    
    .Putforwardbtn { height: 3rem; margin-top: 0.5rem; }
    .Putforwardbtn button {
        width: 92%; float: left; margin-left: 4%; height: 3rem; appearance: none;
        background: #318cdf; outline: none; border: none; border-radius: 0.625rem; font-size: 1rem;
        color: #fff; letter-spacing: 1px;
    }
    
    .recharge-input {
        width: 92%; margin-left: 4%; border: 1px solid #318cdf; height: 2.5rem;
        line-height: 2.5rem; display: inline-flex; border-radius: 5px; background: #fff;
    }
    .recharge-input span { color: #8f8f8f; width: 35%; margin-left: 0.25rem; margin-top: 0.25rem; height: 2rem; line-height: 2rem; text-align: center; }
    .recharge-input select { color: #009654; width: 60%; margin: 0.25rem; height: 2rem; border: none; background: #fff; }
    
    .navbar { position: absolute; top: 0; width: 100%; line-height: 40px; z-index: 20; }
    .navbar .left { width: 50px; height: 40px; position: absolute; left: 10px; }
    .navbar .right { width: 50px; height: 40px; position: absolute; right: 10px; }
    
    .recharge-box-div { border: 1px solid #318cdf; flex-direction: row; margin: 0 4%; border-radius: 5px; background: #fff; padding: 5px; line-height: 2em; }
    .recharge-box-div span { margin-left: 10px; }
    .paytitle { width: 33%; }
    .payNotice { width: 100%; margin-left: 10px; color: #ff0000; }
    .Mylist { width: 100%; display: flex; flex-wrap: wrap; }
    .mylabel { display: inline-block; width: 100%; }
    .myradio { display: none }
    .myradioInput { background-color: #fff; border: 2px solid rgba(0, 0, 0, 0.15); border-radius: 100%; display: inline-block; height: 20px; margin-right: 10px; margin-top: -1px; vertical-align: middle; width: 20px; line-height: 1 }
    .myradio:checked+.myradioInput:after { background-color: #318cdf; border-radius: 100%; content: ""; display: inline-block; height: 14px; margin-left: 3px; margin-top: 3px; width: 14px }
    .mycheckbox.myradioInput, .myradio:checked+.mycheckbox.myradioInput:after { border-radius: 0 }
    .myradio:checked+.myradioInput { border: 2px solid #318cdf; }
    
    /* Header Color Fix */
    .navbar { background-color: #318cdf !important; border-bottom: none; }
    .navbar .navbar-inner .left a, .navbar .navbar-inner .center, .navbar .navbar-inner .left i { color: #fff !important; fill: #fff !important; }
    .navbar .center { font-weight: bold; }
    </style>
</head>

<body style="background: #fff;">
    <div class="views">
        <div class="navbar theme-white">
            <div class="navbar-inner">
                <div class="left">
                    <a href="<?php echo e(url('/user/index')); ?>" class="external link">
                        <i class="icon iconfont icon-angleleft"></i>Back
                    </a>
                </div>
                <div class="center" style="left: -24px;">Recharge</div>
                <div class="right"></div>
            </div>
        </div>

        <div class="page navbar-fixed">
            <div class="cz-index-top">
                <p class="tixianlog-index-top-title">Current Balance</p>
                <p class="tixianlog-index-top-mull">₱ <?php echo e(number_format(auth()->user()->balance ?? 0, 2)); ?></p>
            </div>

            <div class="exchange">
                <div style="width:100%">
                    <input type="number" name="amount" placeholder="Please enter the recharge amount" value="400">
                    <div class="recharge-price-list">
                        <ul>
                            <li attr-num="400" class="cur">₱ 400</li>
                            <li attr-num="800">₱ 800</li>
                            <li attr-num="1500">₱ 1500</li>
                            <li attr-num="2500">₱ 2500</li>
                            <li attr-num="5500">₱ 5500</li>
                            <li attr-num="8500">₱ 8500</li>
                            <li attr-num="12000">₱ 12000</li>
                            <li attr-num="24000">₱ 24000</li>
                            <li attr-num="48000">₱ 48000</li>
                            <li attr-num="100000">₱ 100000</li>
                        </ul>
                    </div>
                </div>
                <div style="clear: both;"></div>

                <div class="recharge-box-div">
                    <span class="paytitle">Pay Type:</span>
                    <div class="Mylist">
                        <?php
                            $payment_methods = \App\Models\PaymentMethod::where('status', 1)->get();
                        ?>
                        
                        <?php $__empty_1 = true; $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <label class="mylabel">
                                <input class="myradio" type="radio" name="payType" value="<?php echo e($method->name); ?>" <?php echo e($loop->first ? 'checked' : ''); ?>>
                                <span class="myradioInput"></span><?php echo e($method->name); ?>

                            </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <label class="mylabel" style="color: red; padding: 5px;">No payment methods available</label>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="Putforwardbtn">
                    <button type="button" class="btn rechargeBtn">Recharge Now</button>
                </div>
            </div>

            <div class="Putforwardbox">
                <p><span style="text-wrap-mode: nowrap;">Recharge Instructions:</span></p>
                <p><br/></p>
                <p>1. Minimum recharge amount is ₱<?php echo e(setting('min_deposit', 400)); ?>.</p>
                <p>2. Recharges are accepted 24/7.</p>
                <p>3. After payment, save a screenshot. Funds will arrive within 10-30 minutes.</p>
                <p>4. Each recharge must be completed through the app. Do not save bank info.</p>
                <p><br/></p>
            </div>
            
            <div id='payu'></div>
        </div>
    </div>
    
    <div style="display: none" class="recharging"></div>

    <div class="kefu">
        <a href="https://t.me/TNL_LAB_WEBSITE_DEVELOPER"><img src="/static/home/img/custemService2.png" alt=""></a>
    </div>

    <style>
        .game1 { border-radius: 50%; animation: rotate1 2s linear infinite; }
        @keyframes rotate1 { 0% { transform: rotateZ(0deg); } 100% { transform: rotateZ(360deg); } }
    </style>

    <footer>
        <div class="foot_bo">
            <a href="<?php echo e(url('/')); ?>">
                <img src="/static/home/img/i2.png" />
                <p class="xz">Home</p>
            </a>
        </div>
        <div class="foot_bo">
            <a href="/vip">
                <img src="/static/home/img/i11.png" />
                <p>Earnings</p>
            </a>
        </div>
        <div class="foot_bo">
            <a href="<?php echo e(url('/publish/records')); ?>">
                <img src="/static/home/img/i5.png" />
                <p>Publish</p>
            </a>
        </div>
        <div class="foot_bo">
            <a href="<?php echo e(url('/share/index')); ?>">
                <img src="/static/home/img/i7.png" />
                <p>Share</p>
            </a>
        </div>
        <div class="foot_bo">
            <a href="<?php echo e(url('/user/index')); ?>">
                <img src="/static/home/img/i9.png" />
                <p>My</p>
            </a>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"32f11e40f8564b3ea5a491cc6a098c64","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        var defaultRecharge = 400;
        
        // Toastr Config
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-center",
            "timeOut": "3000",
        };

        // Set default value
        $('input[name="amount"]').val(defaultRecharge);
        $(".recharge-price-list li").removeClass('cur');
        $(".recharge-price-list li").each(function() {
            if ($(this).attr('attr-num') == defaultRecharge) {
                $(this).addClass('cur');
            }
        });

        // Amount Selection
        $(".recharge-price-list li").click(function() {
            var amount = $(this).attr('attr-num');
            $('input[name="amount"]').val(amount);
            $(this).addClass('cur').siblings().removeClass('cur');
        });

        $('input[name="amount"]').on('input', function() {
            $('.recharge-price-list li').removeClass('cur');
        });

        // Recharge Button Logic (AgriCare)
        $('.rechargeBtn').click(function() {
            var _this = $(this);
            _this.attr('disabled', true);

            var amount = $('input[name="amount"]').val();
            var payType = $("input[name='payType']:checked").val();
            var rechargeMin = <?php echo e(setting('min_deposit', 400)); ?>;

            if (amount.length == 0) {
                toastr.error("Please Input Recharge Amount");
                _this.attr('disabled', false);
                return false;
            }
            if (amount < rechargeMin) {
                toastr.error("Minimum Recharge Amount ₱" + rechargeMin);
                _this.attr('disabled', false);
                return false;
            }
            if (!payType) {
                toastr.error("Please Select Payment Method");
                _this.attr('disabled', false);
                return false;
            }

            var loading = layer.open({ type: 2, shadeClose: false, content: "Processing..." });

            // AgriCare Redirect Logic
            const paymentUrl = `<?php echo e(url('user/payment')); ?>/${amount}/${payType}`;
            
            setTimeout(function() {
                layer.close(loading);
                window.location.href = paymentUrl;
            }, 1000);
        });
    });
    </script>
</body>
</html><?php /**PATH /home/vol1000_8/infinityfree.com/if0_43010282/htdocs/resources/views/app/main/recharge/index.blade.php ENDPATH**/ ?>