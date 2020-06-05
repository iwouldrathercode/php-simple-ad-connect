<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require('vendor/autoload.php');

use Iwouldrathercode\SimpleLdap\ActiveDirectory;
use JakubOnderka\PhpConsoleColor\ConsoleColor;

$coloredOutput = new ConsoleColor();

if (!isset($argv[1])) {
    echo $coloredOutput->apply("bg_color_1", "Username should be provided to login !".PHP_EOL);
    exit(1);
}
$username = $argv[1];

if (!isset($argv[2])) {
    echo $coloredOutput->apply("bg_color_1", "Password should be provided to login !".PHP_EOL);
    exit(1);
}
$password = $argv[2];

$options = [
  'host' => getenv('LDAP_HOST'),
  'ou' => getenv('LDAP_OU'),
  'dc' => explode("|", getenv('LDAP_DC')),
];

$connection = new ActiveDirectory($options);

$connectionState = ($connection->login($username, $password)) ? "Logged in" : "Could not login";

echo $coloredOutput->apply("color_15", "Trying to connect with AD".PHP_EOL);
echo $coloredOutput->apply("color_15", $connectionState.PHP_EOL);
