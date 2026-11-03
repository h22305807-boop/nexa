<!DOCTYPE html>
<html class="pixel-ratio-3 retina android android-5 android-5-0 watch-active-state">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>NEXA | About Us</title>

    <!-- Static Files & Fast CDN Fonts -->
    <link rel="stylesheet" href="/static/home/css/app.css?v=5.8">
    <link rel="stylesheet" href="/static/home/css/iconfont.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <script type="text/javascript" src="/static/home/js/jquery-1.11.3.min.js"></script>

    <style type="text/css">
        :root {
            --accent-blue: #318cdf;
            --bg-light: #fafafa;
        }
        * { margin: 0; padding: 0; list-style: none; box-sizing: border-box; }
        body { background: var(--bg-light); font-family: 'Poppins', sans-serif; overflow-x: hidden; -webkit-font-smoothing: antialiased; }

        /* --- Fast Blue Theme Preloader --- */
        #preloader {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: #fff; display: flex; justify-content: center;
            align-items: center; z-index: 10000;
        }
        #preloader img { width: 75px; height: 75px; object-fit: contain; border-radius: 50%; box-shadow: 0 4px 15px rgba(49,141,223,0.3); }

        /* --- Navbar Styling (Blue Theme Fixed) --- */
        .navbar { 
            background-color: var(--accent-blue) !important; 
            height: 50px; color: #fff;
            position: fixed; top: 0; width: 100%; z-index: 100;
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .navbar .left { width: 80px; display: flex; align-items: center; }
        .navbar .left a { color: #fff; text-decoration: none; font-size: 14px; display: flex; align-items: center; font-weight: 500; }
        .navbar .center { flex: 1; text-align: center; font-weight: bold; font-size: 16px; letter-spacing: 0.5px; }
        .navbar .right { width: 80px; }

        /* Content Area */
        .page-content { margin-top: 55px; padding: 20px 15px; padding-bottom: 90px; background: #fff; }
        .content-text { line-height: 1.7; color: #444; font-size: 14px; }
        
        /* Perfect Balanced Company Logo Styling */
        .company-logo-box {
            text-align: center;
            margin: 10px 0 20px 0;
        }
        .company-logo-box img {
            width: 80px;
            height: 80px;
            object-fit: contain;
            border-radius: 50%;
            padding: 4px;
            background: #fff;
            box-shadow: 0 4px 15px rgba(49, 141, 223, 0.25);
            border: 2px solid #e1f0ff;
        }

        .content-text h2 { color: var(--accent-blue); font-size: 18px; margin: 25px 0 10px; font-weight: 700; border-left: 4px solid var(--accent-blue); padding-left: 10px; }
        .content-text p { margin-bottom: 15px; text-align: justify; }
        .content-text img.feature-img { width: 100%; height: 210px; object-fit: cover; border-radius: 12px; margin: 15px 0; box-shadow: 0 5px 15px rgba(0,0,0,0.08); }

        /* --- 5-Bar Footer (Icons Size Optimized & Properly Centered) --- */
        footer {
            position: fixed; bottom: 0; width: 100%; background: #fff;
            display: flex; justify-content: space-around; padding: 6px 0;
            border-top: 1px solid #eee; z-index: 999;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.05);
        }
        .foot_bo { text-align: center; flex: 1; }
        .foot_bo a { display: flex; flex-direction: column; align-items: center; justify-content: center; text-decoration: none; width: 100%; }
        .foot_bo img { width: 28px; height: 28px; object-fit: contain; display: block; margin: 0 auto; }
        .foot_bo p { font-size: 11px; color: #666; margin-top: 2px; font-weight: 500; line-height: 1.2; }
        .xz { color: var(--accent-blue) !important; font-weight: bold; }
    </style>
</head>

<body>
    <!-- Preloader with NEXA Logo -->
    <div id="preloader">
        <img src="https://www.image2url.com/r2/default/images/1790249577903-e1d6b6f7-1f43-423c-ad8c-6c43b0e4e0c2.png" alt="NEXA Loading">
    </div>

    <div class="views">
        <!-- Header -->
        <div class="navbar">
            <div class="left">
                <a href="<?php echo e(route('dashboard')); ?>" class="external link">
                    <i class="icon iconfont icon-angleleft" style="font-size: 18px;"></i> Back
                </a>
            </div>
            <div class="center">NEXA Profile</div>
            <div class="right"></div>
        </div>

        <!-- Main Content -->
        <div class="page-content">
            <div class="content-text">
                
                <!-- Perfect Size Company Logo -->
                <div class="company-logo-box">
                    <img src="https://www.image2url.com/r2/default/images/1790249577903-e1d6b6f7-1f43-423c-ad8c-6c43b0e4e0c2.png" alt="NEXA Logo">
                </div>

                <p>Headquartered in the United Kingdom with international corporate branches worldwide, <strong>NEXA</strong> is a colossal, multi-national digital asset management and high-yield financial technology enterprise. Recognized globally for our elite market standing, we provide exceptionally secure, reliable, and high-performance financial growth portfolios for millions of elite investors across the globe.</p>
                
                <p>Driven by an advanced digital framework and absolute corporate transparency, our enterprise manages massive global capital infrastructures, next-generation market sectors, and automated revenue systems. Every operational facet at NEXA is protected by military-grade security protocols, strict international regulatory compliance, and veteran financial administration.</p>

                <p><strong>Officially expanded and launched in Nepal with a monumental, highly secure 4-year strategic roadmap (2026 to 2030), NEXA stands as an unshakeable, fully audited, and premier corporate powerhouse. Our robust economic foundation guarantees absolute financial stability, uncompromised safety, and consistent daily earnings for our rapidly expanding community.</strong></p>

                <!-- NEXA Modern Corporate Building Image -->
                <img class="feature-img" src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=1000&q=80" alt="NEXA Corporate Headquarters Building">

                <h2>Global Workforce & Elite Corporate Integrity</h2>
                <p>As a monumental international enterprise, <strong>NEXA</strong> employs thousands of world-class financial analysts, top-tier cybersecurity experts, software engineers, and dedicated customer support specialists working around the clock across our global offices.</p>
                
                <p>Our workforce operates under strict international standards to ensure lightning-fast transactions, impenetrable database protection, and seamless platform stability. Every single asset and member capital is meticulously managed, ensuring ultimate peace of mind and peerless corporate execution.</p>

                <!-- NEXA Workers & Employees Working in Office -->
                <img class="feature-img" src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1000&q=80" alt="NEXA Professional Team Working">

                <h2>Trusted by Hundreds of Thousands of Global Investors</h2>
                <p>No platform equals <strong>NEXA</strong> when it comes to supreme financial security, absolute market stability, and unwavering community trust. Backed by hundreds of thousands of highly active, successful, and satisfied investors spanning the UK, Asia, and international markets, we continue to redefine excellence in modern wealth management.</p>

                <p>Join hands with a globally recognized titan. Together with our thriving community, we navigate the future of digital finance with absolute confidence, guaranteeing verified transparent returns, complete legal compliance, and a prosperous financial journey through 2030 and beyond.</p>
                
            </div>
        </div>
    </div>

    <!-- 5 Bar Footer -->
    <footer>
        <div class="foot_bo">
            <a href="<?php echo e(route('dashboard')); ?>">
                <img src="/static/home/img/i2.png" alt="Home" />
                <p>Home</p>
            </a>
        </div>
        <div class="foot_bo">
            <a href="<?php echo e(route('vip')); ?>">
                <img src="/static/home/img/i11.png" alt="Earnings" />
                <p>Earnings</p>
            </a>
        </div>
        <div class="foot_bo">
            <a href="<?php echo e(route('publish.records')); ?>">
                <img src="/static/home/img/i5.png" alt="Publish" />
                <p>Publish</p>
            </a>
        </div>
        <div class="foot_bo">
            <a href="<?php echo e(route('user.invite')); ?>">
                <img src="/static/home/img/i7.png" alt="Share" />
                <p>Share</p>
            </a>
        </div>
        <div class="foot_bo">
            <a href="<?php echo e(route('profile')); ?>">
                <img src="/static/home/img/i9.png" alt="My" />
                <p>My</p>
            </a>
        </div>
    </footer>

    <script type="text/javascript">
        // Optimized fast loading script
        window.addEventListener('load', function() {
            setTimeout(function(){
                $('#preloader').fadeOut('fast');
            }, 100);
        });
    </script>
</body>
</html>
        <?php /**PATH /home/vol1000_8/infinityfree.com/if0_43010282/htdocs/resources/views/app/main/publish-records.blade.php ENDPATH**/ ?>