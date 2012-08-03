<?php
global $cfg;
$cfg = array();
$cfg['db'] = array();

$isWEB = isset($_SERVER['REMOTE_ADDR']);

require_once('./config.php');

require_once('./lib/conn.php');
require_once('./lib/base.php');
require_once('./lib/basedb.php');
require_once('./lib/basedbobj.php');
require_once('./lib/basedbselector.php');
BaseDB::init();

require_once('./lib/account.php');
require_once('./lib/accounts.php');
require_once('./lib/character.php');
require_once('./lib/characters.php');
?>
