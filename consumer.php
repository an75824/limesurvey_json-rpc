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

// remove the session key
$client->release_session_key($session_key);
