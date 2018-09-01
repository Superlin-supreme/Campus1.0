window.onload = function () {

// 运行表情包插件
	$("#editor").emoji({
		button: "#btn",
		showTab: false,
		animation: 'slide',
		icons: [{
			name: "QQ表情",
			path: "../../../Public/dist/img/qq/",
			maxNum: 91,
			excludeNums: [41, 45, 54],
			file: ".gif"
		}]
	})
// 运行表情包插件

    //function  getContent()
	//{
	//	var postform=document.getElementById('postform');
	//	var content=document.getElementById('content');
	//	postform.action='post?parms='+content.innerHTML;
	//}


// 中间菜单按钮效果
	var menu_discuss = document.getElementById('menu-discuss');
	menu_chat = document.getElementById('menu-chat');
	menu_plan = document.getElementById('menu-plan');
	menu_friend = document.getElementById('menu-friend');

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

	function menu_1(){
		smallmenu(menu_chat)
		smallmenu(menu_friend)
		largemenu(menu_discuss)
		largemenu(menu_plan)
	}

	function menu_2(){
		smallmenu(menu_discuss)
		smallmenu(menu_plan)
		largemenu(menu_friend)
		largemenu(menu_chat)
	}


	menu_discuss.onclick = function(){
		menu_1()
	}

	menu_chat.onclick = function(){
		menu_2()
	}

	menu_plan.onclick = function(){
		menu_1()
	}

	menu_friend.onclick = function(){
		menu_2()
	}
// 中间菜单按钮效果


// 帖子菜单按钮效果
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
		menu.style.backgroundImage="url(../../../Public/Image/UserManagement/user-menu-bg.jpg)";
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
// 帖子菜单按钮效果

// 个性签名修改弹出框

	var Signature_change = document.getElementById('Signature-change');
	Signature_change_input = document.getElementById('Signature-change-input');
	Signature = document.getElementById('Signature');
	Signature_change_off = document.getElementById('Signature-change-off');

	Signature_change.onclick = function(){
		Signature_change_input.style.display="block";
		Signature.style.display="none";
	}

	Signature_change_off.onclick = function(){
		Signature_change_input.style.display="none";
		Signature.style.display="block";
	}
// 个性签名修改弹出框
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




// 计划区域菜单按钮效果


}