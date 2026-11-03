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
    
    <!-- লারাভেল টাইটেল এবং টোকেন -->
    <title><?php echo e(env('APP_NAME', 'AgriCare')); ?> | My Account</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="stylesheet" href="/static/home/css/app.css?v=5.8&m=1">
    <link rel="stylesheet" href="/static/home/css/iconfont.css">
    <script type="text/javascript" src="/static/home/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="/static/home/js/layer.js"></script>
    <script type="text/javascript" src="/static/home/js/jquery.cookie.min.js"></script>

    <style type="text/css">
    /* আপনার দেওয়া সম্পূর্ণ CSS কোড ১০০% অপরিবর্তিত */
    * { margin: 0; padding: 0; text-decoration: none; list-style: none; }
    .wa-index-top-bottom { width: 92%; overflow: hidden; margin: 1rem auto 0 }
    .wa-index-top-bottom ul { width: 100%; display: flex; align-items: center; justify-content: space-between; }
    .wa-index-top-bottom ul li { text-align: center; }
    .wa-index-top-bottom ul li h2 { font-size: 1.2rem; color: #318cdf; margin-bottom: 5px; }
    .wa-index-top-bottom ul li span { font-size: 14px; color: #666 }
    .wa-index-center-rech { width: 92%; margin: 1rem auto 0; overflow: hidden; background: #fff; border-radius: 5px; }
    .wa-index-center-rech h2 { width: 100%; padding: 0 4%; overflow: hidden; font-size: 16px; color: #318cdf; margin-top: 0.8rem }
    .wa-index-center-rech ul { width: 92%; overflow: hidden; margin: 1rem auto; display: flex; align-items: center; justify-content: space-between; }
    .wa-index-center-rech ul li { width: 45%; text-align: center; }
    .wa-index-center-rech ul li img { width: 40px; height: 40px; }
    .wa-index-center-rech ul li span { color: #999; font-size: 14px; display: block; width: 100%; text-align: center; }
    .wa-index-center-rech-link { display: block; width: 100%; }
    .wa-index-center-rech-link img { width: 100%; height: auto; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; }
    .level { width: 60px !important; height: 18px !important; float: none !important; margin-bottom: -3px; }
    .position { width: auto !important; height: 50px !important; float: none !important; margin-bottom: -3px; }
    .pname { background-color: #FF6300; font-size: 14px; color: #FFFFFF; border-radius: 16px; font-weight: bold; position: relative; top: -4px; padding: 2px 10px; }
    #cashBalance { color: #318cdf; }
    .language-modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 9999; justify-content: center; align-items: center; }
    .language-modal-content { background: white; border-radius: 15px; padding: 20px; width: 90%; max-width: 400px; max-height: 80vh; overflow-y: auto; position: relative; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3); }
    .language-modal-header { text-align: center; margin-bottom: 20px; font-size: 18px; font-weight: bold; color: #333; }
    .language-list { list-style: none; padding: 0; margin: 0; max-height: 60vh; overflow-y: auto; min-height: 200px; }
    .language-item { padding: 12px 15px; border-bottom: 1px solid #f0f0f0; cursor: pointer; transition: background-color 0.3s ease; display: flex; justify-content: space-between; align-items: center; min-height: 44px; box-sizing: border-box; }
    .language-item:hover { background-color: #f8f9fa; }
    .language-item.current { background-color: #e3f2fd; color: #318cdf; font-weight: bold; }
    .language-item.current::after { content: "✓"; color: #318cdf; font-weight: bold; }
    .language-close { position: absolute; top: 10px; right: 15px; font-size: 24px; cursor: pointer; color: #999; }
    .language-close:hover { color: #333; }
    .language-list::-webkit-scrollbar { width: 6px; }
    .language-list::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 3px; }
    .language-list::-webkit-scrollbar-thumb { background: #c1c1c1; border-radius: 3px; }
    .language-list::-webkit-scrollbar-thumb:hover { background: #a8a8a8; }
    @media (max-width: 768px) { .language-modal-content { width: 95%; max-height: 85vh; margin: 10px; } .language-list { max-height: 50vh; } }
    .game1 { border-radius: 50%; animation: rotate1 2s linear infinite; }
    @keyframes rotate1 { 0% { transform: rotateZ(0deg); } 100% { transform: rotateZ(360deg); } }
    </style>
</head>

<body style="background: #f5f5f5;">
    <div class="wa-index-top">
        <div class="wa-index-top-center">
            <div class="wa-index-userxx">
                <!-- ইউজার নেম / ফোন নম্বর -->
                <p class="wa-index-user-nc">
                    <?php echo e(auth()->user()->phone ?? 'N/A'); ?>

                </p>
                <!-- ব্যালেন্স এবং লিংক -->
                <a id="cashBalance" href="<?php echo e(route('allrecord')); ?>">
                    <h2>Tk <?php echo e(number_format(auth()->user()->balance ?? 0, 2)); ?></h2>
                    <span>Current Balance</span>
                </a>
            </div>
            
            <!-- প্রোফাইল এডিট লিংক -->
            <a href="<?php echo e(route('profile.edit')); ?>">
                <img src="/static/home/img/avatar.png" />
            </a>
        </div>
    </div>

    <div class="wa-index-center-rech">
        <h2>Recharge and Withdraw</h2>
        <ul>
            <li>
                <a href="<?php echo e(route('user.recharge')); ?>">
                    <img src="/static/home/img/icon_01.png" alt="">
                    <span>Recharge</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('user.withdraw')); ?>">
                    <img src="/static/home/img/icon_02.png" alt="">
                    <span>Withdrawal</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="wa-index-center-lb">
        <ul>
            <li>
                <a href="<?php echo e(route('user.personal-details')); ?>">
                    <img src="/static/home/img/p9.png" />
                    <p>Personal</p>
                    <img class="wa-index-center-fr" src="/static/home/img/jr.png" />
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('allrecord')); ?>">
                    <img src="/static/home/img/p6.png" />
                    <p>Balance Record</p>
                    <img class="wa-index-center-fr" src="/static/home/img/jr.png" />
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('recharge.history.preview')); ?>">
                    <img src="/static/home/img/p11.png" />
                    <p>Recharge Record</p>
                    <img class="wa-index-center-fr" src="/static/home/img/jr.png" />
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('user.withdraw.ledger')); ?>">
                    <img src="/static/home/img/p10.png" />
                    <p>Withdrawal Record</p>
                    <img class="wa-index-center-fr" src="/static/home/img/jr.png" />
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('user.team')); ?>">
                    <img src="/static/home/img/p14.png" />
                    <p>My Team</p>
                    <img class="wa-index-center-fr" src="/static/home/img/jr.png" />
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('about')); ?>">
                    <img src="/static/home/img/p4.png" />
                    <p>About Us</p>
                    <img class="wa-index-center-fr" src="/static/home/img/jr.png" />
                </a>
            </li>
            <li>
                <a href="https://t.me/TNL_LAB_WEBSITE_DEVELOPER">
                    <img src="/static/home/img/index_ico4.png" />
                    <p>Download</p>
                    <img class="wa-index-center-fr" src="/static/home/img/jr.png" />
                </a>
            </li>
            <li>
                <!-- লগআউট বাটন -->
                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <img src="/static/home/img/p13.png" />
                    <p>Logout</p>
                    <img class="wa-index-center-fr" src="/static/home/img/jr.png" />
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="get" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
            </li>
        </ul>
    </div>

    <!-- ফুটার মেনু (১০০% ফিক্সড ইর্নিংস লিংক) -->
    <footer>
        <div class="foot_bo">
            <a href="<?php echo e(url('dashboard')); ?>">
                <img src="/static/home/img/i1.png" />
                <p>Home</p>
            </a>
        </div>
        <div class="foot_bo">
            <!-- এখানে hardcoded URL এর পরিবর্তে route('vip') ব্যবহার করা হয়েছে -->
            <a href="<?php echo e(route('vip')); ?>">
                <img src="/static/home/img/i11.png" />
                <p>Earnings</p>
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
                <img src="/static/home/img/i7.png" />
                <p>Share</p>
            </a>
        </div>
        <div class="foot_bo">
            <a href="<?php echo e(route('profile')); ?>">
                <img src="/static/home/img/i10.png" />
                <p class="xz">My</p>
            </a>
        </div>
    </footer>

    <script type="text/javascript">
    function showmsg() {
        var count = 0;
        if (count > 0) {
            layer.open({
                content: "There is new message , need to look at?",
                btn: ["Yes", "No"],
                yes: function(index) {
                    window.location.href = "<?php echo e(url('user/message')); ?>";
                    layer.close(index);
                }
            });
        }
    }
    showmsg();

    var btn = true;

    function getIncome(type, obj) {
        if (btn == true) {
            btn = false;
            var loading = layer.open({
                type: 2,
                shadeClose: false,
                content: "loading"
            });
        } else {
            return false;
        }

        var data = {
            _token: "<?php echo e(csrf_token()); ?>",
            type: type
        };
        
        $.ajax({
            type: 'POST',
            url: "<?php echo e(route('profile')); ?>", 
            data: data,
            dataType: 'json',
            async: true,
            success: function(result) {
                layer.close(loading);
                if (result.code == 200) {
                    if (type == 1) {
                        $(".deviceIncome").html("Tk " + result.Income.deviceIncome);
                        $(obj).attr('href', "<?php echo e(route('earning')); ?>");
                        $(obj).attr('onclick', "");
                        $(obj).parents().unbind();
                    } else {
                        $(".promotionIncome").html("Tk " + result.Income.promotionIncome);
                        $(obj).attr('href', "<?php echo e(route('allrecord')); ?>");
                        $(obj).attr('onclick', "");
                        $(obj).parents().unbind();
                    }
                    btn = true;
                } else {
                    layer.open({content: 'Failed to load data', skin: 'msg', time: 2});
                    btn = true;
                }
            },
            error: function() {
                layer.close(loading);
                layer.open({content: 'Server Error', skin: 'msg', time: 2});
                btn = true;
            }
        });
    }
    </script>
</body>
</html>
<?php /**PATH /home/vol1000_8/infinityfree.com/if0_43010282/htdocs/resources/views/app/main/profile.blade.php ENDPATH**/ ?>