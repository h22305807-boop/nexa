<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title><?php echo e(env('APP_NAME', 'NEXA')); ?> | Login</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <style type="text/css">
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    }

    html, body {
        background-color: #ffffff;
        min-height: 100vh;
        width: 100%;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding: 40px 20px 20px 20px;
        position: relative;
    }

    /* Blue Premium Dynamic Toast Popup */
    .premium-toast {
        position: fixed;
        top: 20px;
        right: 20px;
        background: rgba(37, 99, 235, 0.95);
        backdrop-filter: blur(10px);
        color: #ffffff;
        padding: 14px 20px;
        border-radius: 14px;
        box-shadow: 0 10px 25px rgba(37, 99, 235, 0.35);
        display: flex;
        align-items: center;
        gap: 12px;
        z-index: 9999;
        font-size: 14px;
        font-weight: 500;
        opacity: 0;
        transform: translateY(-20px) scale(0.95);
        transition: all 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        pointer-events: none;
        max-width: 320px;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .premium-toast.show {
        opacity: 1;
        transform: translateY(0) scale(1);
        pointer-events: auto;
    }

    .toast-icon {
        width: 24px;
        height: 24px;
        fill: #ffffff;
        flex-shrink: 0;
    }

    .login-card {
        background: #ffffff;
        width: 100%;
        max-width: 420px;
        padding: 0;
        border-radius: 0;
        box-shadow: none;
    }

    .login_logo {
        text-align: center;
        margin-bottom: 30px;
        margin-top: 10px;
    }

    .login_logo img {
        max-width: 150px;
        height: auto;
        display: block;
        margin: 0 auto;
    }

    .input-container {
        margin-bottom: 16px;
        position: relative;
    }

    .input-control {
        position: relative;
        display: flex;
        align-items: center;
        background: #f4f6f8;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        padding: 0 14px;
        height: 50px;
        transition: all 0.3s ease;
    }

    .input-control:focus-within {
        border-color: #2563eb;
        background: #ffffff;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
    }

    .field-icon {
        width: 20px;
        height: 20px;
        fill: #8a94a6;
        margin-right: 10px;
        flex-shrink: 0;
    }

    .country-code {
        font-weight: 700;
        color: #2d3748;
        font-size: 15px;
        margin-right: 8px;
        padding-right: 8px;
        border-right: 1.5px solid #cbd5e0;
        display: flex;
        align-items: center;
        height: 22px;
    }

    .inputfield {
        width: 100%;
        border: none;
        background: transparent;
        outline: none;
        font-size: 15px;
        color: #2d3748;
        font-weight: 500;
    }

    .inputfield::placeholder {
        color: #a0aec0;
        font-weight: 400;
    }

    .toggle-password {
        position: absolute;
        right: 14px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 5px;
    }

    .toggle-password svg {
        width: 20px;
        height: 20px;
        fill: #8a94a6;
        transition: fill 0.2s;
    }

    .toggle-password:hover svg {
        fill: #2563eb;
    }

    /* Cloudflare Style Verification Card */
    .cf-turnstile-box {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 12px 16px;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .cf-left {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .cf-checkbox-custom {
        width: 24px;
        height: 24px;
        border: 2px solid #cbd5e1;
        border-radius: 6px;
        background: #ffffff;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
    }

    .cf-checkbox-custom:hover {
        border-color: #2563eb;
    }

    .cf-checkbox-custom.checked {
        background: #2563eb;
        border-color: #2563eb;
    }

    .cf-checkbox-custom svg {
        width: 16px;
        height: 16px;
        fill: #ffffff;
        display: none;
    }

    .cf-checkbox-custom.checked svg {
        display: block;
    }

    .cf-spinner {
        width: 18px;
        height: 18px;
        border: 2px solid #e2e8f0;
        border-top: 2px solid #2563eb;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
        display: none;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .cf-text {
        font-size: 13px;
        color: #334155;
        font-weight: 500;
    }

    .cf-right {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 2px;
    }

    .cf-logo-text {
        font-size: 10px;
        font-weight: 700;
        color: #64748b;
        letter-spacing: 0.5px;
    }

    .cf-subtext {
        font-size: 8px;
        color: #94a3b8;
    }

    .row.loginfield {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
        margin-bottom: 20px;
        font-size: 14px;
        color: #4a5568;
    }

    .remember-me {
        display: flex;
        align-items: center;
        gap: 6px;
        cursor: pointer;
    }

    .remember-me input[type="checkbox"] {
        accent-color: #2563eb;
        width: 16px;
        height: 16px;
        cursor: pointer;
    }

    .forgot-link {
        color: #2563eb;
        text-decoration: none;
        font-weight: 500;
    }

    .forgot-link:hover {
        text-decoration: underline;
    }

    .btn_submit_my {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 52px;
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        color: #ffffff;
        font-size: 16px;
        font-weight: 600;
        border-radius: 12px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.25);
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .btn_submit_my:active {
        transform: scale(0.98);
        box-shadow: 0 4px 10px rgba(37, 99, 235, 0.2);
    }

    .login_laa {
        display: block;
        text-align: center;
        color: #2563eb;
        font-size: 14px;
        font-weight: 600;
        margin-top: 20px;
        text-decoration: none;
        transition: color 0.2s;
    }

    .login_laa:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>

    <!-- Blue Popup Alert -->
    <div class="premium-toast" id="premiumToast">
        <svg class="toast-icon" viewBox="0 0 24 24">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
        </svg>
        <span id="toastMsg">Notification message...</span>
    </div>

    <div class="login-card">
        <!-- Logo -->
        <div class="login_logo">
            <img src="https://www.image2url.com/r2/default/images/1790249577903-e1d6b6f7-1f43-423c-ad8c-6c43b0e4e0c2.png" alt="NEXA Logo" />
        </div>

        <form method="post" id="loginForm" action="<?php echo e(route('login')); ?>" autocomplete="off">
            <?php echo csrf_field(); ?>

            <!-- Mobile Field -->
            <div class="input-container">
                <div class="input-control">
                    <svg class="field-icon" viewBox="0 0 24 24"><path d="M17 1.01L7 1c-1.1 0-2 .9-2 2v18c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V3c0-1.1-.9-1.99-2-1.99zM17 19H7V5h10v14z"/></svg>
                    <span class="country-code">+977</span>
                    <input class="inputfield" type="tel" id="mobile" name="phone" minlength="7" maxlength="11" placeholder="Mobile" value="<?php echo e(old('phone')); ?>" required>
                </div>
            </div>

            <!-- Password Field -->
            <div class="input-container">
                <div class="input-control">
                    <svg class="field-icon" viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
                    <input class="inputfield" type="password" id="password" name="password" maxlength="16" placeholder="Password" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility('password', this)">
                        <svg class="eye-off" viewBox="0 0 24 24"><path d="M12 7c2.76 0 5 2.24 5 5 0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.45-4.75-1.73-4.39-6-7.5-11-7.5-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 7.13 11.35 7 12 7zM2 4.27l2.28 2.28.46.46C3.08 8.3 1.78 10.02 1 12c1.73 4.39 6 7.5 11 7.5 1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22 21 20.73 3.27 3 2 4.27zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65 0 1.66 1.34 3 3 3 .22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53-2.76 0-5-2.24-5-5 0-.79.2-1.53.53-2.2zm4.31-.78l3.15 3.15.02-.17c0-1.66-1.34-3-3-3l-.17.02z"/></svg>
                    </span>
                </div>
            </div>

            <!-- Cloudflare Turnstile Tick Verification -->
            <div class="cf-turnstile-box">
                <div class="cf-left">
                    <div class="cf-checkbox-custom" id="cfBox" onclick="triggerCloudflareCheck()">
                        <svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                        <div class="cf-spinner" id="cfSpinner"></div>
                    </div>
                    <span class="cf-text" id="cfText">Verify you are human</span>
                </div>
                <div class="cf-right">
                    <span class="cf-logo-text">CLOUDFLARE</span>
                    <span class="cf-subtext">Privacy • Terms</span>
                </div>
            </div>

            <!-- Remember Password & Forgot Password -->
            <div class="row loginfield">
                <label class="remember-me">
                    <input type="checkbox" id="remember_password" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                    <span>Remember Password</span>
                </label>
                <a href="<?php echo e(url('/password/reset')); ?>" class="forgot-link">Forgot Password?</a>
            </div>

            <!-- Login Button -->
            <button type="submit" class="btn_submit_my login_la">Login</button>

            <!-- Register Link -->
            <a href="<?php echo e(url('/register')); ?>" class="login_laa">Register</a>
        </form>
    </div>

    <script type="text/javascript" src="/static/home/js/jquery-1.11.3.min.js"></script>

    <script type="text/javascript">
    var isCfVerified = false;

    // Premium Blue Toast Trigger
    function showBlueToast(text) {
        var toast = document.getElementById('premiumToast');
        var toastMsg = document.getElementById('toastMsg');
        toastMsg.innerText = text;
        toast.classList.add('show');
        setTimeout(function() {
            toast.classList.remove('show');
        }, 3500);
    }

    // Toggle Password Visibility
    const eyeOpenSVG = `<svg viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5-5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>`;
    const eyeOffSVG = `<svg viewBox="0 0 24 24"><path d="M12 7c2.76 0 5 2.24 5 5 0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.45-4.75-1.73-4.39-6-7.5-11-7.5-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 8.3 1.78 10.02 1 12c1.73 4.39 6 7.5 11 7.5 1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22 21 20.73 3.27 3 2 4.27zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65 0 1.66 1.34 3 3 3 .22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53-2.76 0-5-2.24-5-5 0-.79.2-1.53.53-2.2zm4.31-.78l3.15 3.15.02-.17c0-1.66-1.34-3-3-3l-.17.02z"/></svg>`;

    function togglePasswordVisibility(fieldId, element) {
        const input = document.getElementById(fieldId);
        if (input.type === "password") {
            input.type = "text";
            element.innerHTML = eyeOpenSVG;
        } else {
            input.type = "password";
            element.innerHTML = eyeOffSVG;
        }
    }

    // Cloudflare Verification Trigger
    function triggerCloudflareCheck() {
        if(isCfVerified) return;

        var box = document.getElementById('cfBox');
        var spinner = document.getElementById('cfSpinner');
        var text = document.getElementById('cfText');

        spinner.style.display = 'block';

        setTimeout(function() {
            spinner.style.display = 'none';
            box.classList.add('checked');
            text.innerText = 'Success!';
            isCfVerified = true;
        }, 800);
    }

    // Backend Laravel Blade Error Handling for Blue Toast
    <?php if($errors->any()): ?>
        showBlueToast("<?php echo e($errors->first()); ?>");
    <?php endif; ?>

    <?php if(session('error')): ?>
        showBlueToast("<?php echo e(session('error')); ?>");
    <?php endif; ?>

    <?php if(session('success')): ?>
        showBlueToast("<?php echo e(session('success')); ?>");
    <?php endif; ?>

    // Cookie & Init logic
    $(function() {
        var oUser = getCookie('saved_phone');
        if (oUser) {
            $("input[name='phone']").val(oUser);
            document.getElementById('remember_password').checked = true;
        }
    });

    $('#loginForm').submit(function(e) {
        if(!isCfVerified) {
            e.preventDefault();
            showBlueToast("Please verify Cloudflare security first!");
            return false;
        }

        var mobile = $("input[name='phone']").val();
        var isSave = document.getElementById('remember_password').checked;
        if (isSave && mobile != "") {
            setCookie('saved_phone', mobile, 7); 
        } else {
            setCookie('saved_phone', '', -1);
        }
    });

    function setCookie(name, value, day) {
        var date = new Date();
        date.setDate(date.getDate() + day);
        document.cookie = name + '=' + value + ';expires=' + date.toUTCString() + ';path=/';
    }

    function getCookie(name) {
        var reg = new RegExp('(^| )' + name + '=([^;]*)(;|$)');
        var arr = document.cookie.match(reg);
        return arr ? unescape(arr[2]) : '';
    }
    </script>
</body>

</html>
                                    <?php /**PATH /home/vol1000_8/infinityfree.com/if0_43010282/htdocs/resources/views/app/auth/login.blade.php ENDPATH**/ ?>