window.onload = function () {

    //弹出框，logo，登录框居中，背景适应窗口
    function autodivheight(){
        var wHeight = document.documentElement.clientHeight;
            wWidth = document.documentElement.clientWidth;

        $("#content_bg").css("height", wHeight + 'px');
        $("#content").css("height", wHeight + 'px');
        $("#logo").css("top", wHeight*0.5 -60 + 'px');
        $("#login-box").css("top", wHeight*0.5 -250 + 'px');
        $("#registration-box").css("top", wHeight*0.5 -225 + 'px');
        $("#registration-box").css("left", wWidth*0.5 -350 + 'px');

    }
    autodivheight();  
    window.onresize = autodivheight;
    //弹出框，logo，登录框居中，背景适应窗口


    //注册打开和关闭按钮
    var close_box = document.getElementById('close-box');
    registration = document.getElementById('registration');
    registration_box = document.getElementById('registration-box');


    registration.onclick = function () {
       mask.style.display = "block";
       registration_box.style.display = "block";
   }

   close_box.onclick = function() {
       mask.style.display = "none";
       registration_box.style.display = "none";
   }
    //注册打开和关闭按钮


    //输入密码可见性
    var pwd_view=document.getElementById("pwd-view");
    password=document.getElementById("password");

    pwd_view.onmousedown=function(){
       password.type="number"
   }

   pwd_view.onmouseup = pwd_view.onmouseout=function(){
       password.type="password"
   }
    //输入密码可见性


    // function check() {
    //     // var fade_name = document.getElementById("fade-name").value;
    //     //     check_fade_name = document.getElementById("check-fade-name");

    //     // check_fade_name.innerHTML = fade_name;
    //     alert("input 输入框值已发生变化。");
    // }


    //注册界面步骤切换,获取用户输入注册信息输出到第三个步骤
    var real_information = document.getElementById("real-information");
        registrater_information = document.getElementById("registrater-information");
        confirm_information = document.getElementById("confirm-information");

    function input(output, value){
        output.innerHTML = value;
    }

    document.getElementById("move-registrater").onclick = function(){
        real_information.style.display = "none";
        registrater_information.style.display = "block";
    }

    document.getElementById("back-real").onclick = function(){
        real_information.style.display = "block";
        registrater_information.style.display = "none";
    }

    document.getElementById("move-confirm").onclick = function(){
        registrater_information.style.display = "none";
        confirm_information.style.display = "block";

        var real_name = document.getElementById("real-name").value;
            school = document.getElementById("school").value;
            college = document.getElementById("college").value;
            major = document.getElementById("major").value;
            student_number = document.getElementById("student-number").value;
            phone = document.getElementById("phone").value;
            born_data = document.getElementById("born-data").value;
            email = document.getElementById("email").value;
            fade_name = document.getElementById("fade-name").value;
            input_real_name = document.getElementById("input-real-name");
            input_school = document.getElementById("input-school");
            input_college = document.getElementById("input-college");
            input_major = document.getElementById("input-major");
            input_student_number = document.getElementById("input-student-number");
            input_phone = document.getElementById("input-phone");
            input_born_data = document.getElementById("input-born-data");
            input_email = document.getElementById("input-email");
            input_fade_name = document.getElementById("input-fade-name");

        input(input_real_name, real_name)
        input(input_school, school)
        input(input_college, college)
        input(input_major, major)
        input(input_student_number, student_number)
        input(input_phone, phone)
        input(input_born_data, born_data)
        input(input_email, email)
        input(input_fade_name, fade_name)
    }

    document.getElementById("back-registrater").onclick = function(){
        registrater_information.style.display = "block";
        confirm_information.style.display = "none";
    }
    //注册界面步骤切换,获取用户输入注册信息输出到第三个步骤

}


function check_password() { 
    var new_password = document.getElementById("new-password").value;
        confirm_password = document.getElementById("confirm-password").value;
    if (new_password == confirm_password) {
        document.getElementById("check-password-result").innerHTML = "两次输入一致";
    } 
    else{
        document.getElementById("check-password-result").innerHTML = "两次输入不一致";
    }

}

//Ajax检查用户输入注册信息是否已存在并返回相应提示
function check_real_name() { 
    var request = new XMLHttpRequest();
    request.open("GET", "server.php?number=" + document.getElementById("real-name").value);  //第二个参数需要修改
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState===4) {
            if (request.status===200) { 
                document.getElementById("check-real-name-result").innerHTML = request.responseText;
            } else {
                alert("发生错误：" + request.status);
            }
        } 
    }
}
//检查真实姓名

function check_phone() { 
    var request = new XMLHttpRequest();
    request.open("GET", "server.php?number=" + document.getElementById("phone").value);  //第二个参数需要修改
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState===4) {
            if (request.status===200) { 
                document.getElementById("check-phone-result").innerHTML = request.responseText;
            } else {
                alert("发生错误：" + request.status);
            }
        } 
    }
}
//检查手机号

function check_fade_name() { 
    var request = new XMLHttpRequest();
    request.open("GET", "server.php?number=" + document.getElementById("fade-name").value);  //第二个参数需要修改
    request.send();
    request.onreadystatechange = function() {
        if (request.readyState===4) {
            if (request.status===200) { 
                document.getElementById("check-fade-name-result").innerHTML = request.responseText;
            } else {
                alert("发生错误：" + request.status);
            }
        } 
    }
}
//检查昵称
//Ajax检查用户输入注册信息是否已存在并返回相应提示