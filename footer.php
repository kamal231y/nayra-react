<!-- Elfsight Google Reviews | Untitled Google Reviews -->
<script src="https://elfsightcdn.com/platform.js" async></script>
<div class="elfsight-app-df209ed6-1ab7-4605-bb4c-8e2bbddb8edf" data-elfsight-app-lazy></div>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3506.274652159824!2d77.1827959!3d28.501383299999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d1f154a3f837f%3A0xe540c8805bd3713d!2sNyra%20Event%20Photography!5e0!3m2!1sen!2sin!4v1785126193907!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
<!-- FOOTER -->
<footer class="site-footer">
  <div class="container">
    <div class="row align-items-center gy-3">
      <div class="col-md-4">
        <span class="brand">Nyra Event Photography</span>
      </div>
      <div class="col-md-4 text-md-center">
        <a href="service.php">Services</a>
        <a href="gallery.php">Gallery</a>
        <a href="contact.php">Contact</a>
      </div>
      <div class="col-md-4 text-md-end" style="opacity:.6; font-size:0.78rem;">
        © 2026 Nyra Event Photography. All rights reserved.
      </div>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // ---- Gallery popup (lightbox) ----
  (function(){
    var thumbs = Array.prototype.slice.call(document.querySelectorAll('#galleryGrid img'));
    var overlay = document.getElementById('lightbox');
    var imgEl = document.getElementById('lightboxImg');
    var idxEl = document.getElementById('lightboxIdx');
    var capEl = document.getElementById('lightboxCaption');
    var current = 0;

    function show(i){
      current = (i + thumbs.length) % thumbs.length;
      var t = thumbs[current];
      imgEl.src = t.getAttribute('data-full') || t.src;
      imgEl.alt = t.alt;
      idxEl.textContent = String(current + 1).padStart(2,'0') + ' / ' + String(thumbs.length).padStart(2,'0');
      capEl.textContent = t.getAttribute('data-caption') || t.alt;
    }

    function open(i){
      show(i);
      overlay.classList.add('active');
      document.body.style.overflow = 'hidden';
    }

    function close(){
      overlay.classList.remove('active');
      document.body.style.overflow = '';
    }

    thumbs.forEach(function(t, i){
      t.addEventListener('click', function(){ open(i); });
    });

    document.getElementById('lightboxClose').addEventListener('click', close);
    document.getElementById('lightboxPrev').addEventListener('click', function(){ show(current - 1); });
    document.getElementById('lightboxNext').addEventListener('click', function(){ show(current + 1); });

    overlay.addEventListener('click', function(e){
      if(e.target === overlay) close();
    });

    document.addEventListener('keydown', function(e){
      if(!overlay.classList.contains('active')) return;
      if(e.key === 'Escape') close();
      if(e.key === 'ArrowLeft') show(current - 1);
      if(e.key === 'ArrowRight') show(current + 1);
    });
  })();
</script>

<style>
.floating-btns{
    position:fixed;
    right:20px;
    bottom:25px;
    display:flex;
    flex-direction:column;
    gap:15px;
    z-index:9999;
}

.fab{
    width:60px;
    height:60px;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    color:#fff;
    font-size:28px;
    text-decoration:none;
    box-shadow:0 8px 20px rgba(0,0,0,.25);
    transition:.3s;
}

.fab:hover{
    transform:scale(1.1);
    color:#fff;
}

.call-btn{
    background:#0d6efd;
}

.whatsapp-btn{
    background:#25D366;
}

.instagram-btn{
    background:linear-gradient(45deg,#F58529,#DD2A7B,#8134AF,#515BD4);
}
</style>

<div class="floating-btns">

    <!-- Call -->
    <a href="tel:+918920939191" class="fab call-btn">
        <i class="bi bi-telephone-fill"></i>
    </a>

    <!-- WhatsApp -->
    <a href="https://wa.me/918920939191" target="_blank" class="fab whatsapp-btn">
        <i class="bi bi-whatsapp"></i>
    </a>

    <!-- Instagram -->
    <a href="https://www.instagram.com/nyra_photography" target="_blank" class="fab instagram-btn">
        <i class="bi bi-instagram"></i>
    </a>

</div>
