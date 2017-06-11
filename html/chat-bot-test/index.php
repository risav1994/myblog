<?php
$access_token = "EAATV9g7PA1kBAG7w22Ahin05ZClnAzsJz8iCMUkM8oZBq8Kxb2ZCuBZAGNEo9eqvHDtJFDM5f7PwFsKb7rQxsSZBOYIACkfhZC1bHdJ6SWAkodpUYZAuM9yOJKNtkZCEANJAjuCBIjqQfkQUZC53nS8SgmIDQscZBojKRBIPXZBtzqeYAZDZD";

$verify_token = "my-first-chat-bot-token";
// echo "string";

$hub_verify_token = null;

if(isset($_REQUEST['hub_mode']) && $_REQUEST['hub_mode'] == 'subscribe') {
	$challenge = $_REQUEST['hub_challenge'];
	$hub_verify_token = $_REQUEST['hub_verify_token'];
	if($hub_verify_token === $verify_token) {
		header('HTTP/1.1 200 OK');
		echo $challenge;
		die;
	}	
}

$input = json_decode(file_get_contents('php://input'), true);
$sender = $input['entry'][0]['messaging'][0]['sender']['id'];
$message = isset($input['entry'][0]['messaging'][0]['message']['text']) ? $input['entry'][0]['messaging'][0]['message']['text'] : '';
if ($message) {
	if ($message == 'sagar') {
		$message_to_reply = 'sagar is working as an android intern';
	}
	else {
		$message_to_reply = 'This is the message to send back to the user';
	}
	$url = 'https://graph.facebook.com/v2.6/me/messages?access_token='.$access_token;
	// $jsonData = '{
	// 	"recipient":{
	// 		"id":"'.$sender.'"
	// 	},
	// 	"message":{
	// 		"text":"'.$message_to_reply.'"
	// 	}
	// }';
	$jsonData = '{
		"recipient":{
			"id":"'.$sender.'"
		},
		"message":{
			"attachment":{
				"type":"template",
				"payload":{
					"template_type":"button",
					"text":"What do you want to do next?",
					"buttons":[
						{
							"type":"web_url",
							"url":"https://www.thunderthought.com",
							"title":"Show Website"
						},
						{
							"type":"postback",
							"title":"Start Chatting",
							"payload":"yo"
						}
					]
				}
			}
		}
	}';
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$result = curl_exec($ch);
	curl_close($ch);
}