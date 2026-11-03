<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title><?php echo e(env('APP_NAME', 'AgriCare')); ?> | Register</title>
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
    }

    .register-card {
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

    /* Dynamic Captcha Style */
    .captcha-box {
        background: #e2e8f0;
        color: #1e293b;
        font-weight: 700;
        font-size: 18px;
        letter-spacing: 3px;
        padding: 6px 14px;
        border-radius: 8px;
        cursor: pointer;
        user-select: none;
        margin-left: 10px;
        white-space: nowrap;
        border: 1px dashed #cbd5e0;
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
        margin-top: 25px;
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

    .error-msg-blade {
        color: #e53e3e;
        font-size: 12px;
        margin-top: 5px;
        padding-left: 4px;
        display: block;
        font-weight: 500;
    }
    </style>
</head>

<body>

    <div class="register-card">
        <!-- 1. Logo -->
        <div class="login_logo">
            <img src="https://www.image2url.com/r2/default/images/1790249577903-e1d6b6f7-1f43-423c-ad8c-6c43b0e4e0c2.png" alt="Nexa Logo" />
        </div>

        <form method="post" id="registerForm" action="<?php echo e(route('register')); ?>" autocomplete="off">
            <?php echo csrf_field(); ?>

            <!-- 2. Mobile Number (+977) -->
            <div class="input-container">
                <div class="input-control">
                    <svg class="field-icon" viewBox="0 0 24 24"><path d="M17 1.01L7 1c-1.1 0-2 .9-2 2v18c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V3c0-1.1-.9-1.99-2-1.99zM17 19H7V5h10v14z"/></svg>
                    <span class="country-code">+977</span>
                    <input class="inputfield" type="tel" id="mobile" name="phone" minlength="7" maxlength="11" placeholder="Mobile Number" value="<?php echo e(old('phone')); ?>" required>
                </div>
                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="error-msg-blade"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- 3. Password Field -->
            <div class="input-container">
                <div class="input-control">
                    <svg class="field-icon" viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
                    <input class="inputfield" type="password" id="password" name="password" maxlength="16" placeholder="Enter your password" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility('password', this)">
                        <svg class="eye-off" viewBox="0 0 24 24"><path d="M12 7c2.76 0 5 2.24 5 5 0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.45-4.75-1.73-4.39-6-7.5-11-7.5-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 7.13 11.35 7 12 7zM2 4.27l2.28 2.28.46.46C3.08 8.3 1.78 10.02 1 12c1.73 4.39 6 7.5 11 7.5 1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22 21 20.73 3.27 3 2 4.27zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65 0 1.66 1.34 3 3 3 .22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53-2.76 0-5-2.24-5-5 0-.79.2-1.53.53-2.2zm4.31-.78l3.15 3.15.02-.17c0-1.66-1.34-3-3-3l-.17.02z"/></svg>
                    </span>
                </div>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="error-msg-blade"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- 4. Confirm Password Field -->
            <div class="input-container">
                <div class="input-control">
                    <svg class="field-icon" viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
                    <input class="inputfield" type="password" id="password_confirmation" name="password_confirmation" maxlength="16" placeholder="Confirm Password" required>
                    <span class="toggle-password" onclick="togglePasswordVisibility('password_confirmation', this)">
                        <svg class="eye-off" viewBox="0 0 24 24"><path d="M12 7c2.76 0 5 2.24 5 5 0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.45-4.75-1.73-4.39-6-7.5-11-7.5-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 7.13 11.35 7 12 7zM2 4.27l2.28 2.28.46.46C3.08 8.3 1.78 10.02 1 12c1.73 4.39 6 7.5 11 7.5 1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22 21 20.73 3.27 3 2 4.27zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65 0 1.66 1.34 3 3 3 .22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53-2.76 0-5-2.24-5-5 0-.79.2-1.53.53-2.2zm4.31-.78l3.15 3.15.02-.17c0-1.66-1.34-3-3-3l-.17.02z"/></svg>
                    </span>
                </div>
            </div>

            <!-- 5. Verification Captcha Code -->
            <div class="input-container">
                <div class="input-control">
                    <svg class="field-icon" viewBox="0 0 24 24"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-5.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
                    <input class="inputfield" type="text" id="captchaInput" placeholder="Verification Code" maxlength="4" required>
                    <div class="captcha-box" id="captchaBox" onclick="generateCaptcha()" title="Click to refresh"></div>
                </div>
                <span class="error-msg-blade" id="captchaError" style="display:none;">Verification code incorrect!</span>
            </div>

            <!-- 6. Invite Code -->
            <div class="input-container">
                <div class="input-control">
                    <svg class="field-icon" viewBox="0 0 24 24"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                    <input class="inputfield" type="text" id="inviteCode" name="ref_by" placeholder="Invite Code" value="<?php echo e(old('ref_by')); ?>">
                </div>
                <?php $__errorArgs = ['ref_by'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="error-msg-blade"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- 7. Register Button -->
            <button type="submit" class="btn_submit_my">Register</button>
            
            <!-- 8. Login Link -->
            <a href="<?php echo e(url('/login')); ?>" class="login_laa">I have an account</a>
        </form>
    </div>

    <script type="text/javascript">
    const eyeOpenSVG = `<svg viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>`;
    const eyeOffSVG = `<svg viewBox="0 0 24 24"><path d="M12 7c2.76 0 5 2.24 5 5 0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.45-4.75-1.73-4.39-6-7.5-11-7.5-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 7.13 11.35 7 12 7zM2 4.27l2.28 2.28.46.46C3.08 8.3 1.78 10.02 1 12c1.73 4.39 6 7.5 11 7.5 1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22 21 20.73 3.27 3 2 4.27zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65 0 1.66 1.34 3 3 3 .22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53-2.76 0-5-2.24-5-5 0-.79.2-1.53.53-2.2zm4.31-.78l3.15 3.15.02-.17c0-1.66-1.34-3-3-3l-.17.02z"/></svg>`;

    let currentCaptcha = "";

    // Toggle Password Visibility
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

    // Dynamic Captcha Generator
    function generateCaptcha() {
        currentCaptcha = Math.floor(1000 + Math.random() * 9000).toString();
        document.getElementById('captchaBox').innerText = currentCaptcha;
    }

    // Auto Fill Ref and Captcha Init
    document.addEventListener("DOMContentLoaded", function() {
        generateCaptcha();

        const urlParams = new URLSearchParams(window.location.search);
        const refBy = urlParams.get('ref_by');
        const inviteInput = document.getElementById('inviteCode');
        if (refBy && inviteInput && !inviteInput.value) {
            inviteInput.value = refBy;
        }
    });

    // Form Submit Validation
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        const userCaptcha = document.getElementById('captchaInput').value.trim();
        const captchaError = document.getElementById('captchaError');

        if (userCaptcha !== currentCaptcha) {
            e.preventDefault();
            captchaError.style.display = 'block';
            generateCaptcha();
            document.getElementById('captchaInput').value = '';
        } else {
            captchaError.style.display = 'none';
        }
    });
    </script>
</body>

</html>
                                    <?php /**PATH /home/vol1000_8/infinityfree.com/if0_43010282/htdocs/resources/views/app/auth/registration.blade.php ENDPATH**/ ?>