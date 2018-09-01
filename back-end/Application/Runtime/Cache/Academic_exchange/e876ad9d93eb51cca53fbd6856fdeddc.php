<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="<?php echo U('validate');?>" method="post"  enctype="multipart/form-data">
<p>用户名：<input type="text" name="phone"></p>
<p>密码：<input type="password"  name="password"></p>
<p><button type="submit">提交</button> </p>
</form>
</body>
</html>