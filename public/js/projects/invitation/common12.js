/*
 * 全站公共脚本,基于jquery-1.9.1脚本库
*/
$(function(){
	
		var page = 1;
		//初始加载分屏动画
		mySwiper = $("#mySwiper").swiper({
			mode:"vertical",
			loop: false,
			noSwiping:true,
			noSwipingNext:true,
			noSwipingPrev:true,
		    onSlideChangeEnd : function(){
		    	if ( page != mySwiper.activeIndex )
		    	{
    				$(".up").hide();
			    	page = mySwiper.activeIndex;
		    		if ( page == 1 )
		    		{
			    		remove();
		    		}
					var slide = $("#mySwiper .swiper-wrapper>.swiper-slide").eq(mySwiper.activeIndex);
			    	switch ( mySwiper.activeIndex )
			    	{
			    		case 0:
    						$(".up").show();
			    			break;
			    		case 1:
    						$(".up").show();
			    			break;
			    		case 2:
			    			break;
						case 3:
							$(".up").show();
			    			break;
			    		case 4:
    						$(".up").show();
			    			break;
			    		case 5:
							$(".up").show();
			    			break;
						case 6:
							$(".up").show();
			    			break;
						case 7:
							$(".up").show();
			    			break;
						case 8:
			    			break;
						
					}
		    	}
		    }
		})
		function isIos()  
		{  
           var userAgentInfo = navigator.userAgent;  
           var Agents = new Array("iPhone","iPad");  
           var flag = false;  
           for (var v = 0; v < Agents.length; v++) {  
               if (userAgentInfo.indexOf(Agents[v]) > 0) { flag = true; break; }  
           }  
           return flag;  
		}
		var fixedBug = isIos();

		window.onload = function()
		{
    		$(".up").show();
		}
		
		//框架结构
		var height;
		var page = 1;//当前处于的页数
		function structure()
		{
			$("#scroller>div.page").each(function(){
				if ( document.documentElement.clientHeight < 567  )
				{
					if ( $(this).attr("id") == "page-4" )
					{
						height = 538;
					}
					else
					{
						height = 544;
					}
				}
				else
				{
					if ( $(this).attr("id") == "page-4" )
					{
						height = 556;
					}
					else
					{
						height = 590;
					}
				}
				$(this).height(height);
			})
		}
		structure();

	//具体函数
		$(document).on("tap",".huan-button",function(){
			setTimeout(function(){
				mySwiper.swipeNext();
			},100)
		})

		$(document).on("tap",".go-form",function(){
			$("#mySwiper").transition({opacity:0,scale:5},800);
			$(".form").css({"visibility":"visible",opacity:0,scale:5}).transition({scale:1,opacity:1},800);	
		})
	//结果页
		$(document).on("submit","form",function(){
			if ( $("#who").val() == "" )
			{
				$("#who").focus();
				return false;
			}
			if ( $("#name").val() == "" )
			{
				$("#name").focus();
				return false;
			}
			if ( $("#tel").val() == "" )
			{
				$("#tel").focus();
				return false;
			}
			if ( $("#company").val() == "" )
			{
				$("#company").focus();
				return false;
			}
			$.ajax({
                type:"post",
                //url:$("#form_ajax_url").text(),
				url:"http://www.izhige.com/index.php?g=Phone&m=Invitation&a=save",
		        dataType:"json",
                data:{who:$("#who").val(),name:$("#name").val(),tel:$("#tel").val(),company:$("#company").val()},
                async:false,
                success: function(data){
					$(".form").transition({scale:5,opacity:0,complete:function(){
						$(this).hide();
					}},800);
					$(".result").css({"visibility":"visible"}).css({scale:5,opacity:0}).transition({scale:1,opacity:1},800);
					location.href = "http://sale.jd.com/m/act/nMRLdCpA7I1bTKFh.html";
                }
            });
			return false
		})
})