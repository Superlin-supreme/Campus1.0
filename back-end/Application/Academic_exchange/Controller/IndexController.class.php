<?php
namespace Academic_exchange\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function  test()
    {
        $this->display();
    }
    public function index(){
        //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        $real_name=$_POST['real_name'];
        $nick_name=$_POST['nick_name'];
        $password=$_POST['password'];
        $identity=$_POST['identity'];
        $campus_name=$_POST['campus_name'];
        $institute_name=$_POST['institute_name'];
        $major_name=$_POST['major_name'];
        $grade=$_POST['grade'];
        $phone=$_POST['phone'];
        $register_time = date('Y-m-d H:i:s');
        $campus_array=M('campus_information')->where("campus_name='$campus_name'")->find();
        $campus_id=$campus_array['campus_id'];
        $institute_array=M('institute_information')->where("institute_name='$institute_name'")->find();
        $institute_id=$institute_array['institute_id'];
        $major_array=M('major_information')->where("major_name='$major_name'")->find();
        $major_id=$major_array['major_id'];
        $data=array(
            "real_name"=>$real_name,
            "nick_name"=>$nick_name,
            "password"=>$password,
            "identity"=>$identity,
            "campus_id"=>$campus_id,
            "institute_id"=>$institute_id,
            "major_id"=>$major_id,
            "grade"=>$grade,
            "phone"=>$phone,
            "register_time"=>$register_time
        );
        M('user_information')->add($data);
        echo $identity;
    }


    //用户登录验证
    public function validate(){
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $user_information=M('user_information')->where("phone='$phone'")->find();
        $user_id=$user_information['user_id'];
        session('user_id',$user_id);
        $check = D('Index')->validate($phone,$password);
        $arr = json_encode($check);
        exit($check);
    }
    //用户退出
    public function quit()
    {
        $phone=$_POST['phone'];
        $res=M('user_information')->where("phone='$phone' ")->setField('status','0');
        if($res==0)
        {
            $feedback = "退出失败";
            exit(json_encode($feedback));
        }
        else
        {
            $feedback = "退出成功";
            exit(json_encode($feedback));
        }

    }
   //用户注册信息
    public function userInformationRegistration()
    {
        $real_name=$_POST['real_name'];
        $nick_name=$_POST['nick_name'];
        $password=$_POST['password'];
        $identity=$_POST['identity'];
        $campus_id=$_POST['campus_id'];
        $institute_id=$_POST['institute_id'];
        $major_id=$_POST['major_id'];
        $grade=$_POST['grade'];
        $phone=$_POST['phone'];
        $register_time = date('Y-m-d H:i:s');
        $file=$_FILES['filename'];
        $res1=M('user_information')->where("phone='$phone'");
        $res1_count=$res1->count();
//        $campus_array=M('campus_information')->where("campus_name='$campus_name'")->find();
//        $campus_id=$campus_array['campus_id'];
//        $institute_array=M('institute_information')->where("institute_name='$institute_name'")->find();
//        $institute_id=$institute_array['institute_id'];
//        $major_array=M('major_information')->where("major_name='$major_name'")->find();
//        $major_id=$major_array['major_id'];
        if ($real_name == '' || $nick_name == '' || $password==''|| $identity==''||$phone == '' || $grade
            == ''||$campus_id==''||$institute_id==''||$major_id=='') {
            $feedback = "请填写完整信息";
           $arr=json_encode($feedback);
           exit($arr);
        }
        else  if($res1_count==1)
        {
            $feedback = "该用户已经存在，请前往登录";
            $arr=json_encode($feedback);
            exit($arr);
        }
        else {
            if(preg_match("/^13[0-9]{1}[0-9]{8}$|15[012356789]{1}[0-9]{8}$|18[05678]{1}[0-9]{8}$/",$phone))
            {
                D('Index')->addUserInformation($real_name , $nick_name , $password,$identity,$phone ,$grade,$campus_id,$institute_id,$major_id,$register_time);
               if($file!=''||$file!=null)
               {
                   $user_id=M('user_information')->where("phone='$phone'")->getField('user_id');
                   $file_array=explode(".",$file["name"]);
                   $path="C:/wamp/www/Campus/image/".$user_id.".".$file_array[1];
                   copy($file['tmp_name'],$path);
               }
                $feedback = "注册成功";
                $arr=json_encode($feedback);
                exit($arr);
            }
           else
           {
              $feedback = "手机格式不对";
               $arr=json_encode($feedback);
               exit($arr);
           }
        }

    }
    //修改密码
    public  function modifyPassword()
    {
        $phone=$_POST['phone'];
        $password=$_POST['password'];
        $new_password=$_POST['new_password'];
        $res1=M('user_information')->where("phone='$phone'AND password='$password'")->select();
        $res1_count=count($res1);
        $res2=M('user_information')->where("phone='$phone'")->setField('password',$new_password);
        if($phone==''||$password=='')
        {
            $result="*账号或密码不能为空";
           exit(json_encode($result));
        }
        else if($res1_count==1)
        {
            if($res2)
            {
                $result="修改密码成功";
                exit(json_encode($result));
            }
           else
           {
               $result="修改密码失败，请重新输入新的密码";
              exit(json_encode($result));
           }
        }
        else
        {
            $result="*该账号非法或密码错误";
            exit(json_encode($result));
        }


    }

    //发布帖子
    public  function  post()
    {
        $phone=$_POST['phone'];
        $user_id=M('user_information')->where("phone='$phone'")->getField('user_id');
        $title=$_POST['title'];
        $content=$_POST['content'];
        $campus_name=$_POST['campus_name'];
        $institute_name=$_POST['institute_name'];
        $type=$_POST['type'];
        $status=$_POST['status'];
        $release_time = date('Y-m-d H:i:s');
        $campus_array=M('campus_information')->where("campus_name='$campus_name'")->find();
        $campus_id=$campus_array['campus_id'];
        $institute_array=M('institute_information')->where("institute_name='$institute_name'")->find();
        $institute_id=$institute_array['institute_id'];
        if($type==''||$type==null||$type=='学术')
        {
            $type='0';
        }
        else
            $type='1';
        if($status==''||$status==null||$status='实名')
            $status='0';
        else
            $status='1';
        D('Index')->addPostInformation($user_id ,$title, $content,$campus_id,$institute_id,$type,$status,$release_time);
        $feedback = "发布帖子成功";
        echo $feedback;
       // exit(json_encode($feedback));
    }

    //评论
    public  function  comment()
    {
        $post_id=5;
        $user_id=15;
        $content=$_POST['content'];
        $release_time=date('Y-m-d h:i:s');
        $status=$_POST['status'];
        if($status==''||$status==null||$status='实名')
            $status='0';
        else
            $status='1';
        D('Index')->addCommentInformation($post_id,$user_id,$content,$status,$release_time);
        $feedback = "评论成功";
        echo $feedback;
        // exit(json_encode($feedback));
    }
    public  function  save()
    {
        $file=$_FILES['filename'];
        $user_id=1;
       $file_array=explode(".",$file["name"]);
       $path="C:/wamp/www/Campus/image/".$user_id.".".$file_array[1];
        $res=copy($file['tmp_name'],$file["name"]);
        if($res)
        {
            $feedback = "发送成功";
            echo $feedback;
        }
        else
        {
            $feedback = "发送失败";
            echo $feedback;
        }
    }
}