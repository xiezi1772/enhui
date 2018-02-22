<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title>{if $seotitle}{$seotitle} - {$sitename}{else}{$sitename}{/if}</title>
{if $seokeywords != "-" && $seokeywords != ""}
<meta name="keywords" content="{$seokeywords}" />
{/if}
{if $seodescription != "-" && $seodescription != ""}
<meta name="description" content="{$seodescription}" />
{/if}
 <!--[if IE 6]>
		<script src="js/pngAlaph.js"></script>
		<script>
			DD_belatedPNG.fix("*");
		</script>
<![endif]-->
<script type="text/javascript" language="javascript" src="{$siteurl}/templets/{$templets->directory}/js/common.js"></script>
<script type="text/javascript" language="javascript" src="{$siteurl}/templets/{$templets->directory}/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" language="javascript" src="{$siteurl}/templets/{$templets->directory}/js/unslider.min.js"></script>

<style type=text/css media=all>
	@import url({$siteurl}/templets/{$templets->directory}/css/main.css);
</style>
</head>
<body>
<div id="main_div">
	<div id="top_div">
		<div id="logo"><img src="{$siteurl}/templets/{$templets->directory}/images/logo.gif"></div>
		<div id="hotline"></div><div id="selectlanguage"><ul><li><span class="icon"></span><span class="txt"><a href="language.php?l=cn">中文</a></span></li><li><span class="icon"></span><span class="txt"><a href="language.php?l=en">English</a></span></li></ul></div>
	</div>
	<!--menu-->
	<div id="menu_div">
	{assign var="topnavlist" value=$navdata->TakeNavigateList("顶部导航",0,7)}
  <ul>
     <li class="first_node"><a href="{$siteurl}" {if $route eq $siteurl}class="current"{/if} >{if $language eq 'en'}Home{else}首&nbsp;页{/if}</a></li>
     {foreach from=$topnavlist item=navinfo name=n1}
     {assign var="existcategory" value=$categorydata->ExistCategory($navinfo->catid)}
     {assign var="existsubcategory" value=$categorydata->ExistSubCategory($navinfo->catid)}
     {if $navinfo->catid > 0 && $existcategory && $existsubcategory}
  	 <li class="line_node">&nbsp;</li>
  	 <li>
      {assign var="existchildcategory" value=$categorydata->ExistChildCategory($category->cid, $navinfo->catid)}
  	 	<a href="{$navinfo->url}" {if $category->cid eq $navinfo->catid || $existchildcategory}class="current"{/if} title="{$navinfo->name}" onmouseover='showSubNav("topNav_subMenu{$smarty.foreach.n1.index}",this);' onmouseout='leaveNavButton("topNav_subMenu{$smarty.foreach.n1.index}",this,event);'>{$navinfo->name}</a>
  	 </li>
  	 {else}
  	 <li class="line_node">&nbsp;</li>
     <li><a href="{$navinfo->url}" title="{$navinfo->name}"{if $route eq $navinfo->url}class="current"{/if} >{$navinfo->name}</a></li>
  	 {/if}
  	 {/foreach}
  </ul>
  </div>
  <div id=topNav_dropdownMenuDiv>
 	{foreach from=$topnavlist item=navinfos name=n2}
 	{assign var="existcategory" value=$categorydata->ExistCategory($navinfos->catid)}
 	{assign var="existsubcategory" value=$categorydata->ExistSubCategory($navinfos->catid)}
 	{if $navinfos->catid > 0 && $existcategory && $existsubcategory}
	{assign var="subcategory" value=$categorydata->GetSubCategory($navinfos->catid,$existsubcategory,"displayorder desc")}
	<DIV style="DISPLAY: none" id=topNav_subMenu{$smarty.foreach.n2.index} class=subMenuDiv 
      onmouseout="hideSubNav('topNav_subMenu{$smarty.foreach.n2.index}', event)" name="topNav_subMenu{$smarty.foreach.n2.index}">
	   <TABLE width="100%" border="0" cellpadding="0" cellspacing="0">
        <TBODY>
        <TR>
          <TD class=subMenuCell>
          	{foreach from=$subcategory item=subInfo}
          	<SPAN class=L2Grey><a href='{formaturl type="category" siteurl=$siteurl name=$subInfo->filename}'>{$subInfo->name}</a></SPAN>
          	{/foreach}
          </TD>
      	</TR>
      	</TBODY>
  	  </TABLE>
    </DIV>
	{/if}
 	{/foreach}
  </div>
  <div id="banner_div">
    {assign var=lunbo_list value=$lunbo|unserialize}
    <ul>
    {foreach from=$lunbo_list item=lunbo_info}
    <li><a href="{if $lunbo_info->url}{$lunbo_info->url}{else}javascript:;{/if}"><img src="{$lunbo_info->image}"></a></li>
    {/foreach}
    </ul>
</div>

{literal}
<script>
  $('#banner_div').unslider({
    dots: true,
    fluid: true
  });
</script>
{/literal}


