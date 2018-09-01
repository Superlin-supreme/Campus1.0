<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/5/13
 * Time: 0:13
 */
namespace Academic_exchange\Controller;
use Think\Controller;

class UserManagementController extends  Controller{

    public function index()
    {
       $this->display('myhome');
        //$this->display('test');
    }
    public  function  login()
    {
        $this->display('login');
    }

    //显示主页
    public  function myhome()
    {
        $user_id=null;
        session('[start]');
       if(session('?user_id'))
        {
            $user_id=session('user_id');
            $user_information=M('user_information')->where("user_id=$user_id")->find();
            $nick_name=$user_information['nick_name'];
            $medal=$user_information['medal'];
            $level=$user_information['level'];
            $empirical_value=$user_information['empirical_value'];
            $personal_signature=$user_information['personal_signature'];
            $img_name=$user_information['img_name'];
            $path="../../../Public/Image/User/".$img_name;
            $post_info=D('UserManagement')->getPostInfo($user_id);
            $this->assign('nick_name',$nick_name);
            $this->assign('level',$level);
            $this->assign('medal',$medal);
            $this->assign('personal_signature',$personal_signature);
            $this->assign('empirical_value',$empirical_value);
            $this->assign('post_list',$post_info);
            $this->assign('path',$path);
            $this->display('myhome');
        }
       else
       {
           echo "<script>alert('对不起，您尚未登录，请先登录')</script>";
           $this->login();
       }

    }


    //修改个性签名
    public  function  modify_personal_signature()
    {
        $user_id=null;
        session('[start]');
        if(session('?user_id'))
        {
            $user_id=session('user_id');
            $confirm=$_POST['confirm'];
            $personal_signature=$_POST['personal_signature'];
            if($confirm=='确定')
            {
                M('user_information')->where("user_id=$user_id")->setField('personal_signature',$personal_signature);
                $this->myhome();
            }
            else
                $this->myhome();
       }
        else
        {
            echo "<script>alert('对不起，您尚未登录，请先登录')</script>";
            $this->login();
        }

    }

    //用户登录验证
    public function validate(){
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        //session('phone',$phone);
        $user_information=M('user_information')->where("phone='$phone'")->find();
        $user_id=$user_information['user_id'];
        if($user_id!=null||$user_id!='')
            session('user_id',$user_id);
        $check = D('UserManagement')->validate($phone,$password);
         if($check==1)
         {
             echo "<script>alert('*账号或密码不能为空')</script>";
             $this->login();
         }
        else if($check==2)
        {
            //echo "<script>alert('登录成功')</script>";
            $this->myhome();
        }
        else if($check==3)
        {
            echo "<script>alert('对不起！您还没注册，请先注册')</script>";
            $this->login();
        }
        else if($check==4)
        {
            echo "<script>alert('*该账号非法或密码错误')</script>";
            $this->login();
        }
        else
        {
            echo "<script>alert('对不起，该功能出错')</script>";
            $this->login();
        }
    }
    //用户注册信息
    public function userInformationRegistration()
    {

        $campus_name=$_POST['campus_name'];
        echo $campus_name;
//        $real_name=$_POST['real_name'];
//        $nick_name=$_POST['nick_name'];
//        $password=$_POST['password'];
//        $identity=$_POST['identity'];
//        $campus_name=$_POST['campus_name'];
//        $institute_name=$_POST['institute_name'];
//        $major_name=$_POST['major_name'];
//        $grade=$_POST['grade'];
//        $phone=$_POST['phone'];
//        $register_time = date('Y-m-d H:i:s');
//        $file=$_FILES['filename'];
//        $res1=M('user_information')->where("phone='$phone'");
//        $res1_count=$res1->count();
//        $campus_array=M('campus_information')->where("campus_name='$campus_name'")->find();
//        $campus_id=$campus_array['campus_id'];
//        $institute_array=M('institute_information')->where("institute_name='$institute_name'")->find();
//        $institute_id=$institute_array['institute_id'];
//        $major_array=M('major_information')->where("major_name='$major_name'")->find();
//        $major_id=$major_array['major_id'];
//        if ($real_name == '' || $nick_name == '' || $password==''|| $identity==''||$phone == '' || $grade
//            == ''||$campus_id==''||$institute_id==''||$major_id=='') {
////            $feedback = "请填写完整信息";
//            //$arr=json_encode($feedback);
//            echo "<script>alert('请填写完整信息')</script>";
//            $this->index();
//        }
//        else  if($res1_count==1)
//        {
////            $feedback = "该用户已经存在，请前往登录";
////           $arr=json_encode($feedback);
////            echo $feedback;
//            echo "<script>alert('该用户已经存在，请前往登录')</script>";
//            $this->login();
//        }
//        else {
//            if(preg_match("/^13[0-9]{1}[0-9]{8}$|15[012356789]{1}[0-9]{8}$|18[05678]{1}[0-9]{8}$/",$phone))
//            {
//                D('UserManagement')->addUserInformation($real_name , $nick_name , $password,$identity,
//                    $phone ,$grade,$campus_id,$institute_id,$major_id,$register_time);
//                if($file['name']!=''||$file['name']!=null)
//                {
//                    $user_id=M('user_information')->where("phone='$phone'")->getField('user_id');
//                    $file_array=explode(".",$file["name"]);
//                    $img_type=$file_array[1];
//                    if ($img_type == "bmp" || $img_type == "jpg" || $img_type == "jpeg" || $img_type == "gif" ||
//                        $img_type == "JPG" || $img_type == "JPEG" || $img_type == "BMP" || $img_type == "GIF")
//                    {
//                        $path="C:/wamp/www/Campus/Public/Image/User/".$user_id.".".$file_array[1];
//                        copy($file['tmp_name'],$path);
//                        $img_name=$user_id.".".$file_array[1];
//                    }
//                    else
//                    {
//                  //      $feedback = "图像格式不符合，请重新选择";
//                        echo "<script>alert('图像格式不符合，请重新选择')</script>";
//                        $this->index();
//                    }
//                }
//                else
//                {
//                    $img_name="0"."."."jpg";
//                }
//                M('user_information')->where("user_id='$user_id'")->setField('img_name',$img_name);
////                 $feedback = "注册成功";
////               $arr=json_encode($feedback);
//  //             echo $feedback;
//                echo "<script>alert('注册成功')</script>";
//                $this->login();
//            }
//            else
//            {
// //               $feedback = "手机格式不对";
////               $arr=json_encode($feedback);
// //              echo $feedback;
//                echo "<script>alert('手机格式不对')</script>";
//                $this->index();
//            }
//        }

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
            $res=json_encode($result);
            echo $res;
        }
        else if($res1_count==1)
        {
            if($res2)
            {
                $result="修改密码成功";
                $res=json_encode($result);
                echo $res;
            }
            else
            {
                $result="修改密码失败，请重新输入新的密码";
                $res=json_encode($result);
                echo $res;
            }
        }
        else
        {
            $result="*该账号非法或密码错误";
            $res=json_encode($result);
            echo $res;
        }


    }



    //发布帖子
    public  function  post()
    {
//        $user_id=null;
//        session('[start]');
//        if(session('?user_id')) {
//            $user_id = session('user_id');
//            $title = $_POST['title'];
//            $content = $_POST['content'];
//            $campus_name = $_POST['campus_name'];
//            $institute_name = $_POST['institute_name'];
//            $type = $_POST['type'];
//            $status = $_POST['status'];
//            $release_time = date('Y-m-d H:i:s');
//            $campus_array = M('campus_information')->where("campus_name='$campus_name'")->find();
//            $campus_id = $campus_array['campus_id'];
//            $institute_array = M('institute_information')->where("institute_name='$institute_name'")->find();
//            $institute_id = $institute_array['institute_id'];
//            if ($type == '' || $type == null || $type == '学术') {
//                $type = '0';
//            } else
//                $type = '1';
//            if ($status == '' || $status == null || $status = '实名')
//                $status = '0';
//            else
//                $status = '1';
//            if( $content!=''||$content!=null)
//            {
//                 D('UserManagement')->addPostInformation($user_id, $title, $content, $campus_id, $institute_id, $type, $status, $release_time);
//                 echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
//
//            }
//            else
//            {
//                echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
//             }
//        }
    }

    public function pos()
    {
        $content=$_POST['value'];
        var_dump($content);
        // 新建一个Dom实例
        $html = new simple_html_dom();

      //从文件中加载
        $html->load_file('path/file/test.html');
    }


    public  function  test()
    {
//        $text=file_get_contents("http://localhost:8088/Campus/index.php/Academic_exchange/UserManagement/indexa");
//
//        preg_match('/<div[^>]*id="name"[^>]*>(.*?) <//div>/si',$text,$match);
//
////印出match[0]
//        print($match[0]);
        $this->display();
    }


    //评论
    public  function  comment()
    {
        $post_id=6;
        $user_id=26;
        $content=$_POST['content'];
        $release_time=date('Y-m-d h:i:s');
        $status=$_POST['status'];
        if($status==''||$status==null||$status='实名')
            $status='0';
        else
            $status='1';
        D('UserManagement')->addCommentInformation($post_id,$user_id,$content,$status,$release_time);
        $feedback = "评论成功";
        echo $feedback;
    }

    //参与的帖子
    public  function get_join_post()
{
    $user_id=null;
    session('[start]');
    if(session('?user_id'))
    {
        $user_id=session('user_id');
        $user_information=M('user_information')->where("user_id=$user_id")->find();
        $nick_name=$user_information['nick_name'];
        $medal=$user_information['medal'];
        $level=$user_information['level'];
        $empirical_value=$user_information['empirical_value'];
        $personal_signature=$user_information['personal_signature'];
        $img_name=$user_information['img_name'];
        $path="../../../Public/Image/User/".$img_name;
        $data=D('UserManagement')->get_join_post_info($user_id);
        $this->assign('nick_name',$nick_name);
        $this->assign('level',$level);
        $this->assign('medal',$medal);
        $this->assign('personal_signature',$personal_signature);
        $this->assign('empirical_value',$empirical_value);
        $this->assign('path',$path);
        $this->assign('list',$data);
        $this->display("join_post_area");
    }
    else
    {
        echo "<script>alert('对不起，您尚未登录，请先登录')</script>";
        $this->login();
    }
}

}