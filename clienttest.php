<?php
header('Access-Control-Allow-Origin: *');
include 'app_config.php';
require_once ("nusoap-0.9.5/lib/nusoap.php");
$client=new nusoap_client(serverURL."/server2/servertest.php?wsdl"); 

if(isset($_POST['addUser']))
{
	$userID=$_POST['userID'];
	$userFullName=$_POST['userFullName'];
	$userSite=$_POST['userSite'];
	$param2=array('user_name'=>$userID,'user_fullname'=>$userFullName,'user_site'=>$userSite);
	$return=$client->call('add_user',$param2);
	echo $return;
}

if(isset($_POST['add_question']))
{
	$videoID=$_POST['add_question'];
	$questionContent=$_POST['content'];
	$answerA=$_POST['answera'];
	$answerB=$_POST['answerb'];
	$answerC=$_POST['answerc'];
	$answerD=$_POST['answerd'];
	$correct=$_POST['correct'];
	$time=$_POST['time'];
	$param2=array('question_video_id'=>$videoID,'question_content'=>$questionContent,'question_answer_a'=>$answerA,'question_answer_b'=>$answerB,'question_answer_c'=>$answerC,'question_answer_d'=>$answerD,'question_correct'=>$correct,'question_time'=>$time);
	$return=$client->call('add_question',$param2);
	echo $return;
}

if(isset($_POST['add_video']))
{
	$userID=$_POST['add_video'];
	$userSite=$_POST['userSite'];
	$content=$_POST['content'];
	$url=$_POST['url'];
	$name=$_POST['name'];
	$param2=array('video_owner_id'=>$userID,'video_owner_site'=>$userSite,'video_content'=>$content,'video_url'=>$url,'video_name'=>$name);
	$return=$client->call('add_video',$param2);
	echo $return;
}

if(isset($_POST['edit_question']))
{
	$questionID=$_POST['edit_question'];
	$questionContent=$_POST['content'];
	$answerA=$_POST['answera'];
	$answerB=$_POST['answerb'];
	$answerC=$_POST['answerc'];
	$answerD=$_POST['answerd'];
	$correct=$_POST['correct'];
	$time=$_POST['time'];
	$param2=array('question_id'=>$questionID,'question_content'=>$questionContent,'question_answer_a'=>$answerA,'question_answer_b'=>$answerB,'question_answer_c'=>$answerC,'question_answer_d'=>$answerD,'question_correct'=>$correct,'question_time'=>$time);
	$return=$client->call('edit_question',$param2);
	echo $return;
}

if(isset($_POST['edit_video']))
{
	$videoID=$_POST['edit_video'];
	$userID=$_POST['userID'];
	$userSite=$_POST['userSite'];
	$content=$_POST['content'];
	$url=$_POST['url'];
	$name=$_POST['name'];
	$param2=array('video_id'=>$videoID,'video_owner_id'=>$userID,'video_owner_site'=>$userSite,'video_content'=>$content,'video_url'=>$url,'video_name'=>$name);
	$return=$client->call('edit_video',$param2);
	echo $return;
}

if(isset($_POST['delete_question']))
{
	$questionID=$_POST['delete_question'];
	$param2=array('question_id'=>$questionID);
	$return=$client->call('delete_question',$param2);
	echo $return;
}

if(isset($_POST['delete_video']))
{
	$videoID=$_POST['delete_video'];
	$param2=array('video_id'=>$videoID);
	$return=$client->call('delete_video',$param2);
	echo $return;
}

if(isset($_POST['get_user_video']))
{
	$userid=$_POST['user_id'];
	$site=$_POST['site'];
	$param=array('user_id'=>$userid, 'user_site'=>$site);
	$list_return=$client->call('get_video_by_user',$param);
	echo $list_return;
}

if(isset($_POST['get_video']))
{
	$video_id=$_POST['get_video'];
	$param2=array('video_id'=>$video_id);
	$tString=["$video_id"];
	$video_return=$client->call('get_video',$param2);
	echo $video_return;
}

if(isset($_POST['get_questions_list']))
{
	$video_id=$_POST['get_questions_list'];
	$param=array('video_id'=>$video_id);
	$list_return=$client->call('get_question_list',$param);
	echo $list_return;
}

if(isset($_POST['get_question']))
{
	$question_id=$_POST['get_question'];
	$param=array('question_id'=>$question_id);
	$list_return=$client->call('get_question',$param);
	echo $list_return;
}

if(isset($_POST['list_video']))
{
	$list_return=$client->call('get_video_list');
	echo $list_return;
}
if(isset($_POST['get_content_by_video']))
{
	$video_id=$_POST['get_content_by_video'];
	$param=array('video_id'=>$video_id);
	$content_return=$client->call('get_content',$param);
	echo $content_return;
}
?>