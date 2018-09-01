<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../Public/css/UserManagement/myhome.css"/>
    <script src="../../../Public/js/myhome.js"></script>
    <script>
        $(function(){
            $('.a').each(function(){
                $(this).on("click",function(){
                    var id=$(this).closest("div").attr("name");
                    $("#content").val(id);
                });
            });
        });
    </script>
    <!-- 表情包插件 -->
    <link rel="stylesheet" href="../../../Public/lib/css/jquery.mCustomScrollbar.min.css"/>
    <link rel="stylesheet" href="../../../Public/dist/css/jquery.emoji.css"/>
    <script src="../../../Public/lib/script/jquery.min.js"></script>
    <script src="../../../Public/lib/script/jquery.mCustomScrollbar.min.js"></script>
    <script src="../../../Public/dist/js/jquery.emoji.min.js"></script>
    <!-- 表情包插件 -->
</head>
<body>
<div id="mask">
</div>
<div id="header">
    <div class="header-menu">
        <a href="###"><img src="../../../Public/Image/UserManagement/exit-button.png" class="header-button"/></a>
        <a href="###"><img src="../../../Public/Image/UserManagement/setting-button.png" class="header-button"/></a>
        <a href="###"><img src="../../../Public/Image/UserManagement/system-message-button.png" class="header-button"/></a>
        <a href="myinformation.html"><img src="../../../Public/Image/UserManagement/information-button.png" class="header-button"/></a>
        <div id="header-search">
            <div id="search-1"><input type="text" name="search" placeholder="大家都在搜索..." id="search"/></div>
            <div id="search-2"><a href="###"><img src="../../../Public/Image/UserManagement/search-button.png" id="search-button"/></a></div>
        </div>
    </div>
</div>
<div id="container-bg">
    <div id="container">
        <div class="user-zone">
            <img src="<?php echo ($path); ?>" id="user-portrait"/>
            <div id="user-name"><?php echo ($nick_name); ?></div>
            <div id="user-level">Lv. <?php echo ($level); ?></div>
            <div class="user-Signature">个性签名</div>
            <form action="" method="">
                <div class="button" id="Signature-change">修改</div>
                <div id="Signature" border="0"><?php echo ($personal_signature); ?></div>
            </form>

            <!-- 个性签名修改 -->
            <form action="<?php echo U('modify_personal_signature');?>" method="post" enctype="multipart/form-data">
                <div id="Signature-change-input">
                    <div id="change-input-top">请输入修改内容：</div>
                    <div id="change-input-triangle"></div>
                    <textarea name="personal_signature"></textarea>
                    <button class="button" id="Signature-change-off">取消</button>
                    <input type="submit" value="确定" class="button" id="Signature-change-affirm" name="confirm"/>
                </div>
            </form>
            <!-- 个性签名修改 -->

            <div class="Medal">勋</br>章</br>馆</div>
            <table id="user-Medal" border="1px">
                <tr>
                    <td><img src="" class="medal-picture"/>勋章图</td>
                    <td><img src="" class="medal-picture"/>勋章图</td>
                    <td><img src="" class="medal-picture"/>勋章图</td>
                </tr>
            </table>
        </div>
        <div class="user-share">
            <div id="triangle-1"></div>
            <div class="question">今天的你，又有怎样的故事？</div>
            <img src="../../../Public/Image/UserManagement/share-top.png" id="share-top"/>
            <form action="<?php echo U('post');?>" method="post" id="postform">
                <textarea id="editor" contenteditable="true" name="content"></textarea>
                <input type="submit" value="发表" class="button" id="share-text-submit"/>
            </form>
            <ul>
                <li ><button id="btn" class="btn btn-sm btn-default" style="background: url(../../../Public/Image/UserManagement/emoji-button.png);background-repeat: no-repeat;">表情</button></li>
                <li style="background: url(../../../Public/Image/UserManagement/video-button.png);background-repeat: no-repeat;"><a href="###">视频</a></li>
                <li style="background: url(../../../Public/Image/UserManagement/photo-button.png);background-repeat: no-repeat;"><a href="###">图片</a></li>
                <li style="background: url(../../../Public/Image/UserManagement/link-button.png);background-repeat: no-repeat;"><a href="###">链接</a></li>
            </ul>
        </div>
        <div class="user-menu">
            <ul>
                <li><a href="###" id="discuss-post">主题帖</a></li>
                <li><a href="###" id="discuss-QA">主题问答</a></li>
                <li><a href="###" id="discuss-join-post">参与的帖子</a></li>
                <li><a href="###" id="discuss-join-QA">参与的问答</a></li>
            </ul>
        </div>


        <div id="post-area">
            <select class="select-region" name="campus_name">
                <option value ="volvo">广东外语外贸大学</option>
                <option value="opel">中山大学</option>
                <option value ="saab">广东工业大学</option>
                <option value="audi">华南理工大学</option>
            </select>
            <select class="select-region">
                <option value ="volvo">不限学院</option>
                <option value ="volvo" >信息与科学技术学院</option>
                <option value ="saab">新闻与传播学院</option>
                <option value="opel">经济与贸易学院</option>
                <option value="audi">英语教育学院</option>
            </select>
            <select class="select-region">
                <option value ="volvo">不限模块</option>
                <option value ="volvo">学术</option>
                <option value ="saab">生活</option>
            </select>
            <div class="discuss-area" id="post-area-1">
                <?php if(is_array($post_list)): $i = 0; $__LIST__ = $post_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- <img src="img/user-2.jpg" class="host-portrait"/> -->
                <table class="host-container">
                    <tr height="25px">
                        <td width="50px" rowspan="2" class="add-border">
                            <img src="<?php echo ($path); ?>" class="host-portrait"/>
                        </td>
                        <td class="host-name"><a href=""><?php echo ($nick_name); ?></a></td>
                        <td class="host-level">Lv.<?php echo ($level); ?></td>
                        <td width="250px"><img src="medal"/><img src="medal"/><img src="medal"/><?php echo ($meadl); ?></td>
                    </tr>
                    <tr height="20px" style="font-size:12px;">
                        <td colspan="3" class="add-border"><?php echo ($vo["release_time"]); ?></td>
                    </tr>
                    <tr class="add-border" style="font-size:16px;">
                        <td colspan="4"><?php echo ($vo["content"]); ?></td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <table style="width:450px; height:50px;" class="add-border">
                                <tr>
                                    <td><img src="../../../Public/Image/UserManagement/1.jpg" class="post-photo"/></td>
                                    <td><img src="../../../Public/Image/UserManagement//2.jpg" class="post-photo"/></td>
                                    <td><img src="img/3.jpg" class="post-photo"/></td>
                                    <td><img src="img/4.png" class="post-photo"/></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="add-border"></td>
                        <td>
                            <table style="width:250px; font-size:14px;">
                                <tr>
                                    <td>阅读量（0）</td>
                                    <td><a href="###">评论（<?php echo ($vo["comment_num"]); ?>）</a></td>
                                    <td><a href="###">转发（0）</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                     <?php if(is_array($vo['comment_list'])): $i = 0; $__LIST__ = $vo['comment_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vom): $mod = ($i % 2 );++$i;?><tr>
                             <td rowspan="2"><img src="<?php echo ($vom["path"]); ?>" class="layer-portrait"/></td>
                             <td colspan="3" style="font-size:14px;"><a href="###"><?php echo ($vom["nick_name"]); ?></a>:<?php echo ($vom["comment"]); ?></td>
                         </tr>
                         <td colspan="3" style="font-size:10px;text-align:left;" class="add-border"><?php echo ($vom["release_time"]); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>



                </table><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>




            <div id="QA-area">
            <select class="select-region">
                <option value ="volvo">广东外语外贸大学</option>
                <option value ="saab">广东工业大学</option>
                <option value="opel">中山大学</option>
                <option value="audi">华南理工大学</option>
            </select>
            <select class="select-region">
                <option value ="volvo">不限学院</option>
                <option value ="volvo">信息与科学技术学院</option>
                <option value ="saab">新闻与传播学院</option>
                <option value="opel">经济与贸易学院</option>
                <option value="audi">英语教育学院</option>
            </select>
            <select class="select-region">
                <option value ="volvo">不限模块</option>
                <option value ="volvo">学术</option>
                <option value ="saab">生活</option>
            </select>
            <div class="discuss-area" id="QA-area-1">
                <table class="host-container">
                    <tr height="25px">
                        <td width="50px" class="add-border" rowspan="2">
                            <img src="../../../Public/Image/UserManagement/user-3.jpg" class="host-portrait"/>
                        </td>
                        <td class="host-name"><a href="###">Name</a></td>
                        <td class="host-level">Lv.X</td>
                        <td width="250px"><img src="medal"/><img src="medal"/><img src="medal"/></td>
                    </tr>
                    <tr height="20px" style="font-size:12px;">
                        <td colspan="3" class="add-border">2017-X-XX XX:XX:XX(12px)</td>
                    </tr>
                    <tr class="add-border" style="font-size:16px;">
                        <td colspan="4">Content(16px)</td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <table style="width:450px; height:50px;" class="add-border">
                                <tr>
                                    <td><img src="../../../Public/Image/UserManagement/5.jpg" class="post-photo"/></td>
                                    <td><img src="../../../Public/Image/UserManagement/6.jpg" class="post-photo"/></td>
                                    <td><img src="../../../Public/Image/UserManagement/7.jpg" class="post-photo"/></td>
                                    <td><img src="../../../Public/Image/UserManagement/8.png" class="post-photo"/></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">悬赏金额（10金币）</td>
                        <td>
                            <table style="width:250px; font-size:14px;" >
                                <tr>
                                    <td>阅读量（0）</td>
                                    <td><a href="###">评论（0）</a></td>
                                    <td><a href="###">转发（0）</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="join-post-area">
            <select class="select-region">
                <option value ="volvo">广东外语外贸大学</option>
                <option value ="saab">广东工业大学</option>
                <option value="opel">中山大学</option>
                <option value="audi">华南理工大学</option>
            </select>
            <select class="select-region">
                <option value ="volvo">不限学院</option>
                <option value ="volvo">信息与科学技术学院</option>
                <option value ="saab">新闻与传播学院</option>
                <option value="opel">经济与贸易学院</option>
                <option value="audi">英语教育学院</option>
            </select>
            <select class="select-region">
                <option value ="volvo">不限模块</option>
                <option value ="volvo">学术</option>
                <option value ="saab">生活</option>
            </select>
            <div class="discuss-area" id="join-post-area-1">
                <table class="host-container">
                    <tr height="25px">
                        <td width="50px" class="add-border" rowspan="2">
                            <img src="../../../Public/Image/UserManagement/user-1.jpg" class="host-portrait"/>
                        </td>
                        <td class="host-name"><a href="###">Name</a></td>
                        <td class="host-level">Lv.X</td>
                        <td width="250px"><img src="medal"/><img src="medal"/><img src="medal"/></td>
                    </tr>
                    <tr height="20px" style="font-size:12px;">
                        <td colspan="3" class="add-border">2017-X-XX XX:XX:XX(12px)</td>
                    </tr>
                    <tr class="add-border" style="font-size:16px;">
                        <td colspan="4">Content(16px)</td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <table style="width:450px; height:50px;" class="add-border">
                                <tr>
                                    <td><img src="../../../Public/Image/UserManagement/5.jpg" class="post-photo"/></td>
                                    <td><img src="../../../Public/Image/UserManagement/6.jpg" class="post-photo"/></td>
                                    <td><img src="../../../Public/Image/UserManagement/7.jpg" class="post-photo"/></td>
                                    <td><img src="../../../Public/Image/UserManagement/8.png" class="post-photo"/></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td>
                            <table style="width:250px; font-size:14px;" >
                                <tr>
                                    <td>阅读量（0）</td>
                                    <td><a href="###">评论（0）</a></td>
                                    <td><a href="###">转发（0）</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="join-QA-area">
            <select class="select-region">
                <option value ="volvo">广东外语外贸大学</option>
                <option value ="saab">广东工业大学</option>
                <option value="opel">中山大学</option>
                <option value="audi">华南理工大学</option>
            </select>
            <select class="select-region">
                <option value ="volvo">不限学院</option>
                <option value ="volvo">信息与科学技术学院</option>
                <option value ="saab">新闻与传播学院</option>
                <option value="opel">经济与贸易学院</option>
                <option value="audi">英语教育学院</option>
            </select>
            <select class="select-region">
                <option value ="volvo">不限模块</option>
                <option value ="volvo">学术</option>
                <option value ="saab">生活</option>
            </select>
            <div class="discuss-area" id="join-QA-area-1">
                <table class="host-container">
                    <tr height="25px">
                        <td width="50px" class="add-border" rowspan="2">
                            <img src="../../../Public/Image/UserManagement/user-1.jpg" class="host-portrait"/>
                        </td>
                        <td class="host-name"><a href="###">Name</a></td>
                        <td class="host-level">Lv.X</td>
                        <td width="250px"><img src="medal"/><img src="medal"/><img src="medal"/></td>
                    </tr>
                    <tr height="20px" style="font-size:12px;">
                        <td colspan="3" class="add-border">2017-X-XX XX:XX:XX(12px)</td>
                    <tr class="add-border" style="font-size:16px;">
                        <td colspan="4">Content(16px)</td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <table style="width:450px; height:50px;" class="add-border">
                                <tr>
                                    <td><img src="../../../Public/Image/UserManagement/5.jpg" class="post-photo"/></td>
                                    <td><img src="../../../Public/Image/UserManagement/6.jpg" class="post-photo"/></td>
                                    <td><img src="../../../Public/Image/UserManagement/7.jpg" class="post-photo"/></td>
                                    <td><img src="../../../Public/Image/UserManagement/8.png" class="post-photo"/></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td>
                            <table style="width:250px; font-size:14px;" >
                                <tr>
                                    <td>阅读量（0）</td>
                                    <td><a href="###">评论（0）</a></td>
                                    <td><a href="###">转发（0）</a></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div id="container-menu">
            <div id="menu-discuss" class="mid-menu"></div>
            <div class="menu-pillar"></div>
            <div id="menu-chat" class="mid-menu"></div>
            <div class="menu-pillar"></div>
            <div id="menu-plan" class="mid-menu"></div>
            <div class="menu-pillar"></div>
            <div id="menu-friend" class="mid-menu"></div>
        </div>
        <div class="user-plan">
            <div id="triangle-2"></div>
            <div class="plan-container">
                <div class="plan-menu-1">
                    <ul>
                        <li id="life-plan-button">生活</li>
                        <li id="study-plan-button">学习</li>
                    </ul>
                </div>
                <div id="triangle-3"></div>
                <div id="life-plan">
                    <div class="life-plan-menu">
                        <ul>
                            <li id="life-new-plan-menu" class="plan-menu">最新记录</li>
                            <li id="life-history-plan-menu" class="plan-menu">历史记录</li>
                        </ul>
                    </div>
                    <div id="life-new-plan">
                        <table>
                            <tr>
                                <td><img src="标签1"/><img src="标签2"/>（标签）</td>
                            </tr>
                            <tr>
                                <td style="font-size:13px;text-align:left;">刚买的兰州牛肉面将于11:50-12:30送达</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;text-align:right;color:rgb(153,153,153);">
                                    2017-5-18 11:30 广东外语外贸大学
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td><img src="标签1"/><img src="标签2"/>（标签）</td>
                            </tr>
                            <tr>
                                <td style="font-size:13px;text-align:left;">刚买的兰州牛肉面将于11:50-12:30送达</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;text-align:right;color:rgb(153,153,153);">
                                    2017-5-18 11:30 广东外语外贸大学
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td><img src="标签1"/><img src="标签2"/>（标签）</td>
                            </tr>
                            <tr>
                                <td style="font-size:13px;text-align:left;">刚买的兰州牛肉面将于11:50-12:30送达</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;text-align:right;color:rgb(153,153,153);">
                                    2017-5-18 11:30 广东外语外贸大学
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td><img src="标签1"/><img src="标签2"/>（标签）</td>
                            </tr>
                            <tr>
                                <td style="font-size:13px;text-align:left;">刚买的兰州牛肉面将于11:50-12:30送达</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;text-align:right;color:rgb(153,153,153);">
                                    2017-5-18 11:30 广东外语外贸大学
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id="life-history-plan">
                        <table>
                            <tr>
                                <td><img src="标签1"/><img src="标签2"/>（标签）</td>
                            </tr>
                            <tr>
                                <td style="font-size:13px;text-align:left;">刚买的兰州牛肉面将于11:50-12:30送达</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;text-align:right;color:rgb(153,153,153);">
                                    2017-5-18 11:30 广东外语外贸大学
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div id="study-plan">
                    <div class="study-plan-menu">
                        <ul>
                            <li id="study-new-plan-menu" class="plan-menu">最新记录</li>
                            <li id="study-history-plan-menu" class="plan-menu">历史记录</li>
                        </ul>
                    </div>
                    <div id="study-new-plan">
                        <table>
                            <tr>
                                <td><img src="标签1"/><img src="标签2"/>（标签）</td>
                            </tr>
                            <tr>
                                <td style="font-size:13px;text-align:left;">学习Java</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;text-align:right;color:rgb(153,153,153);">
                                    2017-5-18 11:30 广东外语外贸大学
                                </td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <td><img src="标签1"/><img src="标签2"/>（标签）</td>
                            </tr>
                            <tr>
                                <td style="font-size:13px;text-align:left;">学习学习学习我爱学习</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;text-align:right;color:rgb(153,153,153);">
                                    2017-5-18 11:30 广东外语外贸大学
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id="study-history-plan">
                        <table>
                            <tr>
                                <td><img src="标签1"/><img src="标签2"/>（标签）</td>
                            </tr>
                            <tr>
                                <td style="font-size:13px;text-align:left;">刚买的兰州牛肉面将于11:50-12:30送达</td>
                            </tr>
                            <tr>
                                <td style="font-size:10px;text-align:right;color:rgb(153,153,153);">
                                    2017-5-18 11:30 广东外语外贸大学
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <button id="add-plan-button">添加计划+</button>
                <button id="front-page" class="page-button">&lt;</button>
                <button id="back-page" class="page-button">&gt;</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>