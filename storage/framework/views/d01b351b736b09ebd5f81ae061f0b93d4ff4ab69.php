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

    <title><?php echo e(env('APP_NAME', 'boschrexroth')); ?> Share</title> 
    
    <link rel="stylesheet" href="/static/home/css/app.css?v=5.8"> 
    <script type="text/javascript" src="/static/home/js/jquery-1.11.3.min.js"></script> 
    <script type="text/javascript" src="/static/home/js/clipboard.min.js"></script> 
    <script type="text/javascript" src="/static/home/js/layer.js"></script> 
    <script type="text/javascript" src="/static/home/js/qrcode.min.js"></script> 
    
    <style type="text/css"> 
        body { 
            background-color: #318cdf; 
            margin: 0; 
            padding: 0; 
        }
        .share_image { 
            margin-left: 10px; 
            margin-right: 10px; 
            overflow: hidden; 
            border-radius: 10px; 
        }
        .share_image img { 
            max-width: 100%; 
            height: auto; 
        } 
        .share_mian.rule_content { 
            word-wrap: break-word !important; 
            word-break: break-word !important; 
            overflow-wrap: break-word !important; 
        }
        .share_mian.rule_content * { 
            max-width: 100% !important; 
            word-wrap: break-word !important; 
            word-break: break-word !important; 
            overflow-wrap: break-word !important; 
            box-sizing: border-box !important; 
        }
        .share_mian.rule_content p, .share_mian.rule_content div, .share_mian.rule_content span, .share_mian.rule_content h1, .share_mian.rule_content h2, .share_mian.rule_content h3, .share_mian.rule_content h4, .share_mian.rule_content h5, .share_mian.rule_content h6, .share_mian.rule_content li, .share_mian.rule_content td, .share_mian.rule_content th { 
            max-width: 100% !important; 
            word-wrap: break-word !important; 
            word-break: break-word !important; 
            overflow-wrap: break-word !important; 
            box-sizing: border-box !important; 
            white-space: normal !important; 
        }
        .share_mian.rule_content img { 
            max-width: 100% !important; 
            height: auto !important; 
            display: block !important; 
        }
        .share_mian.rule_content table { 
            max-width: 100% !important; 
            table-layout: auto !important; 
            word-break: break-word !important; 
        }
        .share_mian.rule_content table td, .share_mian.rule_content table th { 
            word-break: break-word !important; 
            overflow-wrap: break-word !important; 
        } 
    </style>
</head>

<body> 
    
    <?php
        $ref_id = auth()->check() ? auth()->user()->ref_id : 'GUEST';
        $inviteLink = url('register') . '?ref_by=' . $ref_id;
        $inviteMessage = "Join our platform and start earning money today! Sign up now using my referral link: " . $inviteLink;
    ?>

    <div class="share_mian"> 
        <div class="share_title">My Invitation Code</div> 
        <div class="share_code"> 
            <div class="code_left">
                <b><?php echo e($inviteLink); ?></b>
            </div> 
            <div class="code_r"> 
                <a href="javascript:void(0);" 
                   id="copyLink" 
                   data-clipboard-target="#copyLink" 
                   data-clipboard-action="copy" 
                   data-clipboard-text="<?php echo e($inviteMessage); ?>">
                   Copy Link
                </a> 
            </div> 
        </div> 
    </div> 
    
    <div class="share_mian rule_content"> 
        <p><span style="text-wrap-mode: nowrap;">Referral Rewards:</span></p>
        <p><span style="text-wrap-mode: nowrap;"><br/></span></p>
        <p><span style="text-wrap-mode: nowrap;">Earn a 30% cashback reward by inviting a Level 1 member to invest.</span></p>
        <p><span style="text-wrap-mode: nowrap;"><br/></span></p>
        <p><span style="text-wrap-mode: nowrap;">Earn a 2% cashback reward by inviting a Level 2 member to invest.</span></p>
        <p><span style="text-wrap-mode: nowrap;"><br/></span></p>
        <p><span style="text-wrap-mode: nowrap;">Earn a 1% cashback reward by inviting a Level 3 member to invest.</span></p>
        <p><span style="text-wrap-mode: nowrap;"><br/></span></p>
        <p><span style="text-wrap-mode: nowrap;">For example, if you invite a Level 1 member to register and successfully invest ₱1000 in a product, you will immediately receive ₱300 in cashback, which will be automatically credited to your account balance.</span></p>
        <p><br/></p> 
    </div> 
    
    <div class="share_image"> 
        <img src="/static/home/img/bpshare.png" alt=""> 
    </div> 
    
    <div style="height: 70px;"></div> 
    
    <style>
        .game1 { 
            border-radius: 50%; 
            animation: rotate1 2s linear infinite;
        }
        @keyframes rotate1 { 
            0% { 
                transform: rotateZ(0deg); 
            }
            100% { 
                transform: rotateZ(360deg); 
            }
        }
    </style>
    
    <!-- ফুটার মেনু (সংশোধিত এবং ঠিক করা লিংকসমূহ) -->
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
                <img src="/static/home/img/i8.png" /> 
                <p class="xz">Share</p> 
            </a> 
        </div> 
        <div class="foot_bo"> 
            <a href="<?php echo e(route('profile')); ?>"> 
                <img src="/static/home/img/i9.png" /> 
                <p>My</p> 
            </a> 
        </div> 
    </footer>
    
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"version":"2024.11.0","token":"32f11e40f8564b3ea5a491cc6a098c64","r":1,"server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>

    <script type="text/javascript">
        var clipboard = new ClipboardJS('#copyLink');
        clipboard.on('success', function(e) { 
            layer.open({ 
                content: "Copy Succeeded", 
                skin: 'msg', 
                time: 2 
            });
        });

        clipboard.on('error', function(e) { 
            layer.open({ 
                content: "Copy Failed", 
                skin: 'msg', 
                time: 2 
            });
        });

        function makeCode() { 
            if (document.getElementById("canvas")) {
                var qrcode = new QRCode(document.getElementById("canvas"), { 
                    width: 200, 
                    height: 200 
                }); 
                var elText = "<?php echo e($inviteLink); ?>"; 
                console.log(elText); 
                qrcode.makeCode(elText);
            }
        }
        
        $(document).ready(function() {
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            makeCode();
        });
    </script>
</body>
</html>
<?php /**PATH /home/vol1000_8/infinityfree.com/if0_43010282/htdocs/resources/views/app/main/invite.blade.php ENDPATH**/ ?>