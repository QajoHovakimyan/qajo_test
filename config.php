<?php
defined('ISHOP') or die('Access denied');
// Domain
define('PATH', 'http://localhost/qajik/Lesson-15/');
// Model
define('MODEL', 'model/model.php');
// Controller
define('CONTROLLER','controller/controller.php');
// Views
define('VIEW','views/');
// Active Template
define('TEMPLATE',VIEW.'ishop/');
// Զամբյուղի նկարների պանակ
define('PRODUCTIMG', PATH.'userfiles/');
// Server DB
define('HOST', 'localhost');
// User
define('USER', 'admin');
// Password
define('PASS', 'reg123');
// DB
define('DB', 'ishop');
// TITLE
define('TITLE', 'Առցանց խանութ | Բջջային հեռախոսներ');
mysql_connect(HOST, USER, PASS) or die('No connect to Server');
mysql_select_db(DB) or die('No connect to DB');
mysql_query("SET NAMES 'UTF8'") or die('Cant set charset');