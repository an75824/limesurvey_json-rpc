<?php
require_once('jsonRPCClient.php'); //Include the RPC class
require_once('credentials.php'); //this file contains your username and password

$url = 'http://127.0.0.1/limesurvey/index.php/admin/remotecontrol';

$client = new JsonRPCClient($url);//instance of a new client

// create a session key
$session_key= $client->get_session_key($username,$password); //if success: str. If not success: array

if (!is_string($session_key))
{
	exit("Invalid username or password\n");
}
//List the available surveys
$surveys = $client->list_surveys($session_key,'admin'); //array 2x Dimensional

if (isset($surveys['status']) && $surveys['status']!='')
{
	exit("No surveys found.\n");
}
foreach ($surveys as $index=>$survey)
{
	echo $survey['surveyls_title']."\n";
}

$data = array (
	'qid' => '',
	'parent_qid' => '0',
	'sid' => '197236', # Survey ID
	'gid' => '1',
	'type' => 'O',
	'title' => 'qr2',
	'question' => 'Somthing here',
	'help' => 'Some help',
	'other' => 'N',
	'mandatory' => 'Y',
	'question_order' => '2',
	'language' => 'en',
	'scale_id' => '0'
	);

/* add_question method isn in a private repo for now */
#$question1 = $client->add_question($session_key,$data);

// remove the session key
$client->release_session_key($session_key);
