<?php
// implementation of add function
include ("connect.php");

function addUser($user_name,$user_fullname,$user_site)
{
	$x="REPLACE INTO env_user (userid, fullname, site) VALUES ('$user_name','$user_fullname','$user_site')";
   	if(mysql_query($x)){
		return 0;
	}
	else
	{
		return 1;
	}
}

function addQuestion($video_id,$question_content,$answer_a,$answer_b,$answer_c,$answer_d,$answer_correct,$question_time)
{
	$x="INSERT INTO env_question (videoid, question, answera, answerb, answerc, answerd, correct, time) VALUES ('$video_id','$question_content','$answer_a','$answer_b','$answer_c','$answer_d','$answer_correct','$question_time')";
   	if(mysql_query($x)){
		return "ok";
	}
	else
	{
		return 1;
	}
}

function addVideo($user_id,$site,$content,$url,$name)
{
	$x="INSERT INTO env_video (userid, site, content, url, name) VALUES ('$user_id','$site','$content','$url','$name')";
   	if(mysql_query($x)){
		return "ok";
	}
	else
	{
		return mysql_error();
	}
}

function editQuestion($question_id,$question_content,$answer_a,$answer_b,$answer_c,$answer_d,$answer_correct,$question_time)
{
	$x="UPDATE env_question SET question='$question_content', answera ='$answer_a', answerb = '$answer_b', answerc = '$answer_c', answerd = '$answer_d', correct = '$answer_correct', time ='$question_time'   WHERE id = '$question_id'";
   	if(mysql_query($x)){
		return 'ok';
	}
	else
	{
		return mysql_error();
	}
}

function editVideo($video_id,$user_id,$site,$content,$url,$name)
{
	$x="UPDATE env_video SET content = '$content', url = '$url', name = '$name' WHERE videoid = '$video_id'";
   	if(mysql_query($x)){
		return "ok";
	}
	else
	{
		return mysql_error();
	}
}

function deleteQuestion($question_id)
{
	$x="DELETE FROM env_question WHERE id = '$question_id'";
   	if(mysql_query($x)){
		return "ok";
	}
	else
	{
		return mysql_error();
	}
}

function deleleVideo($video_id)
{
	$x="DELETE FROM env_video WHERE videoid='$video_id'";
   	if(mysql_query($x)){
		$x="DELETE FROM env_question WHERE videoid = '$video_id'";
		if(mysql_query($x)){
			return "ok";
		}
	}
	else
	{
		return mysql_error();
	}
}

function getUserFullName($user_name,$user_site)
{
	$x="select fullname from env_user where userid = '$user_name' and site='$user_site'";
   	$y=mysql_query($x) or die(mysql_error());
    while($r = mysql_fetch_array($y)){
		$items = $r[0]; 
	}
	return $items;
}

function getVideoByUser($user_id,$user_site)
{
	$x="SELECT * FROM env_video WHERE userid = '$user_id' AND site = '$user_site'";
   	$y=mysql_query($x) or die(mysql_error());
    while($r = mysql_fetch_array($y)){
		$userFullName = getUserFullName($r[1],$r[2]);
		$items[] = array('videoid'=>$r[0],'username'=>$userFullName,'site'=>$r[2],'content'=>$r[3],'url'=>$r[4],'name'=>$r[5]); 
	}
	return json_encode($items);
}

function getVideo($video_id)
{
	$x="select * from env_video where videoid = '$video_id'";
   	$y=mysql_query($x) or die(mysql_error());
    while($r = mysql_fetch_array($y)){
		$items[] = array('videoid'=>$r[0],'userid'=>$r[1],'site'=>$r[2],'content'=>$r[3],'url'=>$r[4],'name'=>$r[5]); 
	}
	return json_encode($items);
}

function getQuestion($question_id)
{
	$x="select * from env_question where id = $question_id";
   	$y=mysql_query($x) or die(mysql_error());
    while($r = mysql_fetch_array($y)){
		$items[] = array('id'=>$r[0],'videoid'=>$r[1],'question'=>$r[2],'answera'=>$r[3],'answerb'=>$r[4],'answerc'=>$r[5],'answerd'=>$r[6],'correct'=>$r[7],'time'=>$r[8]); 
	}
	return json_encode($items);
}

function getVideoList()
{
	$x="select * from env_video";
   	$y=mysql_query($x) or die(mysql_error());
    while($r = mysql_fetch_array($y)){
		$userFullName = getUserFullName($r[1],$r[2]);
		$items[] = array('videoid'=>$r[0],'username'=>$userFullName,'site'=>$r[2],'content'=>$r[3],'url'=>$r[4],'name'=>$r[5]); 
	}
	return json_encode($items);
}

function getQuestionList($id)
{
	$x="select * from env_question where videoid = $id";
   	$y=mysql_query($x) or die(mysql_error());
    while($r = mysql_fetch_array($y)){
		$items[] = array('id'=>$r[0],'videoid'=>$r[1],'question'=>$r[2],'answera'=>$r[3],'answerb'=>$r[4],'answerc'=>$r[5],'answerd'=>$r[6],'correct'=>$r[7],'time'=>$r[8]); 
	}
	return json_encode($items);
}

function getContentById($id)
{
	$x="select content from env_video where videoid = $id";
   	$y=mysql_query($x) or die(mysql_error());
    while($r = mysql_fetch_array($y)){
		$item = $r[0]; 
	}
	return $item;
}
?>