<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Confirm Payment</title>
    
    <link rel="stylesheet" href="/static/home/css/app.css?v=5.8">
    <link rel="stylesheet" href="/static/home/css/iconfont.css">
    
    <!-- Toastr for notifications -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <script type="text/javascript" src="/static/home/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="/static/home/js/layer.js"></script>
    
    <style type="text/css">
        * { margin: 0; padding: 0; list-style: none; box-sizing: border-box; }
        body { background: #fafafa; }
        
        /* --- Header Style (Blue) --- */
        .navbar { background-color: #318cdf !important; border-bottom: none; position: fixed; top: 0; width: 100%; z-index: 999; height: 44px; }
        .navbar .navbar-inner { display: flex; justify-content: space-between; align-items: center; height: 100%; padding: 0 10px; }
        .navbar .left a, .navbar .center, .navbar .left i { color: #fff !important; fill: #fff !important; }
        .navbar .center { font-size: 16px; font-weight: bold; }

        .page-content { padding-top: 60px; padding-bottom: 20px; padding-left: 15px; padding-right: 15px; }

        /* --- Info Card (Amount & Timer) --- */
        .info-card {
            background: linear-gradient(135deg, #318cdf, #1976d2);
            color: #fff;
            padding: 20px;
            border-radius: 12px;
            text-align: center;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(49, 140, 223, 0.3);
        }
        .info-label { font-size: 14px; opacity: 0.9; }
        .info-amount { font-size: 32px; font-weight: bold; margin: 5px 0; }
        .info-method { font-size: 16px; font-weight: 500; background: rgba(255,255,255,0.2); padding: 2px 10px; border-radius: 15px; display: inline-block; margin-bottom: 10px; }
        .timer-box { font-size: 14px; color: #ffeb3b; font-weight: bold; margin-top: 5px; }

        /* --- Input Card Style --- */
        .input-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            padding: 20px;
            margin-bottom: 20px;
        }

        .form-group { margin-bottom: 20px; }
        .label { font-size: 13px; color: #666; display: block; margin-bottom: 8px; font-weight: 600; }
        
        /* Copy Field */
        .copy-wrapper { display: flex; align-items: center; gap: 10px; }
        .copy-input { 
            flex: 1; height: 40px; border: 1px solid #eee; border-radius: 5px; padding: 0 10px; color: #333; font-size: 16px; background: #f9f9f9;
        }
        .btn-copy {
            background: #318cdf; color: #fff; border: none; height: 40px; padding: 0 20px; border-radius: 5px; cursor: pointer; font-weight: bold;
        }

        /* Normal Input */
        .form-input {
            width: 100%; height: 40px; border: 1px solid #ddd; border-radius: 5px; padding: 0 10px; font-size: 15px; outline: none; transition: border 0.3s;
        }
        .form-input:focus { border-color: #318cdf; }

        /* File Input */
        .file-input {
            width: 100%; padding: 10px; border: 1px dashed #318cdf; border-radius: 5px; background: #f0f8ff;
        }

        /* --- Submit Button --- */
        .btn-submit {
            display: block; width: 100%; background: #318cdf; color: #fff; text-align: center; padding: 12px; border-radius: 25px; font-size: 16px; font-weight: bold; border: none; cursor: pointer; margin-top: 10px; box-shadow: 0 3px 8px rgba(49, 140, 223, 0.3); transition: background 0.3s;
        }
        .btn-submit:disabled { background: #ccc; box-shadow: none; cursor: not-allowed; }

        /* --- Instructions --- */
        .notes { margin-top: 25px; font-size: 12px; color: #888; line-height: 1.6; }
        .notes h4 { color: #333; margin-bottom: 5px; font-size: 13px; }
    </style>
</head>

<body>
    <div class="views">
        <div class="navbar theme-white">
            <div class="navbar-inner">
                <div class="left">
                    <a href="<?php echo e(url()->previous()); ?>" class="external link">
                        <i class="icon iconfont icon-angleleft"></i> Back
                    </a>
                </div>
                <div class="center" style="left: -24px;">Confirm Payment</div>
                <div class="right"></div>
            </div>
        </div>

        <div class="page navbar-fixed">
            <div class="page-content">
                
                <!-- Info Card -->
                <div class="info-card">
                    <p class="info-label">Please pay exactly</p>
                    <p class="info-amount">৳ <?php echo e(number_format($amount, 2)); ?></p>
                    <div class="info-method">via <?php echo e($payment_method->name); ?></div>
                    <div class="timer-box">
                        Time Remaining: <span id="timer">30:00</span>
                    </div>
                </div>

                <!-- Form Section -->
                <form action="<?php echo e(route('depositSubmit')); ?>" method="POST" enctype="multipart/form-data" id="depositForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="amount" value="<?php echo e($amount); ?>">
                    <input type="hidden" name="payment_method" value="<?php echo e($payment_method->name); ?>">

                    <div class="input-card">
                        <!-- Copy Address -->
                        <div class="form-group">
                            <label class="label">Copy <?php echo e($payment_method->name); ?> Number</label>
                            <div class="copy-wrapper">
                                <input type="text" value="<?php echo e($payment_method->address); ?>" id="rechargeAddress" readonly class="copy-input">
                                <button type="button" onclick="copyAddress()" class="btn-copy">Copy</button>
                            </div>
                        </div>

                        <!-- Transaction ID -->
                        <div class="form-group">
                            <label class="label">Transaction ID / TrxID</label>
                            <input type="text" name="transaction_id" placeholder="Enter Transaction ID" required class="form-input">
                        </div>

                        <!-- Screenshot -->
                        <div class="form-group">
                            <label class="label">Payment Screenshot</label>
                            <input type="file" name="photo" accept="image/*" required class="file-input">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-submit" id="submitBtn">Confirm Payment</button>
                    
                    <!-- Instructions -->
                    <div class="notes">
                        <h4>Instructions:</h4>
                        <p>1. Copy the number above and make a payment using your wallet app.</p>
                        <p>2. Copy the Transaction ID from your wallet app.</p>
                        <p>3. Take a screenshot of the successful payment.</p>
                        <p>4. Submit the details here within 30 minutes.</p>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Toastr & Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script type="text/javascript">
    layui.use(['layer'], function() {
        var layer = layui.layer;
    });

    // --- Copy Function ---
    function copyAddress() {
        var copyText = document.getElementById("rechargeAddress");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        toastr.success("Number copied successfully!");
    }

    $(document).ready(function() {
        // --- Toastr Config ---
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-center",
            "timeOut": "3000",
        };

        // --- Session Messages ---
        <?php if(session('success')): ?>
            toastr.success("<?php echo e(session('success')); ?>");
        <?php endif; ?>
        <?php if(session('error')): ?>
            toastr.error("<?php echo e(session('error')); ?>");
        <?php endif; ?>

        // --- Loading Animation ---
        $('#depositForm').on('submit', function() {
            var loading = layer.load(2, { shade: [0.5, '#393D49'] });
        });

        // --- Timer Logic ---
        var timerElement = document.getElementById("timer");
        var submitButton = document.getElementById("submitBtn");
        var time = 30 * 60; // 30 minutes

        function updateTimer() {
            if (time <= 0) {
                clearInterval(timerInterval);
                timerElement.textContent = "Expired";
                timerElement.style.color = "#ffcccc";
                submitButton.disabled = true;
                submitButton.textContent = "Order Expired";
                submitButton.style.background = "#ccc";
                toastr.error("Session expired! Please try again.");
                return;
            }
            
            var minutes = Math.floor(time / 60);
            var seconds = time % 60;
            timerElement.textContent = String(minutes).padStart(2, '0') + ":" + String(seconds).padStart(2, '0');
            time--; 
        }
        
        updateTimer();
        var timerInterval = setInterval(updateTimer, 1000);
    });
    </script>
</body>
</html><?php /**PATH /home/vol1000_8/infinityfree.com/if0_43010282/htdocs/resources/views/app/main/recharge/payment-confirm.blade.php ENDPATH**/ ?>