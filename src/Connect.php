<?php

namespace Sphtech\SimpleADConnect;

class Connect
{
	public function __construct()
    {
        //
	}
    
    public function attempt($username, $password) {

        echo "reached function".PHP_EOL;
        
        echo "user, pass initiated".PHP_EOL;

		$options = [
			'host' => 'ldap://corpldap2.sphnet.com.sg:389',
			'ou' => 'sph', // such as "people" or "users"
			'dc' => array('sphnet','com','sg'),
		];
        
        echo "options initiated".PHP_EOL;

		$dc_string = implode(".",$options['dc']);
		$connection = ldap_connect($options['host']);
		ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);
        

        echo "tried ldap_connect".PHP_EOL;

        echo $connection;

		if($connection)
		{

            echo "trying to bind".PHP_EOL;
            
		    $bind = @ldap_bind($connection, "{$username}@{$dc_string}", $password) or die("Could not bind to LDAP");
            
            echo "after bind".PHP_EOL;

            if($bind){
                return true;
			} else {
                return false;
			} 
		}	
	}
}