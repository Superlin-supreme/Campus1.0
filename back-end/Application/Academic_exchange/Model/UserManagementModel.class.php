<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/5/7
 * Time: 14:22
 */
namespace Academic_exchange\Model;
use Think\Model;

class UserManagementModel
{

    public function validate($phone,$password){
        $res1=M('user_information')->where("phone='$phone'");
        $res1_count=count($res1);
        $res2=M('user_information')->where("phone='$phone' AND password='$password'")->select();
        $res2_count=count($res2);
        try{
            if($phone=='' || $password==''){
                return 1;
                //return "*账号或密码不能为空";
            }
            else{
                if ($res1_count==1&&$res2_count==1) {
                    //return "登录成功";
                    return 2;
                }
                else  if ($res1_count<1) {
                   // return "对不起！您还没注册，请先注册";
                    return 3;
                }
                else {
                    //return "*该账号非法或密码错误";
                    return 4;
                }
            }
        }catch(Exception $e){
            //return "对不起，该功能出错";
            return 5;
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


    //把发帖内容存入数据库
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

    //获取用户发布帖子的信息
    public function  getPostInfo($user_id)
    {
         $post_array=M('post')->where("user_id=$user_id")->order('release_time desc')->select();
        $post_num=count($post_array);
         $post_info=array();
        for($i=0;$i<$post_num;$i++)
        {
             $title=$post_array[$i]['title'];
             $content=$post_array[$i]['content'];
             $post_id=$post_array[$i]['post_id'];
             $release_time=$post_array[$i]['release_time'];
             $comment_array=M('comment')->where("post_id=$post_id")->order('release_time asc')->select();
             $comment_num=count($comment_array);
             $comment_list=array();
            for($j=0;$j<$comment_num;$j++)
            {
                $comment_user_id=$comment_array[$j]['user_id'];
                $comment_content=$comment_array[$j]['content'];
                $comment_release_time=$comment_array[$j]['release_time'];
                $comment_user_info=M('user_information')->where("user_id=$comment_user_id")->find();
                $comment_img_name=$comment_user_info['img_name'];
                $comment_path="../../../Public/Image/User/".$comment_img_name;
                $comment_nick_name=$comment_user_info['nick_name'];
                $comment_list[$j]=array(
                    "path"=>$comment_path,
                    "nick_name"=>$comment_nick_name,
                    "comment"=>$comment_content,
                    "release_time"=>$comment_release_time
                );
            }

            $post_info[$i]=array(
               "title"=>$title,
                "content"=>$content,
                "comment_num"=>$comment_num,
                "release_time"=>$release_time,
                "comment_list"=>$comment_list
            );

        }
      return $post_info;
    }


   //根据post_id获取帖子的信息
    public function  getPostInfo_by_post_id($post_id)
    {
        $post_info=M('post')->where("post_id=$post_id")->find();
        $title=$post_info['title'];
        $content=$post_info['content'];
        $comment_array=M('comment')->where("post_id=$post_id")->select();
        $comment_num=count($comment_array);
        $release_time=$post_info['release_time'];
        $data=array(
            "title"=>$title,
            "content"=>$content,
            "comment_num"=>$comment_num,
            "release_time"=>$release_time
        );
        return $data;
    }

    //添加用户评论的信息
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




    //获取用户参与的帖子的信息
    public function  get_join_post_info($user_id)
    {
       //获取不重复的用户参与评论的帖子的post_id
        $comment_array=M('comment')->where("user_id=$user_id")->order('release_time desc')->distinct(true)->field('post_id')->select();
        $join_post_num=count($comment_array);
        $join_post_info=array();
        for($i=0;$i<$join_post_num;$i++)
        {
         $post_id = $comment_array[$i]['post_id'];
            //根据post_id获取评论信息
          $comment_info_array=M('comment')->where("post_id=$post_id")->order('release_time asc')->select();
          $comment_num=count($comment_info_array);
            for($j=0;$j<$comment_num;$j++)
            {
                $comment_user_id=$comment_num[$j]['user_id'];
                $comment_content=$comment_info_array[$j]['content'];
                $comment_release_time=$comment_info_array[$j]['release_time'];
                $comment_user_info=M('user_information')->where("user_id=$comment_user_id")->find();
                $comment_img_name=$comment_user_info[$j]['img_name'];
                $comment_path="../../../Public/Image/User/".$comment_img_name;
                $comment_nick_name=$comment_user_info[$j]['nick_name'];
                $comment_list[$j]=array(
                    "path"=>$comment_path,
                    "nick_name"=>$comment_nick_name,
                    "comment"=>$comment_content,
                    "release_time"=>$comment_release_time
                );
            }

          $user_id=M('post')->where("post_id=$post_id")->getField('user_id');
          $user_info=M('user_information')->where("user_id=$user_id")->find();
         $nick_name=$user_info['nick_name'];
         $level=$user_info['level'];
         $medal=$user_info['medal'];
         $img_name=$user_info['img_name'];
         $path="../../../Public/Image/User/".$img_name;
         $data=$this->getPostInfo_by_post_id($post_id);
         $join_post_info[$i]= array(
                "nick_name"=>$nick_name,
                "level"=>$level,
                "medal"=>$medal,
                "path"=>$path,
                "content"=>$data['content'],
                "comment_num"=>$data['comment_num'],
                "release_time"=>$data['release_time'],

         );
     }
       return $join_post_info;
    }

}