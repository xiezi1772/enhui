{assign var="seotitle" value=$article->seotitle}
{assign var="seokeywords" value=$article->seokeywords}
{assign var="seodescription" value=$article->seodescription}
{include file="header.tpl"}
  <div id="location_div">
  	{foreach from=$crumb item=cat}
  	<a href="{$cat->url}">{$cat->name}</a>  &gt; 
  	{/foreach} 
  	{$article->title}
  </div>
  <!--middle-->
  <div id="middle_div_sub">
		{include file="side.tpl"}
		<div id="right_box_sub">
			<div id="title_sub"><span class="icon_red_square"></span><span class="txt">{$category->name}</span></div>
						<div id="article_p">
		          <div id="title_info">{$article->title}</div>
	              <div id="news_content">{$article->content}</div>
                  <div id="news_date"><div id="newsDate_left">{if $language eq 'en'}add Time:{else}发布时间：{/if}{$article->adddate}</div><div id="newsDate_right"><a href="javascript:history.back(-1);">&lt; {if $language eq 'en'}Back{else}返回{/if} &gt;</a></div></div>
		   </div>
		</div>
	</div>
   <div class="clearBoth"></div>

</div>
 <!--footer-->
{include file="footer.tpl"}

