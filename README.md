# limesurvey_json-rpc

## Install LimeSurvey
Install the system following <a href = "https://manual.limesurvey.org/Installation_procedure_for_limesurvey_2.0" target='_blank'> these instructions </a>

## Configure LimeSurvey
You only have to enable "JSON-RPC" from the "Global Settings" menu - "Interfaces" tab.

## Use of JSON-RPC 
You have to include <code>jsonRPCClient.php</code>, just follow the instructions of the LimeSurvey documentation. <br />
In order to use the available methods, you have to always get a session key assigned to you: <br />
  <code>
    $session_key= $client->get_session_key($username,$password);
  </code>
So, from now on you can send requests to the server by always using the <code>$session_key</code>. <br />
i.e. <code> $surveys = $client->list_surveys($session_key,'admin'); </code> will declare an array of the surveys that have been created by the admin user.
