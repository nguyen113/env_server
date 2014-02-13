<?php
// implementation of add function
include ("connect.php");
function return_quest($video_id,$quest_id)
{
	
   $a="select * from question where quest_id='$quest_id' and video_id='$video_id'";
   $b=mysql_query($a) or die(mysql_error());
   while($c=mysql_fetch_row($b))
   {
	   $quest_object=array('id'=>$c[0],'content'=>$c[1],'a'=>$c[2],'b'=>$c[3],'c'=>$c[4],'d'=>$c[5],'ans'=>$c[6]);
   }
	return json_encode($quest_object);
}
function return_video($video_id)
{
	$x="select * from env_video where id = '".$video_id."'";
   	$y=mysql_query($x) or die(mysql_error());
    while($r = mysql_fetch_array($y)){
		$items[] = array('id'=>$r[0],'owner'=>$r[1],'content'=>$r[2],'url'=>$r[3],'name'=>$r[4]); 
	}
	return json_encode($items);
}

function get_list_video()
{
	$x="select id,url,name,content from env_video";
   	$y=mysql_query($x) or die(mysql_error());
    while($r = mysql_fetch_array($y)){
		$items[] = array('id'=>$r[0],'url'=>$r[1],'name'=>$r[2],'content'=>$r[3]); 
	}
	return json_encode($items);
}

function get_list_question($id)
{
	$x="select * from env_question where videoid = $id";
   	$y=mysql_query($x) or die(mysql_error());
    while($r = mysql_fetch_array($y)){
		$items[] = array('id'=>$r[0],'videoid'=>$r[1],'question'=>$r[2],'answera'=>$r[3],'answerb'=>$r[4],'answerc'=>$r[5],'answerd'=>$r[6],'correct'=>$r[7],'time'=>$r[8]); 
	}
	return json_encode($items);
}

function get_content_by_id($id)
{
	$x="select content from env_video where id = $id";
   	$y=mysql_query($x) or die(mysql_error());
    while($r = mysql_fetch_array($y)){
		$item = $r[0]; 
	}
	return $item;
	
	
}
?>