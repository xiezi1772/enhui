<?php
$checkregular = "false";
require_once 'admin.inc.php';
?>
<?php
$adminpagetitle = "管理首页";
include("admin.header.php");?>

<div class="main_body">

<div class="indexblock" onclick="window.location.href='article-add.php'">
<dl>
<dt>发布文章</dt>
<dd>发布公司动态,网站新闻等.</dd>
</dl> 
</div>

<div class="indexblock" onclick="window.location.href='product-add.php'">
<dl>
<dt>发布产品</dt>
<dd>发布供应产品,服务等信息.</dd>
</dl> 
</div>
<div class="indexblock" onclick="window.location.href='article.php?cid=1'">
<dl>
<dt>管理文章</dt>
<dd>管理,删除关于我们,联系方式等信息.</dd>
</dl> 
</div>
<div class="indexblock" onclick="window.location.href='product.php'">
<dl>
<dt>管理产品</dt>
<dd>管理,删除产品信息</dd>
</dl> 
</div>
<div class="clear">&nbsp;</div>
<div class="indexblock" onclick="window.location.href='company-option.php'">
<dl>
<dt>关于我们</dt>
<dd>这里设置的是网站首页关于我们的简介信息</dd>
</dl> 
</div>
<div class="indexblock" onclick="window.location.href='comments.php'">
<dl>
<dt>查看网站留言</dt>
<dd>查看客户留言</dd>
</dl> 
</div>
<div class="indexblock" onclick="window.location.href='link.php'">
<dl>
<dt>管理友情链接</dt>
<dd>管理,删除网站友情链接</dd>
</dl> 
</div>
<div class="indexblock" onclick="window.location.href='users.php'">
<dl>
<dt>管理用户</dt>
<dd>管理,删除网站用户</dd>
</dl> 
</div>

</div>

</div>

<div class="clear">&nbsp;</div>
<?php include("admin.footer.php");?>
</div>

</body>

</html>
