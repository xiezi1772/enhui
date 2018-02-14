{assign var="seotitle" value="在线留言"}
{include file="header.tpl"}
<div class="crumb">
	<div class="container">
		<ol class="breadcrumb row">
			<li class="active">当前位置: </li>
			{foreach from=$crumb item=cat}
			<li><a href="{$cat->url}">{$cat->name}</a></li>
			{/foreach}
			<li class="active">在线留言</li>
		</ol>
	</div>
</div>
<div class="container main-content">
	<div class="post col-sm-8 row">
		<div class="post-head">
			<h2>在线留言</h2>
		</div>
		<div class="post-content">
		<form action="{$siteurl}/comment.php" method="post">
			<table class="table table-striped">
				<tr><td class="w20">留言标题</td><td><input class="form-control" type="text" name="msgtitle" value="我对贵公司产品感兴趣"/></td></tr>
				<tr><td class="w20">您的姓名</td><td><input class="form-control" type="text" name="msgname"/></td></tr>
				<tr><td class="w20">联系方式</td><td><input class="form-control" type="text" name="msgcontact"/></td></tr>
				<tr><td class="w20">留言内容</td><td><textarea class="form-control" name="msgcontent" rows="10" cols="30"></textarea></td></tr>
				<tr><td class="w20">验证码</td><td><input class="form-control" type="text" name="capcode" style="width:80px;"/>&nbsp;<img style="cursor:pointer" src="{$siteurl}/captcha/captcha.php" onclick="$(this).attr('src','{$siteurl}/captcha/captcha.php?d='+Date())" /></td></tr>
				<tr><td class="w20">&nbsp;</td><td><input type="hidden" name="action" value="save"/><input class="btn btn-lg" type="submit" value="提交" /></td></tr>
			</table>
		</form>
		</div>
	</div>
	<div class="col-sm-4 sidebar row">
		<div class="widget">
			<h4 class="title">产品分类</h4>
			<div class="content community">
				{assign var="productcat" value=$categorydata->GetCategoryList(0,'product',0,'')}
				{foreach from=$productcat item=cattinfo}
				<p><a href="{formaturl type="category" siteurl=$siteurl name=$cattinfo->filename}" target="_blank">{$cattinfo->name}</a></p>
				{/foreach}
			</div>
		</div>
		<div class="widget">
			<h4 class="title">最新产品</h4>
			<div class="content">
				<ul>
					{assign var="newproductlist" value=$productdata->TakeProductList(0,0,6)}
					{foreach from=$newproductlist item=productinfo}
					<li><a href="{formaturl type="product" siteurl=$siteurl name=$productinfo->filename}">{$productinfo->name}</a></li>
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