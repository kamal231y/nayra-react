<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top custom-main-nav">
  <div class="container d-flex align-items-center justify-content-between">
    
    <!-- 1. Logo Left Side -->
    <a class="navbar-brand m-0" href="index.php">
      <img src="./assets/img/logo/logo.webp" class="custom-logo" alt="Nyra Photography Logo">
    </a>

    <!-- 2. Mobile Hamburger Toggle (Only Mobile) -->
    <!-- <button class="navbar-toggler custom-hamburger-btn d-lg-none border-0 shadow-none p-0" type="button" 
            data-bs-toggle="offcanvas" 
            data-bs-target="#sidebarMenu" 
            aria-controls="sidebarMenu">
      <i class="fa-solid fa-bars fs-2 text-dark"></i>
    </button> -->

    <button class="navbar-toggler custom-hamburger-btn" type="button" data-bs-toggle="offcanvas"   aria-controls="sidebarMenu" data-bs-target="#sidebarMenu">
  <span class="navbar-toggler-icon"></span>
</button>

    <!-- 3. DESKTOP MENU (Horizontal Row - Desktop Only) -->
    <div class="collapse navbar-collapse justify-content-end d-none d-lg-flex" id="desktopNavbarNav">
      <ul class="navbar-nav align-items-center flex-row gap-4 mb-0">
        <li class="nav-item"><a class="nav-link active" href="index.php">HOME</a></li>
        <li class="nav-item"><a class="nav-link" href="about.php">ABOUT</a></li>
        
        <!-- Services Dropdown Desktop -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            SERVICES
          </a>
          <ul class="dropdown-menu shadow border-0" aria-labelledby="servicesDropdown">
            <li><a class="dropdown-item" href="wedding-shoot.php">Wedding Shoot</a></li>
            <li><a class="dropdown-item" href="pre-wedding.php">Pre Wedding Shoot</a></li>
            <li><a class="dropdown-item" href="bday-shoot.php">Birthday Shoot</a></li>
            <li><a class="dropdown-item" href="haldi-shoot.php">Haldi Shoot</a></li>
            <li><a class="dropdown-item" href="mehndi.php">Mehndi Shoot</a></li>
            <li><a class="dropdown-item" href="engagement.php">Ring Ceremony Shoot</a></li>
            <li><a class="dropdown-item" href="corporate.php">Corporate Event Shoot</a></li>
            <li><a class="dropdown-item" href="eccomerce.php">Ecommerce Shoot</a></li>
          </ul>
        </li>

        <li class="nav-item"><a class="nav-link" href="gallery.php">GALLERY</a></li>
        <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">CONTACT</a></li>
        
        <!-- Enquire Button -->
        <li class="nav-item ms-2">
          <a href="contact.php" class="btn btn-pink-enquire">ENQUIRE</a>
        </li>
      </ul>
    </div>

    <!-- 4. MOBILE OFFCANVAS SIDEBAR -->
    <div class="offcanvas offcanvas-start border-0 custom-offcanvas-sidebar d-lg-none" tabindex="-1" id="sidebarMenu">
      
      <!-- Top Dark Blue Header -->
      <div class="offcanvas-header sidebar-header-dark">
        <h5 class="offcanvas-title d-flex align-items-center gap-2 mb-0">
          <i class="fa-solid fa-bars"></i>
          <span>Navigation Menu</span>
        </h5>
        <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>

      <!-- Offcanvas Body -->
      <div class="offcanvas-body p-0 d-flex flex-column justify-content-between">
        <div class="sidebar-list">
          <a href="index.php" class="sidebar-link active"><i class="fa-solid fa-house"></i><span>Home</span></a>
          
          <div class="sidebar-item-dropdown">
            <a class="sidebar-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#servicesSubmenu" role="button" aria-expanded="false">
              <div class="d-flex align-items-center gap-2">
                <i class="fa-solid fa-folder-open"></i><span>Services</span>
              </div>
              <span class="dropdown-arrow-box"><i class="fa-solid fa-chevron-down"></i></span>
            </a>
            <div class="collapse sidebar-submenu" id="servicesSubmenu">
              <a href="wedding-shoot.php" class="submenu-link">Wedding Shoot</a>
              <a href="pre-wedding.php" class="submenu-link">Pre Wedding Shoot</a>
              <a href="bday-shoot.php" class="submenu-link">Birthday Shoot</a>
              <a href="haldi-shoot.php" class="submenu-link">Haldi Shoot</a>
              <a href="mehndi.php" class="submenu-link">Mehndi Shoot</a>
              <a href="engagement.php" class="submenu-link">Ring Ceremony Shoot</a>
              <a href="corporate.php" class="submenu-link">Corporate Event Shoot</a>
              <a href="eccomerce.php" class="submenu-link">Ecommerce  Shoot</a>
            </div>
          </div>

          <a href="about.php" class="sidebar-link"><i class="fa-solid fa-circle-info"></i><span>About Us</span></a>
          <a href="faq.php" class="sidebar-link"><i class="fa-solid fa-circle-question"></i><span>FAQ</span></a>
          <a href="gallery.php" class="sidebar-link"><i class="fa-solid fa-image"></i><span>Gallery</span></a>
          <a href="contact.php" class="sidebar-link"><i class="fa-solid fa-envelope"></i><span>Contact Us</span></a>
        </div>

        <div class="sidebar-footer-action p-3">
          <div class="row g-2">
            <div class="col-6">
              <a href="tel:+919876543210" class="btn btn-outline-danger w-100 btn-action-call"><i class="fa-solid fa-phone me-1"></i> Call Us</a>
            </div>
            <div class="col-6">
              <a href="contact.php" class="btn btn-danger w-100 btn-action-enquire"><i class="fa-solid fa-paper-plane me-1"></i> Enquire Now</a>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</nav>