#!/bin/bash
#Add dev website
username=$1
fqdn=$2
domain=$3

#Dev_________________________________________________________________________
#Create repository dev_html
if [ -d /var/www/$username/$fqdn.${domain}_dev_html ]; then
	echo "Repository /$username/$fqdn.$domain_dev_html already exist !"
else
	sudo mkdir /var/www/$username/$fqdn.${domain}_dev_html
	sudo chown $username /var/www/$username/$fqdn.${domain}_dev_html
	sudo echo "Repository /var/www/$username/$fqdn.$domain_dev_html created !"
fi

#Creating dev web page for dev_html
if [ -e /var/www/$username/$fqdn.${domain}_dev_html/index.php ]; then
	echo "File /$username/$fqdn.$domain_dev_html/index.php already exist !"
else
	sudo touch /var/www/$username/$fqdn.${domain}_dev_html/index.php
	sudo echo "Bienvenue sur dev.$fqdn.$domain !" | sudo tee /var/www/$username/$fqdn.${domain}_dev_html/index.php
	sudo chown $username /var/www/$username/$fqdn.${domain}_dev_html/index.php
	sudo echo "File /$fqdn.$domaine_dev_html/index.php created !"
fi

#Create dev_$domain.conf
if [ -e /etc/apache2/sites-available/dev_$fqdn.$domain.conf ]; then
	sudo echo "File dev_$fqdn.$domain.conf already exist !"
else
	sudo touch /etc/apache2/sites-available/dev_$fqdn.$domain.conf
	sudo echo "<VirtualHost *:80>" | sudo tee /etc/apache2/sites-available/dev_$fqdn.$domain.conf
	sudo echo "	ServerName dev.$fqdn.$domain" | sudo tee -a /etc/apache2/sites-available/dev_$fqdn.$domain.conf
	sudo echo "	Documentroot /var/www/$username/$fqdn.${domain}_dev_html" | sudo tee -a /etc/apache2/sites-available/dev_$fqdn.$domain.conf
	sudo echo "</VirtualHost>" | sudo tee -a /etc/apache2/sites-available/dev_$fqdn.$domain.conf
	sudo echo "File /sites-available/dev_$fqdn.$domain.conf created !"
fi
sudo chown -R $username:www-data /var/www/$username
sudo chmod -R 770 /var/www/$username
sudo service apache2 reload
