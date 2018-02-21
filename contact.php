<?php
require_once 'include/common.inc.php';
global $yiqi_db;
$sql = "select * from yiqi_settings where varname = 'companyaddr' limit 1";
$companyaddr = $yiqi_db->get_row(CheckSql($sql));

$url = 'http://api.map.baidu.com/geocoder?address='.$companyaddr->value.'&output=json&keyEFb04d2aba04d21fec7e0324cba7f40e&services=&t=20180201111639';

$data = json_decode(file_get_contents($url),true);
$lng = '120.540706';
$lat = '36.856381';

if($data['status'] == 'OK' && $location = $data['result']['location']) {
    $lng = $location['lng'];
    $lat = $location['lat'];
}

$tempinfo->assign('lng', $lng);
$tempinfo->assign('lat', $lat);

$tempinfo->display("contact.tpl");

?>