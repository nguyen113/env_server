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
	$video_return=$client->call('add_user',$param2);
	echo $video_return;
}

if(isset($_POST['add_question']))
{

}

if(isset($_POST['add_video']))
{

}

if(isset($_POST['edit_question']))
{

}

if(isset($_POST['edit_video']))
{

}

if(isset($_POST['delete_question']))
{

}

if(isset($_POST['delete_video']))
{

}

if(isset($_POST['get_user_video']))
{
	$userid=$_POST['user_id'];
	$site=$_POST['site'];
	$param=array('user_id'=>$userid, 'user_site'=>$site);
	$list_return=$client->call('get_video_by_user',$param);
	echo $list_return;
}

if(isset($_POST['videoID']))
{
	$video_id=$_POST['videoID'];
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