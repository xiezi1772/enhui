<?php
require_once '../include/common.inc.php';
require_once 'userauth.php';
function getset($varname)
{
	if($varname == 'siteurl'){
		$siteurl->value = siteurl();
		return $siteurl;
	}
	global $yiqi_db;
	$sql = "select * from yiqi_settings where varname = '$varname' limit 1";
	return $yiqi_db->get_row(CheckSql($sql));
}
function upset($varname,$value)
{
	global $yiqi_db;
	$sql = "update yiqi_settings set value = '$value' where varname = '$varname' limit 1";
	$yiqi_db->query(CheckSql($sql));
}
?>