<?php

namespace Iwouldrathercode\SimpleLdap;

use Exception;

class ActiveDirectory
{
    protected $options;

    /**
     * Constructor method to accept connection options
     *
     * @return void
     */
    public function __construct($options)
    {
        $this->options = $options;
    }
    
    /**
     * Method to login
     *
     * @param String $username
     * @param String $password
     *
     * @return Boolean
     */
    public function login($username, $password)
    {
        $options = $this->options;
        
        try {

            $dc_string = implode(".", $options['dc']);
            $connection = ldap_connect($options['host']);
            ldap_set_option($connection, LDAP_OPT_PROTOCOL_VERSION, 3);
            ldap_set_option($connection, LDAP_OPT_REFERRALS, 0);

        
            if ($connection) {
                $bind = @ldap_bind($connection, "{$username}@{$dc_string}", $password);
                if ($bind) {
                    return true;
                } else {
                    return false;
                }
            }

        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
