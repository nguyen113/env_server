<?php
header('Access-Control-Allow-Origin: *');
include 'app_config.php';
require_once ("nusoap-0.9.5/lib/nusoap.php");
$client=new nusoap_client(serverURL."/server2/servertest.php?wsdl"); 
if(isset($_POST['q_id'])&&isset($_POST['v_id']))
{
		$quest_id=$_POST['q_id'];
		$video_id=$_POST['v_id'];
		$param1=array('video_id'=>$video_id,'quest_id'=>$quest_id);
		$quest_return=$client->call('get_question',$param1);
		echo $quest_return;
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