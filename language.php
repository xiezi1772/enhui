<?php 
$default_lang = 'cn'; // 默认语言
if($l = $_GET['l']) {
	$default_lang = in_array($l, array('cn','en'))?$l:$default_lang;
}

setcookie('language',$default_lang);

if ($_SERVER['SERVER_PORT'] == 443)
{
	$scheme = 'https';
}
else
{
	$scheme = 'http';
}
$siteurl =  $scheme . '://' . $_SERVER['HTTP_HOST'];

header('Location:'.$siteurl);

 ?>