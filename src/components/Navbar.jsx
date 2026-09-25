import React, { useState } from 'react';
import { NavLink, Link, useLocation } from 'react-router-dom';

export default function Navbar() {
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);
  const [servicesSubmenuOpen, setServicesSubmenuOpen] = useState(false);
  const location = useLocation();

  const closeMobileMenu = () => {
    setMobileMenuOpen(false);
    setServicesSubmenuOpen(false);
  };

  const isServiceActive = [
    '/wedding-shoot',
    '/pre-wedding',
    '/bday-shoot',
    '/haldi-shoot',
    '/mehndi',
    '/engagement',
    '/corporate',
    '/ecommerce'
  ].includes(location.pathname);

  return (
    <>
      <nav className="navbar navbar-expand-lg fixed-top custom-main-nav bg-white shadow-sm">
        <div className="container d-flex align-items-center justify-content-between">
          {/* Logo */}
          <Link className="navbar-brand m-0" to="/" onClick={closeMobileMenu}>
            <img src="/assets/img/logo/logo.webp" className="custom-logo" alt="Nyra Photography Logo" />
          </Link>

          {/* Mobile Hamburger Toggle Button */}
          <button
            className="navbar-toggler custom-hamburger-btn d-lg-none"
            type="button"
            onClick={() => setMobileMenuOpen(true)}
            aria-label="Toggle navigation"
          >
            <i className="fa-solid fa-bars fs-2 text-dark"></i>
          </button>

          {/* Desktop Menu */}
          <div className="collapse navbar-collapse justify-content-end d-none d-lg-flex" id="desktopNavbarNav">
            <ul className="navbar-nav align-items-center flex-row gap-4 mb-0">
              <li className="nav-item">
                <NavLink
                  to="/"
                  className={({ isActive }) => `nav-link ${isActive ? 'active' : ''}`}
                >
                  HOME
                </NavLink>
              </li>
              <li className="nav-item">
                <NavLink
                  to="/about"
                  className={({ isActive }) => `nav-link ${isActive ? 'active' : ''}`}
                >
                  ABOUT
                </NavLink>
              </li>

              {/* Services Dropdown */}
              <li className="nav-item dropdown">
                <span
                  className={`nav-link dropdown-toggle ${isServiceActive ? 'active' : ''}`}
                  role="button"
                  style={{ cursor: 'pointer' }}
                >
                  SERVICES
                </span>
                <ul className="dropdown-menu shadow border-0">
                  <li><Link className="dropdown-item" to="/wedding-shoot">Wedding Shoot</Link></li>
                  <li><Link className="dropdown-item" to="/pre-wedding">Pre Wedding Shoot</Link></li>
                  <li><Link className="dropdown-item" to="/bday-shoot">Birthday Shoot</Link></li>
                  <li><Link className="dropdown-item" to="/haldi-shoot">Haldi Shoot</Link></li>
                  <li><Link className="dropdown-item" to="/mehndi">Mehndi Shoot</Link></li>
                  <li><Link className="dropdown-item" to="/engagement">Ring Ceremony Shoot</Link></li>
                  <li><Link className="dropdown-item" to="/corporate">Corporate Event Shoot</Link></li>
                  <li><Link className="dropdown-item" to="/ecommerce">Ecommerce Shoot</Link></li>
                </ul>
              </li>

              <li className="nav-item">
                <NavLink
                  to="/gallery"
                  className={({ isActive }) => `nav-link ${isActive ? 'active' : ''}`}
                >
                  GALLERY
                </NavLink>
              </li>
              <li className="nav-item">
                <NavLink
                  to="/faq"
                  className={({ isActive }) => `nav-link ${isActive ? 'active' : ''}`}
                >
                  FAQ
                </NavLink>
              </li>
              <li className="nav-item">
                <NavLink
                  to="/contact"
                  className={({ isActive }) => `nav-link ${isActive ? 'active' : ''}`}
                >
                  CONTACT
                </NavLink>
              </li>

              {/* Enquire Button */}
              <li className="nav-item ms-2">
                <Link to="/contact" className="btn btn-pink-enquire">
                  ENQUIRE
                </Link>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      {/* Mobile Offcanvas Sidebar Drawer */}
      <div
        className={`offcanvas offcanvas-start border-0 custom-offcanvas-sidebar d-lg-none ${mobileMenuOpen ? 'show' : ''}`}
        tabIndex="-1"
        style={{
          visibility: mobileMenuOpen ? 'visible' : 'hidden',
          transition: 'transform 0.3s ease-in-out'
        }}
      >
        <div className="offcanvas-header sidebar-header-dark d-flex justify-content-between align-items-center">
          <h5 className="offcanvas-title d-flex align-items-center gap-2 mb-0">
            <i className="fa-solid fa-bars"></i>
            <span>Navigation Menu</span>
          </h5>
          <button
            type="button"
            className="btn-close btn-close-white shadow-none"
            onClick={closeMobileMenu}
            aria-label="Close"
          ></button>
        </div>

        <div className="offcanvas-body p-0 d-flex flex-column justify-content-between">
          <div className="sidebar-list">
            <Link
              to="/"
              className={`sidebar-link ${location.pathname === '/' ? 'active' : ''}`}
              onClick={closeMobileMenu}
            >
              <i className="fa-solid fa-house"></i>
              <span>Home</span>
            </Link>

            {/* Services Accordion */}
            <div className="sidebar-item-dropdown">
              <div
                className="sidebar-link d-flex justify-content-between align-items-center"
                style={{ cursor: 'pointer' }}
                onClick={() => setServicesSubmenuOpen(!servicesSubmenuOpen)}
              >
                <div className="d-flex align-items-center gap-2">
                  <i className="fa-solid fa-folder-open"></i>
                  <span>Services</span>
                </div>
                <span className="dropdown-arrow-box">
                  <i className={`fa-solid ${servicesSubmenuOpen ? 'fa-chevron-up' : 'fa-chevron-down'}`}></i>
                </span>
              </div>

              {servicesSubmenuOpen && (
                <div className="sidebar-submenu">
                  <Link to="/wedding-shoot" className="submenu-link" onClick={closeMobileMenu}>Wedding Shoot</Link>
                  <Link to="/pre-wedding" className="submenu-link" onClick={closeMobileMenu}>Pre Wedding Shoot</Link>
                  <Link to="/bday-shoot" className="submenu-link" onClick={closeMobileMenu}>Birthday Shoot</Link>
                  <Link to="/haldi-shoot" className="submenu-link" onClick={closeMobileMenu}>Haldi Shoot</Link>
                  <Link to="/mehndi" className="submenu-link" onClick={closeMobileMenu}>Mehndi Shoot</Link>
                  <Link to="/engagement" className="submenu-link" onClick={closeMobileMenu}>Ring Ceremony Shoot</Link>
                  <Link to="/corporate" className="submenu-link" onClick={closeMobileMenu}>Corporate Event Shoot</Link>
                  <Link to="/ecommerce" className="submenu-link" onClick={closeMobileMenu}>Ecommerce Shoot</Link>
                </div>
              )}
            </div>

            <Link
              to="/about"
              className={`sidebar-link ${location.pathname === '/about' ? 'active' : ''}`}
              onClick={closeMobileMenu}
            >
              <i className="fa-solid fa-circle-info"></i>
              <span>About Us</span>
            </Link>

            <Link
              to="/faq"
              className={`sidebar-link ${location.pathname === '/faq' ? 'active' : ''}`}
              onClick={closeMobileMenu}
            >
              <i className="fa-solid fa-circle-question"></i>
              <span>FAQ</span>
            </Link>

            <Link
              to="/gallery"
              className={`sidebar-link ${location.pathname === '/gallery' ? 'active' : ''}`}
              onClick={closeMobileMenu}
            >
              <i className="fa-solid fa-image"></i>
              <span>Gallery</span>
            </Link>

            <Link
              to="/contact"
              className={`sidebar-link ${location.pathname === '/contact' ? 'active' : ''}`}
              onClick={closeMobileMenu}
            >
              <i className="fa-solid fa-envelope"></i>
              <span>Contact Us</span>
            </Link>
          </div>

          <div className="sidebar-footer-action p-3">
            <div className="row g-2">
              <div className="col-6">
                <a href="tel:+918920939191" className="btn btn-outline-danger w-100 btn-action-call">
                  <i className="fa-solid fa-phone me-1"></i> Call Us
                </a>
              </div>
              <div className="col-6">
                <Link to="/contact" className="btn btn-danger w-100 btn-action-enquire" onClick={closeMobileMenu}>
                  <i className="fa-solid fa-paper-plane me-1"></i> Enquire Now
                </Link>
              </div>
            </div>
          </div>
        </div>
      </div>

      {/* Backdrop overlay for mobile offcanvas */}
      {mobileMenuOpen && (
        <div
          className="modal-backdrop fade show d-lg-none"
          style={{ zIndex: 1055 }}
          onClick={closeMobileMenu}
        ></div>
      )}
    </>
  );
}

