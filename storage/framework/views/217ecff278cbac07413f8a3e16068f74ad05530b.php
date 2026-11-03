<!DOCTYPE html>
<html class="pixel-ratio-3 retina android">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Treasure Hunt</title>

    <!-- CSS Links -->
    <link rel="stylesheet" type="text/css" href="/static/home/css/app.css?v=5.8">
    <link rel="stylesheet" type="text/css" href="/static/home/css/iconfont.css">
    <link rel="stylesheet" type="text/css" href="/treasure/css/reset.css">
    <link rel="stylesheet" type="text/css" href="/treasure/css/atom.css">
    <link rel="stylesheet" type="text/css" href="/treasure/css/global.css">
    <link rel="stylesheet" type="text/css" href="/treasure/css/open.css">

    <!-- JS & CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="/static/home/js/scrollForever.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { overflow-y: scroll !important; background-color: #318cdf; font-family: sans-serif; }

        .navbar { position: absolute; top: 0; width: 100%; line-height: 40px; z-index: 20; }
        .navbar .left { width: 50px; height: 40px; position: absolute; left: 10px; }
        .navbar .center { text-align: center; color: #fff; font-weight: bold; font-size: 16px; }

        .wrapper { position: relative; width: 100%; height: auto; overflow: hidden; padding-bottom: 30px; }

        .bg.rotate {
            position: absolute;
            top: -50%; left: -50%; width: 200%; height: 200%;
            background: repeating-conic-gradient(from 0deg, rgba(255, 255, 255, 0.1) 0deg 10deg, transparent 10deg 20deg);
            animation: rotateBG 15s linear infinite;
            z-index: 0; opacity: 0.6;
        }

        @keyframes rotateBG {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .open-has { position: relative; z-index: 5; padding-top: 55px; text-align: center; }

        .title-close, .title-open {
            color: #fff; font-size: 15px; font-weight: bold; margin-bottom: 15px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3); padding: 0 15px;
        }
        .title-open { display: none; }

        .mod-chest { position: relative; width: 100%; height: 210px; display: flex; justify-content: center; align-items: center; }
        .chest-close { cursor: pointer; z-index: 10; }
        .chest-img {
            width: 150px; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.4));
            animation: floatBox 3s ease-in-out infinite;
        }
        
        @keyframes floatBox {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-8px); }
            100% { transform: translateY(0px); }
        }

        /* --- Premium Blue Redeem Box --- */
        .redeem-box-container {
            position: relative; z-index: 10; width: 90%; max-width: 400px;
            margin: 10px auto 0 auto; background: linear-gradient(135deg, #1e5799 0%, #2989d8 50%, #207cca 100%);
            padding: 18px; border-radius: 14px; box-shadow: 0 8px 20px rgba(0,0,0,0.3);
            border: 2px solid #82c2ff;
        }
        .redeem-input {
            width: 100%; padding: 12px 15px; border-radius: 8px; border: none;
            outline: none; font-size: 15px; margin-bottom: 12px; background: #fff;
            color: #333; text-align: center; font-weight: bold;
        }
        .redeem-btn {
            width: 100%; padding: 12px; background: #ffcc00; color: #b35900;
            border: none; border-radius: 8px; font-size: 16px; font-weight: bold;
            cursor: pointer; box-shadow: 0 4px 10px rgba(0,0,0,0.2); transition: 0.2s;
        }
        .redeem-btn:active { transform: scale(0.98); }

        .msgbox_mian { padding: 15px 20px; margin-bottom: 60px; position: relative; z-index: 10; }
        .msgbox { padding: 15px; border: 1px solid #f6d99a; background-color: rgba(255, 255, 255, 0.85); border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .myscroll { width: 100%; height: 130px; overflow: hidden; }
        .myscroll li { line-height: 28px; font-size: 13px; font-weight: 500; color: #333; border-bottom: 1px dashed #eee; display: flex; justify-content: space-between; align-items: center; }
        .myscroll li .user-num { display: inline-flex; align-items: center; }
        .myscroll b { background: #318cdf; color: #fff; padding: 2px 6px; border-radius: 50%; margin-right: 8px; font-size: 11px; min-width: 22px; text-align: center; }
        .myscroll span { color: #0b822e; font-weight: bold; }

        footer { position: fixed; bottom: 0; width: 100%; background: #fff; z-index: 100; border-top: 1px solid #eee; display: flex; padding: 5px 0;}
        .foot_bo { flex: 1; text-align: center; }
        .foot_bo img { width: 24px; height: 24px; display: block; margin: 0 auto; }
        .foot_bo p { font-size: 11px; color: #666; margin-top: 2px; }
    </style>
</head>

<body class="open-body">
    <div class="views">
        <div class="navbar theme-white">
            <div class="navbar-inner">
                <div class="left">
                    <a href="<?php echo e(route('profile')); ?>" class="external link" style="color:#fff; padding-left:10px; font-size:14px;">
                        <i class="icon iconfont icon-angleleft"></i>Back
                    </a>
                </div>
                <div class="center" style="line-height:40px;">Treasure Hunt</div>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <div class="bg rotate"></div>
        
        <div class="open-has">
            <h3 class="title-close">Click on the chest or enter your code below</h3>
            <h3 class="title-open">Congratulations! Successfully Opened</h3>

            <div class="mod-chest">
                <div class="chest-close show">
                    <img src="https://cdn-icons-png.flaticon.com/512/4230/4230569.png" class="chest-img" alt="Treasure Chest">
                </div>
                
                <div class="chest-open" style="display:none;">
                    <div class="mod-chest-cont open-cont">
                        <div class="content" style="text-align:center; color:#fff;">
                            <div class="gift">
                                <b class="money" style="font-size:22px; color:#ffcc00;">Success!</b>
                            </div>
                            <div class="func" style="margin-top:10px;">
                                <a href="<?php echo e(route('user.bonus.ledger')); ?>" style="background:#ffcc00; color:#333; padding:8px 15px; border-radius:5px; text-decoration:none; font-weight:bold;">Check Balance</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Premium Blue Code Input Box with Submit Button -->
            <div class="redeem-box-container">
                <input type="text" id="secretCodeInput" class="redeem-input" placeholder="Enter Secret Redeem Code">
                <button type="button" id="submitCodeBtn" class="redeem-btn">Submit</button>
            </div>
        </div>
    </div>

    <!-- Recent Wins Ticker (100+ items generated dynamically with 10 digit numbers & hidden middle 3 digits) -->
    <div class="msgbox_mian">
        <div class="msgbox">
            <div class="myscroll">
                <ul class="list_ui" id="tickerList">
                    <!-- Dynamic items will be inserted here -->
                </ul>
            </div>
        </div>
    </div>

    <footer>
        <div class="foot_bo">
            <a href="<?php echo e(url('/')); ?>" class="external"><img src="/static/home/img/i1.png"/><p>Home</p></a>
        </div>
        <div class="foot_bo">
            <a href="<?php echo e(url('vip')); ?>" class="external"><img src="/static/home/img/i11.png"/><p>Earnings</p></a>
        </div>
        <div class="foot_bo">
            <a href="<?php echo e(url('publish/records')); ?>" class="external"><img src="/static/home/img/i6.png"/><p>Publish</p></a>
        </div>
        <div class="foot_bo">
            <a href="<?php echo e(url('invite')); ?>" class="external"><img src="/static/home/img/i7.png"/><p>Share</p></a>
        </div>
        <div class="foot_bo">
            <a href="<?php echo e(url('profile')); ?>" class="external"><img src="/static/home/img/i9.png"/><p>My</p></a>
        </div>
    </footer>

    <script type="text/javascript">
    $(function() {
        // --- Generate 100+ Ticker Records Dynamically ---
        var amounts = ["NPR 200.00", "NPR 100.00", "NPR 50.00", "NPR 60.00", "NPR 30.00", "NPR 20.00"];
        var prefixes = ["981", "984", "980", "986", "982", "974", "975"];
        var htmlContent = "";

        for (var i = 1; i <= 120; i++) {
            var randomPrefix = prefixes[Math.floor(Math.random() * prefixes.length)];
            var randomSuffix = Math.floor(1000 + Math.random() * 9000); // 4 digits
            var phoneNumber = randomPrefix + "***" + randomSuffix; // Exact 10 digits structured (3 + 3 star + 4 = 10 digits)
            var randomAmount = amounts[Math.floor(Math.random() * amounts.length)];
            
            htmlContent += '<li><span class="user-num"><b>' + i + '</b> ' + phoneNumber + '</span><span>' + randomAmount + '</span></li>';
        }
        $("#tickerList").html(htmlContent);

        // --- Initialize ScrollForever ---
        if($.fn.scrollForever) {
            $(".myscroll").scrollForever({ dir: 'top', continuous: false });
        }

        // --- Common AJAX Function to Submit Code ---
        function submitRedeemCode(code) {
            if (!code) {
                Swal.fire('Error', 'Please enter a redeem code!', 'warning');
                return;
            }

            $.ajax({
                url: "<?php echo e(route('user.submit-bonus')); ?>",
                type: "POST",
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    bonus_code: code
                },
                beforeSend: function() {
                    Swal.fire({
                        title: 'Opening...',
                        allowOutsideClick: false,
                        didOpen: () => { Swal.showLoading(); }
                    });
                },
                success: function(response) {
                    if(response.status === true) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Congratulations!',
                            text: 'You received NPR ' + response.amount + ' bonus!',
                            confirmButtonColor: '#ffcc00',
                            confirmButtonText: 'OK'
                        });

                        $(".title-close").hide();
                        $(".chest-close").hide();
                        $(".title-open").show();
                        $(".chest-open").show();
                        $(".money").text("NPR " + response.amount);
                        $("#secretCodeInput").val('');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message || 'Invalid Code',
                            confirmButtonColor: '#d33'
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Something went wrong. Please try again.',
                        confirmButtonColor: '#d33'
                    });
                }
            });
        }

        // Button Click Event
        $("#submitCodeBtn").click(function() {
            var code = $("#secretCodeInput").val().trim();
            submitRedeemCode(code);
        });

        // Chest Click Event (Optional popup backup)
        $(".chest-close").click(function() {
            Swal.fire({
                title: 'Enter Redeem Code',
                input: 'text',
                inputPlaceholder: 'Secret Key',
                showCancelButton: true,
                confirmButtonText: 'Submit',
                confirmButtonColor: '#2989d8',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed && result.value) {
                    submitRedeemCode(result.value.trim());
                }
            });
        });
    });
    </script>
</body>
</html>
        <?php /**PATH /home/vol1000_8/infinityfree.com/if0_43010282/htdocs/resources/views/app/main/drow/index.blade.php ENDPATH**/ ?>