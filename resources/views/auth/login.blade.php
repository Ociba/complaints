<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints Management System | Login</title>
    <link href="{{ asset('asset/images/logo.png')}}" rel="icon">
    <link href="{{ asset('asset/images/logo.png')}}" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            overflow: hidden;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #0d1b3e;
            color: #333;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(28, 58, 113, 0.3) 0%, transparent 20%),
                radial-gradient(circle at 90% 80%, rgba(28, 58, 113, 0.3) 0%, transparent 20%),
                radial-gradient(circle at 50% 50%, rgba(59, 130, 246, 0.1) 0%, transparent 30%),
                linear-gradient(135deg, #0d83fd 0%, #0d83fd 100%);
            position: relative;
        }

        /* Background pattern overlay */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                linear-gradient(90deg, transparent 24px, rgba(255, 255, 255, 0.02) 25px, transparent 26px),
                linear-gradient(0deg, transparent 24px, rgba(255, 255, 255, 0.02) 25px, transparent 26px);
            background-size: 50px 50px;
            pointer-events: none;
            z-index: 0;
        }

        .login-container {
            display: flex;
            max-width: 1200px;
            width: 100%;
            max-height: 90vh;
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        .login-left {
            flex: 1;
            background: linear-gradient(135deg, rgba(13, 131, 253, 0.95) 0%, rgba(11, 110, 213, 0.95) 100%);
            color: white;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.08) 0%, transparent 70%);
            top: -150px;
            right: -150px;
        }

        .login-left::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.05) 0%, transparent 70%);
            bottom: -120px;
            left: -120px;
        }

        .system-title {
            font-size: clamp(28px, 3vw, 40px);
            font-weight: 700;
            margin-bottom: 25px;
            font-family: 'Poppins', sans-serif;
            line-height: 1.2;
        }

        .system-description {
            font-size: clamp(14px, 1.5vw, 16px);
            opacity: 0.9;
            margin-bottom: 40px;
            line-height: 1.7;
            max-width: 100%;
        }

        .features {
            margin-top: 10px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: clamp(10px, 2vw, 12px) clamp(12px, 2vw, 15px);
            border-radius: 12px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .feature-item:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(5px);
        }

        .feature-icon {
            background: rgba(255, 255, 255, 0.1);
            width: clamp(36px, 4vw, 42px);
            height: clamp(36px, 4vw, 42px);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: clamp(12px, 2vw, 15px);
            font-size: clamp(16px, 1.8vw, 18px);
            flex-shrink: 0;
        }

        .feature-text {
            font-size: clamp(14px, 1.5vw, 15px);
            font-weight: 500;
        }

        .login-right {
            flex: 1;
            padding: clamp(30px, 4vw, 50px) clamp(25px, 3vw, 40px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-height: 100%;
        }

        .login-header {
            margin-bottom: clamp(30px, 4vw, 40px);
        }

        .login-title {
            font-size: clamp(28px, 3vw, 40px);
            font-weight: 700;
            color: #1e3c72;
            margin-bottom: 15px;
            font-family: 'Poppins', sans-serif;
            line-height: 1.2;
        }

        .login-subtitle {
            color: #64748b;
            font-size: clamp(14px, 1.5vw, 16px);
        }

        .login-form {
            width: 100%;
        }

        .form-group {
            margin-bottom: clamp(20px, 3vw, 25px);
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 10px;
            font-weight: 500;
            color: #475569;
            font-size: clamp(14px, 1.5vw, 15px);
        }

        .input-with-icon {
            position: relative;
        }

        .input-with-icon i {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            font-size: clamp(16px, 1.8vw, 18px);
            z-index: 2;
        }

        .form-control {
            width: 100%;
            padding: clamp(14px, 2vw, 16px) clamp(16px, 2vw, 20px) clamp(14px, 2vw, 16px) clamp(48px, 3vw, 52px);
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            font-size: clamp(15px, 1.8vw, 16px);
            transition: all 0.3s;
            background-color: #f8fafc;
            font-family: 'Roboto', sans-serif;
        }

        .form-control:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
            background-color: white;
        }

        .form-control.is-invalid {
            border-color: #ef4444;
        }

        .invalid-feedback {
            color: #ef4444;
            font-size: clamp(13px, 1.4vw, 14px);
            margin-top: 8px;
            display: block;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: clamp(25px, 3vw, 30px);
            font-size: clamp(13px, 1.4vw, 14px);
        }

        .remember-me {
            display: flex;
            align-items: center;
        }

        .remember-me input {
            margin-right: 8px;
            accent-color: #1e3c72;
            width: clamp(16px, 1.8vw, 18px);
            height: clamp(16px, 1.8vw, 18px);
            cursor: pointer;
        }

        .remember-me label {
            cursor: pointer;
            user-select: none;
        }

        .forgot-password {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .forgot-password:hover {
            color: #1e3c72;
            text-decoration: underline;
        }

        .btn-submit {
            background: linear-gradient(135deg, #0d83fd 0%, #0d83fd 100%);
            color: white;
            border: none;
            padding: clamp(16px, 2vw, 18px) clamp(20px, 2.5vw, 30px);
            font-size: clamp(15px, 1.8vw, 16px);
            font-weight: 600;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
            font-family: 'Poppins', sans-serif;
            letter-spacing: 0.5px;
            box-shadow: 0 6px 20px rgba(30, 60, 114, 0.25);
            margin-bottom: 20px;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(30, 60, 114, 0.35);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        /* Back Home button styles */
        .btn-success {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            border: none;
            padding: clamp(14px, 2vw, 16px) clamp(20px, 2.5vw, 30px);
            font-size: clamp(15px, 1.8vw, 16px);
            font-weight: 600;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
            width: 100%;
            font-family: 'Poppins', sans-serif;
            letter-spacing: 0.5px;
            text-decoration: none;
            text-align: center;
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.25);
        }

        .btn-success:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.35);
            color: white;
            text-decoration: none;
        }

        .btn-success:active {
            transform: translateY(0);
        }

        .btn-success i {
            font-size: clamp(16px, 1.8vw, 18px);
        }

        /* Animation for form focus */
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4); }
            70% { box-shadow: 0 0 0 8px rgba(59, 130, 246, 0); }
            100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
        }

        .form-control:focus {
            animation: pulse 2s infinite;
        }

        /* Floating animation for background elements */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .floating-element {
            position: absolute;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            z-index: 0;
            animation: float 6s ease-in-out infinite;
        }

        .floating-element:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            width: 120px;
            height: 120px;
            bottom: 15%;
            right: 8%;
            animation-delay: 2s;
        }

        .floating-element:nth-child(3) {
            width: 60px;
            height: 60px;
            top: 50%;
            left: 10%;
            animation-delay: 4s;
        }

        /* Responsive styles */
        @media (max-width: 1200px) {
            .login-container {
                max-width: 95%;
            }
        }

        @media (max-width: 992px) {
            html, body {
                overflow-y: auto;
                height: auto;
                min-height: 100vh;
                padding: 15px;
            }
            
            .login-container {
                flex-direction: column;
                max-width: 600px;
                max-height: none;
                margin: 20px auto;
            }
            
            .login-left, .login-right {
                padding: 40px 30px;
            }
            
            .login-left {
                padding-bottom: 50px;
            }
            
            .system-title, .login-title {
                font-size: clamp(26px, 4vw, 32px);
            }
            
            .system-description, .login-subtitle {
                font-size: clamp(14px, 2vw, 16px);
            }
            
            .feature-text {
                font-size: clamp(14px, 2vw, 15px);
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
                background: linear-gradient(135deg, #0d83fd 0%, #0d83fd 100%);
            }
            
            .login-left, .login-right {
                padding: 30px 25px;
            }
            
            .login-left {
                padding-bottom: 40px;
            }
            
            .form-options {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .login-container {
                border-radius: 16px;
            }
            
            .floating-element {
                display: none; /* Hide floating elements on small screens */
            }
        }

        @media (max-width: 576px) {
            .login-left, .login-right {
                padding: 25px 20px;
            }
            
            .system-title, .login-title {
                font-size: 24px;
            }
            
            .system-description, .login-subtitle {
                font-size: 14px;
            }
            
            .feature-item {
                padding: 10px 12px;
                margin-bottom: 15px;
            }
            
            .feature-icon {
                width: 36px;
                height: 36px;
                margin-right: 12px;
            }
            
            .feature-text {
                font-size: 14px;
            }
            
            .btn-submit, .btn-success {
                padding: 16px 20px;
            }
            
            .form-control {
                padding: 14px 16px 14px 48px;
            }
            
            .input-with-icon i {
                left: 16px;
                font-size: 16px;
            }
        }

        @media (max-width: 400px) {
            .login-left, .login-right {
                padding: 20px 15px;
            }
            
            .system-title, .login-title {
                font-size: 22px;
            }
            
            .system-description, .login-subtitle {
                font-size: 13px;
            }
            
            .feature-item {
                padding: 8px 10px;
                margin-bottom: 12px;
            }
            
            .feature-icon {
                width: 32px;
                height: 32px;
                font-size: 14px;
                margin-right: 10px;
            }
            
            .feature-text {
                font-size: 13px;
            }
            
            .btn-submit, .btn-success {
                padding: 14px 16px;
                font-size: 15px;
            }
        }

        @media (max-height: 700px) and (min-width: 993px) {
            .login-container {
                max-height: 95vh;
            }
            
            .login-left, .login-right {
                padding: 30px 25px;
            }
            
            .system-title, .login-title {
                font-size: clamp(24px, 2.5vw, 28px);
                margin-bottom: 15px;
            }
            
            .system-description, .login-subtitle {
                margin-bottom: 20px;
            }
            
            .feature-item {
                margin-bottom: 15px;
                padding: 10px 12px;
            }
            
            .form-group {
                margin-bottom: 20px;
            }
        }

        /* Print styles */
        @media print {
            .login-container {
                box-shadow: none;
                max-height: none;
                max-width: 100%;
            }
            
            body {
                background: white;
                padding: 0;
            }
            
            .floating-element {
                display: none;
            }
            
            .btn-success, .btn-submit {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Background floating elements -->
    <div class="floating-element"></div>
    <div class="floating-element"></div>
    <div class="floating-element"></div>
    
    <div class="login-container">
        <!-- Left side with system information -->
        <div class="login-left">
            <h4 class="system-title">Tuliwamu CMS</h4>
            <p class="system-description">A professional platform for managing and tracking complaints efficiently. Streamline your complaint resolution process with our secure system.</p>
            
            <div class="features">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="feature-text">Secure Data Protection</div>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <div class="feature-text">Track Complaint Status</div>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="feature-text">Analytics & Reporting</div>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <div class="feature-text">24/7 Support Available</div>
                </div>
            </div>
        </div>
        
        <!-- Right side with login form -->
        <div class="login-right">
            <div class="login-header">
                <h1 class="login-title">Sign In to Your Account</h1>
                <p class="login-subtitle">Enter your credentials to access the complaints management dashboard</p>
            </div>
            
            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf
                
                <div class="form-group">
                    <label class="form-label" for="email">Email Address</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input 
                            id="email" 
                            type="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            name="email" 
                            value="{{ old('email') }}" 
                            placeholder="Enter your email address" 
                            required 
                            autocomplete="email" 
                            autofocus
                        >
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input 
                            id="password" 
                            type="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            name="password" 
                            placeholder="Enter your password" 
                            required 
                            autocomplete="current-password"
                        >
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="form-options">
                    <div class="remember-me">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Remember me</label>
                    </div>
                    
                    <a href="#" class="forgot-password">
                        Forgot your password?
                    </a>
                </div>
                
                <button type="submit" class="btn-submit">
                    <i class="fas fa-sign-in-alt"></i> Sign In
                </button>
                
                <!-- Back Home button -->
                <a href="/" class="btn-success">
                    <i class="fas fa-home"></i> Back Home
                </a>
            </form>
        </div>
    </div>

    <script>
        // Simple form interaction
        document.addEventListener('DOMContentLoaded', function() {
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            
            // Focus on email field by default
            setTimeout(() => {
                if (emailInput) emailInput.focus();
            }, 300);
            
            // Add focus effect to inputs
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.parentElement.classList.add('focused');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.parentElement.classList.remove('focused');
                });
            });
            
            // Add feature item hover effects
            const featureItems = document.querySelectorAll('.feature-item');
            featureItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    const icon = this.querySelector('.feature-icon i');
                    if (icon) {
                        icon.style.transform = 'scale(1.2)';
                        icon.style.transition = 'transform 0.3s';
                    }
                });
                
                item.addEventListener('mouseleave', function() {
                    const icon = this.querySelector('.feature-icon i');
                    if (icon) {
                        icon.style.transform = 'scale(1)';
                    }
                });
            });
            
            // Handle window resize for better mobile experience
            let resizeTimer;
            window.addEventListener('resize', function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function() {
                    // Adjust body overflow on resize
                    if (window.innerWidth <= 992) {
                        document.documentElement.style.overflowY = 'auto';
                        document.body.style.overflowY = 'auto';
                    } else {
                        document.documentElement.style.overflowY = 'hidden';
                        document.body.style.overflowY = 'hidden';
                    }
                }, 250);
            });
            
            // Initialize on load
            if (window.innerWidth <= 992) {
                document.documentElement.style.overflowY = 'auto';
                document.body.style.overflowY = 'auto';
            }
            
            // Back Home button hover effect enhancement
            const backHomeBtn = document.querySelector('.btn-success');
            if (backHomeBtn) {
                backHomeBtn.addEventListener('mouseenter', function() {
                    const icon = this.querySelector('i');
                    if (icon) {
                        icon.style.transform = 'translateX(-3px)';
                        icon.style.transition = 'transform 0.3s';
                    }
                });
                
                backHomeBtn.addEventListener('mouseleave', function() {
                    const icon = this.querySelector('i');
                    if (icon) {
                        icon.style.transform = 'translateX(0)';
                    }
                });
            }
        });
    </script>
</body>
</html>