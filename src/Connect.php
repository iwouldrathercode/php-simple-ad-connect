<?php

namespace Iwouldrathercode\SimpleADConnect;

class Connect
{
	public function __construct()
    {
        //
	}
	
	public function connect()
	{
		// using ldap bind
		$ldaprdn  = 'shankarg@sph.com.sg';     // ldap rdn or dn
		$ldappass = 'sp63Zgzn';  // associated password

		// connect to ldap server
		$ldapconn = ldap_connect("ldap://corpldap2.sphnet.com.sg:389")
			or die("Could not connect to LDAP server.");

		if ($ldapconn) {

			// binding to ldap server
			$ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);

			// verify binding
			if ($ldapbind) {
				echo "LDAP bind successful...";
			} else {
				echo "LDAP bind failed...";
			}

		}
    }
    
    public function connect_ldap() {

        echo "reached function".PHP_EOL;
        
		$username = 'shankarg';
		$password = 'sp63Zgzn';
        
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
			    echo "logged in";
			} else {
				echo "not logged in";	
			} 
		}			 

		//return !$this->errorCode;		
	}
}