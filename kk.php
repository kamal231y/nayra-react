<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row)
{
	$footer_about = $row['footer_about'];
	$contact_email = $row['contact_email'];
	$contact_phone = $row['contact_phone'];
	$contact_address = $row['contact_address'];
	$footer_copyright = $row['footer_copyright'];
	$total_recent_post_footer = $row['total_recent_post_footer'];
    $total_popular_post_footer = $row['total_popular_post_footer'];
    $newsletter_on_off = $row['newsletter_on_off'];
    $before_body = $row['before_body'];
}
?>
<?php
// Fetch reviews from Database
$stmt = $pdo->prepare("SELECT * FROM tbl_review ORDER BY id DESC");
$stmt->execute();
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Configurable Header Data
$avg_rating = "4.8";
$total_reviews_count = "35";
$google_review_link = "https://g.page/r/your-google-review-link/review";
?>

<!-- Bootstrap 5, Icons & Swiper CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<style>
    /* Google Font & Base Styling */
    .google-widget-wrapper {
        font-family: 'Google Sans', Roboto, -apple-system, BlinkMacSystemFont, "Segoe UI", Arial, sans-serif;
        color: #202124;
    }

    /* Header Banner */
    .google-header-box {
        background-color: #f8f9fa;
        border-radius: 28px;
        padding: 20px 32px;
    }

    .btn-google-blue {
        background-color: #1a73e8;
        color: #ffffff;
        font-weight: 600;
        font-size: 0.95rem;
        border-radius: 100px;
        padding: 10px 24px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.2s ease;
    }

    .btn-google-blue:hover {
        background-color: #1557b0;
        color: #ffffff;
    }

    /* Cards & Slider Styling */
    .google-card-item {
        background-color: #f8f9fa;
        border-radius: 24px;
        padding: 24px;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .google-star-gold {
        color: #ffc107;
        font-size: 1.15rem;
    }

    .profile-avatar-wrap {
        position: relative;
        width: 48px;
        height: 48px;
        flex-shrink: 0;
    }

    .profile-avatar-img,
    .profile-avatar-initial {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        object-fit: cover;
    }

    .profile-avatar-initial {
        background-color: #4a329a;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 1.25rem;
    }

    .g-badge-overlay {
        position: absolute;
        bottom: -2px;
        right: -2px;
        width: 20px;
        height: 20px;
        background: #ffffff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    }

    .verified-blue-check {
        color: #1a73e8;
        font-size: 0.95rem;
    }

    .ai-summary-badge {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, #a88beb 0%, #9878e1 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 1.3rem;
    }

    /* Swiper Container Spacing */
    .swiper-reviews {
        padding-bottom: 20px !important;
    }
</style>

<section class="py-5 bg-white google-widget-wrapper">
    <div class="container">

        <h2 class="fw-bold text-center mb-4 text-black" style="letter-spacing: -0.5px;">What Our Customers Say</h2>

        <!-- Top Banner Header -->
        <div class="google-header-box d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
            <div class="d-flex align-items-center flex-wrap gap-2">
                <span class="fw-bold display-6 text-black me-1" style="font-size: 2.1rem; line-height: 1;"><?php echo htmlspecialchars($avg_rating); ?></span>

                <div class="google-star-gold d-flex gap-1 me-2">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                </div>

                <span class="text-secondary fs-6">
                    <?php echo htmlspecialchars($total_reviews_count); ?> reviews on
                    <svg width="74" height="24" viewBox="0 0 74 24" class="align-middle ms-1">
                        <path fill="#4285F4" d="M9.24 10.43v2.85h6.76c-.27 1.83-2.12 5.36-6.76 5.36-4.07 0-7.39-3.37-7.39-7.51s3.32-7.51 7.39-7.51c2.32 0 3.87.99 4.76 1.84l2.25-2.17C14.79 1.85 12.28 1 9.24 1 4.14 1 0 5.14 0 10.13s4.14 9.13 9.24 9.13c5.33 0 8.87-3.75 8.87-9.03 0-.61-.07-1.07-.15-1.53H9.24z" />
                        <path fill="#EA4335" d="M24.28 12.35c0 3.86-2.92 6.64-6.52 6.64s-6.52-2.78-6.52-6.64c0-3.89 2.92-6.64 6.52-6.64s6.52 2.75 6.52 6.64zm-2.85 0c0-2.52-1.78-4.22-3.67-4.22s-3.67 1.7-3.67 4.22c0 2.49 1.78 4.22 3.67 4.22s3.67-1.73 3.67-4.22z" />
                        <path fill="#FBBC05" d="M38.48 12.35c0 3.86-2.92 6.64-6.52 6.64s-6.52-2.78-6.52-6.64c0-3.89 2.92-6.64 6.52-6.64s6.52 2.75 6.52 6.64zm-2.85 0c0-2.52-1.78-4.22-3.67-4.22s-3.67 1.7-3.67 4.22c0 2.49 1.78 4.22 3.67 4.22s3.67-1.73 3.67-4.22z" />
                        <path fill="#4285F4" d="M51.99 6.07v12.3c0 5.06-2.98 7.13-6.5 7.13-3.32 0-5.28-2.23-6.03-4.04l2.49-1.04c.45 1.07 1.55 2.32 3.54 2.32 2.32 0 3.76-1.44 3.76-4.12v-1.02h-.1c-.69.83-2.01 1.57-3.68 1.57-3.48 0-6.64-3.04-6.64-6.61 0-3.6 3.16-6.67 6.64-6.67 1.67 0 2.99.74 3.68 1.54h.1V6.07h2.74zm-2.59 6.31c0-2.46-1.63-4.25-3.62-4.25-2.02 0-3.68 1.79-3.68 4.25 0 2.43 1.66 4.19 3.68 4.19 1.99 0 3.62-1.76 3.62-4.19z" />
                        <path fill="#34A853" d="M56.24 1v17.99h-2.77V1h2.77z" />
                        <path fill="#EA4335" d="M68.73 14.73l2.25 1.5c-.73 1.08-2.49 2.97-5.69 2.97-3.88 0-6.73-2.99-6.73-6.64 0-3.95 2.88-6.64 6.39-6.64 3.54 0 5.28 2.72 5.84 4.22l.3.77-9.06 3.75c.69 1.36 1.76 2.05 3.3 2.05 1.54 0 2.58-.77 3.4-1.98zm-6.64-2.58l6.05-2.51c-.35-.89-1.41-1.52-2.67-1.52-1.59 0-3.79 1.41-3.38 4.03z" />
                    </svg>
                </span>
            </div>

            <div>
                <a href="<?php echo htmlspecialchars($google_review_link); ?>" target="_blank" class="btn-google-blue">
                    Review us on Google
                </a>
            </div>
        </div>

        <!-- Infinite Swiper Slider -->
        <div class="swiper swiper-reviews">
            <div class="swiper-wrapper">

                <!-- AI-Generated Summary Card -->
                <div class="swiper-slide">
                    <div class="google-card-item">
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="ai-summary-badge">
                                <i class="bi bi-stars"></i>
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="fw-bold mb-0 text-primary text-truncate" style="font-size: 0.95rem;">AI-Generated Sum...</h6>
                                <small class="text-secondary" style="font-size: 0.78rem;">Based on Google reviews</small>
                            </div>
                        </div>

                        <div class="google-star-gold mb-3 d-flex gap-1">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>

                        <div class="d-flex align-items-start gap-2 text-black mt-auto">
                            <i class="bi bi-check-lg fw-bold fs-5 text-dark" style="line-height: 1;"></i>
                            <span class="fw-semibold small" style="line-height: 1.35;">
                                Breathtaking views and top quality service overall!
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Dynamic Customer Reviews Loop -->
                <?php foreach($reviews as $rev): ?>
                <div class="swiper-slide">
                    <div class="google-card-item">
                        <div class="d-flex align-items-center gap-2 mb-3">
                            <div class="profile-avatar-wrap">
                                <?php if(!empty($rev['photo']) && file_exists('uploads/'.$rev['photo'])): ?>
                                <img src="uploads/<?php echo htmlspecialchars($rev['photo']); ?>" class="profile-avatar-img" alt="<?php echo htmlspecialchars($rev['name']); ?>">
                                <?php else: ?>
                                <div class="profile-avatar-initial">
                                    <?php echo strtoupper(substr($rev['name'], 0, 1)); ?>
                                </div>
                                <?php endif; ?>

                                <div class="g-badge-overlay">
                                    <svg width="12" height="12" viewBox="0 0 24 24">
                                        <path fill="#4285F4" d="M23.745 12.27c0-.7-.06-1.4-.19-2.07H12v4.51h6.6c-.29 1.52-1.14 2.82-2.4 3.68v3.05h3.88c2.27-2.09 3.665-5.17 3.665-9.17z" />
                                        <path fill="#34A853" d="M12 24c3.24 0 5.95-1.08 7.93-2.91l-3.88-3.05c-1.08.72-2.45 1.16-4.05 1.16-3.12 0-5.77-2.11-6.72-4.96H1.29v3.15C3.26 21.3 7.31 24 12 24z" />
                                        <path fill="#FBBC05" d="M5.28 14.24c-.25-.72-.38-1.49-.38-2.24s.13-1.52.38-2.24V6.61H1.29C.47 8.24 0 10.06 0 12s.47 3.76 1.29 5.39l3.99-3.15z" />
                                        <path fill="#EA4335" d="M12 4.75c1.77 0 3.35.61 4.6 1.8l3.42-3.42C17.95 1.19 15.24 0 12 0 12 0 7.31 0 3.26 2.7 1.29 6.61l3.99 3.15c.95-2.85 3.6-4.96 6.72-4.96z" />
                                    </svg>
                                </div>
                            </div>

                            <div class="overflow-hidden">
                                <div class="d-flex align-items-center gap-1">
                                    <h6 class="fw-bold mb-0 text-black text-truncate" style="font-size: 0.95rem;"><?php echo htmlspecialchars($rev['name']); ?></h6>
                                    <i class="bi bi-patch-check-fill verified-blue-check"></i>
                                </div>
                                <small class="text-secondary" style="font-size: 0.8rem;">1 day ago</small>
                            </div>
                        </div>

                        <div class="google-star-gold mb-2 d-flex gap-1">
                            <?php 
                            for($s=1; $s<=5; $s++) {
                                echo ($s <= $rev['rating']) ? '<i class="bi bi-star-fill"></i>' : '<i class="bi bi-star text-black-50"></i>';
                            }
                            ?>
                        </div>

                        <p class="text-black small mb-0 flex-grow-1" style="line-height: 1.45; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden;">
                            <?php echo htmlspecialchars($rev['comment']); ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>

    </div>
</section>

<!-- Swiper JS Script -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.swiper-reviews', {
        loop: true,
        spaceBetween: 16,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            0: { slidesPerView: 1 },
            576: { slidesPerView: 2 },
            992: { slidesPerView: 4 }
        }
    });
</script>

<footer class="footer-section">
    <div class="container">
        <div class="row gy-5">

            <div class="col-lg-3 col-md-6">
                <img src="/Logo.png" alt="Logo" class="footer-logo mb-4">

                <ul class="footer-links list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="media.php">Media Updates</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h4 class="footer-title">Our Collections</h4>

                <ul class="footer-links list-unstyled mt-4">
                    <?php
                    // Dynamic Categories Fetching from Database
                    $statement_cat = $pdo->prepare("SELECT * FROM tbl_top_category");
                    $statement_cat->execute();
                    $result_cat = $statement_cat->fetchAll(PDO::FETCH_ASSOC);
                    foreach($result_cat as $row_cat) {
                        echo '<li><a href="product-category.php?id='.$row_cat['id'].'&type=top-category">'.htmlspecialchars($row_cat['top_category_name']).'</a></li>';
                    }
                    ?>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h4 class="footer-title">Contact Us</h4>

                <div class="contact-info mt-4">
                    <address>
                        <?php echo nl2br($contact_address); ?>
                    </address>

                    <p>
                        Email :
                        <a href="mailto:<?php echo htmlspecialchars($contact_email); ?>"><?php echo htmlspecialchars($contact_email); ?></a>
                    </p>
                </div>

                <div class="social-icons mt-3">
                    <?php
                    $statement_social = $pdo->prepare("SELECT * FROM tbl_social WHERE social_url != ''");
                    $statement_social->execute();
                    $result_social = $statement_social->fetchAll(PDO::FETCH_ASSOC);

                    foreach($result_social as $row_social)
                    {
                    ?>
                    <a href="<?php echo $row_social['social_url']; ?>" target="_blank" title="<?php echo $row_social['social_name']; ?>">
                        <i class="<?php echo $row_social['social_icon']; ?>"></i>
                    </a>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 text-lg-start text-center">
                <h4 class="footer-title">Scan To Download Brochure</h4>

                <div class="mb-4 d-flex justify-content-center justify-content-lg-start gap-2">
                    <a href="Ceiling-Fan-2026.pdf" target="_blank">
                        <img src="pdf.png" width="50" alt="Ceiling Fan PDF">
                    </a>
                    <a href="Exhaust-Fan.pdf" target="_blank">
                        <img src="pdf.png" width="50" alt="Exhaust Fan PDF">
                    </a>
                </div>

                <div class="row g-3 justify-content-center justify-content-lg-start">
                    <div class="col-5 col-sm-4 col-lg-5">
                        <div class="qr-card text-center p-2 bg-white rounded-3 shadow-sm">
                            <img src="qr-code/Ceiling-Fan.png" alt="Ceiling Fan QR" class="img-fluid" style="max-height: 85px; object-fit: contain;">
                            <span class="d-block text-dark fw-bold mt-1" style="font-size: 11px; line-height: 1.2;">Ceiling Fan</span>
                        </div>
                    </div>

                    <div class="col-5 col-sm-4 col-lg-5">
                        <div class="qr-card text-center p-2 bg-white rounded-3 shadow-sm">
                            <img src="qr-code/Exhaust-fan.png" alt="Exhaust Fan QR" class="img-fluid" style="max-height: 85px; object-fit: contain;">
                            <span class="d-block text-dark fw-bold mt-1" style="font-size: 11px; line-height: 1.2;">Exhaust Fan</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <hr class="footer-divider">

        <div class="text-center copyright">
            <?php echo $footer_copyright; ?>
        </div>
    </div>
</footer>

<script src="<?php echo BASE_URL; ?>assets/js/jquery-2.2.4.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/megamenu.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/owl.animate.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/jquery.bxslider.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/rating.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/jquery.touchSwipe.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/bootstrap-touch-slider.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/select2.full.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/custom.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<a href="https://wa.me/918591987597?text=Hello" target="_blank" class="whatsapp-btn">
    <i class="fab fa-whatsapp"></i>
</a>

<style>
    .whatsapp-btn {
        position: fixed;
        left: 20px;
        bottom: 20px;
        width: 60px;
        height: 60px;
        background: #25D366;
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 34px;
        text-decoration: none;
        z-index: 99999;
        box-shadow: 0 5px 20px rgba(0, 0, 0, .25);
        transition: all .3s ease;
    }
    .whatsapp-btn:hover {
        color: #fff;
        transform: scale(1.1);
    }
    @media(max-width:768px) {
        .whatsapp-btn {
            width: 55px;
            height: 55px;
            font-size: 30px;
            left: 15px;
            bottom: 15px;
        }
    }
</style>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$message = '';

if(isset($_POST['submit']))
{
    $name   = trim($_POST['name']);
    $mobile = trim($_POST['mobile']);
    $ip_address = $_SERVER['REMOTE_ADDR'];

    if(!empty($_POST['website']))
    {
        die('Spam Detected');
    }

    $secretKey = "6Lft5R4tAAAAAAB0giASiECfTBv5RyTFd4bz8RqM";

    if(empty($_POST['g-recaptcha-response']))
    {
        $message = '<div class="alert alert-danger p-2 mb-2" style="font-size:14px;">Please verify the captcha.</div>';
    }
    else
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, [
            'secret'   => $secretKey,
            'response' => $_POST['g-recaptcha-response']
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $responseData = json_decode($response);

        if(!$responseData->success)
        {
            $message = '<div class="alert alert-danger p-2 mb-2" style="font-size:14px;">Captcha verification failed.</div>';
        }
        else
        {
            $db_success = false;
            try {
                $statement_insert = $pdo->prepare("INSERT INTO tbl_enquiry (name, mobile, ip_address, created_at) VALUES (?, ?, ?, NOW())");
                $statement_insert->execute(array($name, $mobile, $ip_address));
                $db_success = true;
            } catch (Exception $e) {
                try {
                    $statement_insert = $pdo->prepare("INSERT INTO tbl_enquiry (name, mobile, ip_address, created_at) VALUES (?, ?, ?, NOW())");
                    $statement_insert->execute(array($name, $mobile, $ip_address));
                    $db_success = true;
                } catch(Exception $ex) {
                    $message = '<div class="alert alert-danger p-2 mb-2" style="font-size:14px;">Database Error. Try again.</div>';
                }
            }

            if($db_success) {
                require 'PHPMailer/Exception.php';
                require 'PHPMailer/PHPMailer.php';
                require 'PHPMailer/SMTP.php';

                $mail = new PHPMailer(true);

                try {
                    $mail->isSMTP();
                    $mail->Host       = 'mail.wadbros.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'info@wadbros.com';
                    $mail->Password   = 'b726Jmu~5';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;

                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );

                    $mail->setFrom('info@wadbros.com', 'Wadbros Callback System');
                    $mail->addAddress('info@wadbros.com');
                    $mail->addReplyTo('info@wadbros.com', $name);

                    $mail->isHTML(true);
                    $mail->Subject = 'New Callback Request from ' . $name;
                    
                    $mail->Body = "
                    <html>
                    <body style='font-family: Arial, sans-serif; padding: 15px; color: #333;'>
                        <div style='max-width: 500px; background: #fdfdfd; padding: 25px; border-radius: 8px; border: 1px solid #eee;'>
                            <h3 style='color: #e30613; margin-top:0;'>New Callback Inquiry</h3>
                            <hr style='border:0; border-top:1px solid #eee; margin-bottom:15px;'>
                            <p><b>Name:</b> ".htmlspecialchars($name)."</p>
                            <p><b>Mobile:</b> <a href='tel:".htmlspecialchars($mobile)."'>".htmlspecialchars($mobile)."</a></p>
                            <p><b>IP Address:</b> ".htmlspecialchars($ip_address)."</p>
                        </div>
                    </body>
                    </html>";

                    $mail->send();
                    $message = '<div class="alert alert-success p-2 mb-2" style="font-size:14px;">Request Submitted & Email Sent Successfully!</div>';
                } catch (Exception $e) {
                    $message = '<div class="alert alert-warning p-2 mb-2" style="font-size:14px;">Request Saved, but Email delivery failed. (Error: '.$mail->ErrorInfo.')</div>';
                }
            }
        }
    }
}
?>

<style>
    .callback-box {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 350px;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0, 0, 0, .15);
        z-index: 9999;
        transform: scale(0.88);
        transform-origin: bottom right;
    }
    .callback-title {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 15px;
    }
    .callback-btn {
        width: 100%;
        background: #e30613;
        border: none;
        color: #fff;
        padding: 12px;
        font-size: 18px;
        border-radius: 5px;
        transition: .3s;
    }
    .callback-btn:hover {
        background: #c4000d;
    }
    .close-btn {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 24px;
        border: none;
        background: none;
        cursor: pointer;
    }
    .captcha-container {
        overflow: hidden;
        max-width: 100%;
        margin-bottom: 15px;
    }
    @media(max-width:768px) {
        .callback-box {
            width: calc(100% - 20px);
            left: 10px;
            right: 10px;
            bottom: 10px;
            transform: scale(0.92);
            transform-origin: bottom center;
        }
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<!-- Floating Calculator Button -->
<button type="button" class="wadbros-calculator-btn" data-bs-toggle="modal" data-bs-target="#wadbrosCalculatorModal" title="Duct Fan Calculator" aria-label="Open Duct Fan Calculator">
    <i class="fa-solid fa-calculator"></i>
</button>

<!-- Calculator Modal -->
<div class="modal fade wadbros-calculator-modal" id="wadbrosCalculatorModal" tabindex="-1" aria-labelledby="wadbrosCalculatorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content wadbros-calculator-content">
            <div class="modal-body p-0">
                <div class="wadbros-app">
                    <header class="wadbros-hero">
                        <div class="wadbros-brand">
                            <img src="assets/logo.png" alt="WadBros">
                        </div>
                        <h2 id="wadbrosCalculatorModalLabel">Duct Fan Size Calculator</h2>
                        <p>Find the right WadBros ventilation solution for your space</p>
                        <div class="wadbros-progress">
                            <i class="on"></i><i id="wadbrosP2"></i>
                        </div>
                    </header>

                    <section class="wadbros-page" id="wadbrosInputPage">
                        <div class="wadbros-label">UNIT OF MEASUREMENT</div>
                        <div class="wadbros-units">
                            <button type="button" class="wadbros-unit on" data-u="ft">Feet</button>
                            <button type="button" class="wadbros-unit" data-u="m">Meter</button>
                            <button type="button" class="wadbros-unit" data-u="cm">Cm</button>
                            <button type="button" class="wadbros-unit" data-u="in">Inch</button>
                            <button type="button" class="wadbros-unit" data-u="mm">Mm</button>
                        </div>

                        <div class="wadbros-dim-title">ROOM DIMENSIONS (<span id="wadbrosUnitText">FEET</span>)</div>
                        <div class="wadbros-dim">
                            <input class="wadbros-input" id="wadbrosL" type="number" value="10" min="0" step=".01">
                            <span class="wadbros-x">×</span>
                            <input class="wadbros-input" id="wadbrosW" type="number" value="10" min="0" step=".01">
                            <span class="wadbros-x">×</span>
                            <input class="wadbros-input" id="wadbrosH" type="number" value="10" min="0" step=".01">
                        </div>

                        <div class="wadbros-acph">
                            <div class="wadbros-dim-title">AIR CHANGES PER HOUR (ACPH)</div>
                            <div class="wadbros-acrow">
                                <input class="wadbros-input" id="wadbrosAcph" type="number" value="12" min="0" step=".1">
                                <button type="button" class="wadbros-roombtn" id="wadbrosRoomBtn">Room Type</button>
                            </div>
                        </div>

                        <button type="button" class="wadbros-calc" id="wadbrosCalc">
                            <i class="fa-solid fa-calculator"></i>&nbsp; Calculate CMH &amp; CFM
                        </button>

                        <div class="wadbros-terms">Terms &amp; Conditions</div>
                    </section>

                    <section class="wadbros-result" id="wadbrosResult">
                        <button type="button" class="wadbros-back" id="wadbrosBack">← Change room details</button>

                        <div class="wadbros-metrics">
                            <div class="wadbros-metric">
                                <div class="wadbros-label">CMH</div>
                                <div class="wadbros-big" id="wadbrosCmh">0</div>
                                <small>m³ per hour</small>
                            </div>
                            <div class="wadbros-metric">
                                <div class="wadbros-label">CFM</div>
                                <div class="wadbros-big" id="wadbrosCfm">0</div>
                                <small>ft³ per minute</small>
                            </div>
                        </div>

                        <div class="wadbros-reqnote">
                            <b>Selection method:</b> the app recommends the smallest WadBros fan whose rated airflow meets or exceeds the calculated ventilation requirement.
                        </div>

                        <div class="wadbros-ptitle">RECOMMENDED WADBROS</div>
                        <div class="wadbros-filters" id="wadbrosFilters"></div>
                        <div class="wadbros-products" id="wadbrosProducts"></div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Room Type Popup -->
<div class="wadbros-room-overlay" id="wadbrosRoomOverlay">
    <div class="wadbros-room-sheet">
        <div class="wadbros-handle"></div>
        <h3>Select Your Room Type</h3>
        <div class="wadbros-rooms" id="wadbrosRooms"></div>
    </div>
</div>

<style>
    .wadbros-calculator-btn {
        position: fixed;
        left: 20px;
        top: 80%;
        transform: translateY(-50%);
        width: 58px;
        height: 58px;
        border: 0;
        border-radius: 50%;
        background: #ed1c24;
        color: #fff;
        font-size: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 99998;
        box-shadow: 0 5px 20px rgba(0, 0, 0, .25);
        transition: all .3s ease;
    }
    .wadbros-calculator-btn:hover {
        color: #fff;
        transform: translateY(-50%) scale(1.1);
        background: #00a85d
    }
    .wadbros-calculator-modal { z-index: 99990 }
    .wadbros-calculator-modal .modal-dialog { max-width: 460px; margin: 1.75rem auto }
    .wadbros-calculator-modal .modal-content { border: 0; border-radius: 25px; overflow: hidden; background: #fff }
    .wadbros-calculator-modal .modal-body { max-height: 90vh; overflow-y: auto }
    .wadbros-app { width: 100%; max-width: 430px; margin: auto; background: #fff; color: #162433; font-family: Arial, sans-serif }
    .wadbros-hero { padding: 27px; color: #fff; background: linear-gradient(135deg, #ed1c24, #000); border-radius: 0 0 25px 25px }
    .wadbros-brand { height: 45px; display: flex; align-items: center; margin-bottom: 12px }
    .wadbros-brand img { max-height: 42px; max-width: 150px; object-fit: contain }
    .wadbros-hero h2 { font-size: 24px; line-height: 1.2; font-weight: 500; letter-spacing: 1px; margin: 0 0 9px }
    .wadbros-hero p { font-size: 15px; line-height: 1.5; opacity: .8; margin: 0 }
    .wadbros-progress { display: flex; gap: 10px; margin-top: 22px }
    .wadbros-progress i { height: 5px; flex: 1; border-radius: 8px; background: #a8dfc7 }
    .wadbros-progress i.on { background: #fff }
    .wadbros-page { padding: 24px 27px 40px }
    .wadbros-label { font-size: 12px; letter-spacing: 2.6px; color: #95a2ae; margin-bottom: 14px }
    .wadbros-units { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 38px }
    .wadbros-unit, .wadbros-filter { padding: 10px 17px; border-radius: 24px; border: 2px solid #e0e6eb; background: #fff; color: #687684; font-size: 15px; cursor: pointer }
    .wadbros-unit.on, .wadbros-filter.on { background: #ed1c24; color: #fff; border-color: #ed1c24; box-shadow: 0 6px 14px #ed1c2425 }
    .wadbros-dim-title { font-size: 12px; letter-spacing: 2px; color: #95a2ae; margin-bottom: 11px }
    .wadbros-dim { display: grid; grid-template-columns: 1fr 16px 1fr 16px 1fr; gap: 4px; align-items: center }
    .wadbros-x { text-align: center; color: #b8c1c8 }
    .wadbros-input { width: 100%; padding: 15px 5px; border: 2px solid transparent; border-radius: 20px; background: #fbfaf6; text-align: center; font-size: 21px; outline: 0 }
    .wadbros-input:focus { border-color: #ed1c24; background: #fff }
    .wadbros-acph { margin-top: 38px }
    .wadbros-acrow { display: flex; gap: 10px }
    .wadbros-acrow .wadbros-input { flex: 1 }
    .wadbros-roombtn { width: 145px; border: 2px solid #dce4eb; background: #f5f8fc; border-radius: 18px; color: #526172; font-size: 14px; cursor: pointer }
    .wadbros-calc { width: 100%; margin-top: 30px; padding: 18px; border: 0; border-radius: 27px; background: linear-gradient(135deg, #ed1c24, #000); color: #fff; font-size: 16px; letter-spacing: .6px; box-shadow: 0 12px 24px #ed1c2430; cursor: pointer }
    .wadbros-terms { text-align: center; color: #9aa4ad; text-decoration: underline; margin-top: 25px; font-size: 12px }
    .wadbros-result { display: none; padding: 23px 27px 45px }
    .wadbros-result.show { display: block }
    .wadbros-back { border: 0; background: none; color: #ed1c24; padding: 0 0 17px; font-size: 14px; cursor: pointer }
    .wadbros-metrics { display: grid; grid-template-columns: 1fr 1fr; gap: 12px }
    .wadbros-metric { background: #effbdc; border: 2px solid #d9f1a3; border-radius: 27px; text-align: center; padding: 20px 5px }
    .wadbros-metric .wadbros-label { margin: 0 }
    .wadbros-big { font-size: 30px; margin: 9px 0 }
    .wadbros-metric small { font-size: 11px; color: #9aa4ad }
    .wadbros-reqnote { margin: 15px 0; padding: 12px 13px; background: #f6f8fa; border-radius: 15px; font-size: 12px; line-height: 1.5; color: #64717d }
    .wadbros-ptitle { margin-top: 28px; font-size: 12px; letter-spacing: 2.6px; color: #95a2ae }
    .wadbros-filters { display: flex; gap: 7px; flex-wrap: wrap; margin: 13px 0 }
    .wadbros-filter { font-size: 12px; padding: 8px 13px }
    .wadbros-products { display: grid; grid-template-columns: 1fr 1fr; gap: 12px }
    .wadbros-product { border: 2px solid #e3e8ec; border-radius: 23px; padding: 10px; overflow: hidden; background: #fff }
    .wadbros-product.best { border-color: #ed1c24; box-shadow: 0 5px 15px #ed1c2418 }
    .wadbros-pic { height: 122px; background: #f5f7f8; border-radius: 15px; display: flex; align-items: center; justify-content: center; overflow: hidden }
    .wadbros-pic img { width: 100%; height: 100%; object-fit: contain }
    .wadbros-besttag { display: inline-block; margin-top: 8px; background: #e7f8ef; color: #ed1c24; padding: 4px 7px; border-radius: 10px; font-size: 10px }
    .wadbros-product h4 { font-size: 14px; line-height: 1.35; font-weight: 600; margin: 9px 2px 5px }
    .wadbros-product p { font-size: 11px; color: #ed1c24; margin: 0 2px 4px }
    .wadbros-spec { font-size: 10px; color: #7b8791; line-height: 1.45; margin: 4px 2px 9px }
    .wadbros-quote { width: 100%; border: 0; border-radius: 13px; padding: 9px; background: #ed1c24; color: #fff; font-size: 11px; cursor: pointer }
    .wadbros-room-overlay { display: none; position: fixed; inset: 0; background: #07192399; align-items: flex-end; justify-content: center; z-index: 100000 }
    .wadbros-room-overlay.show { display: flex }
    .wadbros-room-sheet { width: min(430px, 100%); max-height: 88vh; overflow: auto; background: #fff; border-radius: 29px 29px 0 0; padding: 24px 18px 34px }
    .wadbros-handle { width: 68px; height: 6px; background: #dfe5ea; border-radius: 8px; margin: 0 auto 22px }
    .wadbros-room-sheet h3 { text-align: center; font-size: 21px; font-weight: 500; margin: 0 0 20px }
    .wadbros-rooms { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px }
    .wadbros-room { min-height: 112px; border: 2px solid #e0e6eb; background: #fff; border-radius: 19px; color: #465463; padding: 9px 4px; font-size: 12px; cursor: pointer }
    .wadbros-room:hover { border-color: #ed1c24; background: #f5fbf8 }
    .wadbros-room strong { display: block; font-size: 25px; color: #ed1c24; margin-bottom: 10px }
    .wadbros-room small { display: block; color: #9ba5ae; margin-top: 6px }
</style>

<script>
    // PHP se active products fetch karke JavaScript array me convert kiya gaya hai
    const products = [
        <?php
        $stmt_prod = $pdo->prepare("SELECT * FROM tbl_product WHERE p_is_active = 1");
        $stmt_prod->execute();
        $db_products = $stmt_prod->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($db_products as $dp) {
            // Agar categories assign nahi hain toh default series/name use hoga, yahan hum series ya name pass kar rahe hain
            $p_name = addslashes($dp['p_name']);
            $p_series = addslashes($dp['p_series']);
            $p_air = (int)$dp['p_air_cmh'];
            $p_size = addslashes($dp['p_size']);
            $p_pressure = (int)$dp['p_pressure'];
            $p_power = (int)$dp['p_power'];
            $p_rpm = addslashes($dp['p_rpm']);
            $p_noise = addslashes($dp['p_noise']);
            $p_image = !empty($dp['p_featured_photo']) ? 'uploads/' . $dp['p_featured_photo'] : 'assets/il.png';
            
            // Aapke table me categories ke liye ecat_id hai, aap chahein toh categories filter dynamic kar sakte hain
            echo "{model: \"{$p_name}\", series: \"{$p_series}\", air: {$p_air}, size: \"{$p_size}\", pressure: {$p_pressure}, power: {$p_power}, rpm: \"{$p_rpm}\", noise: \"{$p_noise}\", image: \"{$p_image}\", cats: [\"All\", \"Office\", \"Bathroom\", \"Kitchen Solution\"]},\n";
        }
        ?>
    ];

    const rooms = [
        ["Home", 1.5], ["Bedroom", 1.5], ["Dressing Room", 2], ["Powder Toilet", 10], ["Toilet", 12],
        ["Public Toilet", 14], ["Office Block", 1.5], ["Hostel", 2], ["Kitchen", 6], ["Basement (AC)", 2],
        ["Basement (No AC)", 4], ["Pantry", 6], ["Clinic", 6], ["Theatre", 8], ["Hall", 3]
    ];
    const cats = ["All", "Clinic", "Theatre", "Bathroom", "Kitchen Solution", "Bedroom", "Hall", "Office"];
    let unit = "ft", selectedCat = "All", required = 0;
    const unitNames = {ft: "FEET", m: "METER", cm: "CM", in: "INCH", mm: "MM"};

    const unitBtns = document.querySelectorAll(".wadbros-unit");
    unitBtns.forEach(btn => btn.addEventListener("click", function() {
        unitBtns.forEach(x => x.classList.remove("on"));
        btn.classList.add("on");
        unit = btn.dataset.u;
        document.getElementById("wadbrosUnitText").textContent = unitNames[unit];
    }));

    function toFeet(v) {
        if (unit === "ft") return v;
        if (unit === "m") return v * 3.280839895;
        if (unit === "cm") return v / 30.48;
        if (unit === "in") return v / 12;
        return v / 304.8;
    }

    const roomOverlay = document.getElementById("wadbrosRoomOverlay");
    const roomGrid = document.getElementById("wadbrosRooms");
    rooms.forEach(room => {
        const btn = document.createElement("button");
        btn.type = "button";
        btn.className = "wadbros-room";
        btn.innerHTML = '<strong><i class="fa-solid fa-house"></i></strong>' + room[0] + '<small>' + room[1] + ' ACPH</small>';
        btn.addEventListener("click", function() {
            document.getElementById("wadbrosAcph").value = room[1];
            document.getElementById("wadbrosRoomBtn").textContent = room[0];
            roomOverlay.classList.remove("show");
        });
        roomGrid.appendChild(btn);
    });

    document.getElementById("wadbrosRoomBtn").addEventListener("click", () => roomOverlay.classList.add("show"));
    roomOverlay.addEventListener("click", e => { if (e.target === roomOverlay) roomOverlay.classList.remove("show") });

    const filterBox = document.getElementById("wadbrosFilters");
    cats.forEach(category => {
        const btn = document.createElement("button");
        btn.type = "button";
        btn.className = "wadbros-filter" + (category === "All" ? " on" : "");
        btn.textContent = category;
        btn.addEventListener("click", function() {
            document.querySelectorAll(".wadbros-filter").forEach(x => x.classList.remove("on"));
            btn.classList.add("on");
            selectedCat = category;
            render();
        });
        filterBox.appendChild(btn);
    });

    function render() {
        let list = products.filter(p => selectedCat === "All" || p.cats.includes(selectedCat));
        list.sort((a, b) => {
            const aa = a.air >= required ? a.air - required : 999999 + (required - a.air);
            const bb = b.air >= required ? b.air - required : 999999 + (required - b.air);
            return aa - bb;
        });
        document.getElementById("wadbrosProducts").innerHTML = list.map((p, i) => `
        <article class="wadbros-product ${i===0?"best":""}">
            <div class="wadbros-pic"><img src="${p.image}" alt="WadBros ${p.model}"></div>
            ${i===0?'<span class="wadbros-besttag">BEST MATCH</span>':''}
            <h4>${p.model}</h4>
            <p>${p.series}</p>
            <p>${p.air} CMH • ${p.size} • ${p.pressure} Pa</p>
            <div class="wadbros-spec">${p.power} W • ${p.rpm} RPM • Noise ${p.noise} dB(A)</div>
            <button type="button" class="wadbros-quote" data-model="${p.model}">Add to Quotation →</button>
        </article>`).join("");
        document.querySelectorAll(".wadbros-quote").forEach(btn => btn.addEventListener("click", () => alert("Selected " + btn.dataset.model + " for quotation.")));
    }

    document.getElementById("wadbrosCalc").addEventListener("click", function() {
        const l = toFeet(Number(document.getElementById("wadbrosL").value));
        const w = toFeet(Number(document.getElementById("wadbrosW").value));
        const h = toFeet(Number(document.getElementById("wadbrosH").value));
        const a = Number(document.getElementById("wadbrosAcph").value);
        if (!(l > 0 && w > 0 && h > 0 && a > 0)) {
            alert("Please enter valid dimensions and ACPH.");
            return;
        }
        required = l * w * h * a / 35.3146667;
        document.getElementById("wadbrosCmh").textContent = required.toFixed(2);
        document.getElementById("wadbrosCfm").textContent = (required / 1.6990108).toFixed(2);
        document.getElementById("wadbrosInputPage").style.display = "none";
        document.getElementById("wadbrosResult").classList.add("show");
        document.getElementById("wadbrosP2").classList.add("on");
        render();
    });

    document.getElementById("wadbrosBack").addEventListener("click", function() {
        document.getElementById("wadbrosResult").classList.remove("show");
        document.getElementById("wadbrosInputPage").style.display = "block";
        document.getElementById("wadbrosP2").classList.remove("on");
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="callback-box" id="callbackForm">
    <button class="close-btn" type="button" onclick="document.getElementById('callbackForm').style.display='none'">×</button>
    <div class="callback-title">Request a Callback</div>
    <?php echo $message; ?>
    <form method="post" action="">
        <input type="text" name="website" style="display:none">
        <div class="mb-3">
            <input type="text" name="name" class="form-control form-control-lg" placeholder="Your Name" required>
        </div>
        <div class="mb-3">
            <input type="tel" name="mobile" class="form-control form-control-lg" placeholder="Phone Number" pattern="[0-9]{10}" maxlength="10" required>
        </div>
        <div class="captcha-container">
            <div class="g-recaptcha" data-sitekey="6Lft5R4tAAAAANY-v2jM8WeUz1fqD0K9zN7IEogU"></div>
        </div>
        <button type="submit" name="submit" class="callback-btn">Request Call</button>
    </form>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php echo $before_body; ?>
</body>
</html>