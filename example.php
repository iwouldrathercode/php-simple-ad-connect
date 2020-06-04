<?php 

error_reporting( E_ALL );
ini_set('display_errors', 1);
require('vendor/autoload.php');

use Iwouldrathercode\SimpleADConnect\Connect;
use JakubOnderka\PhpConsoleColor\ConsoleColor;

$connection = new Connect();
$coloredOutput = new ConsoleColor();

echo $coloredOutput->apply("color_15", "Trying to connect with AD".PHP_EOL);
echo $coloredOutput->apply("color_15", $connection->connect().PHP_EOL);
