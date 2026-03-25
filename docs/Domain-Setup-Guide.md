# Domain Setup Guide for Éclore

## Option 1: Direct DNS Management with Spaceship.com (Recommended)

If you have a domain already on Spaceship.com:
1. Log into your **Spaceship.com** account.
2. Go to **Domain Management** -> **Advanced DNS**.
3. Ensure you are using **Spaceship Basic DNS** (this is the default, and it's free).
4. Add the following **A Records**:
   - `Host: @` -> `Value: <Your EC2 Public IP>`
   - `Host: www` -> `Value: <Your EC2 Public IP>`
   - `Host: admin` -> `Value: <Your EC2 Public IP>`
5. *Note: DNS propagation usually takes 5-30 minutes.*

## Option 2: AWS Route 53 (Alternative - Paid service)
- Mentioned in previous versions, but not recommended if you prefer a free DNS setup via your registrar.

## Option 3: Use a Subdomain Service

### Using No-IP (Free)
1. Go to [noip.com](https://www.noip.com)
2. Create account and get free subdomain (e.g., `eclore.ddns.net`)
3. Install No-IP client on your EC2 instance
4. Update your application to use the subdomain

### Using DuckDNS (Free)
1. Go to [duckdns.org](https://www.duckdns.org)
2. Create account and get subdomain (e.g., `eclore.duckdns.org`)
3. Update DNS records to point to your EC2 IP

## Security Group Configuration

Make sure your EC2 security group allows:
- **HTTP (Port 80)**: 0.0.0.0/0
- **HTTPS (Port 443)**: 0.0.0.0/0
- **Custom Port 8080**: 0.0.0.0/0 (if using port 8080)

## Application Configuration

Update your GitHub secrets:
- `APP_URL`: `https://yourdomain.com` (or `http://` if no SSL)
- Update any hardcoded URLs in your application

## SSL Certificate (Optional but Recommended)

### Using Let's Encrypt (Free)
1. SSH into your EC2 instance
2. Install Certbot: `sudo apt install certbot python3-certbot-apache`
3. Get certificate: `sudo certbot --apache -d yourdomain.com -d www.yourdomain.com`
4. Configure auto-renewal

### Using AWS Certificate Manager
1. Request certificate in ACM
2. Validate domain ownership
3. Use with Application Load Balancer or CloudFront
