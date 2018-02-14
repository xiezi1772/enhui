<div class="page-footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 friend-link">
				<div class="box-tit">友情链接</div>
				<div class="box-content">
					<ul>
						{assign var="linklist" value=$linkdata->GetLinkList()}
						{foreach from=$linklist item=linkinfo}
							<li><a href="{$linkinfo->url}" title="{$linkinfo->title}" target="_blank">{$linkinfo->title}</a></li>
						{/foreach}
					</ul>
				</div>
			</div>
			<div class="col-sm-4 common-link">
				<div class="box-tit">常见导航</div>
				<div class="box-content">
					<ul>
						{assign var="footnavlist" value=$navdata->TakeNavigateList("次导航",0,10)}
						{foreach from=$footnavlist item=navinfo}
							<li><a href="{$navinfo->url}" title="{$navinfo->name}">{$navinfo->name}</a></li>
						{/foreach}
					</ul>
				</div>
			</div>
			<div class="col-sm-4 company-info">
				<div class="box-tit"><span class="pull-right more"><a href="{formaturl type="article" siteurl=$siteurl name="contact"}">更多</a></span>公司信息</div>
				<div class="box-content">
					<ul>
						{if $companycontact != "" && $companycontact != "-"}
						<li><i class="glyphicon glyphicon-user"></i>联系人：{$companycontact}</li>
						{/if}
						{if $companyaddr != "" && $companyaddr != "-"}
						<li><i class="glyphicon glyphicon-map-marker"></i>地址：{$companyaddr}</li>
						{/if}
						{if $companyqq != "" && $companyqq != "-"}
						<li><i class="glyphicon glyphicon-phone"></i>Q&nbsp; Q：{$companyqq}</li>
						{/if}
						{if $companyphone != "" && $companyphone != "-"}
						<li><i class="glyphicon glyphicon-phone-alt"></i>电话：{$companyphone}</li>
						{/if}
						{if $companyemail != "" && $companyemail != "-"}
						<li><i class="glyphicon glyphicon-envelope"></i>邮箱：{$companyemail}</li>
						{/if}
					</ul>
				</div>
			</div>
		</div>
	</div>
	<center class="copyright">
		{$sitecopy} Powered by <a href="http://www.yiqicms.com/" target="_blank">YiqiCMS</a>-<a href="http://www.seowhy.com/" target="_blank">SEOWHY</a></div>
		{if $siteicp != "-" && $siteicp != ""}
		<div class="fr">{$siteicp}</div>
		{/if}
	</center>
	
	<div style="display:none">{$sitestat}</div>
</div>
</body>
</html>
