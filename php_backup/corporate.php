<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Corporate Shoot</title>
<?php include("headerlink.php"); ?>
</head>

<body>

<body>


    <!--===== header ==========-->
    <?php include("header.php"); ?>

    <!--===== header ==========-->

    <!-- GALLERY -->
    <section class="gallery" id="gallery">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-lg-7">
                    <div class="eyebrow mb-2">Recent Work</div>
                    <h2 style="font-size:clamp(2rem,3.6vw,3rem); font-weight:500;">From the contact sheet.</h2>
                </div>
                <div class="col-lg-5 text-lg-end mt-3 mt-lg-0">
                    <a href="#contact" class="btn btn-outline-ink">See Full Portfolio</a>
                </div>
            </div>

            <div class="gallery-grid" id="galleryGrid">
            <?php
$folderPath = 'assets/img/gallery/corporate/'; // Spelling check kar lein
$images = glob($folderPath . '*.{webp,jpg,jpeg,png,WEBP,JPG,JPEG,PNG}', GLOB_BRACE);

if (!empty($images)) {
    foreach ($images as $imgPath) {
        $filename = pathinfo($imgPath, PATHINFO_FILENAME);
        $cleanName = ucwords(str_replace(['-', '_'], ' ', $filename));

        echo '<img ';
        echo 'data-full="' . htmlspecialchars($imgPath) . '" ';
        echo 'src="' . htmlspecialchars($imgPath) . '" ';
        echo 'alt="' . htmlspecialchars($cleanName) . '" ';
        echo 'data-caption="' . htmlspecialchars($cleanName) . '">';
    }
} else {
    echo '<p>No images found in gallery.</p>';
}
?>
            </div>
        </div>
    </section>

    <!-- LIGHTBOX OVERLAY (gallery popup) -->
    <div class="lightbox-overlay" id="lightbox" role="dialog" aria-modal="true" aria-label="Image preview">
        <button class="lightbox-close" id="lightboxClose" aria-label="Close preview">&times;</button>
        <button class="lightbox-prev" id="lightboxPrev" aria-label="Previous image">&#10094;</button>
        <img id="lightboxImg" src="" alt="">
        <button class="lightbox-next" id="lightboxNext" aria-label="Next image">&#10095;</button>
        <div class="lightbox-caption"><span class="idx" id="lightboxIdx"></span><span id="lightboxCaption"></span></div>
    </div>

    <!--======== footer =========-->
    <?php include("footer.php"); ?>
    <!--======== footer =========-->



</body>

</html>
