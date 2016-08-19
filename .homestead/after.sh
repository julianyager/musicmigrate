#!/bin/sh

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.
# Example: https://github.com/spatie/homestead-custom/blob/master/after.sh
# Example Production Push: http://stackoverflow.com/questions/23841089/run-provisioning-scripts-per-project-in-laravel-homestead

if [ ! -f /usr/local/extra_homestead_software_installed ]; then
	echo 'installing some extra software'

	#
	# Updated our MOTD
	#
	sudo rm -rf /etc/motd
	sudo cp /home/vagrant/musicmigrate/.homestead/stubs/motd /etc/motd

	#
	# Install PHPMyAdmin
	#
	echo 'installing and setting permissions on phpmyadmin config'
	sudo rm -rf /home/vagrant/phpmyadmin/*
	sudo composer create-project phpmyadmin/phpmyadmin temp --repository-url=https://www.phpmyadmin.net/ --working-dir=/home/vagrant/phpmyadmin --quiet
	sudo cp -r /home/vagrant/phpmyadmin/temp/* /home/vagrant/phpmyadmin
	sudo rm -rf /home/vagrant/phpmyadmin/temp
	cp /home/vagrant/musicmigrate/.homestead/stubs/phpmyadmin.config.inc.php.dist /home/vagrant/phpmyadmin/config.inc.php
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
	# Running migrations and seeds
	#
	sudo php /home/vagrant/musicmigrate/artisan migrate --env=local
	sudo php /home/vagrant/musicmigrate/artisan db:seed --env=local

	touch /usr/local/extra_homestead_software_installed
else
	echo "extra software already installed... moving on..."
fi
