<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
<meta name="renderer" content="webkit" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
<title>{if $seotitle != $sitename}{$seotitle} - {/if}{$sitename}</title>
{if $seokeywords != "-" && $seokeywords != ""}
<meta name="keywords" content="{$seokeywords}" />
{/if}
{if $seodescription != "-" && $seodescription != ""}
<meta name="description" content="{$seodescription}" />
{/if}
<meta name="generator" content="YiqiCMS {$yiqi_cms_version}" />
<meta name="author" content="SEOWHY XIAOLIANG" />
<meta name="copyright" content="copyright 2015 seowhy.com all rights reserved." />
<script type="text/javascript" src="{$siteurl}/images/jq.js"></script>
<script type="text/javascript" src="{$siteurl}/templets/{$templets->directory}/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{$siteurl}/templets/{$templets->directory}/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="{$siteurl}/templets/{$templets->directory}/js/user.js"></script>
<link href="{$siteurl}/templets/{$templets->directory}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="{$siteurl}/templets/{$templets->directory}/css/theme.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{$siteurl}/templets/{$templets->directory}/js/compatibility.js"></script>
<!--[if lte IE 8]>
	<script type="text/javascript" src="{$siteurl}/templets/{$templets->directory}/js/respond.js"></script>
<![endif]-->
</head>
<noscript unselectable="on" id="noscript">
    <div class="aw-404 aw-404-wrap container">
        <img src="{$siteurl}/templets/{$templets->directory}/images/404-logo.png">
        <p>你的浏览器禁用了JavaScript, 请开启后刷新浏览器获得更好的体验!</p>
    </div>
</noscript>
<body>
<div class="site-header">
	<div class="navbar navbar-default">
		<div class="container">
			<div class="row">
				<div class="logo pull-left hidden-sm"><a href="{$siteurl}"></a></div>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse-1" aria-expanded="false">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="bs-navbar-collapse-1">
					<ul class="nav navbar-nav">
						{assign var="topnavlist" value=$navdata->TakeNavigateList("顶部导航",0,10)}
						{foreach from=$topnavlist item=navinfo}
						<li {if $category->name == $navinfo->name}class="active"{/if}><a href="{$navinfo->url}" title="{$navinfo->name}">{$navinfo->name}</a></li>
						{/foreach}
					</ul>
					<ul class="nav navbar-nav navbar-right hidden-sm hidden-xs">
						<li><a href="{formaturl type="sitemap" siteurl=$siteurl name="sitemap.php"}">网站地图</a></li>
						<li><a href="javascript:;" onclick="AddFavorite('{$siteurl}','{$sitename}')">加入收藏</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="header-slide">
	<div id="slideBox" class="slideBox">
		{if $category->thumb}
		{assign var=catethumb value=$category->thumb|unserialize}
		{/if}
		{if $catethumb->image}
		<div class="hd">
		</div>
		<div class="bd">
			<ul>
				<li style="background-image:url({$catethumb->image})"><a href="{$catethumb->url}"></a></li>
			</ul>
		</div>
		{else}
		{assign var=lunbo_list value=$lunbo|unserialize}
		<div class="hd">
			{foreach from=$lunbo_list item=lunbo_info}
			{if $lunbo_info->active}
			<a></a>
			{/if}
			{/foreach}
		</div>
		<div class="bd">
			<ul>
				{foreach from=$lunbo_list item=lunbo_info}
				{if $lunbo_info->active}
				<li style="background-image:url({$lunbo_info->image})"><a href="{$lunbo_info->url}"><div class="bd_title">{$lunbo_info->title}</div></a></li>
				{/if}
				{/foreach}
			</ul>
		</div>
		{/if}
	</div>
</div>