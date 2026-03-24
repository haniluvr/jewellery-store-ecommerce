<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject ?? 'Email from Éclore' }}</title>
    <link rel="icon" type="image/png" href="{{ config('app.url') }}/frontend/assets/favicon.png">
    <meta name="author" content="Éclore">
    <meta property="og:image" content="{{ config('app.url') }}/frontend/assets/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Azeret+Mono:ital,wght@0,100..900;1,100..900&family=Outfit:wght@100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <style>
        /* Reset styles */
        body, table, td, p, a, li, blockquote {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        table, td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }
        img {
            -ms-interpolation-mode: bicubic;
        }

        /* Main styles */
        body {
            margin: 0;
            padding: 0;
            width: 100% !important;
            min-width: 100%;
            height: 100%;
            background-color: #FAFAFA;
            font-family: 'Outfit', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 300;
            line-height: 1.6;
            color: #1A1A1A;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 0;
            overflow: hidden;
            border: 1px solid #eeeeee;
        }

        .header {
            background: #1A1A1A;
            padding: 60px 20px;
            text-align: center;
        }

        .company-name {
            color: #ffffff;
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            font-weight: 300;
            margin: 0;
            letter-spacing: 0.25em;
            text-transform: uppercase;
        }

        .tagline {
            color: #B6965D;
            font-family: 'Azeret Mono', monospace;
            font-size: 9px;
            margin: 15px 0 0 0;
            font-weight: 400;
            letter-spacing: 0.4em;
            text-transform: uppercase;
        }

        .content {
            padding: 60px 50px;
        }

        .content h1 {
            color: #1A1A1A;
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            margin: 0 0 30px 0;
            font-weight: 400;
            letter-spacing: 0.02em;
            line-height: 1.2;
        }

        .content h2 {
            color: #1A1A1A;
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            margin: 40px 0 20px 0;
            font-weight: 400;
            letter-spacing: 0.05em;
            border-bottom: 1px solid #FAFAFA;
            padding-bottom: 15px;
        }

        .content p {
            margin: 0 0 20px 0;
            font-size: 15px;
            font-weight: 300;
            line-height: 1.8;
            color: #444444;
        }

        .button {
            display: inline-block;
            padding: 18px 45px;
            background: #1A1A1A;
            color: #ffffff !important;
            font-family: 'Azeret Mono', monospace;
            text-decoration: none;
            border-radius: 0;
            font-weight: 400;
            font-size: 10px;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            margin: 30px 0;
            transition: all 0.3s ease;
        }

        .info-box {
            background-color: #FAFAFA;
            border: 1px solid #eeeeee;
            padding: 30px;
            margin: 40px 0;
        }

        .footer {
            background-color: #FAFAFA;
            padding: 60px 50px;
            text-align: center;
            border-top: 1px solid #eeeeee;
        }

        .footer p {
            margin: 0 0 15px 0;
            font-size: 10px;
            color: #999999;
            letter-spacing: 0.05em;
            line-height: 2;
            font-family: 'Azeret Mono', monospace;
            text-transform: uppercase;
        }

        .social-links {
            margin: 30px 0 40px 0;
        }

        .social-links a {
            display: inline-block;
            margin: 0 15px;
            color: #1A1A1A;
            text-decoration: none;
            font-family: 'Azeret Mono', monospace;
            font-size: 9px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            border-bottom: 1px solid transparent;
            padding-bottom: 2px;
        }

        /* Order Table */
        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin: 40px 0;
        }

        .order-table th {
            padding: 20px 15px;
            text-align: left;
            border-bottom: 1px solid #1A1A1A;
            font-family: 'Azeret Mono', monospace;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            color: #1A1A1A;
        }

        .order-table td {
            padding: 20px 15px;
            text-align: left;
            border-bottom: 1px solid #FAFAFA;
            font-size: 14px;
            color: #444444;
        }

        @media only screen and (max-width: 600px) {
            .email-container { margin: 0; width: 100% !important; }
            .content { padding: 40px 25px; }
            .footer { padding: 40px 25px; }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1 class="company-name">ÉCLORE</h1>
            <p class="tagline">The Art of Timeless Selection</p>
        </div>

        <!-- Main Content -->
        <div class="content">
            @yield('content')
        </div>

        <!-- Footer -->
        <div class="footer">
            <p style="color: #1A1A1A; font-weight: 500; font-size: 11px;">ÉCLORE MAISON</p>
            <p>123 Santa Rosa - Tagaytay Rd, Silang, 4118 Cavite</p>
            <p>CONCIERGE: +63 (917) 123-4567 | HELLO@ECLOREJEWELLERY.SHOP</p>
            
            <div class="social-links">
                <a href="#">INSTAGRAM</a>
                <a href="#">FACEBOOK</a>
                <a href="#">PINTEREST</a>
            </div>
            
            <p style="font-size: 9px; color: #BBBBBB;">Discover the art of eternal beauty with Éclore.</p>
            
            <div style="margin-top: 40px; border-top: 1px solid #eeeeee; padding-top: 40px;">
                <p style="font-size: 8px; color: #CCCCCC; letter-spacing: 0.1em;">
                    You are receiving this communication as a valued member of the Éclore community.
                    <br>
                    <a href="#" style="color: #CCCCCC; text-decoration: underline;">UNSUBSCRIBE</a> | <a href="#" style="color: #CCCCCC; text-decoration: underline;">PREFERENCES</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
