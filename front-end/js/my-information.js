window.onload = function () {

    //弹出框居中
    function autodivheight(){
    	var wHeight = document.documentElement.clientHeight;
        	wWidth = document.documentElement.clientWidth;

    	$(".pop-up-box").css("top",wHeight*0.5 -105 + 'px');
    	$(".pop-up-box").css("left",wWidth*0.5 -205 + 'px');
    	$("#information-change-box").css("top",wHeight*0.5 -140 + 'px');
    	$("#information-change-box").css("left",wWidth*0.5 -360 + 'px');
    	$("#change-portrait-box").css("top",wHeight*0.5 -210 + 'px');
    	$("#change-portrait-box").css("left",wWidth*0.5 -320 + 'px');

    }
    autodivheight();  
    window.onresize = autodivheight;
    //弹出框居中


    //打开关闭弹出框
    function showeMask(){
    	$("#mask").css("display","block");
    }

    $("#basic-information-change").click(function(){
    	showeMask();
    	$("#information-change-box").css("display","block");
    })

    $("#change-portrait").click(function(){
    	showeMask();
    	$("#change-portrait-box").css("display","block");
    })

    $("#pwd-change").click(function(){
    	showeMask();
    	$("#pwd-change-box").css("display","block");
    })

    $("#money-charge").click(function(){
    	showeMask();
    	$("#money-charge-box").css("display","block");
    })

    $(".delete-friend").click(function(){
    	showeMask();
    	$("#delete-friend-box").css("display","block");
        var delete_friend_id = $(this).attr("id");
        //Ajax传输计划id给后台
        $("#confirm-delete-friend").click(function(){
            var request = new XMLHttpRequest();
            request.open("POST", "server.php"); //第二个参数需修改
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(delete_friend_id); 
        })
        //Ajax传输计划id给后台 
    })

    $(".close-box").click(function(){
    	$("#mask").css("display","none");
    	$(".pop-up-box").css("display","none");
    })
    //打开关闭弹出框

    //修改图片插件
    var clipArea = new bjj.PhotoClip("#clipArea", {
    	size: [260, 260],
    	outputSize: [640, 640],
    	file: "#file",
    	view: "#view",
    	ok: "#clipBtn",
    	loadStart: function() {
    		console.log("照片读取中");
    	},
    	loadComplete: function() {
    		console.log("照片读取完成");
    	},
    	clipFinish: function(dataURL) {
    		console.log(dataURL);
    	}
    });
    //修改图片插件
    
    //Ajax传输图片信息到后台
    $("#confirm-change-portrait").click(function(){
        var newimg = $("#view").css('backgroundImage');
            request = new XMLHttpRequest();
        request.open("POST", "server.php");  //第二个参数需修改
        request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        request.send(newimg);      
    })
    //Ajax传输图片信息到后台

}
