<?php 

error_reporting( E_ALL );
ini_set('display_errors', 1);
require('vendor/autoload.php');

use Sphtech\SimpleADConnect\Connect;
use JakubOnderka\PhpConsoleColor\ConsoleColor;

$coloredOutput = new ConsoleColor();

if(!isset($argv[1])) {
  echo $coloredOutput->apply("bg_color_1", "Username should be provided to login !".PHP_EOL);
  exit(1);
}
$username = $argv[1];

if(!isset($argv[2])) {
  echo $coloredOutput->apply("bg_color_1", "Password should be provided to login !".PHP_EOL);
  exit(1);
}
$password = $argv[2];

$connection = new Connect();

$connectionState = ($connection->attempt($username, $password)) ? "Logged in" : "Could not login";

echo $coloredOutput->apply("color_15", "Trying to connect with AD".PHP_EOL);
echo $coloredOutput->apply("color_15", $connectionState.PHP_EOL);
