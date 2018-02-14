{assign var="seotitle" value=$category->seotitle}
{assign var="seokeywords" value=$category->seokeywords}
{assign var="seodescription" value=$category->seodescription}
{include file="header.tpl"}
<div class="crumb">
	<div class="container">
		<ol class="breadcrumb row">
			<li class="active">当前位置: </li>
			{foreach from=$crumb item=cat}
			<li><a href="{$cat->url}">{$cat->name}</a></li>
			{/foreach}
			<li class="active">{$category->name}</li>
		</ol>
	</div>
</div>
<div class="container main-content">
	<div class="post col-sm-8 row">
		<div class="post-head">
			<h2>{$category->name}</h2>
		</div>
		<div class="post-content article-list">
				{if ($total > 0)}
					{foreach from=$productlist item=productinfo}
						<div class="col-sm-4 col-md-3 col-xs-6 product-box">
							<a href="{formaturl type="product" siteurl=$siteurl name=$productinfo->filename}" target="_blank">
								<div class="image-box">
									<img onload="DrawImage(this);" src="{$productinfo->thumb}" title="{$productinfo->name}" alt="{$productinfo->name}"/>
								</div>
							</a>
							<p><a href="{formaturl type="product" siteurl=$siteurl name=$productinfo->filename}" target="_blank">{$productinfo->name}</a></p>
						</div>						
					{/foreach}
				{else}
				该分类下暂时没有内容
			    {/if}
		</div>
		<div class="post-footer clearfix">
			<div class="pagination" role="navigation">
				{assign var="nextpage" value="`$curpage+1`"}
				{assign var="prepage" value="`$curpage-1`"}
				{if ($curpage > 1)}
				<a class="newer-posts" href="{formaturl type="category" siteurl=$siteurl name=$category->filename}"><i class="glyphicon glyphicon-step-backward"></i></a>
				<a class="newer-posts" href="{formaturl type="category" siteurl=$siteurl name=$category->filename page=$prepage}"><i class="glyphicon glyphicon-chevron-left"></i></a>
				{/if}
				<span class="page-number">共{$total}个产品 当前{$curpage}/{$totalpage}页</span>
				{if ($curpage > 0) && ($curpage < $totalpage)}
				<a class="older-posts" href="{formaturl type="category" siteurl=$siteurl name=$category->filename page=$nextpage}"><i class="glyphicon glyphicon-chevron-right"></i></a>
				<a class="older-posts" href="{formaturl type="category" siteurl=$siteurl name=$category->filename page=$totalpage}"><i class="glyphicon glyphicon-step-forward"></i></a>
				{/if}
			</div>
		</div>
	</div>
	<div class="col-sm-4 sidebar row">
		<div class="widget">
			<div class="content">
				<form method="post" action="{formaturl type="category" siteurl=$siteurl name="search"}">
				<div class="input-group">
					<input type="hidden" class="form-control" name="type" value="product">
					<input type="text" class="form-control" name="q" placeholder="输入你想找的东西...">
					<span class="input-group-btn">
					<button class="btn btn-default" type="submit"> 搜索 </button>
					</span>
				</div>
				</form>
			</div>
		</div>
		<div class="widget">
			<h4 class="title">产品分类</h4>
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
				{assign var="productlist" value=$productdata->TakeProductList(0,0,6)}
				{foreach from=$productlist item=productinfo}
				<div class="col-xs-6 col-sm-12 col-md-6 product-box">
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