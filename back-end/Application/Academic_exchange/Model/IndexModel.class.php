<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/5/7
 * Time: 14:22
 */
namespace Academic_exchange\Model;
use Think\Model;

class  IndexModel extends Model
{

    public function validate($phone,$password){
        $res1=M('user_information')->where("phone='$phone'");
        $res1_count=$res1->count();
        $res2=M('user_information')->where("phone='$phone' AND password='$password'")->select();
        $res2_count=$res2->count();
        try{
            if($phone=='' || $password==''){
                return "*账号或密码不能为空";
            }
            else{
                if ($res1_count==1&&$res2_count==1) {
                     return "登录成功";
                }
                else  if ($res1_count<1) {
                    return "对不起！您还没注册，请先注册";
                }
                else {
                    return "*该账号非法或密码错误";
                }
            }
        }catch(Exception $e){
            return "对不起，该功能出错";
        }
    }


    public  function  addUserInformation($real_name , $nick_name , $password,$identity,$phone , $grade,$campus_id,$institute_id,$major_id,$register_time)
    {
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
    }

    public  function addPostInformation($user_id ,$title, $content,$campus_id,$institute_id,$type,$status,$release_time)
    {
        $data=array(
            "user_id"=>$user_id,
            "title"=>$title,
            "content"=>$content,
            "campus_id"=>$campus_id,
            "institute_id"=>$institute_id,
            "type"=>$type,
            "status"=>$status,
            "release_time"=>$release_time
        );
        M('post')->add($data);
    }

    public function addCommentInformation($post_id,$user_id,$content,$status,$release_time)
    {
        $data=array(
            "post_id"=>$post_id,
            "user_id"=>$user_id,
            "content"=>$content,
            "status"=>$status,
            "release_time"=>$release_time
        );
        M('comment')->add($data);
    }
}