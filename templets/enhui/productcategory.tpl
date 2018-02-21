{include file="header.tpl"}
{include file="require.tpl"}
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
		<ul class="recommendProduct_UL_02">
			{if ($total > 0)}
			{foreach from=$productlist item=productinfo}
			<li>
				<div class="left_pic">
					<a href={if $productinfo->protype eq 'images'}{$productinfo->thumb} rel="lightbox[plants]" {else}"{formaturl type="product" siteurl=$siteurl name=$productinfo->filename}"{/if} title="{$productinfo->name}" target="_blank">
						<img src="{$productinfo->thumb}" width="155" height="129" border=0 onerror="this.src='{$siteurl}/templets/{$templets->directory}/images/none_347.gif'"  alt="{$productinfo->name}">
					</a>
					<span class="product_name" title="{$productinfo->name}">{$productinfo->hname}</span>
				</div>
			</li>
			{/foreach}
			{else}
			该分类下暂时没有内容
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
