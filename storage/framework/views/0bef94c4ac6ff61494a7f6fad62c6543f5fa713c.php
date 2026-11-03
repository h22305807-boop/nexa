

<!DOCTYPE html>
<html class="pixel-ratio-3 retina android">

<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Nexa Daily Check-in</title>
    <link href="<?php echo e(asset('public')); ?>/Lay/css/layui.css" rel="stylesheet">
    <link href="<?php echo e(asset('public')); ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo e(asset('public')); ?>/css/main.css" rel="stylesheet">
    <link href="<?php echo e(asset('public')); ?>/css/meun.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('public/checkin.css')); ?>">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background: #fafafa; font-family: sans-serif; overflow-x: hidden; }
        
        /* Top Header */
        .top { width: 100%; height: 46px; background: #318cdf; position: relative; display: flex; align-items: center; justify-content: center; }
        .top .back-btn { position: absolute; left: 10px; width: 20px; cursor: pointer; }
        .topname { color: #fff; font-size: 16px; font-weight: bold; }

        /* Calendar Grid Styles */
        .calendar-container { max-width: 450px; margin: 15px auto; padding: 0 12px; }
        .calendar-card { background: #fff; border-radius: 15px; padding: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .calendar-header { text-align: center; font-size: 15px; font-weight: bold; color: #318cdf; margin-bottom: 12px; }
        
        .calendar-grid { display: grid; grid-template-columns: repeat(6, 1fr); gap: 8px; }
        .calendar-day {
            background: #f7f9fb; border: 1px solid #e1eaf3; border-radius: 10px;
            height: 52px; display: flex; flex-direction: column; align-items: center;
            justify-content: center; font-size: 11px; color: #333; position: relative;
            transition: all 0.2s ease;
        }
        .calendar-day .day-num { font-size: 10px; color: #888; margin-bottom: 2px; }
        .calendar-day .day-val { font-size: 10px; font-weight: bold; color: #318cdf; }

        /* Checked-in State with Gold Coin 🪙 */
        .calendar-day.checked {
            background: linear-gradient(135deg, #fff3d1 0%, #ffdf85 100%);
            border-color: #f6c23e;
            box-shadow: 0 2px 6px rgba(246, 194, 62, 0.3);
        }
        .calendar-day.checked .day-num { color: #8a6d0b; }
        .calendar-day.checked .day-val { display: none; }
        .calendar-day.checked::after {
            content: '🪙';
            font-size: 16px;
            animation: popIn 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }

        @keyframes popIn {
            0% { transform: scale(0); }
            100% { transform: scale(1); }
        }

        /* Balance Info Box */
        .info-box { background: #fff; max-width: 450px; margin: 12px auto; padding: 15px; border-radius: 15px; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .info-num { color: #318cdf; font-size: 20px; font-weight: bold; }
        .info-label { color: #6d6d6d; font-size: 12px; margin-top: 3px; }

        /* Confirm Button Style */
        .index-btn-theme {
            background: linear-gradient(90deg, #318cdf, #6bb1f3) !important;
            position: relative; overflow: hidden; box-shadow: 0 4px 12px rgba(49, 141, 223, 0.3);
        }
        .index-btn-theme::before {
            content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.2));
            transform: rotate(135deg); animation: shimmer 4s infinite;
        }
        @keyframes shimmer { 0% { left: -100%; } 50% { left: 100%; } 100% { left: 100%; } }

        /* Premium Rules Box Styles */
        .rules-container { max-width: 450px; margin: 0 auto 30px auto; padding: 0 15px; }
        .rules-card {
            background: linear-gradient(135deg, #ffffff 0%, #f4f9ff 100%);
            border: 1px solid #d4ebd4; border-radius: 14px; padding: 15px;
            box-shadow: 0 4px 12px rgba(49, 141, 223, 0.08);
        }
        .rules-title { color: #318cdf; font-weight: bold; font-size: 13px; margin-bottom: 10px; display: flex; align-items: center; gap: 6px; }
        .rules-content { color: #555; font-size: 11.5px; line-height: 1.7; }
        .rules-content p { margin-bottom: 6px; }
    </style>
</head>

<body>
<div class="indexdiv"></div>

<div class="top">
    <img class="back-btn" onclick="window.location.href='<?php echo e(route('dashboard')); ?>'" src="<?php echo e(asset('public/left.png')); ?>" alt="Back">
    <font class="topname">Daily Check-in Calendar</font>
</div>

<?php
    $checkedCount = 0;
    if(auth()->check()) {
        $checkedCount = \App\Models\Checkin::where('user_id', auth()->id())->count();
    }
?>

<div style="max-width:450px; margin:0 auto;">
    
    <div class="calendar-container">
        <div class="calendar-card">
            <div class="calendar-header">✨ Check-in Rewards ✨</div>
            <div class="calendar-grid" id="calendarGrid">
                </div>
        </div>
    </div>

    <div class="info-box">
        <div class="info-num" id="amount"><?php echo e(price(auth()->user()->balance)); ?></div>
        <div class="info-label">Account Balance</div>
    </div>

    <div style="width:100%; max-width:450px; margin:15px auto; text-align:center;">
        <div id="checkin"
             onclick="checkin()"
             class="index-btn-theme"
             style="width: 85%; margin: 0 auto; text-align: center; height: 42px; line-height: 42px; color: #fff; border-radius: 100px; font-weight: bold; cursor: pointer; font-size: 14px;">
            Confirm Check-in
        </div>
    </div>

    <div class="rules-container">
        <div class="rules-card">
            <div class="rules-title">Check-in Rules</div>
            <div class="rules-content">
                <p>1. Daily free gift worth <b><?php echo e(price(setting('checkin'))); ?></b>.</p>
                <p>2. Tap the confirmation button to successfully claim your reward once every <b>24 hours</b>.</p>
                <p>3. After completing the full <b>30 days</b> cycle, the calendar will automatically reset and repeat from Day 1 so you can keep claiming continuously!</p>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('alert-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<img style="position: fixed; display: none; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 60px; z-index: 999;" src="<?php echo e(asset('public/loading.gif')); ?>" class="loading" alt="Loading">

<script>
    // Fast & Safe Performance rendering without server overload
    document.addEventListener("DOMContentLoaded", function() {
        var gridHtml = "";
        var totalCheckins = parseInt("<?php echo e($checkedCount); ?>") || 0;
        
        // Modulo logic for 30 days cycle loop repeating
        var checkedDaysCount = totalCheckins > 0 ? ((totalCheckins - 1) % 30) + 1 : 0;

        for (var i = 1; i <= 30; i++) {
            var isChecked = i <= checkedDaysCount ? "checked" : "";
            gridHtml += '<div class="calendar-day ' + isChecked + '">';
            gridHtml += '<span class="day-num">Day ' + i + '</span>';
            gridHtml += '<span class="day-val">20</span>';
            gridHtml += '</div>';
        }
        document.getElementById('calendarGrid').innerHTML = gridHtml;
    });

    function checkin(){
        document.querySelector('.loading').style.display = 'block';
        window.location.href = '<?php echo e(route('user.checkin')); ?>';
    }
</script>

</body>
</html><?php /**PATH /home/vol1000_8/infinityfree.com/if0_43010282/htdocs/resources/views/app/main/promo.blade.php ENDPATH**/ ?>