<?php
header('Access-Control-Allow-Origin: *');
require_once ("nuSOAP/lib/nusoap.php");

//App config
define("SERVER","pcnguyen.dyndns.org");
define("USERNAME","admin");
define("PASSWORD","admin");
define("DBNAME","video_english");
define("serverURL","http://pcnguyen.dyndns.org");

//Connect DB
$conn=mysql_connect(SERVER,USERNAME,PASSWORD);
mysql_query('SET NAME "utf8" ');
if(!$conn)
{
	die ("Khong the ket noi dc toi database");
}
mysql_select_db(DBNAME,$conn) or die(mysql_error());

//Function
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
	$x="select * from video where video_id = '".$video_id."'";
   	$y=mysql_query($x) or die(mysql_error());
   	while($z=mysql_fetch_array($y))
	{
	   $list_object[]=$z[0];
	   $list_object[]=$z[1];
	   $list_object[]=$z[2];
	   $list_object[]=$z[3];
	   $list_object[]=$z[4];
	   $list_object[]=$z[5];
	}
	return json_encode($list_object);
}

function get_listvideo()
{
	$x="select video_id,img from video";
   	$y=mysql_query($x) or die(mysql_error());
	while($z=mysql_fetch_array($y))
	{
	   $list_object[]=$z['video_id'];
	   $list_object[]=$z['img'];
	}
	return json_encode($list_object);
}
function get_listvideoid()
{
		 $x="select video_id from video";
   		$y=mysql_query($x) or die(mysql_error());
   	while($z=mysql_fetch_array($y))
   {
	   $list_object[]=$z['video_id'];
   }
	return json_encode($list_object);	
}

//server test
$server=new soap_server();
$server->configureWSDL('Calculator',serverURL);

//register service for user table
$server->register('set_user', array('username'=>'xsd:string','website'=>'xsd:string','role'=>'xsd:string'),array('username'=>'xsd:string','id'=>'xsd:string'), serverURL);
$server->register('get_user', array('id'=>'xsd:string'),array('username'=>'xsd:string','website'=>'xsd:string','role'=>'xsd:string'), serverURL);
$server->register('edit_user', array('id'=>'xsd:string','username'=>'xsd:string','website'=>'xsd:string'),array('outcome'=>'xsd:integer'), serverURL);
$server->register('delete_user', array('id'=>'xsd:string'),array('outcome'=>'xsd:integer'), serverURL);
$server->register('set_password', array('id'=>'xsd:string', 'username'=>'xsd:string','website'=>'xsd:string'),array('outcome'=>'xsd:integer'), serverURL);

//register service for video table
$server->register('set_video', array('owner'=>'xsd:string','content'=>'xsd:string','url'=>'xsd:string','name'=>'xsd:string'),array('name'=>'xsd:string','id'=>'xsd:string'), serverURL);
$server->register('get_video', array('id'=>'xsd:string'),array('owner'=>'xsd:string','content'=>'xsd:string','url'=>'xsd:string','name'=>'xsd:string'), serverURL);
$server->register('get_video_by_owner', array('owner'=>'xsd:string'),array('video_id'=>'xsd:string'), serverURL);
$server->register('get_video_by_name', array('name'=>'xsd:string'),array('video_id'=>'xsd:string'), serverURL);
$server->register('get_video_content', array('id'=>'xsd:string'),array('content'=>'xsd:string'), serverURL);
$server->register('edit_video', array('id'=>'xsd:string','owner'=>'xsd:string','content'=>'xsd:string','url'=>'xsd:string','name'=>'xsd:string'),array('outcome'=>'xsd:string'), serverURL);
$server->register('get_video_name', array('id'=>'xsd:string'),array('name'=>'xsd:string'), serverURL);

//register service for question table
$server->register('set_question', array('video_id'=>'xsd:string','question'=>'xsd:string','a'=>'xsd:string','b'=>'xsd:string','c'=>'xsd:string','d'=>'xsd:string','correct'=>'xsd:string','time'=>'xsd:string'),array('outcome'=>'xsd:string'), serverURL);
$server->register('get_question', array('id'=>'xsd:string'),array('video_id'=>'xsd:string','question'=>'xsd:string','a'=>'xsd:string','b'=>'xsd:string','c'=>'xsd:string','d'=>'xsd:string','correct'=>'xsd:string','time'=>'xsd:string'), serverURL);
$server->register('edit_question', array('id'=>'xsd:string','video_id'=>'xsd:string','question'=>'xsd:string','a'=>'xsd:string','b'=>'xsd:string','c'=>'xsd:string','d'=>'xsd:string','correct'=>'xsd:string','time'=>'xsd:string'),array('outcome'=>'xsd:string'), serverURL);
$server->register('get_correct', array('id'=>'xsd:string'),array('id'=>'xsd:string','correct'=>'xsd:string'), serverURL);
$server->register('set_question_time', array('id'=>'xsd:string','time'=>'xsd:string'),array('outcome'=>'xsd:string'), serverURL);

//khai bao return cho cac function vua dang ky
function set_user($str1,$str2){
	
	return	new soapval('return','xsd:string',return_quest($int1,$int2));
}
function get_question($int1,$int2)
{
	return	new soapval('return','xsd:string',return_quest($int1,$int2));
}
function get_video($int3)
{
	return	new soapval('return','xsd:string',return_video($int3));
}
function get_list()
{
	return	new soapval('return','xsd:string',get_listvideo());
}
function get_list_videoid()
{
	return	new soapval('return','xsd:string',get_listvideoid());
}
$server->service($HTTP_RAW_POST_DATA);
?>
