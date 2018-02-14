$(window).scroll(function ()
{
	if ($(window).scrollTop() > 50)
	{
		$('.site-header').addClass('small');
	}
	else
	{
		$('.site-header').removeClass('small');
	}
});
$(function(){
	$(".slideBox").slide({mainCell:".bd ul",titCell:".hd a",autoPlay:true,delayTime:1000});
});
function DrawImage(ImgD)
{
	var image=new Image();
	image.src=ImgD.src;
	console.log(image.width);
	console.log(image.height);
	if(image.width>0 && image.height>0)
	{
		if(image.width>image.height)
		{
			$(ImgD).css('height','100%');
		}else{
			$(ImgD).css('width','100%');
		}
	}
}
function AddFavorite(sURL, sTitle)
{
    try
    {
        window.external.addFavorite(sURL, sTitle);
    }
    catch (e)
    {
        try
        {
            window.sidebar.addPanel(sTitle, sURL, "");
        }
        catch (e)
        {
            alert("加入收藏失败，请使用Ctrl+D进行添加");
        }
    }
}