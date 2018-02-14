{assign var="seotitle" value=$product->seotitle}
{assign var="seokeywords" value=$product->seokeywords}
{assign var="seodescription" value=$product->seodescription}
{include file="header.tpl"}
<script src="{$siteurl}/templets/{$templets->directory}/js/product.js"></script>
<div class="crumb">
	<div class="container">
		<ol class="breadcrumb row">
			<li class="active">当前位置: </li>
			{foreach from=$crumb item=cat}
			<li><a href="{$cat->url}">{$cat->name}</a></li>
			{/foreach}
			<li class="active">{$product->name}</li>
		</ol>
	</div>
</div>
<div class="container main-content">
	<div class="post col-sm-8 row">
		<div class="post-head">
			<div class="product-meta">
				<div class="product-thumb col-sm-5">
					<div class="productthumbslide">
						{assign var="productthumb" value=$attachdata->GetAttachByItemId($product->pid, 'product')}
						<div class="picFocus" id="product-slide">
							<div class="bdthumb">
								<ul>
								{foreach from=$productthumb item=thumbval}
									<li><a target="_blank" href="{$thumbval->file_location}"><img src="{$thumbval->file_location}" /></a></li>
								{/foreach}
								</ul>
							</div>
							<div class="hdthumb">
								<ul>
								{foreach from=$productthumb item=thumbval}
									<li><img src="{$thumbval->file_location}" /></li>
								{/foreach}
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="product-info col-sm-7">
					<h1>{$product->name}</h1>
					<dl>
						<dt>发布时间：</dt>
						<dd>{$product->adddate}</dd>
					</dl>
					<dl>
						<dt>浏览量：</dt>
						<dd>{$product->viewcount}次</dd>
					</dl>
					{assign var="metalist" value=$metadata->GetMetaList('product',$product->pid)}
					{foreach from=$metalist item=metainfo}
					{if $metainfo->metaname}
					<dl>
						<dt>{$metainfo->metaname}：</dt>
						<dd>{$metainfo->metavalue}</dd>
					</dl>
					{/if}
					{/foreach}
				</div>
			</div>
		</div>
		<div class="post-content">
		<div class="product-content"><h3>产品介绍</h3></div>
		{$product->content}
		</div>
		<div class="post-footer clearfix">
			<div class="pull-left">
				{assign var=prevproduct value=$productdata->GetPrevProduct($product)}
				上一产品:
				{if $prevproduct->name != ""}
				<a href="{formaturl type="product" siteurl=$siteurl name=$prevproduct->filename}">{$prevproduct->name}</a>
				{else}
				没有了
				{/if}
			</div>

			<div class="pull-right">
				{assign var=nextproduct value=$productdata->GetNextProduct($product)}
				下一产品:
				{if $nextproduct->name != ""}
				<a href="{formaturl type="product" siteurl=$siteurl name=$nextproduct->filename}">{$nextproduct->name}</a>
				{else}
				没有了
				{/if}
			</div>
		</div>
	</div>
	<div class="col-sm-4 sidebar row">
		<div class="widget">
			<h4 class="title">相关分类</h4>
			<div class="content community">
				{assign var="newscat" value=$categorydata->GetCategoryList(0,'product',0,'')}
				{foreach from=$newscat item=cattinfo}
				<p><a href="{formaturl type="category" siteurl=$siteurl name=$cattinfo->filename}" target="_blank">{$cattinfo->name}</a></p>
				{/foreach}
			</div>
		</div>
		<div class="widget">
			<h4 class="title">最新产品</h4>
			<div class="content">
				<ul>
					{assign var="newproductlist" value=$productdata->TakeProductList($product->cid,0,6)}
					{foreach from=$newproductlist item=productinfo}
					<div class="col-xs-6 col-sm-12 col-md-6 product-box">
						<a href="{formaturl type="product" siteurl=$siteurl name=$productinfo->filename}" target="_blank">
							<div class="image-box">
								<img onload="DrawImage(this);" src="{$productinfo->thumb}" title="{$productinfo->name}" alt="{$productinfo->name}"/>
							</div>
						</a>
						<p><a href="{formaturl type="product" siteurl=$siteurl name=$productinfo->filename}" target="_blank">{$productinfo->name}</a></p>
					</div>
					{/foreach}
				</ul>
			</div>
		</div>
		<div class="widget">
			<h4 class="title">相关产品</h4>
			<div class="content">
				<ul>
					{assign var="realtedproductlist" value=$productdata->TakeProductList($product->cid,0,6,"viewcount desc")}
					{foreach from=$realtedproductlist item=productinfo}
					<div class="col-xs-6 col-sm-12 col-md-6 product-box">
						<a href="{formaturl type="product" siteurl=$siteurl name=$productinfo->filename}" target="_blank">
							<div class="image-box">
								<img onload="DrawImage(this);" src="{$productinfo->thumb}" title="{$productinfo->name}" alt="{$productinfo->name}"/>
							</div>
						</a>
						<p><a href="{formaturl type="product" siteurl=$siteurl name=$productinfo->filename}" target="_blank">{$productinfo->name}</a></p>
					</div>
					{/foreach}
				</ul>
			</div>
		</div>
		<div class="widget">
			<h4 class="title">标签库</h4>
			<div class="content tag-cloud">
				{assign var="keywordlist" value=$keyworddata->TakeKeywordsList(0,10)}
				{foreach from=$keywordlist item=keyinfo}
				<a href="{$keyinfo->url}" title="{$keyinfo->name}" target="_blank">{$keyinfo->name}</a>
				{/foreach}
			</div>
		</div>
	</div>
</div>
{include file="footer.tpl"}