<!DOCTYPE html>
<html>
<head>
    <title>New Feedback Received</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #4f46e5; color: white; padding: 5px; text-align: center; }
        .content { padding: 20px; background: #f9f9f9; }
        .footer { margin-top: 20px; font-size: 12px; color: #777; }
        .detail { margin-bottom: 10px; }
        .label { font-weight: bold; color: #555; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>You Have New Feedback (Taliwamu)</h2>
        </div>
        
        <div class="content">
            <div class="detail">
                <span class="label">From:</span> {{ $name }}
            </div>
            <div class="detail">
                <span class="label">Email:</span> <a href="mailto:{{ $email }}">{{ $email }}</a>
            </div>
            
            <div class="detail">
                <span class="label">Subject:</span> {{ $subject }}
            </div>
            
            <div class="detail">
                <span class="label">Message:</span>
                <div style="margin-top: 10px; padding: 10px; background: white; border-left: 3px solid #4f46e5;">
                    {!! nl2br(e($feedback)) !!}
                </div>
            </div>
        </div>
        
        <div class="footer">
            <p>This message was sent from your website feedback form.</p>
        </div>
    </div>
</body>
</html>