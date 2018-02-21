{include file="header.tpl"}
{include file="require.tpl"}
{literal}
<style type="text/css" media="screen">
.scroll_div{
width:965px;
margin:0px auto;
overflow:hidden;
float: left;
height:135px;
}
.scroll_div ul{width:1600px;padding:0px;margin:0px;list-style:none;}
.scroll_div li{
width:135px;
float:left;
padding-top: 0px;
padding-right: 10px;
padding-bottom: 0px;
padding-left: 10px;
text-align:center;}
.name_product{padding-top:8px;}
</style>
{/literal}
<!--middle-->
  <div id="middle_div">
  	<!--profile-->
	<div id="profile_index_div">
	  <div><a href="about_us.asp"><img src="{$siteurl}/templets/{$templets->directory}/images/cn/bar_profile.gif" border="0"></a></div>
	  <div id="content">{$companysummary}</div>
	  <div><img src="{$siteurl}/templets/{$templets->directory}/images/cn/link_index.gif" border="0" usemap="#Map">
      <map name="Map">
        <area shape="rect" coords="475,5,584,58" href="company_history.asp">
        <area shape="rect" coords="312,8,421,61" href="/cn/advantage.asp">
        <area shape="rect" coords="161,7,270,60" href="/cn/human_resource.asp">
        <area shape="rect" coords="10,7,119,60" href="/cn/equipment.asp">
      </map>
	</div>
	</div>
	<div id="contacts_index">
	<div id="bar">联系方式</div>
	<div id="content"><img src="{$siteurl}/templets/{$templets->directory}/images/contacts.jpg" width="132" height="115" align="right">
	  	电话：{$companyphone}<br>
	  	传真：{$companyfax}<br>
		地址：{$companyaddr}<br>
		QQ： {$companyqq}<br>
		邮箱：{$companyemail}	
	</div>
	</div>
	<!--case-->
	<div id="case_index_div">
		<div id="bar">工程业绩</div>
		<div id="content"><div class="scroll_div" id="scroll_div_img">
    <ul id="scroll_div_img_ul">
		{assign var="productlist" value=$productdata->TakeProductList(0,0,20)}
		{foreach from=$productlist item=productinfo}
		<li>
			<a href={if $productinfo->protype eq 'images'}{$productinfo->thumb} rel="lightbox[plants]" {else}"{formaturl type="product" siteurl=$siteurl name=$productinfo->filename}"{/if} title="{$productinfo->name}" target="_blank"><img src="{$productinfo->thumb}" width="135" height="112" border=0 onerror="this.src='{$siteurl}/templets/{$templets->directory}/images/none_347.gif'"></a><div class="name_product">
				<a href="{if $productinfo->protype eq 'images'}javascript:;{else}{formaturl type="product" siteurl=$siteurl name=$productinfo->filename}{/if}" title="{$productinfo->name}" target="_parent">{$productinfo->name}</a>
			</div>
		</li> 
		{/foreach}
<!-- <li><a href=bookpic/201691317332285162.jpg rel="lightbox[plants]" title="宝钢型钢RF500项目厂房改造、设备安装" target="_blank"><img src="bookpic/201691317332285162.jpg" width="135" height="112" border=0 onerror="this.src='{$siteurl}/templets/{$templets->directory}/images/none_347.gif'"></a><div class="name_product"><a href="classdetail.asp?id=158&anid=10" title="宝钢型钢RF500项目厂房改造、设备安装" target="_parent">宝钢型钢RF500项…</a></div>
</li> 

<li><a href=bookpic/201691317332285162.jpg rel="lightbox[plants]" title="内蒙包钢脱硫脱硝设备安装" target="_blank"><img src="bookpic/201691317332285162.jpg" width="135" height="112" border=0 onerror="this.src='{$siteurl}/templets/{$templets->directory}/images/none_347.gif'"></a><div class="name_product"><a href="classdetail.asp?id=157&anid=10" title="内蒙包钢脱硫脱硝设备安装" target="_parent">内蒙包钢脱硫脱硝…</a></div>
</li> 

<li><a href=bookpic/201691317332285162.jpg rel="lightbox[plants]" title="广汽宝商法格压机设备安装" target="_blank"><img src="bookpic/201691317332285162.jpg" width="135" height="112" border=0 onerror="this.src='{$siteurl}/templets/{$templets->directory}/images/none_347.gif'"></a><div class="name_product"><a href="classdetail.asp?id=159&anid=10" title="广汽宝商法格压机设备安装" target="_parent">广汽宝商法格压机…</a></div>
</li> 

<li><a href=bookpic/201691317332285162.jpg rel="lightbox[plants]" title="广东佛山压机设备安装" target="_blank"><img src="bookpic/201691317332285162.jpg" width="135" height="112" border=0 onerror="this.src='{$siteurl}/templets/{$templets->directory}/images/none_347.gif'"></a><div class="name_product"><a href="classdetail.asp?id=156&anid=10" title="广东佛山压机设备安装" target="_parent">广东佛山压机设备…</a></div>
</li> 

<li><a href=bookpic/201691317332285162.jpg rel="lightbox[plants]" title="广东湛江宝钢镀锌线设备安装2" target="_blank"><img src="bookpic/201691317332285162.jpg" width="135" height="112" border=0 onerror="this.src='{$siteurl}/templets/{$templets->directory}/images/none_347.gif'"></a><div class="name_product"><a href="classdetail.asp?id=155&anid=10" title="广东湛江宝钢镀锌线设备安装2" target="_parent">广东湛江宝钢镀锌…</a></div>
</li> 

<li><a href=bookpic/201691317332285162.jpg rel="lightbox[plants]" title="广东湛江宝钢镀锌线设备安装1" target="_blank"><img src="bookpic/201691317332285162.jpg" width="135" height="112" border=0 onerror="this.src='{$siteurl}/templets/{$templets->directory}/images/none_347.gif'"></a><div class="name_product"><a href="classdetail.asp?id=154&anid=10" title="广东湛江宝钢镀锌线设备安装1" target="_parent">广东湛江宝钢镀锌…</a></div>
</li> 

<li><a href=bookpic/201691317332285162.jpg rel="lightbox[plants]" title="宁波大众2期压机安装4" target="_blank"><img src="bookpic/201691317332285162.jpg" width="135" height="112" border=0 onerror="this.src='{$siteurl}/templets/{$templets->directory}/images/none_347.gif'"></a><div class="name_product"><a href="classdetail.asp?id=153&anid=10" title="宁波大众2期压机安装4" target="_parent">宁波大众2期压机…</a></div>
</li> 

<li><a href=bookpic/201691317332285162.jpg rel="lightbox[plants]" title="宁波大众2期压机安装3" target="_blank"><img src="bookpic/201691317332285162.jpg" width="135" height="112" border=0 onerror="this.src='{$siteurl}/templets/{$templets->directory}/images/none_347.gif'"></a><div class="name_product"><a href="classdetail.asp?id=152&anid=10" title="宁波大众2期压机安装3" target="_parent">宁波大众2期压机…</a></div>
</li> 

<li><a href=bookpic/201691317332285162.jpg rel="lightbox[plants]" title="长沙开卷线设备安装" target="_blank"><img src="bookpic/201691317332285162.jpg" width="135" height="112" border=0 onerror="this.src='{$siteurl}/templets/{$templets->directory}/images/none_347.gif'"></a><div class="name_product"><a href="classdetail.asp?id=151&anid=10" title="长沙开卷线设备安装" target="_parent">长沙开卷线设备安…</a></div>
</li> 

<li><a href=bookpic/201691317332285162.jpg rel="lightbox[plants]" title="宁波大众2期压机安装2" target="_blank"><img src="bookpic/201691317332285162.jpg" width="135" height="112" border=0 onerror="this.src='{$siteurl}/templets/{$templets->directory}/images/none_347.gif'"></a><div class="name_product"><a href="classdetail.asp?id=150&anid=10" title="宁波大众2期压机安装2" target="_parent">宁波大众2期压机…</a></div>
</li> 

<li><a href=bookpic/201691317332285162.jpg rel="lightbox[plants]" title="宁波大众2期压机安装1" target="_blank"><img src="bookpic/201691317332285162.jpg" width="135" height="112" border=0 onerror="this.src='{$siteurl}/templets/{$templets->directory}/images/none_347.gif'"></a><div class="name_product"><a href="classdetail.asp?id=149&anid=10" title="宁波大众2期压机安装1" target="_parent">宁波大众2期压机…</a></div>
</li> 

<li><a href=bookpic/201691317332285162.jpg rel="lightbox[plants]" title="黄石大冶特钢棒材线设备安装2" target="_blank"><img src="bookpic/201691317332285162.jpg" width="135" height="112" border=0 onerror="this.src='{$siteurl}/templets/{$templets->directory}/images/none_347.gif'"></a><div class="name_product"><a href="classdetail.asp?id=148&anid=10" title="黄石大冶特钢棒材线设备安装2" target="_parent">黄石大冶特钢棒材…</a></div>
</li> 

<li><a href=bookpic/201691317332285162.jpg rel="lightbox[plants]" title="黄石大冶特钢棒材线设备安装1" target="_blank"><img src="bookpic/201691317332285162.jpg" width="135" height="112" border=0 onerror="this.src='{$siteurl}/templets/{$templets->directory}/images/none_347.gif'"></a><div class="name_product"><a href="classdetail.asp?id=147&anid=10" title="黄石大冶特钢棒材线设备安装1" target="_parent">黄石大冶特钢棒材…</a></div>
</li> 

<li><a href=bookpic/201691317332285162.jpg rel="lightbox[plants]" title="越南台塑烧结工程" target="_blank"><img src="bookpic/201691317332285162.jpg" width="135" height="112" border=0 onerror="this.src='{$siteurl}/templets/{$templets->directory}/images/none_347.gif'"></a><div class="name_product"><a href="classdetail.asp?id=146&anid=10" title="越南台塑烧结工程" target="_parent">越南台塑烧结工程…</a></div>
</li>  -->

</ul>
</div>
{literal}
<script type="text/javascript"> 
function $i(id){return document.getElementById(id);}
// 横着滚动
function simpleSideScroll(c,ul,config,direction){
    this.config = config ? config : {start_delay:1000, speed: 1, delay:1000, scrollItemCount:4};
	this.c = $i(c);
	this.ul = $i(ul);
	this.direction = direction ? direction : "left";
	this.pause = false;
	this.buttonlist= new Object();
	this.delayTimeId=null;
	
	var _this = this;



	this.c.onmouseover=function(){_this.pause = true;}
	this.c.onmouseout=function(){_this.pause = false;}
	
	this.init = function() {
		_this.scrollTimeId = null;
		setTimeout(_this.start,_this.config.start_delay);
	}
	
	this.start = function() {
		var d = _this.c;
		var width = d.getElementsByTagName('li')[0].offsetWidth;
		if(d.scrollWidth-d.offsetLeft>=width) _this.scrollTimeId = setInterval(_this.scroll,_this.config.speed)
	};
	
	this.scroll = function() {
		if(_this.pause)return;
		var ul= _this.ul;
		var d = _this.c;
		var width = d.getElementsByTagName('li')[0].offsetWidth;
		if(_this.direction == 'left'){
	        d.scrollLeft += 2;
	        if(d.scrollLeft%(width*_this.config.scrollItemCount)<=1){
		        if(_this.config.movecount != undefined)
			        for(var i=0;i<_this.config.movecount;i++){ul.appendChild(ul.getElementsByTagName('li')[0]);}
		        else for(var i=0;i<_this.config.scrollItemCount;i++){ul.appendChild(ul.getElementsByTagName('li')[0]);}
		        d.scrollLeft=0;
		        clearInterval(_this.scrollTimeId);
		        
		        _this.delayTimeId=setTimeout(_this.start,_this.config.delay);
	        }
		}
		else {
		    if(d.scrollLeft==0)
		    {
		        var lis=ul.getElementsByTagName('li');
		        for(var i=0;i<_this.config.scrollItemCount;i++){
		            ul.insertBefore(lis[lis.length-1],lis[0]);
		        }
		        d.scrollLeft = width;
		    }
		    d.scrollLeft -= 2;
		    if(d.scrollLeft%(width*_this.config.scrollItemCount)<=1){
		        d.scrollLeft=0;
		        clearInterval(_this.scrollTimeId);
		        _this.delayTimeId=setTimeout(_this.start,_this.config.delay);
		    }
		}
	}
	
	this.setButton=function(id,direction){
	    if($i(id)){
	        var c=$i(id);
	        var buttonlist =_this.buttonlist;
	        if(buttonlist[id] == undefined){
	            buttonlist[id] =new Object();
	            _this.buttonlist[id][0]=c;
	            _this.buttonlist[id][1]=direction;
	            
	            c.onclick=function(){
	                 clearInterval(_this.scrollTimeId);
	                 
	                var dir=_this.buttonlist[this.id][1];
	                var d = _this.c;
	                var ul= _this.ul;
	                d.scrollLeft=0;
	                if(dir =="left")
	                {
	                    for(var i=0;i<_this.config.scrollItemCount;i++){ul.appendChild(ul.getElementsByTagName('li')[0]);}
	                }
	                else{
	                    var lis=ul.getElementsByTagName('li');
		                for(var i=0;i<_this.config.scrollItemCount;i++){
		                    ul.insertBefore(lis[lis.length-1],lis[0]);
		                }
	                }
	                    
	                _this.direction= dir;
	                clearTimeout(_this.delayTimeId);
	                _this.delayTimeId=setTimeout(_this.start,_this.config.delay);
	                return false;
	            }
	        }
	    }
	}
}

var cooperater_run;
function init_load(){
    if($i('scroll_div_img')){
	    cooperater_run=new simpleSideScroll('scroll_div_img','scroll_div_img_ul',{start_delay:0, speed: 3000, delay:0, scrollItemCount:1},'left')
	    cooperater_run.init();
	}
}
if(window.attachEvent){
    window.attachEvent("onload",init_load);
}else if(window.addEventListener){
    window.addEventListener("load",init_load,false);
}
  </script>  
   <script type="text/javascript">

(function(){

  var str=window.location.href;

    var pid= str.match(/pid=mm_\d{0,10}_\d{0,10}_\d{0,10}/i);
    //alert(pid);

    if(pid){


      pid = pid[0].split("=")[1]
      var reg=new RegExp("pid=mm_0_0_0","gmi");
      var as   =   document.getElementsByTagName("A");
      for(var   i   =   0;   i <   as.length;   i   ++){
        as[i].href=as[i].href.replace(reg,"pid="+pid);
      } 
      document.getElementById("scroll_div_img").innerHTML =document.getElementById("scroll_div_img").innerHTML.replace(reg,"pid="+pid)
   }

})();

</script>
{/literal}
		</div>
	</div>
  </div>
   <div class="clearBoth"></div>
</div>
<div style="width: 973px;margin:auto;">友情链接: 
	{assign var="linklist" value=$linkdata->GetLinkList()}
	{foreach from=$linklist item=linkinfo}
	<a href="{$linkinfo->url}" title="{$linkinfo->title}" target="_blank">{$linkinfo->title}</a>
	{/foreach}
</div>
{include file="footer.tpl"}
