<?php error_reporting( E_ERROR ); ?>
<?php
// config.php ֆայլին միացման արգելում
define('ISHOP', TRUE);
// config.php ֆայլի միացում
require_once 'config.php';
// controller.php ֆայլի միացում
require_once CONTROLLER;