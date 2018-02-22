{if $language eq 'en'}
{assign var="seotitle" value="Contacts"}
{else}
{assign var="seotitle" value="联系我们"}
{/if}
{include file="header.tpl"}
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=EFb04d2aba04d21fec7e0324cba7f40e&services=&t=20180201111639"></script>
<div id="location_div">
	{foreach from=$crumb item=cat}
	<a href="{$cat->url}">{$cat->name}</a>  &gt; 
	{/foreach} 
	{if $language eq 'en'}Contacts{else}联系我们{/if}
</div>
  <div id="middle_div_sub">
		<div id="left_box_sub">
		 	<ul id="category_sub_left">
				<li><a class="on"  href="#">{if $language eq 'en'}Contacts{else}联系我们{/if}</a></li>
			</ul>
		</div>
		<div id="right_box_sub">
			<div id="title_sub"><span class="icon_red_square"></span><span class="txt">{if $language eq 'en'}Contacts{else}联系我们{/if}</span></div>
			<div id="article_p"><P><IMG style="WIDTH: 184px; HEIGHT: 146px" align=right src="{$siteurl}/templets/{$templets->directory}/images/contacts.jpg" width=234 height=206><BR><FONT face=Verdana><FONT size=3><STRONG>{$companyname}</STRONG> <BR></FONT></FONT><FONT face=Verdana></FONT></P>
<P><FONT face=Verdana>{if $language eq 'en'}Tel:{else}电 话：{/if}{$companyphone}</FONT></P>
<P><FONT face=Verdana>{if $language eq 'en'}Fax:{else}传 真：{/if}{$companyfax}</FONT></P>
<P><FONT face=Verdana>{if $language eq 'en'}Addr:{else}地 址：{/if} {$companyaddr} <BR>{if $language eq 'en'}Contacts:{else}公司联系人：{/if} {$companycontact}<BR>{if $language eq 'en'}Email:{else}邮 箱：{/if}{$companyemail}</FONT></P>
<P>&nbsp;</P><DIV style="BORDER-BOTTOM: #ccc 1px solid; BORDER-LEFT: #ccc 1px solid; WIDTH: 100%; MARGIN-BOTTOM: 10px; HEIGHT: 450px; BORDER-TOP: #ccc 1px solid; BORDER-RIGHT: #ccc 1px solid" id=dituContent></DIV></div>
		</div>
	</div>
   <div class="clearBoth"></div>
 </div>

<script type="text/javascript">
	var companyname = '{$companyname}';
	var lng = '{$lng}';
	var lat = '{$lat}';
{literal}
	// 百度地图API功能
	var map = new BMap.Map("dituContent");    // 创建Map实例
	var point = new BMap.Point(lng, lat);
	map.centerAndZoom(new BMap.Point(lng, lat), 11);  // 初始化地图,设置中心点坐标和地图级别
	var top_left_control = new BMap.ScaleControl({anchor: BMAP_ANCHOR_TOP_LEFT});
	var top_left_navigation = new BMap.NavigationControl();  //左上角，添加默认缩放平移控件
  	var top_right_navigation = new BMap.NavigationControl({anchor: BMAP_ANCHOR_TOP_RIGHT, type: BMAP_NAVIGATION_CONTROL_PAN}); //右上角，仅包含平移和缩放按钮
	map.addControl(top_left_control);   
	map.addControl(top_left_navigation);     
    map.addControl(top_right_navigation); 
	//添加地图类型控件
	map.addControl(new BMap.MapTypeControl({
		mapTypes:[
            BMAP_NORMAL_MAP,
            BMAP_HYBRID_MAP
        ]}));	  
	map.setCurrentCity("青岛");          // 设置地图显示的城市 此项是必须设置的
	map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放

	  var opts = {
	    position : point,    // 指定文本标注所在的地理位置
	    offset   : new BMap.Size(0,-50)    //设置文本偏移量
	  }
	  var label = new BMap.Label(companyname, opts);  // 创建文本标注对象
	    label.setStyle({
	       color : "red",
	       fontSize : "12px",
	       height : "20px",
	       lineHeight : "20px",
	       fontFamily:"微软雅黑"
	     });
	  map.addOverlay(label);   
  var marker = new BMap.Marker(point);  // 创建标注
  map.addOverlay(marker);    
            // 将标注添加到地图中
{/literal}
</script>

	<!--main end-->
{include file="footer.tpl"}