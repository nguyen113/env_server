<?php
header('Access-Control-Allow-Origin: *');
require_once ("nusoap-0.9.5/lib/nusoap.php");
require_once ("function.php");
$server=new soap_server();
$server->configureWSDL('Calculator',serverURL);
$server->register('get_question', array('video_id'=>'xsd:integer','quest_id'=>'xsd:integer'), array('total'=>'xsd:string'), serverURL);
$server->register('get_video', array('video_id'=>'xsd:integer'), array('total'=>'xsd:string'), serverURL );
$server->register('get_video_list',array('list_video'=>'xsd:integer'),array('total'=>'xsd:string'),serverURL);
$server->register('get_question_list',array('video_id'=>'xsd:integer'),array('total'=>'xsd:string'),serverURL);
$server->register('get_content',array('video_id'=>'xsd:integer'),array('total'=>'xsd:string'),serverURL);
function get_question($int1,$int2)
{
	return	new soapval('return','xsd:string',return_quest($int1,$int2));
}
function get_video($int3)
{
	return	new soapval('return','xsd:string',return_video($int3));
}
function get_video_list()
{
	return	new soapval('return','xsd:string',get_list_video());
}
function get_question_list($id)
{
	return	new soapval('return','xsd:string',get_list_question($id));
}
function get_content($id)
{
	return	new soapval('return','xsd:string',get_content_by_id($id));
}
$HTTP_RAW_POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';
$HTTP_RAW_POST_DATA = file_get_contents("php://input");
$server->service($HTTP_RAW_POST_DATA);
exit();
?>
