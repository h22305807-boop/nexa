<!DOCTYPE html>
<html class="pixel-ratio-3 retina android android-5 android-5-0 watch-active-state">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(env('APP_NAME', 'AgriCare')); ?> | About Us</title>

    <!-- Static Files -->
    <link rel="stylesheet" href="/static/home/css/app.css?v=5.8">
    <link rel="stylesheet" href="/static/home/css/iconfont.css">
    
    <script type="text/javascript" src="/static/home/js/jquery-1.11.3.min.js"></script>

    <style type="text/css">
        :root {
            --accent-blue: #318cdf;
            --bg-light: #fafafa;
        }
        * { margin: 0; padding: 0; list-style: none; box-sizing: border-box; }
        body { background: var(--bg-light); font-family: 'Poppins', sans-serif; overflow-x: hidden; }

        /* --- Blue Theme Preloader --- */
        #preloader {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: #fff; display: flex; justify-content: center;
            align-items: center; z-index: 10000;
        }
        #preloader img { width: 100px; }

        /* --- Navbar Styling (Blue Theme Fixed) --- */
        .navbar { 
            background-color: var(--accent-blue) !important; 
            height: 50px; color: #fff;
            position: fixed; top: 0; width: 100%; z-index: 100;
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 10px;
        }
        .navbar .left { width: 80px; display: flex; align-items: center; }
        .navbar .left a { color: #fff; text-decoration: none; font-size: 14px; display: flex; align-items: center; }
        .navbar .center { flex: 1; text-align: center; font-weight: bold; font-size: 16px; }
        .navbar .right { width: 80px; }

        /* Content Area */
        .page-content { margin-top: 55px; padding: 15px; padding-bottom: 80px; background: #fff; }
        .content-text { line-height: 1.6; color: #444; font-size: 14px; }
        .content-text h2 { color: var(--accent-blue); font-size: 20px; margin: 20px 0 10px; font-weight: 700; }
        .content-text p { margin-bottom: 15px; text-align: justify; }
        .content-text img { width: 100%; border-radius: 10px; margin: 10px 0; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }

        /* --- 5-Bar Footer --- */
        footer {
            position: fixed; bottom: 0; width: 100%; background: #fff;
            display: flex; justify-content: space-around; padding: 10px 0;
            border-top: 1px solid #eee; z-index: 999;
        }
        .foot_bo { text-align: center; flex: 1; text-decoration: none; }
        .foot_bo img { width: 24px; height: 24px; }
        .foot_bo p { font-size: 12px; color: #666; margin-top: 2px; }
        .xz { color: var(--accent-blue) !important; font-weight: bold; }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <img src="<?php echo e(asset('public/loading.gif')); ?>" alt="Loading...">
    </div>

    <div class="views">
        <!-- Header -->
        <div class="navbar">
            <div class="left">
                <a href="<?php echo e(route('dashboard')); ?>" class="external link">
                    <i class="icon iconfont icon-angleleft" style="font-size: 18px;"></i> Back
                </a>
            </div>
            <div class="center">Company Profile</div>
            <div class="right"></div>
        </div>

        <!-- Main Content -->
        <div class="page-content">
            <div class="content-text">
                <p>Founded in 1990 by Tom and Karen Avinelis, <strong>AgriCare Inc.</strong> is a full-service farm management company based in California's San Joaquin Valley, providing management and consulting services to conventional and organic farms in California and Oregon.</p>
                
                <p>We specialize in a variety of perennial crops including citrus, olives, blueberries, table grapes, hazelnuts, almonds, and pistachios. For over 20 years, we have been committed to exceeding our clients' expectations by providing professional farm management services and focusing on land stewardship.</p>

                <p><strong>By 2024, we aim to expand our market in Bangladesh to reach 1 billion acres of crop production including chili, potato, jute, tea, tobacco, maize, rice, wheat, sugarcane, rapeseed, peas, and more, achieving sustainable agricultural financial solutions through national development.</strong></p>

                <img src="https://agricare.club/uploads/image/2510/0e61deb2fb947c.png" alt="Expansion">

                <p>AgriCare's flexible management model enables us to meet the needs of every landowner - from family farms to institutional investment groups - with services including farm management, organic farm services, agronomy, farm administration, crop accounting, food safety program management, and consulting.</p>

                <img src="https://www.cropin.com/wp-content/uploads/2023/02/New-technologies-in-agriculture-3.webp" alt="Technology">

                <h2>AI-First Digital Transformation</h2>
                <p>As the world's most innovative and widely used artificial intelligence platform in food and agriculture, we help make the world smarter, more resilient, and more sustainable by using intelligence from over 1 billion acres of farmland.</p>
                
                <p>From pioneering the first enterprise-grade, real-time GenAI-powered agri-intelligence platform to creating the world's first and leading industrial cloud for agriculture, we are redefining what is possible for the global food system.</p>

                <h2>Transforming Agri-Food Business Models</h2>
                <p>No Agtech company understands the complexity of the agri-food system better than we do. Through more than a decade of innovation, we empower the world's leading food and agriculture enterprises to rethink their operations, growth, and sourcing.</p>

                <p>Together, we address the sector's most critical challenges, such as reducing climate impact, overcoming supply chain disruptions, enabling sustainable sourcing, and ensuring compliance with global standards like EUDR.</p>
                
                <img src="/uploads/image/2510/645a9556d4255d.jpg" alt="Business Model">
            </div>
        </div>
    </div>

    <!-- 5 Bar Footer -->
    <footer>
        <div class="foot_bo">
            <a href="<?php echo e(route('dashboard')); ?>">
                <img src="/static/home/img/i2.png" />
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
            <a href="<?php echo e(route('publish.records')); ?>">
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
                <img src="/static/home/img/i9.png" />
                <p>My</p>
            </a>
        </div>
    </footer>

    <script type="text/javascript">
        window.addEventListener('load', function() {
            setTimeout(function(){
                $('#preloader').fadeOut('slow');
            }, 600);
        });
    </script>
</body>
</html><?php /**PATH /home/vol1000_8/infinityfree.com/if0_43010282/htdocs/resources/views/app/main/about.blade.php ENDPATH**/ ?>