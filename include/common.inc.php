<?php
ini_set('display_errors',0);
error_reporting(0);
define("YIQIINC",preg_replace("/[\/\\\\]{1,}/i", '/', dirname(__FILE__) ));
define("YIQIROOT",preg_replace("/[\/\\\\]{1,}/i", '/', substr(YIQIINC,0,-8) ));
define("YIQIPATH", str_replace(GetRootPath(), "", YIQIROOT.'/'));
header("content-type:text/html; charset=utf-8");

require_once 'common.func.php';
require_once 'data.class.php';
require_once 'templets.inc.php';
require_once 'version.php';
if(phpversion() > '5.1.0')
    date_default_timezone_set('Asia/Shanghai');
$tempinfo->Crumb('网站首页');
function GetRootPath()
{
	$sRealPath = realpath('.');
	$sSelfPath = $_SERVER['PHP_SELF'];
	$sSelfPath = str_replace('//','/',$sSelfPath);
	$sSelfPath = substr( $sSelfPath, 0, strrpos($sSelfPath, '/'));
	return preg_replace("/[\/\\\\]{1,}/i", '/',substr( $sRealPath, 0, strlen($sRealPath) - strlen($sSelfPath)));
}
?>