#!/bin/bash
set -e

# EC2 Setup Script for Eclore Jewellery (Laravel)
# Run this on your Ubuntu 22.04 LTS instance

echo "🚀 Starting server setup..."

# 1. Update system
echo "Updating system..."
sudo apt update && sudo apt upgrade -y

# 2. Install essential packages
echo "Installing essential packages..."
sudo apt install -y curl wget git unzip software-properties-common

# 3. Install Apache
echo "Installing Apache..."
sudo apt install -y apache2
sudo a2enmod rewrite headers ssl
sudo systemctl start apache2
sudo systemctl enable apache2

# 4. Install PHP 8.2
echo "Installing PHP 8.2..."
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
sudo apt install -y php8.2 php8.2-cli php8.2-common php8.2-mysql php8.2-zip php8.2-gd php8.2-mbstring php8.2-curl php8.2-xml php8.2-bcmath php8.2-intl php8.2-soap php8.2-redis php8.2-imagick libapache2-mod-php8.2
sudo systemctl restart apache2

# 5. Install Composer
echo "Installing Composer..."
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer

# 6. Install Node.js 18
echo "Installing Node.js 18..."
curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -
sudo apt install -y nodejs

# 7. Install MySQL
echo "Installing MySQL..."
sudo apt install -y mysql-server
# Note: mysql_secure_installation requires manual input, so we skip it here.
# User should run it manually: sudo mysql_secure_installation

# 8. Create application directory
echo "Creating application directory..."
sudo mkdir -p /var/www/html/eclore-jewellery
sudo chown -R ubuntu:ubuntu /var/www/html/eclore-jewellery

# 9. Configure Firewall
echo "Configuring firewall..."
sudo ufw default deny incoming
sudo ufw default allow outgoing
sudo ufw allow ssh
sudo ufw allow 'Apache Full'
# sudo ufw --force enable # Uncomment if you want to enable it automatically

echo "✅ Basic server setup complete!"
echo "Next steps:"
echo "1. Run 'sudo mysql_secure_installation' to secure your database."
echo "2. Create the database and user as described in docs/GitHub-Secrets-Setup.md."
echo "   (Database: eclore_db, User: eclore_user)"
echo "3. Add your GitHub secrets to the repository."
echo "4. Push your code to GitHub to trigger the deployment."
