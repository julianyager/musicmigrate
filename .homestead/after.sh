#!/bin/sh

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.
# Example: https://github.com/spatie/homestead-custom/blob/master/after.sh
# Example Production Push: http://stackoverflow.com/questions/23841089/run-provisioning-scripts-per-project-in-laravel-homestead

if [ ! -f /usr/local/extra_homestead_software_installed ]; then
	echo 'installing some extra software'

	#
	# Updated our MOTD with something more Ripped Recipes ;-)
	#
	sudo rm -rf /etc/motd
	sudo cp /home/vagrant/rippedrecipes/.homestead/stubs/motd /etc/motd

	#
	# Install PHPMyAdmin
	#
	echo 'installing and setting permissions on phpmyadmin config'
	sudo rm -rf /home/vagrant/phpmyadmin/*
	sudo composer create-project phpmyadmin/phpmyadmin temp --repository-url=https://www.phpmyadmin.net/ --working-dir=/home/vagrant/phpmyadmin --quiet
	sudo cp -r /home/vagrant/phpmyadmin/temp/* /home/vagrant/phpmyadmin
	sudo rm -rf /home/vagrant/phpmyadmin/temp
	cp /home/vagrant/rippedrecipes/.homestead/stubs/phpmyadmin.config.inc.php.dist /home/vagrant/phpmyadmin/config.inc.php
	chmod 755 /home/vagrant/phpmyadmin/config.inc.php

	#
	# Install new PHPMyAdmin Theme
	#
	sudo git clone https://git@github.com/mjohnson8165/pma8165-theme.git /home/vagrant/phpmyadmin/themes/pma8165
	sudo git clone https://git@github.com/techdev5521/phpmyadmin-Metro.git /home/vagrant/phpmyadmin/themes/metro

	#
	# Install some base packages
	# https://gist.github.com/linhmtran168/a3768339eaf9e1b4df2b
	#

	#
	# Update our PHP5-FPM Config with Env Variables
	#
	echo "updating php5-fpm config setting the environmental variables"
	# Update our php-fpm config with environmental variables
	sed -i "s/error_reporting = .*/error_reporting = E_ALL/" /etc/php5/fpm/php.ini
	sed -i "s/display_errors = .*/display_errors = On/" /etc/php5/fpm/php.ini
	sudo printf '\nenv[APP_ENV] = dev' >> /etc/php5/fpm/php-fpm.conf
	sudo service php5-fpm restart

	#
	# Update our PHP7.0-FPM Config with Env Variables
	#
	# echo "updating php7.0-fpm config setting the environmental variables"
	# # Update our php-fpm config with environmental variables
	# sudo printf '\nenv[APP_ENV] = dev' >> /etc/php/7.0/fpm/php-fpm.conf
	# # Disable xdebug
	# # symlink to /etc/php/7.0/cli/conf.d/20-xdebug.ini
	# sudo sed -i "s/zend_extension=xdebug.so.*/;zend_extension=xdebug.so/" /etc/php/mods-available/xdebug.ini
	# # Restart the service
	# sudo service php7.0-fpm restart

	#
	# Install Mcrypt needed for Larave 4.2 (php 7.0)
	#
	# sudo apt-get install mcrypt php7.0-mcrypt

	#
	# Install Socket.io, Express and ioRedis
	#
	echo 'installing pm2, express, ioredis and socket.io'
	npm install express ioredis socket.io --no-bin-links
	sudo npm install pm2@latest supervisor -g

	#
	# Install PhantomJS
	#
# 	sudo apt-get install phantomjs
# if [ ! -f /etc/supervisor/conf.d/phantomjs.conf ]; then
#   phantomjs_block="[program:phantomjs]
# command=phantomjs --webdriver=4444
# autostart=true
# autorestart=true
# stderr_logfile=/var/log/phantomjs.err.log
# stdout_logfile=/var/log/phantomjs.out.log"
#
#   echo "$phantomjs_block" > "/etc/supervisor/conf.d/phantomjs.conf"
#   supervisorctl reread
#   supervisorctl update
# fi

	#
	# Installing Webmin
	# https://www.virtualmin.com/download
	# Port 10000
	#
	# wget http://software.virtualmin.com/gpl/scripts/install.sh
	# sudo /bin/sh install.sh

	#
	# Installing Ajenti
	# The panel will be available on HTTPS port 8000. The default username is root, and the password is admin
	#
	# wget -O- https://raw.github.com/ajenti/ajenti/1.x/scripts/install-ubuntu.sh | sudo sh

	#
	# Fire Up Node socket.js and redis-server
	# You should see Listening on Port 3000
	#
	# pm2 start /home/vagrant/rippedrecipes/socket.js # YOU NEED THIS FILE FIRST
	# pm2 start redis-server -- --port 6001
	# pm2 startup

	#
	# Running migrations and seeds
	#
	sudo php /home/vagrant/rippedrecipes/artisan migrate --env=local
	sudo php /home/vagrant/rippedrecipes/artisan db:seed --env=local

	#
	# Installing PHP-CS-FIXER
	#
	sudo curl http://get.sensiolabs.org/php-cs-fixer.phar -o php-cs-fixer
	sudo chmod a+x php-cs-fixer
	sudo mv php-cs-fixer /usr/local/bin/php-cs-fixer

	touch /usr/local/extra_homestead_software_installed
else
	echo "extra software already installed... moving on..."
fi
