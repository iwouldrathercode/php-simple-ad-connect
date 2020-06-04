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
}