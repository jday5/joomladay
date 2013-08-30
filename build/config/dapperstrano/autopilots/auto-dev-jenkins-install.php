<?php

/*************************************
*      Generated Autopilot file      *
*     ---------------------------    *
*Autopilot Generated By Dapperstrano *
*     ---------------------------    *
*************************************/

Namespace Core ;

class AutoPilotConfigured extends AutoPilot {

    public $steps ;

    public function __construct() {
	      $this->setSteps();
        $this->calculateVHostDocRoot();
        $this->setVHostTemplate();
    }

    /* Steps */
    private function setSteps() {

	    $this->steps =
	      array(
          array ( "Project" => array(
                    "projectInitializeExecute" => true,
          ) , ) ,
          array ( "HostEditor" => array(
                    "hostEditorAdditionExecute" => true,
                    "hostEditorAdditionIP" => "127.0.0.1",
                    "hostEditorAdditionURI" => "dave-does-delivery.dev-jenkins.tld",
          ) , ) ,
          array ( "VHostEditor" => array(
                    "virtualHostEditorAdditionExecute" => true,
                    "virtualHostEditorAdditionDocRoot" => "",
                    "virtualHostEditorAdditionURL" => "dave-does-delivery.dev-jenkins.tld",
                    "virtualHostEditorAdditionIp" => "127.0.0.1",
                    "virtualHostEditorAdditionTemplateData" => "",
                    "virtualHostEditorAdditionDirectory" => "/etc/apache2/sites-available",
                    "virtualHostEditorAdditionFileSuffix" => "",
                    "virtualHostEditorAdditionVHostEnable" => true,
                    "virtualHostEditorAdditionSymLinkDirectory" => "/etc/apache2/sites-enabled",
                    "virtualHostEditorAdditionApacheCommand" => "httpd",
          ) , ) ,
          array ( "DBConfigure" => array(
                    "dbResetExecute" => true,
                    "dbResetPlatform" => "joomla30",
          ) , ) ,
          array ( "DBConfigure" => array(
                    "dbConfigureExecute" => true,
                    "dbConfigureDBHost" => "127.0.0.1",
                    "dbConfigureDBUser" => "dddl_ts_user",
                    "dbConfigureDBPass" => "dddl_ts_pass",
                    "dbConfigureDBName" => "dddl_ts_name",
                    "dbConfigurePlatform" => "joomla30",
          ) , ) ,
          array ( "DBInstall" => array(
                    "dbDropExecute" => true,
                    "dbDropDBHost" => "127.0.0.1",
                    "dbDropDBName" => "dddl_ts_db",
                    "dbDropDBRootUser" => "gcTestAdmin",
                    "dbDropDBRootPass" => "gcTest1234",
                    "dbDropUserExecute" => true,
                    "dbDropDBUser" => "dddl_ts_user",
          ) , ) ,
          array ( "DBInstall" => array(
                    "dbInstallExecute" => true,
                    "dbInstallDBHost" => "127.0.0.1",
                    "dbInstallDBUser" => "dddl_ts_user",
                    "dbInstallDBPass" => "dddl_ts_pass",
                    "dbInstallDBName" => "dddl_ts_name",
                    "dbInstallDBRootUser" => "gcTestAdmin",
                    "dbInstallDBRootPass" => "gcTest1234",
          ) , ) ,
	      );

	  }



 // This function will set the vhost template for your Virtual Host
 // You need to call this from your constructor
 private function calculateVHostDocRoot() {
   $this->steps[2]["VHostEditor"]["virtualHostEditorAdditionDocRoot"] = getcwd();
 }

 // This function will set the vhost template for your Virtual Host
 // You need to call this from your constructor
 private function setVHostTemplate() {
   $this->steps[2]["VHostEditor"]["virtualHostEditorAdditionTemplateData"] =
<<<'TEMPLATE'
 NameVirtualHost ****IP ADDRESS****:80
 <VirtualHost ****IP ADDRESS****:80>
   ServerAdmin webmaster@localhost
 	ServerName ****SERVER NAME****
 	DocumentRoot ****WEB ROOT****/src
 	<Directory ****WEB ROOT****/src>
 		Options Indexes FollowSymLinks MultiViews
 		AllowOverride All
 		Order allow,deny
 		allow from all
 	</Directory>
   ErrorLog /var/log/apache2/error.log
   CustomLog /var/log/apache2/access.log combined
 </VirtualHost>

 NameVirtualHost ****IP ADDRESS****:443
 <VirtualHost ****IP ADDRESS****:443>
 	 ServerAdmin webmaster@localhost
 	 ServerName ****SERVER NAME****
 	 DocumentRoot ****WEB ROOT****/src
   # SSLEngine on
 	 # SSLCertificateFile /etc/apache2/ssl/ssl.crt
   # SSLCertificateKeyFile /etc/apache2/ssl/ssl.key
   # SSLCertificateChainFile /etc/apache2/ssl/bundle.crt
 	 <Directory ****WEB ROOT****/src>
 		 Options Indexes FollowSymLinks MultiViews
		AllowOverride All
		Order allow,deny
		allow from all
	</Directory>
  ErrorLog /var/log/apache2/error.log
  CustomLog /var/log/apache2/access.log combined
  </VirtualHost>
TEMPLATE;
}


}
