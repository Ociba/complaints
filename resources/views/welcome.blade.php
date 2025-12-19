<!DOCTYPE html>
<html lang="en">

@include('layouts.front.css')
<style>
  :root {
    --primary-color: #2563eb;
    --primary-dark: #1d4ed8;
    --primary-light: #60a5fa;
    --accent-color: #2563eb;
    --accent-dark: #d97706;
    --dark-color: #1e293b;
    --light-color: #f8fafc;
    --gray-light: #e2e8f0;
    --gray-medium: #94a3b8;
    --success-color: #10b981;
    --danger-color: #ef4444;
    --warning-color: #f59e0b;
    --info-color: #3b82f6;
    --gradient-primary: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
    --gradient-accent: linear-gradient(135deg, var(--accent-color), var(--accent-dark));
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    --border-radius: 12px;
    --border-radius-lg: 20px;
    --border-radius-xl: 30px;
    --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }

  body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    line-height: 1.6;
    color: var(--dark-color);
    background-color: var(--light-color);
  }

  h1, h2, h3, h4, h5, h6 {
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 1rem;
  }

  .accent-text {
    background: var(--gradient-accent);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    font-weight: 800;
  }

  /* Header Styles */
  .header {
    background: linear-gradient(135deg, rgba(37, 99, 235, 0.95) 0%, rgba(29, 78, 216, 0.95) 100%);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    box-shadow: 0 4px 20px rgba(37, 99, 235, 0.15);
    padding: 1rem 0;
    transition: all 0.3s ease;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    z-index: 1000;
  }

  .header.scrolled {
    background: rgba(255, 255, 255, 0.98);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    padding: 0.75rem 0;
  }

  /* Logo and sitename */
  .logo img {
    height: 45px;
    width: auto;
    filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
    transition: var(--transition);
  }

  .sitename {
    color: white;
    font-weight: 700;
    font-size: 1.8rem;
    margin-left: 0.5rem;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    transition: var(--transition);
  }

  .header.scrolled .sitename {
    color: var(--primary-dark);
    text-shadow: none;
  }

  .header.scrolled .logo img {
    filter: none;
  }

  /* Navigation Menu - Professional Design */
  .navmenu ul {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin: 0;
    padding: 0;
  }

  .navmenu ul li a {
    color: rgba(255, 255, 255, 0.9);
    font-weight: 500;
    padding: 0.75rem 1.25rem;
    border-radius: 8px;
    transition: all 0.3s ease;
    position: relative;
    text-decoration: none;
    font-size: 0.95rem;
  }

  /* Initial state (white text) */
  .navmenu ul li a:hover {
    color: white;
    background: rgba(255, 255, 255, 0.15);
    transform: translateY(-1px);
  }

  /* Scrolled state - Black text */
  .header.scrolled .navmenu ul li a {
    color: var(--dark-color);
  }

  .header.scrolled .navmenu ul li a:hover {
    color: var(--primary-color);
    background: rgba(37, 99, 235, 0.1);
  }

  /* Active link styling - All states */
  .navmenu ul li a.active {
    font-weight: 600;
    position: relative;
  }

  /* Active state - Initial (white background) */
  .navmenu ul li a.active {
    color: white;
    background: rgba(255, 255, 255, 0.2);
  }

  .navmenu ul li a.active::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 50%;
    transform: translateX(-50%);
    width: 20px;
    height: 3px;
    background: #f59e0b;
    border-radius: 2px;
    box-shadow: 0 2px 4px rgba(245, 158, 11, 0.3);
  }

  /* Active state - Scrolled (black text with blue indicator) */
  .header.scrolled .navmenu ul li a.active {
    color: var(--primary-color);
    background: rgba(37, 99, 235, 0.1);
  }

  .header.scrolled .navmenu ul li a.active::after {
    background: var(--primary-color);
    box-shadow: 0 2px 4px rgba(37, 99, 235, 0.3);
  }

  /* Get Started button */
  .btn-getstarted {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s ease;
    border: none;
    text-decoration: none;
    display: inline-block;
    box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
    margin-left: 1rem;
  }

  .btn-getstarted:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(245, 158, 11, 0.4);
    color: white;
    background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
  }

  .header.scrolled .btn-getstarted {
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
  }

  .header.scrolled .btn-getstarted:hover {
    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    box-shadow: 0 8px 25px rgba(37, 99, 235, 0.4);
  }

  /* Mobile navigation toggle */
  .mobile-nav-toggle {
    color: white;
    font-size: 1.5rem;
    cursor: pointer;
    transition: color 0.3s ease;
  }

  .mobile-nav-toggle:hover {
    color: #f59e0b;
  }

  .header.scrolled .mobile-nav-toggle {
    color: var(--dark-color);
  }

  .header.scrolled .mobile-nav-toggle:hover {
    color: var(--primary-color);
  }

  /* Hero Section - Clean Design (Removed background pattern) */
  .hero {
    padding: 150px 0 100px;
    background: white;
    position: relative;
    overflow: hidden;
  }

  /* Removed the ::before background pattern */

  .hero h1 {
    font-size: 3.5rem;
    font-weight: 800;
    margin-bottom: 1.5rem;
    line-height: 1.1;
  }

  .hero-content p {
    font-size: 1.125rem;
    color: var(--gray-medium);
    margin-bottom: 2rem;
  }

  .hero-buttons .btn {
    padding: 0.875rem 2rem;
    font-weight: 600;
    border-radius: var(--border-radius);
    transition: var(--transition);
  }

  .btn-primary {
    background: var(--gradient-primary);
    border: none;
    color: white;
  }

  .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
    color: white;
  }

  .btn-link {
    color: var(--primary-color);
    font-weight: 600;
    text-decoration: none;
  }

  .btn-link:hover {
    color: var(--primary-dark);
  }

  /* Hero Image Styles */
  .hero-image-wrapper {
    width: 100%;
    position: relative;
    overflow: hidden;
    border-radius: var(--border-radius-lg);
  }

  .hero-main-image {
    width: 100%;
    height: auto;
    transition: transform 0.3s ease;
    min-height: 400px;
    object-fit: cover;
  }

  /* Increase height for larger screens */
  @media (min-width: 1400px) {
    .hero-main-image {
      max-height: 900px;
      min-height: 600px;
    }
  }

  @media (min-width: 1200px) {
    .hero-main-image {
      max-height: 850px;
      min-height: 550px;
    }
  }

  /* Stats Section */
  .stats-row {
    background: white;
    padding: 3rem;
    border-radius: var(--border-radius-lg);
    box-shadow: var(--shadow-lg);
    margin-top: 3rem;
  }

  .stat-item {
    text-align: center;
    padding: 2rem;
    border-radius: var(--border-radius);
    transition: var(--transition);
    height: 100%;
  }

  .stat-item:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-md);
    background: rgba(37, 99, 235, 0.05);
  }

  .stat-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--gradient-primary);
    border-radius: 50%;
    padding: 1rem;
  }

  .stat-icon svg {
    width: 40px;
    height: 40px;
    fill: white;
  }

  .stat-content h4 {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
    color: var(--dark-color);
  }

  .stat-content p {
    color: var(--gray-medium);
    font-size: 0.95rem;
  }

  /* About Section */
  .about {
    padding: 100px 0;
    background: white;
  }

  .about-meta {
    color: var(--primary-color);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-size: 0.875rem;
    display: inline-block;
    margin-bottom: 1rem;
  }

  .about-title {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 1.5rem;
    line-height: 1.2;
  }

  .about-description {
    font-size: 1.125rem;
    color: var(--gray-medium);
    margin-bottom: 2rem;
  }

  .feature-list {
    list-style: none;
    padding: 0;
  }

  .feature-list li {
    margin-bottom: 1rem;
    display: flex;
    align-items: flex-start;
  }

  .feature-list i {
    color: var(--success-color);
    margin-right: 0.75rem;
    font-size: 1.25rem;
    flex-shrink: 0;
  }

  .image-wrapper {
    position: relative;
    height: 500px;
    border-radius: var(--border-radius-lg);
    overflow: hidden;
  }

  .main-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: var(--border-radius-lg);
  }

  .small-image {
    position: absolute;
    bottom: -20px;
    right: -20px;
    width: 300px;
    height: 300px;
    object-fit: cover;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-xl);
    border: 5px solid white;
  }

  .experience-badge.floating {
    position: absolute;
    bottom: 30px;
    left: 30px;
    background: white;
    padding: 1.5rem;
    border-radius: var(--border-radius);
    box-shadow: var(--shadow-lg);
    max-width: 250px;
  }

  .experience-badge h3 {
    color: var(--primary-dark);
    margin-bottom: 0.5rem;
    font-size: 1.5rem;
  }

  .experience-badge a {
    color: var(--primary-color);
    font-weight: 600;
    text-decoration: none;
    transition: var(--transition);
  }

  .experience-badge a:hover {
    color: var(--primary-dark);
  }

  /* Features Section */
  .features-cards {
    padding: 100px 0;
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
  }

  .feature-box {
    background: white;
    padding: 3rem 2rem;
    border-radius: var(--border-radius);
    text-align: center;
    height: 100%;
    transition: var(--transition);
    box-shadow: var(--shadow-md);
    border-top: 4px solid var(--primary-color);
  }

  .feature-box:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-xl);
  }

  .feature-box.orange {
    border-color: var(--warning-color);
  }

  .feature-box.blue {
    border-color: var(--info-color);
  }

  .feature-box.green {
    border-color: var(--success-color);
  }

  .feature-box.red {
    border-color: var(--danger-color);
  }

  .feature-box svg {
    width: 64px;
    height: 64px;
    margin-bottom: 1.5rem;
  }

  .feature-box h4 {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    color: var(--dark-color);
  }

  .feature-box p {
    color: var(--gray-medium);
    line-height: 1.6;
  }

  /* Features 2 Section */
  .features-2 {
    padding: 100px 0;
    background: white;
  }

  .feature-item {
    padding: 1.5rem;
    border-radius: var(--border-radius);
    background: rgba(37, 99, 235, 0.05);
    margin-bottom: 1.5rem;
    transition: var(--transition);
  }

  .feature-item:hover {
    background: rgba(37, 99, 235, 0.1);
    transform: translateX(5px);
  }

  .feature-icon {
    width: 50px;
    height: 50px;
    background: var(--gradient-primary);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.25rem;
    flex-shrink: 0;
  }

  .feature-content h3 {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
    color: var(--dark-color);
  }

  .feature-content p {
    color: var(--gray-medium);
    margin-bottom: 0;
  }

  .phone-mockup {
    max-width: 320px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
  }

  .phone-mockup::before {
    content: '';
    position: absolute;
    top: -20px;
    left: -20px;
    right: -20px;
    bottom: -20px;
    background: var(--gradient-primary);
    opacity: 0.1;
    border-radius: 40px;
    z-index: -1;
  }

  .phone-mockup img {
    border-radius: 30px;
    box-shadow: var(--shadow-xl);
    border: 10px solid var(--dark-color);
  }

  /* FAQ Section */
  .faq-9 {
    padding: 100px 0;
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
  }

  .faq-title {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 1.5rem;
    line-height: 1.2;
  }

  .faq-description {
    font-size: 1.125rem;
    color: var(--gray-medium);
    margin-bottom: 2rem;
  }

  .faq-container {
    background: white;
    border-radius: var(--border-radius);
    overflow: hidden;
    box-shadow: var(--shadow-lg);
  }

  .faq-item {
    padding: 1.5rem;
    border-bottom: 1px solid var(--gray-light);
    cursor: pointer;
    transition: var(--transition);
    position: relative;
  }

  .faq-item:last-child {
    border-bottom: none;
  }

  .faq-item:hover {
    background: rgba(37, 99, 235, 0.05);
  }

  .faq-item.faq-active {
    background: rgba(37, 99, 235, 0.1);
  }

  .faq-item h3 {
    font-size: 1.125rem;
    margin-bottom: 0;
    padding-right: 40px;
  }

  .faq-content {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
    padding-top: 0;
  }

  .faq-item.faq-active .faq-content {
    max-height: 500px;
    padding-top: 1rem;
  }

  .faq-toggle {
    position: absolute;
    right: 1.5rem;
    top: 50%;
    transform: translateY(-50%);
    transition: var(--transition);
  }

  .faq-item.faq-active .faq-toggle {
    transform: translateY(-50%) rotate(90deg);
  }

  /* Contact Section */
  .contact {
    padding: 100px 0;
    background: white;
  }

  .section-title {
    text-align: center;
    margin-bottom: 3rem;
  }

  .section-title h2 {
    font-size: 2.5rem;
    font-weight: 800;
    background: var(--gradient-primary);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    display: inline-block;
  }

  .section-title p {
    font-size: 1.125rem;
    color: var(--gray-medium);
    max-width: 600px;
    margin: 0 auto;
  }

  .info-box-with-bg {
    background: var(--gradient-primary);
    color: white;
    padding: 3rem;
    border-radius: var(--border-radius-lg);
    height: 100%;
    position: relative;
    overflow: hidden;
  }

  .info-box-with-bg::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 200px;
    height: 200px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    transform: translate(100px, -100px);
  }

  .info-box-with-bg::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 150px;
    height: 150px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    transform: translate(-75px, 75px);
  }

  .info-box-with-bg h3 {
    color: white;
    font-size: 1.75rem;
    margin-bottom: 1.5rem;
    position: relative;
    z-index: 1;
  }

  .info-box-with-bg p {
    color: rgba(255, 255, 255, 0.9);
    margin-bottom: 2rem;
    position: relative;
    z-index: 1;
  }

  .info-box-with-bg a {
    color: white;
    font-weight: 600;
    text-decoration: underline;
  }

  .info-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 1.5rem;
    position: relative;
    z-index: 1;
  }

  .icon-box {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 1rem;
    flex-shrink: 0;
  }

  .icon-box i {
    color: white;
    font-size: 1.25rem;
  }

  .content h4 {
    color: white;
    font-size: 1rem;
    margin-bottom: 0.25rem;
  }

  .content p {
    color: rgba(255, 255, 255, 0.9);
    margin: 0;
    font-size: 0.95rem;
  }

  .contact-form {
    background: white;
    padding: 3rem;
    border-radius: var(--border-radius-lg);
    box-shadow: var(--shadow-lg);
    height: 100%;
  }

  .contact-form h3 {
    font-size: 1.75rem;
    margin-bottom: 1.5rem;
    color: var(--dark-color);
  }

  /* Footer Styles */
  .footer {
    background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
    color: white;
    padding-top: 80px;
    position: relative;
    overflow: hidden;
  }

  .footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #2563eb 0%, #f59e0b 50%, #2563eb 100%);
  }

  .footer-top {
    position: relative;
    z-index: 1;
  }

  .footer-about .sitename {
    color: white;
    font-size: 2rem;
    font-weight: 700;
    background: linear-gradient(135deg, #2563eb 0%, #60a5fa 100%);
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    -webkit-text-fill-color: transparent;
  }

  .footer-contact p {
    color: white;
    margin-bottom: 0.5rem;
    line-height: 1.6;
  }

  .footer-contact strong {
    color: white;
    font-weight: 600;
  }

  .footer-contact span {
    color: rgba(255, 255, 255, 0.9);
  }

  .footer-links h4 {
    color: white;
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    position: relative;
    padding-bottom: 0.75rem;
  }

  .footer-links h4::after {
    content: '';
    position: absolute;
    color: white;
    left: 0;
    bottom: 0;
    width: 40px;
    height: 3px;
    background: linear-gradient(90deg, #2563eb 0%, #f59e0b 100%);
    border-radius: 2px;
  }

  .footer-links ul {
    list-style: none;
    padding: 0;
    color:white;
    margin: 0;
  }

  .footer-links ul li {
    margin-bottom: 0.75rem;
    color: white;
  }

  .footer-links ul li a {
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
    opacity: 0.9;
  }

  .footer-links ul li a:hover {
    color: #f59e0b;
    transform: translateX(5px);
    text-decoration: none;
    opacity: 1;
  }

  .footer-links ul li a img {
    max-width: 180px;
    height: auto;
    transition: all 0.3s ease;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
  }

  .footer-links ul li a img:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
  }

  .social-links {
    gap: 1rem;
  }

  .social-links a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    color: white;
    font-size: 1.2rem;
    transition: all 0.3s ease;
    text-decoration: none;
  }

  .social-links a:hover {
    background: linear-gradient(135deg, #2563eb 0%, #f59e0b 100%);
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(37, 99, 235, 0.3);
    color: white;
  }

  .copyright {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding: 2rem 0;
    margin-top: 3rem;
  }

  .copyright p {
    color: white;
    margin-bottom: 0.5rem;
    opacity: 0.9;
  }

  .copyright span {
    opacity: 0.8;
  }

  .copyright .sitename {
    color: white;
    font-weight: 600;
    opacity: 1;
  }

  .credits {
    color: white;
    font-size: 0.9rem;
    opacity: 0.8;
  }

  .credits a {
    color: #60a5fa;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
    opacity: 1;
  }

  .credits a:hover {
    color: #f59e0b;
    text-decoration: underline;
  }

  /* Responsive Design */
  @media (max-width: 1200px) {
    .navmenu ul li a {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }
  }

  @media (max-width: 992px) {
    .header {
        padding: 0.75rem 0;
    }
    
    .navmenu {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.98) 0%, rgba(29, 78, 216, 0.98) 100%);
        backdrop-filter: blur(10px);
    }
    
    .header.scrolled .navmenu {
        background: rgba(255, 255, 255, 0.98);
    }
    
    .header.scrolled .navmenu ul li a {
        color: var(--dark-color);
    }

    .hero h1 {
      font-size: 2.5rem;
    }
    
    .about-title,
    .faq-title,
    .section-title h2 {
      font-size: 2rem;
    }
    
    .hero-slider-container,
    .image-wrapper {
      height: 400px;
    }
    
    .small-image {
      width: 200px;
      height: 200px;
    }
    
    .phone-mockup {
      margin: 3rem auto;
    }

    .hero-main-image {
      max-height: 600px;
      min-height: 350px;
    }

    .footer-links h4 {
        margin-bottom: 1rem;
    }
    
    .footer-links ul li a img {
        max-width: 150px;
    }
  }

  @media (max-width: 768px) {
    .hero {
      padding: 120px 0 60px;
    }
    
    .hero h1 {
      font-size: 2rem;
    }
    
    .stats-row {
      padding: 2rem 1rem;
    }
    
    .feature-box {
      padding: 2rem 1.5rem;
    }
    
    .info-box-with-bg,
    .contact-form {
      padding: 2rem;
    }
    
    .feature-item {
      padding: 1rem;
    }

    .footer {
        padding-top: 60px;
    }
    
    .footer-links {
        margin-bottom: 2rem;
    }

    .hero-main-image {
      max-height: 500px;
      min-height: 300px;
    }
  }

  @media (max-width: 576px) {
    .hero h1 {
      font-size: 1.75rem;
    }
    
    .about-title,
    .faq-title,
    .section-title h2 {
      font-size: 1.75rem;
    }
    
    .btn-getstarted {
      padding: 0.5rem 1rem;
      font-size: 0.875rem;
    }
    
    .stat-icon {
      width: 60px;
      height: 60px;
    }
    
    .stat-icon svg {
      width: 30px;
      height: 30px;
    }

    .footer-top {
        text-align: center;
    }
    
    .footer-links h4::after {
        left: 50%;
        transform: translateX(-50%);
    }
    
    .social-links {
        justify-content: center;
    }
    
    .copyright {
        padding: 1.5rem 0;
    }

    .hero-main-image {
      max-height: 400px;
      min-height: 250px;
    }
  }

  /* Animation Classes */
  [data-aos] {
    opacity: 0;
    transition: opacity 0.6s ease, transform 0.6s ease;
  }

  [data-aos].aos-animate {
    opacity: 1;
  }
</style>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
        <img src="{{ asset('asset/images/logo.png')}}" alt="Tuliwamu Logo">
        <h1 class="sitename">Tuliwamu</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#whatwedo">What We Do</a></li>
          <li><a href="#complaint">How to send Complaint</a></li>
          <li><a href="#faq">FAQ</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="https://play.google.com/store/apps/details?id=com.kishanit.complaintsapp">Get Started</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="home" class="hero section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">
          <div class="col-lg-6">

            <div class="hero-content" data-aos="fade-up" data-aos-delay="200">
              <h1 class="mb-4">
                Tuliwamu&nbsp;Mobile&nbsp;App<br>
                <span class="accent-text">IN DISTRESS, <br>WE RESPOND</span>
              </h1>
              <p class="mb-4 mb-md-5">Tuliwamu is a dedicated emergency response app designed to assist distressed Ugandans in the diaspora by providing immediate help and ensuring their safe return home. Whether you're facing an emergency, need urgent assistance, or want to report a complaint, Tuliwamu connects you with the right support quickly and efficiently.</p>
              <div class="hero-buttons">
                <a href="#about" class="btn btn-primary me-0 me-sm-2 mx-1">View More</a>
                <a href="#" class="btn btn-link mt-2 mt-sm-0 glightbox">
                  <i class="bi bi-play-circle me-1"></i>
                  Play Video
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <!-- Responsive Hero Image -->
            <div class="hero-image-wrapper" data-aos="fade-up" data-aos-delay="300">
              <img src="{{ asset('asset/images/together2.jpg') }}" 
                   alt="Tuliwamu App - Emergency Response Assistance" 
                   class="img-fluid hero-main-image rounded-4 shadow-lg"
                   style="width: 100%; height: auto; max-height: 800px; object-fit: cover;">
            </div>
          </div>
        </div>

        <div class="row stats-row gy-4 mt-5" data-aos="fade-up" data-aos-delay="500">
          <div class="col-12 text-center mb-4">
            <h2 class="mb-3">Why should I install Tuliwamu Mobile Application?</h2>
            <p class="lead text-muted">Tuliwamu App helps you in critical situations listed below</p>
          </div>
          
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="stat-item">
              <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24">
                  <path d="M12 2L1 21h22L12 2zm0 3.5L18.5 19h-13L12 5.5z"/>
                  <circle cx="12" cy="8.5" r="1.5" fill="white"/>
                  <circle cx="12" cy="13" r="1.5" fill="white"/>
                </svg>
              </div>
              <div class="stat-content">
                <h4>In Danger</h4>
                <p class="mb-0">When you are in a dangerous situation</p>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="stat-item">
              <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24">
                  <path d="M19 3h-4V1h-6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm6 12H6v-1.4c0-2 4-3.1 6-3.1s6 1.1 6 3.1V18z"/>
                  <rect x="8" y="10" width="8" height="2" fill="white"/>
                </svg>
              </div>
              <div class="stat-content">
                <h4>Mistreated</h4>
                <p class="mb-0">When you are being mistreated</p>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="stat-item">
              <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24">
                  <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14z"/>
                  <rect x="7" y="7" width="10" height="2" fill="white"/>
                  <rect x="7" y="11" width="10" height="2" fill="white"/>
                  <rect x="7" y="15" width="10" height="2" fill="white"/>
                </svg>
              </div>
              <div class="stat-content">
                <h4>Contract Breach</h4>
                <p class="mb-0">Breach of contract guidelines</p>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="stat-item">
              <div class="stat-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24">
                  <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                  <circle cx="12" cy="9" r="1.5" fill="white"/>
                </svg>
              </div>
              <div class="stat-content">
                <h4>Stranded</h4>
                <p class="mb-0">When you have lost direction</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4 align-items-center justify-content-between">

          <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
            <span class="about-meta">MORE ABOUT US</span>
            <h2 class="about-title">Specialized assistance for Ugandans abroad and within</h2>
            <p class="about-description">Tuliwamu is your reliable partner in distress—ensuring you're never alone, no matter where you are. Download now and stay protected! Diaspora Support – Specialized assistance for Ugandans abroad, including repatriation help when needed.</p>

            <div class="row feature-list-wrapper">
              <div class="col-md-6">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> A versatile complaint assistance app</li>
                  <li><i class="bi bi-check-circle-fill"></i> Enables users to report issues instantly</li>
                  <li><i class="bi bi-check-circle-fill"></i> Report issues via text, audio, video, or SOS alerts</li>
                </ul>
              </div>
              <div class="col-md-6">
                <ul class="feature-list">
                  <li><i class="bi bi-check-circle-fill"></i> Ensuring accessibility for all</li>
                  <li><i class="bi bi-check-circle-fill"></i> Streamlines 24/7 reporting</li>
                  <li><i class="bi bi-check-circle-fill"></i> Ensure timely resolution of grievances</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
            <div class="image-wrapper">
              <div class="images position-relative">
                <img src="{{ asset('asset/images/together3.jpg') }}" alt="Business Meeting" class="img-fluid main-image">
                <img src="{{ asset('asset/images/together4.jpg')}}" alt="Team Discussion" class="img-fluid small-image">
              </div>
              <div class="experience-badge floating">
                <h3>Tuliwamu</h3>
                <p><a href="https://play.google.com/store/apps/details?id=com.kishanit.complaintsapp" class="text-white">Download App Now</a></p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Features Cards Section -->
    <section id="whatwedo" class="features-cards section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="feature-box orange">
              <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24">
                <path d="M12 2L1 21h22L12 2zm0 3.5L18.5 19h-13L12 5.5z" fill="#ffffff"/>
                <text x="12" y="16" font-family="Arial" font-size="10" font-weight="bold" text-anchor="middle" fill="#f59e0b">SOS</text>
              </svg>
              <h4>SOS Alert</h4>
              <p>Instantly alert emergency contacts and response teams with your location in critical situations.</p>
            </div>
          </div><!-- End Feature Box-->

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="feature-box blue">
              <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24">
                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V5h14v14z" fill="#ffffff"/>
                <path d="M7 12h10v2H7zM7 8h10v2H7z" fill="#3b82f6"/>
                <path d="M15 18l-5-3v6l5-3z" fill="#3b82f6"/>
              </svg>
              <h4>Complaints Portal</h4>
              <p>Report incidents via audio, video, or text to ensure your concerns are documented and addressed.</p>
            </div>
          </div><!-- End Feature Box-->

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="feature-box green">
              <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="8" stroke="#10b981" stroke-width="2" fill="none"/>
                <path d="M12 4v3M12 17v3M4 12h3M17 12h3" stroke="#10b981" stroke-width="2"/>
                <path d="M12 8l3 3-3 3-3-3z" fill="#10b981"/>
              </svg>
              <h4>Quick Response System</h4>
              <p>Connects you with trusted support networks for timely assistance.</p>
            </div>
          </div><!-- End Feature Box-->

          <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="feature-box red">
              <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 12c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5z" fill="#ffffff"/>
                <circle cx="12" cy="9" r="3" fill="#ef4444"/>
                <path d="M12 6v6" stroke="#ffffff" stroke-width="2"/>
              </svg>
              <h4>Location Tracking</h4>
              <p>Helps responders locate and reach you faster in emergencies.</p>
            </div>
          </div><!-- End Feature Box-->

        </div>

      </div>

    </section><!-- /Features Cards Section -->

    <!-- Features 2 Section -->
    <section id="complaint" class="features-2 section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center">

          <div class="col-lg-4">

            <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="200">
              <div class="d-flex align-items-center justify-content-end gap-4">
                <div class="feature-content">
                  <h3>How to download App?</h3>
                  <p>Search for <strong>"Tuliwamu"</strong> on your phone device in play store.</p>
                </div>
                <div class="feature-icon flex-shrink-0">
                  01
                </div>
              </div>
            </div><!-- End .feature-item -->

            <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="300">
              <div class="d-flex align-items-center justify-content-end gap-4">
                <div class="feature-content">
                  <h3>Download &amp; installing</h3>
                  <p>Click download Tuliwamu for free <a href="https://play.google.com/store/apps/details?id=com.kishanit.complaintsapp"> download app</a>. After downloading install it on your device.</p>
                </div>
                <div class="feature-icon flex-shrink-0">
                  02
                </div>
              </div>
            </div><!-- End .feature-item -->

            <div class="feature-item text-end" data-aos="fade-right" data-aos-delay="400">
              <div class="d-flex align-items-center justify-content-end gap-4">
                <div class="feature-content">
                  <h3>Open the App</h3>
                  <p>After Successful Installation, Open the App, <strong>Note:</strong> The Information you enter will be confidential and we shall use during the time of helping you.</p>
                </div>
                <div class="feature-icon flex-shrink-0">
                  03
                </div>
              </div>
            </div><!-- End .feature-item -->

          </div>

          <div class="col-lg-4 text-center" data-aos="zoom-in" data-aos-delay="200">
            <div class="phone-mockup d-inline-block">
              <img src="{{ asset('asset/images/app.png')}}"
                  alt="App Preview"
                  class="img-fluid">
            </div>
          </div>

          <div class="col-lg-4">

            <div class="feature-item mb-5" data-aos="fade-left" data-aos-delay="200">
              <div class="d-flex align-items-center gap-4">
                <div class="feature-icon flex-shrink-0">
                  04
                </div>
                <div class="feature-content">
                  <h3>Create Account</h3>
                  <p>Create account by filling the information then click create to submit your details.</p>
                </div>
              </div>
            </div><!-- End .feature-item -->

            <div class="feature-item mb-5" data-aos="fade-left" data-aos-delay="300">
              <div class="d-flex align-items-center gap-4">
                <div class="feature-icon flex-shrink-0">
                  05
                </div>
                <div class="feature-content">
                  <h3>Sending Complaint</h3>
                  <p>When You Login Successful, There are many options provided on how you want to send your complaint, Please select the one which favors you at the time of complaining.</p>
                </div>
              </div>
            </div><!-- End .feature-item -->

            <div class="feature-item" data-aos="fade-left" data-aos-delay="400">
              <div class="d-flex align-items-center gap-4">
                <div class="feature-icon flex-shrink-0">
                  06
                </div>
                <div class="feature-content">
                  <h3>Processing &amp; Responding to Your Complaint</h3>
                  <p>Our Team is ready to proceed with the process of handling your complaint and be in touch with you and other stakeholders to rescue the situation.</p>
                </div>
              </div>
            </div><!-- End .feature-item -->

          </div>
        </div>

      </div>

    </section><!-- /Features 2 Section -->

    <!-- Faq Section -->
    <section class="faq-9 faq section light-background" id="faq">

      <div class="container">
        <div class="row">

          <div class="col-lg-5" data-aos="fade-up">
            <h2 class="faq-title">Have a question? Check out the FAQ</h2>
            <p class="faq-description">This app allows individuals to report complaints or issues related to services, infrastructure, safety, or customer care. It helps connect people with the relevant authorities or service providers who can address those concerns.</p>
            <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
              <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z" fill="currentColor"></path>
              </svg>
            </div>
          </div>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
            <div class="faq-container">
              <div class="faq-item faq-active">
                <h3>Who is supposed to use this App?</h3>
                <div class="faq-content">
                  <p>Every Ugandan who is in trouble, danger or anyone one who needs assistance whether you are in Uganda or abroad.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Who sees my complaint?</h3>
                <div class="faq-content">
                  <p>Only authorized personnel from the relevant department or organization will see your complaint. If marked public, others may view the summary without personal details.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>How do I submit a complaint?</h3>
                <div class="faq-content">
                  <p>Open the app if you have already downloaded it.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Is my data safe?</h3>
                <div class="faq-content">
                  <p>Yes, we use secure encryption and follow data protection best practices. Your personal details will not be shared without your consent.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Why do you want me to enter personal details?</h3>
                <div class="faq-content">
                  <p>These details will be kept confidential and will only be used when you are in need of help.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>
          </div>

        </div>
      </div>
    </section><!-- /Faq Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Aims to bridge the gap between those in need and assistance providers, making complaint resolution faster and transparent</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4 g-lg-5">
          <div class="col-lg-5 position-relative">
            <div class="info-box-with-bg" data-aos="fade-up" data-aos-delay="200">
              <div class="info-box-content">
                <h3>Contact Info</h3>
                <p>Download Tuliwamu for free <a href="https://play.google.com/store/apps/details?id=com.kishanit.complaintsapp">download app</a>. After downloading install it on your device.</p>

                <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                  <div class="icon-box">
                    <i class="bi bi-geo-alt"></i>
                  </div>
                  <div class="content">
                    <h4>Our Location</h4>
                    <p>King Ceasor Palace</p>
                    <p>Nakasero Road, Kampala (Uganda)</p>
                  </div>
                </div>

                <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                  <div class="icon-box">
                    <i class="bi bi-telephone"></i>
                  </div>
                  <div class="content">
                    <h4>Phone Number</h4>
                    <p>+256 (0) 776913451</p>
                    <p>+256 (0)756131454</p>
                  </div>
                </div>

                <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                  <div class="icon-box">
                    <i class="bi bi-envelope"></i>
                  </div>
                  <div class="content">
                    <h4>Email Address</h4>
                    <p>info@tuliwamu.com</p>
                    <p>contact@tuliwamu.com</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-7">
            <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
              <h3>Get In Touch</h3>

              @livewire('front.contact-us')

            </div>
          </div>

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  @include('layouts.front.footer')

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('layouts.front.javascript')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // FAQ Toggle
      const faqItems = document.querySelectorAll('.faq-item');
      faqItems.forEach(item => {
        const toggle = item.querySelector('.faq-toggle');
        item.addEventListener('click', function() {
          this.classList.toggle('faq-active');
        });
      });

      // Header scroll effect and active navigation
      const header = document.getElementById('header');
      const navLinks = document.querySelectorAll('.navmenu ul li a');
      
      // Function to update active nav link based on scroll position
      function updateActiveNavLink() {
        const scrollPosition = window.scrollY + 100;
        
        // Remove active class from all links
        navLinks.forEach(link => link.classList.remove('active'));
        
        // Find which section is currently in view
        let currentSection = '';
        
        // Check each section
        navLinks.forEach(link => {
          const sectionId = link.getAttribute('href');
          if (sectionId.startsWith('#')) {
            const section = document.querySelector(sectionId);
            if (section) {
              const sectionTop = section.offsetTop;
              const sectionBottom = sectionTop + section.offsetHeight;
              
              if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                currentSection = sectionId;
              }
            }
          }
        });
        
        // If no section found in view, default to home
        if (!currentSection) {
          currentSection = '#home';
        }
        
        // Add active class to current section link
        const activeLink = document.querySelector(`.navmenu ul li a[href="${currentSection}"]`);
        if (activeLink) {
          activeLink.classList.add('active');
        }
      }
      
      // Scroll event listener for header background change
      window.addEventListener('scroll', function() {
        if (window.scrollY > 100) {
          header.classList.add('scrolled');
        } else {
          header.classList.remove('scrolled');
        }
        
        // Update active nav link on scroll
        updateActiveNavLink();
      });
      
      // Initial check for header state
      if (window.scrollY > 100) {
        header.classList.add('scrolled');
      }
      
      // Initial check for active nav link
      updateActiveNavLink();
      
      // Click event listener for smooth scrolling and setting active state
      navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
          const href = this.getAttribute('href');
          
          // Only handle internal links
          if (href.startsWith('#')) {
            e.preventDefault();
            
            // Remove active class from all links
            navLinks.forEach(l => l.classList.remove('active'));
            
            // Add active class to clicked link
            this.classList.add('active');
            
            // Smooth scroll to section
            const targetId = href;
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
              window.scrollTo({
                top: targetElement.offsetTop - 80,
                behavior: 'smooth'
              });
            }
          }
        });
      });

      // Smooth scrolling for all anchor links
      document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
          const href = this.getAttribute('href');
          if (href === '#') return;
          
          if (href.startsWith('#')) {
            e.preventDefault();
            const targetElement = document.querySelector(href);
            if (targetElement) {
              window.scrollTo({
                top: targetElement.offsetTop - 80,
                behavior: 'smooth'
              });
            }
          }
        });
      });
    });
  </script>

</body>
</html>