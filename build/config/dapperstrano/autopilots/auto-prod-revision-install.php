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
        if ( $this->checkIfFirstInstall() ) {
            $this->changeToFirstInstallValues(); }
        $this->setRevisionFolderName();
        $this->calculateVHostDocRoot();
        $this->setVHostTemplate();
    }

    /* Steps */
    private function setSteps() {
	    $this->steps =
	      array(
          array ( "Project" => array(
                    "projectContainerInitExecute" => true,
                    "projectContainerDirectory" => "/var/www/gcapplications/live/golden-contact/dave-does-delivery",
          ) , ) ,
          array ( "CheckoutGit" => array(
                    "gitCheckoutExecute" => true,
                    "gitCheckoutProjectOriginRepo" => "https://phpengine:codeblue041291@bitbucket.org/phpengine/dave-does-delivery.git",
                    "gitCheckoutCustomCloneFolder" => "",
                    "gitCheckoutCustomBranch" => "production",
                    "gitCheckoutWebServerUser" => "www-data",
          ) , ) ,
          array ( "Project" => array(
                    "projectInitializeExecute" => true,
          ) , ) ,
          array ( "VHostEditor" => array(
                    "virtualHostEditorAdditionExecute" => true,
                    "virtualHostEditorAdditionDocRoot" => "",
                    "virtualHostEditorAdditionURL" => "www.dave-does-delivery.co.uk",
                    "virtualHostEditorAdditionIp" => "178.63.72.156",
                    "virtualHostEditorAdditionTemplateData" => "",
                    "virtualHostEditorAdditionDirectory" => "/etc/apache2/sites-available",
                    "virtualHostEditorAdditionFileSuffix" => "",
                    "virtualHostEditorAdditionVHostEnable" => true,
                    "virtualHostEditorAdditionSymLinkDirectory" => "/etc/apache2/sites-enabled",
                    "virtualHostEditorAdditionApacheCommand" => "apache2",
          ) , ) ,
          array ( "DBConfigure" => array(
                    "dbResetExecute" => true,
                    "dbResetPlatform" => "joomla30",
          ) , ) ,
          array ( "DBConfigure" => array(
                    "dbConfigureExecute" => true,
                    "dbConfigureDBHost" => "127.0.0.1",
                    "dbConfigureDBUser" => "dddl_pr_user",
                    "dbConfigureDBPass" => "dddl_pr_pass",
                    "dbConfigureDBName" => "dddl_pr_db",
                    "dbConfigurePlatform" => "joomla30",
          ) , ) ,
          array ( "Version" => array(
                    "versionExecute" => true,
                    "versionAppRootDirectory" => "/var/www/gcapplications/live/golden-contact/dave-does-delivery",
                    "versionArrayPointToRollback" => "0",
                    "versionLimit" => "3",
          ) , ) ,
	      );
	  }


private function setRevisionFolderName() {
  $this->steps[1]["CheckoutGit"]["gitCheckoutCustomCloneFolder"] = time() ;
}

// This function will check if this is the first install
// You need to call this from your constructor
private function checkIfFirstInstall() {
  if (file_exists($this->steps[0]["Project"]["projectContainerDirectory"])) { return false; }
  else { return true; }
}

// This function will set the vhost template for your Virtual Host
// You need to call this from your constructor
private function calculateVHostDocRoot() {
  $this->steps[3]["VHostEditor"]["virtualHostEditorAdditionDocRoot"] =
    $this->steps[0]["Project"]["projectContainerDirectory"].'/current';
}

private function changeToFirstInstallValues() {
  $stepsStart = array_slice($this->steps, 0, 6, true);
  $stepsMid =
    array ( "DBInstall" => array(
      "dbInstallExecute" => true,
      "dbInstallDBHost" => "127.0.0.1",
      "dbInstallDBUser" => "dddl_pr_user",
      "dbInstallDBPass" => "dddl_pr_pass",
      "dbInstallDBName" => "dddl_pr_db",
      "dbInstallDBRootUser" => "gcLiveAdmin",
      "dbInstallDBRootPass" => "gcLive548989263592",
    ) , ) ;
  $stepsStart[] = $stepsMid;
  $stepsEnd = array_slice($this->steps, 6, 1, true);
  $newSteps = array_merge($stepsStart, $stepsEnd) ;
  $this->steps = $newSteps;
}

 // This function will set the vhost template for your Virtual Host
 // You need to call this from your constructor
private function setVHostTemplate() {
   $serverAlias = str_replace("www", "*", $this->steps[3]["VHostEditor"]["virtualHostEditorAdditionURL"]);
   $this->steps[3]["VHostEditor"]["virtualHostEditorAdditionTemplateData"] =
  <<<"TEMPLATE"
  NameVirtualHost ****IP ADDRESS****:80
  <VirtualHost ****IP ADDRESS****:80>
    ServerAdmin webmaster@localhost
 	  ServerName ****SERVER NAME****
    ServerAlias $serverAlias
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
    ServerAlias $serverAlias
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
