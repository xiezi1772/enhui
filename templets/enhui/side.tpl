<div id="left_box_sub">
 	<ul id="category_sub_left">
 		{if (count($subcatelist) > 0)}
 		{foreach from=$subcatelist item=categoryinfo}
		<li><a class="{if $category->cid eq $categoryinfo->cid}on{else}out{/if}"  href="{formaturl type="category" siteurl=$siteurl name=$categoryinfo->filename}">{$categoryinfo->name}</a></li>
		{/foreach}
		{/if}
	</ul>
</div>