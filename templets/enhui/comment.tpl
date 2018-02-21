{assign var="seotitle" value="在线留言"}
{include file="header.tpl"}
{literal}
<style>
	/*.main{margin: 0 auto;width: 60%;}*/
	.content{padding-top: 30px;}
	textarea{resize: none}
</style>
{/literal}
<div id="location_div">
	{foreach from=$crumb item=cat}
	<a href="{$cat->url}">{$cat->name}</a>  &gt; 
	{/foreach} 
	在线留言
</div>
<div id="middle_div_sub">
	<div id="left_box_sub">
	 	<ul id="category_sub_left">
			<li><a class="on"  href="">在线留言</a></li>
		</ul>
	</div>
	<div id="right_box_sub">
		<div id="title_sub"><span class="icon_red_square"></span><span class="txt">在线留言</span></div>
		<div class="content">
			<form action="{$siteurl}/comment.php" method="post">
			<table style="width:100%;line-height:30px;height:30px;">
				<tr><td class="w20">留言标题</td><td><input type="text" name="msgtitle" placeholder="标题要填写"/></td></tr>
				<tr><td class="w20">您的姓名</td><td><input type="text" name="msgname"/></td></tr>
				<tr><td class="w20">联系方式</td><td><input type="text" name="msgcontact"/></td></tr>
				<tr><td class="w20">留言内容</td><td><textarea name="msgcontent" rows="10" cols="30"></textarea></td></tr>
				<tr><td class="w20">验证码</td><td><input type="text" name="capcode" style="width:80px;"/>&nbsp;<img style="cursor:pointer" src="{$siteurl}/captcha/captcha.php" onclick="$(this).attr('src','{$siteurl}/captcha/captcha.php?d='+Date())" /></td></tr>
				<tr><td class="w20">&nbsp;</td><td><input type="hidden" name="action" value="save"/><input type="submit" value="提交" /></td></tr>
			</table>
			</form>
		</div>
		
	</div>
</div>
<div class="clearBoth"></div>
	<!--main end-->
{include file="footer.tpl"}