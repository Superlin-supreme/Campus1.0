window.onload = function () {

    //弹出框居中
    function autodivheight(){
    	var wHeight = document.documentElement.clientHeight;
    	    wWidth = document.documentElement.clientWidth;

    	$("#delete-message-box").css("top",wHeight*0.5 -105 + 'px');
    	$("#delete-message-box").css("left",wWidth*0.5 -205 + 'px');

    }
    autodivheight();  
    window.onresize = autodivheight;
    //弹出框居中

    //打开关闭弹出框
    function showeMask(){
    	$("#mask").css("display","block");
    }

    $(".delete-message").click(function(){
    	showeMask();
    	$("#delete-message-box").css("display","block");
        //Ajax传输系统信息id给后台
        var delete_message_id = $(this).attr("id");
        $("#delete-message-confirm").click(function(){
            var request = new XMLHttpRequest();
            request.open("POST", "server.php"); //第二个参数需修改
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(delete_message_id); 
        })
        //Ajax传输系统信息id给后台 
    })

    $(".close-box").click(function(){
    	$("#mask").css("display","none");
    	$(".pop-up-box").css("display","none");
    })
    //打开关闭弹出框


}