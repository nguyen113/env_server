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
function connectDB(){
	$conn=mysql_connect(SERVER,USERNAME,PASSWORD);
	mysql_query('SET NAME "utf8" ');
	if(!$conn)
	{
		die ("Khong the ket noi dc toi database");
	}
	mysql_select_db(DBNAME,$conn) or die(mysql_error());
}

function closeDB(){
	mysql_close($conn);
}

//server test
$server=new soap_server();
$server->configureWSDL('Calculator',serverURL);

///////////////////////////////
// Register function to soap server:
// $server->register('<function name>', <input value>, <output value>, serverURL);
///////////////////////////////

//register service for user table
$server->register('set_user', array('username'=>'xsd:string','website'=>'xsd:string','role'=>'xsd:string'),array('outcome'=>'xsd:string'), serverURL);
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
// luon co connectDB(); va closeDB(); neu dung database
function set_user($username, $site, $role){
	connectDB();
	$x="INSERT INTO env_user( username, site, role ) VALUES ('"&$username&"',  '"&$site&"',  '"$role"')";
   	if(mysql_query($x)){
		$outcome = "OK";
	}
	else {
		$outcome = "error:" & mysql_error();
	}
	return json_encode($outcome);
	closeDB();
}

$server->service($HTTP_RAW_POST_DATA);
?>
