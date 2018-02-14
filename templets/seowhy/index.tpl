{assign var="seotitle" value=$titlekeywords}
{assign var="seokeywords" value=$metakeywords}
{assign var="seodescription" value=$metadescription}
{include file="header.tpl"}
<div class="container main-content">
	<div class="company-description index-box">
		<div class="box-tit"><b class="color-red">ABOUT<span>US</span></b> 公司简介</div>
		<div class="col-xs-12">{$companysummary}
		</div>
	</div>
	<div class="index-box index-product">
		<div class="box-tit">
			<span class="pull-right more"><a href="{formaturl type="category" siteurl=$siteurl name="default"}">更多</a></span>
			<div class="pull-right category-more hidden-xs">
			{assign var="productcat" value=$categorydata->GetCategoryList(0,'product',0,'')}
			{foreach from=$productcat item=cattinfo}
			<a href="{formaturl type="category" siteurl=$siteurl name=$cattinfo->filename}" target="_blank">{$cattinfo->name}</a>
			{/foreach}
			</div>
			<b class="color-red">NEWEST<span>PRODUCT</span></b> 最新产品
		</div>
		<div class="box-content">
			{assign var="productlist" value=$productdata->TakeProductList(0,0,6)}
			{foreach from=$productlist item=productinfo}
				<div class="col-sm-4 col-md-2 col-xs-6 product-box">
					<a href="{formaturl type="product" siteurl=$siteurl name=$productinfo->filename}" target="_blank">
						<div class="image-box">
							<img onload="DrawImage(this);" src="{$productinfo->thumb}" title="{$productinfo->name}" alt="{$productinfo->name}"/>
						</div>
					</a>
					<p><a href="{formaturl type="product" siteurl=$siteurl name=$productinfo->filename}" target="_blank">{$productinfo->name}</a></p>
				</div>
			{/foreach}
		</div>
		
	</div>
	<div class="index-box index-news">
		<div class="box-tit">
			<span class="pull-right more"><a href="{formaturl type="category" siteurl=$siteurl name="news"}">更多</a></span>
			<div class="pull-right category-more hidden-xs">
			{assign var="newscat" value=$categorydata->GetCategoryList(0,'article',0,'')}
			{foreach from=$newscat item=catinfo}
			<a href="{formaturl type="category" siteurl=$siteurl name=$catinfo->filename}" target="_blank">{$catinfo->name}</a>
			{/foreach}
			</div>
			<b class="color-red">NEWEST<span>NEWS</span></b> 公司动态
		</div>
		<div class="col-sm-6">
			<ul>
				{assign var="newslist" value=$articledata->TakeArticleListByName("news",0,3)}
				{foreach from=$newslist item=newsinfo}
				<li>
					<a href="{formaturl type="article" siteurl=$siteurl name=$newsinfo->filename}" title="{$newsinfo->title}" target="_blank">{$newsinfo->title}</a>
					<p class="description">{$newsinfo->content|strip_tags|truncate:130:"…":true}<p>
				</li>
				{/foreach}
			</ul>
		</div>
		<div class="col-sm-6">
			<ul>
				{assign var="newslist" value=$articledata->TakeArticleListByName("news",3,3)}
				{foreach from=$newslist item=newsinfo}
				<li>
					<a href="{formaturl type="article" siteurl=$siteurl name=$newsinfo->filename}" title="{$newsinfo->title}" target="_blank">{$newsinfo->title}</a>
					<p class="description">{$newsinfo->content|strip_tags|truncate:130:"…":true}<p>
				</li>
				{/foreach}
			</ul>
		</div>
		
	</div>
</div>
{include file="footer.tpl"}