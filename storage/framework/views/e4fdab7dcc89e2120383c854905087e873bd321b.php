<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(env('APP_NAME', 'AgriCare')); ?> - Product Details</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Scripts (SweetAlert2: এটি layer.js এর চেয়ে ১০০ গুণ বেশি শক্তিশালী) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root { --accent-blue: #318cdf; --bg-light: #fafafa; --card-bg: #FFFFFF; --text-dark: #212529; --text-light: #6c757d; --border-color: #f1f1f1; }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background-color: var(--bg-light); color: var(--text-dark); font-family: 'Poppins', sans-serif; overflow-x: hidden; padding-bottom: 30px; }
        
        /* Preloader */
        #preloader { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.9); display: none; justify-content: center; align-items: center; z-index: 10000; }
        #preloader img { width: 80px; }

        .wrapper { padding: 12px; margin-top: 50px; }
        .card-style { background-color: var(--card-bg); border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border: 1px solid var(--border-color); }
        .top-nav { display: flex; justify-content: space-between; align-items: center; height: 50px; background: var(--accent-blue); color: #fff; position: fixed; top: 0; width: 100%; z-index: 1000; }
        .top-nav .back-btn { width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; color: #fff; }
        .top-nav p { font-size: 17px; font-weight: 600; flex-grow: 1; text-align: center; margin-right: 50px; }
        .product-image { width: 100%; display: block; aspect-ratio: 16 / 10; object-fit: cover; border-radius: 16px 16px 0 0; }
        .product-content { padding: 20px; }
        .product-title { font-size: 18px; font-weight: 700; color: var(--accent-blue); margin-bottom: 10px; }
        .details-list { border-top: 1px solid var(--border-color); padding-top: 10px; margin-bottom: 20px; }
        .detail-item { display: flex; justify-content: space-between; align-items: center; padding: 12px 0; font-size: 14px; border-bottom: 1px solid #f8f9fa; }
        .price-value { color: var(--accent-blue); font-size: 18px; font-weight: 600; }

        .buy-button { margin-top: 10px; width: 100%; padding: 14px; background: linear-gradient(90deg, #318cdf, #6bb1f3); border: none; border-radius: 30px; color: #fff; font-size: 16px; font-weight: 600; cursor: pointer; position: relative; overflow: hidden; }
        .buy-button::before { content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0.1)); transform: rotate(135deg); animation: shimmer 5s infinite; }
        @keyframes shimmer { 0% { left: -100%; } 50% { left: 100%; } 100% { left: 100%; } }
    </style>
</head>
<body>
    <div id="preloader"><img src="<?php echo e(asset('public/loading.gif')); ?>" alt="Processing..."></div>

    <div class="wrapper">
        <div class="top-nav">
            <a href="javascript:void(0);" class="back-btn" onclick="window.history.back()">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            </a>
            <p>Investment Details</p>
        </div>

        <div class="product-card card-style">
            <img src="<?php echo e(asset($package->photo)); ?>" class="product-image">
            <div class="product-content">
                <h1 class="product-title"><?php echo e($package->name); ?></h1>
                <div class="details-list">
                    <div class="detail-item"><span>Price</span><span class="price-value">৳<?php echo e(number_format($package->price, 0)); ?></span></div>
                    <div class="detail-item"><span>Daily Returns</span><span>৳<?php echo e(number_format($package->commission_with_avg_amount / $package->validity, 2)); ?></span></div>
                    <div class="detail-item"><span>Total Revenue</span><span>৳<?php echo e(number_format($package->commission_with_avg_amount, 2)); ?></span></div>
                    <div class="detail-item"><span>Validity</span><span><?php echo e($package->validity); ?> days</span></div>
                </div>
                <button onclick="buyPackage('<?php echo e($package->id); ?>')" type="button" class="buy-button">Invest Now</button>
            </div>
        </div>
    </div>
    
    <script>
        function buyPackage(id) {
            // ১. কনফার্মেশন পপ-আপ
            Swal.fire({
                title: 'Confirm Purchase?',
                text: "Are you sure to invest in this package?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#318cdf',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Buy Now'
            }).then((result) => {
                if (result.isConfirmed) {
                    // ২. লোডিং দেখানো
                    $('#preloader').css('display', 'flex');

                    // ৩. রিকোয়েস্ট পাঠানো
                    $.ajax({
                        url: "<?php echo e(url('purchase/confirmation')); ?>/" + id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(res) {
                            $('#preloader').hide();

                            if (res.status === 'success') {
                                // সফল হলে টিক চিহ্ন সহ মেসেজ
                                Swal.fire({
                                    title: 'Success!',
                                    text: res.msg,
                                    icon: 'success',
                                    confirmButtonColor: '#318cdf'
                                }).then(() => {
                                    window.location.href = "<?php echo e(route('vip')); ?>";
                                });
                            } else {
                                // এরর মেসেজ
                                Swal.fire({
                                    title: 'Failed!',
                                    text: res.msg,
                                    icon: 'error',
                                    confirmButtonColor: '#318cdf'
                                });
                            }
                        },
                        error: function() {
                            $('#preloader').hide();
                            Swal.fire('Error!', 'Something went wrong. Please try again.', 'error');
                        }
                    });
                }
            });
        }
    </script>
</body>
</html><?php /**PATH /home/vol1000_8/infinityfree.com/if0_43010282/htdocs/resources/views/app/main/package_details.blade.php ENDPATH**/ ?>