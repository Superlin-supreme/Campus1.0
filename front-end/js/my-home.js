window.onload = function () {

    // 运行表情包插件
    $("#editor").emoji({
    	button: "#btn",
    	showTab: false,
    	animation: 'slide',
    	icons: [{
    		name: "QQ表情",
    		path: "dist/img/qq/",
    		maxNum: 91,
    		excludeNums: [41, 45, 54],
    		file: ".gif"
    	}]
    })
    // 运行表情包插件

    //上传图片
    $("#fileUploadContent").initUpload({
        "uploadUrl":"#",//上传文件信息地址
        "progressUrl":"#",//获取进度信息地址，可选，注意需要返回的data格式如下（{bytesRead: 102516060, contentLength: 102516060, items: 1, percent: 100, startTime: 1489223136317, useTime: 2767}）
        //"showSummerProgress":false,//总进度条，默认限制
        //"size":350,//文件大小限制，单位kb,默认不限制
        //"maxFileNumber":3,//文件个数限制，为整数
        //"filelSavePath":"",//文件上传地址，后台设置的根目录
        //"beforeUpload":beforeUploadFun,//在上传前执行的函数
        //"onUpload":onUploadFun，//在上传后执行的函数
        autoCommit:true,//文件是否自动上传
        //"fileType":['png','jpg','docx','doc']，//文件类型限制，默认不限制，注意写的是文件后缀
    })
    function beforeUploadFun(opt){
    	opt.otherData =[{"name":"你要上传的参数","value":"你要上传的值"}];
    }
    function onUploadFun(opt,data){
    	alert(data);
        uploadTools.uploadError(opt);//显示上传错误
    }
    //上传图片

    $("#share-text-submit").click(function(){
        //Ajax传输图片地址id给后台
        var post_id = $(this).parents(".host-container").attr("id");
        $("#reply-confirm").click(function(){
            var request = new XMLHttpRequest();
            request.open("POST", "server.php"); //第二个参数需修改
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(post_id); 
        })
        //Ajax传输帖子id给后台  
    })


    //打开关闭弹出框
    function showeMask(){
    	$("#mask").css("display","block");
    }


    $(".open-reply").click(function(){
    	showeMask();
    	$("#reply-box").css("display","block");
        //Ajax传输帖子id给后台
        var post_id = $(this).parents(".host-container").attr("id");
        $("#reply-confirm").click(function(){
            var request = new XMLHttpRequest();
            request.open("POST", "server.php"); //第二个参数需修改
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(post_id); 
        })
        //Ajax传输帖子id给后台  
    })

    $("#add-plan-button").click(function(){
    	showeMask();
    	$("#add-plan-box").css("display","block");
    })

    $("#Signature-change").click(function(){
    	showeMask();
    	$("#Signature-change-box").css("display","block");
    })

    $(".delete-post").click(function(){
        showeMask();
        $("#delete-post-box").css("display","block");
        //Ajax传输帖子id给后台
        var delete_post_id = $(this).parents(".host-container").attr("id");
        $("#delete-post-confirm").click(function(){
            var request = new XMLHttpRequest();
            request.open("POST", "server.php"); //第二个参数需修改
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(delete_post_id); 
        })
        //Ajax传输帖子id给后台      
    })

    $(".delete-reply").click(function(){
    	showeMask();
    	$("#delete-reply-box").css("display","block");
        //Ajax传输回复id给后台
        var delete_reply_id = $(this).attr("id");
        $("#delete-reply-confirm").click(function(){
            var request = new XMLHttpRequest();
            request.open("POST", "server.php"); //第二个参数需修改
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(delete_reply_id); 
        })
        //Ajax传输回复id给后台 
    })

    $(".delete-plan").click(function(){
    	showeMask();
    	$("#delete-plan-box").css("display","block");
        //Ajax传输计划id给后台
        var delete_plan_id = $(this).attr("id");
        $("#delete-plan-confirm").click(function(){
            var request = new XMLHttpRequest();
            request.open("POST", "server.php"); //第二个参数需修改
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(delete_plan_id); 
        })
        //Ajax传输计划id给后台 
    })

    $(".distrubution").click(function(){
    	showeMask();
    	$("#distribution-box").css("display","block");
        //Ajax传输帖子的id，接受分配金币的用户id和金币金额给后台
        var distrubution_user_id = $(this).attr("id");
            post_id = $(this).parents(".host-container").attr("id");
        $("#distribution-confirm").click(function(){
            var request = new XMLHttpRequest();                
                data = distrubution_user_id + post_id + document.getElementById("distribution-number").value; //传输的数据有三个
            request.open("POST", "server.php"); //第二个参数需修改
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(data); 
        })
        //Ajax传输帖子的id，接受分配金币的用户id和金币金额给后台
    })

    $(".close-box").click(function(){
    	$("#mask").css("display","none");
    	$(".pop-up-box").css("display","none");
    })

    $("#add-friend").click(function(){
        showeMask();
        $("#add-friend-box").css("display","block");
        //Ajax传输添加好友的id给后台        
        $(".add-friend-button").click(function(){
            var request = new XMLHttpRequest();
                add_friend_id = $(this).attr("id");
            request.open("POST", "server.php"); //第二个参数需修改
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(add_friend_id); 
        })
        //Ajax传输添加好友的id给后台
    })
    //打开关闭弹出框


    //弹出框居中
    function autodivheight(){
    	var wHeight = document.documentElement.clientHeight;
    	    wWidth = document.documentElement.clientWidth;

    	$(".pop-up-box").css("top",wHeight*0.5 -105 + 'px');
    	$(".pop-up-box").css("left",wWidth*0.5 -205 + 'px');
        $("#add-friend-box").css("top",wHeight*0.5 -150 + 'px');
        $("#add-friend-box").css("left",wWidth*0.5 -275 + 'px');

    }
    autodivheight();  
    window.onresize = autodivheight;
    //弹出框居中


    // 中间菜单按钮效果	
    var menu_chat = document.getElementById('menu-chat');
        menu_plan = document.getElementById('menu-plan');
        menu_public = document.getElementById('menu-public');
        menu_person = document.getElementById('menu-person');


    function largemenu(large){
    	large.style.width="70px";
    	large.style.height="70px";
    	large.style.borderRadius="35px";
    }

    function smallmenu(small){
    	small.style.width="30px";
    	small.style.height="30px";
    	small.style.borderRadius="15px";
    }

    menu_public.onclick = function(){
        smallmenu(menu_person)
        largemenu(menu_public)
        $("#public-section").css("display","block");
        $("#person-section").css("display","none");
    }

    menu_person.onclick = function(){
        smallmenu(menu_public)
        largemenu(menu_person)
        $("#public-section").css("display","none");
        $("#person-section").css("display","block");
    }

    menu_chat.onclick = function(){
    	smallmenu(menu_plan)
        largemenu(menu_chat)
        $("#user-plan").css("display","none");
        $("#user-chat").css("display","block");
    }

    menu_plan.onclick = function(){
    	smallmenu(menu_chat)
        largemenu(menu_plan)
    	$("#user-chat").css("display","none");
        $("#user-plan").css("display","block");
    }
    // 中间菜单按钮效果


    //所有帖区菜单按钮
    $("#all-post").click(function(){
        $("#all-post-area").css("display","block");
        $("#all-QA-area").css("display","none");
        $("#all-post").css("background", "url(img/user-menu-bg.jpg)");
        $("#all-QA").css("background", "none");
    })

    $("#all-QA").click(function(){
        $("#all-post-area").css("display","none");
        $("#all-QA-area").css("display","block");
        $("#all-post").css("background", "none");
        $("#all-QA").css("background", "url(img/user-menu-bg.jpg)");
    })

    //所有帖区菜单按钮


    // 个人帖子菜单按钮效果
    var post_area = document.getElementById('post-area');
        QA_area = document.getElementById('QA-area');
        join_post_area = document.getElementById('join-post-area');
        join_QA_area = document.getElementById('join-QA-area');
        discuss_post = document.getElementById('discuss-post');
        discuss_QA = document.getElementById('discuss-QA');
        discuss_join_post = document.getElementById('discuss-join-post');
        discuss_join_QA = document.getElementById('discuss-join-QA');

    function show(area){
    	post_area.style.display="none";
    	QA_area.style.display="none";
    	join_post_area.style.display="none";
    	join_QA_area.style.display="none";
    	area.style.display="block";
    }

    function disappear(menu){
    	discuss_post.style.background="none";
    	discuss_QA.style.background="none";
    	discuss_join_post.style.background="none";
    	discuss_join_QA.style.background="none";
    	menu.style.backgroundImage="url(img/user-menu-bg.jpg)";
    }

    discuss_post.onclick = function(){
    	show(post_area)
    	disappear(discuss_post)
    }

    discuss_QA.onclick = function(){
    	show(QA_area)
    	disappear(discuss_QA)
    }

    discuss_join_post.onclick = function(){
    	show(join_post_area)
    	disappear(discuss_join_post)		
    }

    discuss_join_QA.onclick = function(){
    	show(join_QA_area)
    	disappear(discuss_join_QA)
    }
    // 个人帖子菜单按钮效果

    //帖子图片预览效果
    $(".post-photo").click(function(){
        var wHeight = document.documentElement.clientHeight;
            wWidth = document.documentElement.clientWidth;
            width = $(this).width();
        if(width==110)
        {
            $(this).removeClass("post-photo");
            var imgheight = $(this).height(); 
            imgwidth = $(this).width();           
            if(imgheight >= wHeight || imgwidth >= imgwidth){
                do {
                    imgheight = imgheight*0.9;
                    imgwidth = imgwidth*0.9;
                    $(this).attr("height",imgheight);
                } while(imgheight >= wHeight*0.7 && imgwidth >= wHeight*0.7)

            }

            $(this).css("position", "fixed");
            showeMask();
            $(this).css("z-index", "101");
            $(this).css("top",wHeight*0.5 - imgheight*0.5 + 'px');
            $(this).css("left",wWidth*0.5 - imgwidth*0.5 + 'px');
        }        
        else
        {
            $(this).addClass("post-photo");
            $(this).css("position", "relative");
            $("#mask").css("display","none");
            $(this).css("z-index", "1");
            $(this).css("top",0);
            $(this).css("left",0);
        }
    });
    //帖子图片预览效果


    // 计划区域菜单按钮效果
    var life_plan_button = document.getElementById('life-plan-button');
        study_plan_button = document.getElementById('study-plan-button');
        life_plan = document.getElementById('life-plan');
        life_new_plan_menu = document.getElementById('life-new-plan-menu');
        life_history_plan_menu = document.getElementById('life-history-plan-menu');
        life_new_plan = document.getElementById('life-new-plan');
        life_history_plan = document.getElementById('life-history-plan');
        study_plan = document.getElementById('study-plan');
        study_new_plan_menu = document.getElementById('study-new-plan-menu');
        study_history_plan_menu = document.getElementById('study-history-plan-menu');
        study_new_plan = document.getElementById('study-new-plan');
        study_history_plan = document.getElementById('study-history-plan');
        triangle_3 = document.getElementById('triangle-3');

        function ChangeSection(section1, section2){
        	section1.style.display = "block";
        	section2.style.display = "none";
        }

        function ChangeOpacity(opacity1, opacity2){
        	opacity1.style.opacity="1.0";
        	opacity2.style.opacity="0.5";
        }

        study_plan_button.onclick = function(){
        	ChangeSection(study_plan, life_plan)
        	ChangeOpacity(study_plan_button, life_plan_button)
        	triangle_3.style.left="180px";
        }

        life_plan_button.onclick = function(){
        	ChangeSection(life_plan, study_plan)
        	ChangeOpacity(life_plan_button, study_plan_button)
        	triangle_3.style.left="40px";
        }

        life_new_plan_menu.onclick = function(){
        	ChangeSection(life_new_plan, life_history_plan)
        }

        life_history_plan_menu.onclick = function(){
        	ChangeSection(life_history_plan, life_new_plan)
        }

        study_new_plan_menu.onclick = function(){
        	ChangeSection(study_new_plan, study_history_plan)
        }

        study_history_plan_menu.onclick = function(){
        	ChangeSection(study_history_plan, study_new_plan)
        }

    // 计划区域菜单按钮效果



    //打开聊天窗口
    var friend_1 = document.getElementById('friend-1');
        friend_2 = document.getElementById('friend-2');
        list_top = document.getElementById('list-top');
        chat_list = document.getElementById('chat-list');
        chat_box = document.getElementById('chat-box');
        return_list = document.getElementById('return-list');

    friend_1.onclick = function(){
    	list_top.style.display="none";
    	chat_list.style.display="none";
    	chat_box.style.display="block";
    }

    return_list.onclick = function(){
    	list_top.style.display="block";
    	chat_list.style.display="block";
    	chat_box.style.display="none";
    }
    //打开聊天窗口


}



 // $(".delete-post").click(function(){
 //        var delete_post_id = $(this).attr("id");
 //        $(".confirm-delete").html("delete_post_id");
 //    })

