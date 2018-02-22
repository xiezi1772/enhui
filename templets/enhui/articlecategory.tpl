{assign var="seotitle" value=$category->seotitle}
{assign var="seokeywords" value=$category->seokeywords}
{assign var="seodescription" value=$category->seodescription}
{include file="header.tpl"}
  <div id="location_div">
  	{foreach from=$crumb item=cat}
  	<a href="{$cat->url}">{$cat->name}</a>  &gt; 
  	{/foreach} 
  	{$category->name}
  </div>
  <!--middle-->
  <div id="middle_div_sub">
		{include file="side.tpl"}
		<div id="right_box_sub">
			<div id="title_sub"><span class="icon_red_square"></span><span class="txt">{$category->name}</span></div>
			<div id="article_p">
			<ul class="news_UL_3">
			{if ($total > 0)}
       			{foreach from=$articlelist item=artinfo} 
				<li>
				<div class="title"><span class="icon">&nbsp;</span><span class="title_news"><a href="{formaturl siteurl=$siteurl type="article" name=$artinfo->filename}" title="{$artinfo->title}">{$artinfo->title}</a></span><span class="date">{$artinfo->adddate}</span></div>
				</li>
				{/foreach}
			{else}
				<li>{if $language eq 'en'}No content{else}该分类下暂时没有内容{/if}</li>
			{/if}
   			 </ul>
   			 <div class="pager-links">
   			 {if ($total > 0)}
   			 	{if ($curpage > 1)}
   			 	<a href="{formaturl type="category" siteurl=$siteurl name=$category->filename}">&lt;</a>
   			 	{else}
   			 	 &lt; 
   			 	{/if}
   			 	{section name=page loop=$totalpage}
   			 	<b>
   			 	{if $curpage eq $smarty.section.page.iteration}
   			 	<span class="t2"> {$smarty.section.page.iteration} </span>
   			 	{else}
   			 	<a href="{formaturl type="category" siteurl=$siteurl name=$category->filename page=$smarty.section.page.iteration}" class="t3"> {$smarty.section.page.iteration} </a>
   			 	{/if}
   			 	</b>
   			 	{/section}
   			 	{if ($curpage ge $totalpage)}
   			 	 &gt;
   			 	{else}
   			 	<a href="{formaturl type="category" siteurl=$siteurl name=$category->filename page=$smarty.section.page.iteration}">&gt;</a>
   			 	{/if}
   			 {/if}
   			 </div>		
		</div>
		</div>
	</div>
   <div class="clearBoth"></div>
 </div>
 <!--footer-->
{include file="footer.tpl"}