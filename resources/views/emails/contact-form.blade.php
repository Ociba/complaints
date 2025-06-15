{{--<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Submission</title>
</head>
<body>
    
    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Subject:</strong> {{ $subject }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $messageContent }}</p>
</body>
</html>--}}
<!DOCTYPE html>
<html>
<head>
    <title>New Contact Form Message</title>
    <style type="text/css">
        /* Base styles */
        body {
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f7fafc;
            margin: 0;
            padding: 0;
        }
        
        /* Email container */
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        /* Header */
        .email-header {
            background: #f7fafc;
            color: black;
            padding: 5px;
            border: 1px solid #e2e8f0;
            text-align: center;
        }
        
        .email-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        
        /* Content */
        .email-content {
            padding: 24px;
        }
        
        .message-card {
            background: #f8fafc;
            border-left: 4px solid #4f46e5;
            padding: 16px;
            margin: 20px 0;
            border-radius: 0 2px 2px 0;
        }
        
        /* Detail rows */
        .detail-row {
            display: flex;
            margin-bottom: 12px;
            padding-bottom: 12px;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .detail-label {
            font-weight: 600;
            color: #4a5568;
            min-width: 100px;
        }
        
        .detail-value {
            color: #2d3748;
            flex-grow: 1;
        }
        
        /* Footer */
        .email-footer {
            background: #f7fafc;
            padding: 16px 24px;
            text-align: center;
            font-size: 14px;
            color: #718096;
            border-top: 1px solid #e2e8f0;
        }
        
        /* Responsive */
        @media screen and (max-width: 480px) {
            .email-container {
                margin: 0;
                border-radius: 0;
            }
            
            .detail-row {
                flex-direction: column;
            }
            
            .detail-label {
                margin-bottom: 4px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h1>Tuliwamu (Contact Form Message)</h1>
        </div>
        
        <div class="email-content">
            <div class="detail-row">
                <span class="detail-label">Name:</span>
                <span class="detail-value">{{ $name }}</span>
            </div>
            
            <div class="detail-row">
                <span class="detail-label">Email:</span>
                <span class="detail-value">
                <a href="mailto:{{ $email }}">{{ $email }}</a>
                </span>
            </div>
            
            <div class="detail-row">
                <span class="detail-label">Subject:</span>
                <span class="detail-value">{{ $subject }}</span>
            </div>
            
            <div style="margin-top: 24px;">
                <h3 style="margin: 0 0 12px 0; color: #4a5568;">Message:</h3>
                <div class="message-card">
                 {{ $messageContent  }}
                </div>
            </div>
        </div>
        
        <div class="email-footer">
            <p>This message was sent from your website contact form. Reply directly to the sender using the email above.</p>
            <p style="margin-top: 8px; font-size: 12px;">© {{ date('Y') }} Tuliwamu. All rights reserved.</p>
        </div>
    </div>
</body>
</html>