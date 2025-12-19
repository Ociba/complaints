<footer id="footer" class="footer">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Tuliwamu</span>
          </a>
          <div class="footer-contact pt-3">
            <p>King Ceasor Palace</p>
            <p>Nakasero Road, Kampala (Uganda)</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+256 (0) 776913451 <br>  +256 (0)756131454</span></p>
            <p><strong>Email:</strong> <span>info@tuliwamu.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About us</a></li>
            <li><a href="#whatwedo">What We Do</a></li>
            <li><a href="#complaint">How To Send Complaint</a></li>
            <li><a href="/feedback">Your Feedback</a></li>
            <li><a href="/privacy_policy">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Respond To Complaints</a></li>
            <li><a href="#">Engage Stakeholders</a></li>
            <li><a href="#">Consultation</a></li>
            <li><a href="#">Diaspora Support</a></li>
            <li><a href="#">Repatriation</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6 footer-links">
          <h4>Download Mobile App Now</h4>
          <ul>
            <li><a href="#"><img src="{{ asset('asset\images\googleplay-btn.svg')}}" alt="Google Play"></a></li>
            <li><a href="#">1. Download, install & Open App</a></li>
            <li><a href="#">2. Create an Account</a></li>
            <li><a href="#">3. Send a Complaint</a></li>
          </ul>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>2025 © <span>Copyright</span> <strong class="px-1 sitename">Tuliwamu</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="https://www.kishanit.com">Kishan It</a>
      </div>
    </div>
</footer>

<style>
/* Enhanced Footer Styles - All White Text */
.footer {
    background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
    color: white; /* Changed to white */
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
    color: white; /* Changed to white */
    margin-bottom: 0.5rem;
    line-height: 1.6;
}

.footer-contact strong {
    color: white;
    font-weight: 600;
}

.footer-contact span {
    color: rgba(255, 255, 255, 0.9); /* Slightly lighter white for contrast */
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
    margin: 0;
}

.footer-links ul li {
    margin-bottom: 0.75rem;
}

.footer-links ul li a {
    color: white; /* Changed to white */
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
    opacity: 0.9;
}

.footer-links ul li a:hover {
    color: #f59e0b; /* Orange on hover for better visibility */
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
    color: white; /* Changed to white */
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
    color: white; /* Changed to white */
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

/* Responsive Footer */
@media (max-width: 768px) {
    .footer {
        padding-top: 60px;
    }
    
    .footer-links {
        margin-bottom: 2rem;
    }
    
    .footer-links h4 {
        margin-bottom: 1rem;
    }
    
    .footer-links ul li a img {
        max-width: 150px;
    }
}

@media (max-width: 576px) {
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
}

/* Additional improvements for better white text visibility */
.footer p, 
.footer li, 
.footer span,
.footer a:not(.credits a) {
    color: white !important;
}

.footer a:hover:not(.credits a) {
    color: #f59e0b !important;
}

.footer-contact p,
.footer-links ul li a {
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
}
</style>