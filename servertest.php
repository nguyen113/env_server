<?php
header('Access-Control-Allow-Origin: *');
require_once ("nusoap-0.9.5/lib/nusoap.php");
require_once ("function.php");
$server=new soap_server();
$server->configureWSDL('Calculator',serverURL);
$server->register('add_user', array('user_name'=>'xsd:string','user_fullname'=>'xsd:string','user_site'=>'xsd:string'), array('outcome'=>'xsd:integer',), serverURL);
$server->register('add_question', array('question_video_id'=>'xsd:string','question_content'=>'xsd:string','question_answer_a'=>'xsd:string','question_answer_b'=>'xsd:string','question_answer_c'=>'xsd:string','question_answer_d'=>'xsd:string','question_correct'=>'xsd:integer','question_time'=>'xsd:integer'), array('question_id'=>'xsd:integer'), serverURL);
$server->register('add_video', array('video_owner_id'=>'xsd:string','video_owner_site'=>'xsd:string','video_content'=>'xsd:string','video_url'=>'xsd:string','video_name'=>'xsd:string'), array('video_id'=>'xsd:integer'), serverURL);
$server->register('edit_question', array('question_id'=>'xsd:integer','question_content'=>'xsd:string','question_answer_a'=>'xsd:string','question_answer_b'=>'xsd:string','question_answer_c'=>'xsd:string','question_answer_d'=>'xsd:string','question_correct'=>'xsd:integer','question_time'=>'xsd:integer'), array('outcome'=>'xsd:string'), serverURL);
$server->register('edit_video', array('video_id'=>'xsd:integer','video_owner_id'=>'xsd:string','video_owner_site'=>'xsd:string','video_content'=>'xsd:string','video_url'=>'xsd:string','video_name'=>'xsd:string'), array('outcome'=>'xsd:string'), serverURL);
$server->register('delete_question', array('question_id'=>'xsd:integer'), array('outcome'=>'xsd:string'), serverURL);
$server->register('delete_video', array('video_id'=>'xsd:integer'), array('outcome'=>'xsd:string'), serverURL);
$server->register('get_video_by_user', array('user_id'=>'xsd:string','user_site'=>'xsd:string'),array('outcome'=>'xsd:string') , serverURL);
$server->register('get_video', array('video_id'=>'xsd:integer'), array('total'=>'xsd:string'), serverURL );
$server->register('get_video_list',array('list_video'=>'xsd:integer'),array('total'=>'xsd:string'),serverURL);
$server->register('get_question',array('question_id'=>'xsd:integer'),array('total'=>'xsd:string'),serverURL);
$server->register('get_question_list',array('video_id'=>'xsd:integer'),array('total'=>'xsd:string'),serverURL);
$server->register('get_content',array('video_id'=>'xsd:integer'),array('total'=>'xsd:string'),serverURL);

function add_user($str1,$str2,$str3)
{
	return	new soapval('return','xsd:string',addUser($str1,$str2,$str3));
}

function add_question($int1,$str1,$str2,$str3,$str4,$str5,$int2,$int3)
{
	return	new soapval('return','xsd:string',addQuestion($int1,$str1,$str2,$str3,$str4,$str5,$int2,$int3));
}

function add_video($str1,$str2,$str3,$str4,$str5)
{
	return	new soapval('return','xsd:string',addVideo($str1,$str2,$str3,$str4,$str5));
}

function edit_question($int1,$str1,$str2,$str3,$str4,$str5,$int3,$int4)
{
	return	new soapval('return','xsd:string',editQuestion($int1,$str1,$str2,$str3,$str4,$str5,$int3,$int4));
}

function edit_video($int1,$str1,$str2,$str3,$str4,$str5)
{
	return	new soapval('return','xsd:string',editVideo($int1,$str1,$str2,$str3,$str4,$str5));
}

function delete_question($int1)
{
	return	new soapval('return','xsd:string',deleteQuestion($int1));
}

function delete_video($int1)
{
	return	new soapval('return','xsd:string',deleleVideo($int1));
}

function get_video_by_user($str1,$str2)
{
	return	new soapval('return','xsd:string',getVideoByUser($str1,$str2));
}


function get_video($int3)
{
	return	new soapval('return','xsd:string',getVideo($int3));
}
function get_video_list()
{
	return	new soapval('return','xsd:string',getVideoList());
}
function get_question($id)
{
	return	new soapval('return','xsd:string',getQuestion($id));
}
function get_question_list($id)
{
	return	new soapval('return','xsd:string',getQuestionList($id));
}
function get_content($id)
{
	return	new soapval('return','xsd:string',getContentById($id));
}
$HTTP_RAW_POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';
$HTTP_RAW_POST_DATA = file_get_contents("php://input");
$server->service($HTTP_RAW_POST_DATA);
exit();
?>
