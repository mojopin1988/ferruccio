<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);
if(!$update)
{
  exit;
}

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$voice = isset($update['voice']) ? $update['voice'] : "";

$responses = array();
$responses['pian del grado'] = array();
$responses['pian del grado'][] = 'ci nevica anche a ferragosto';
$responses['pian del grado'][] = 'andiamo con la campagnola';
$responses['pian del grado'][] = 'che bello pian del grado';

$responses['poderone'] = array();
$responses['poderone'][] = 'facciamo la cena dormiamo tutti lì';
$responses['poderone'][] = 'che bello il poderone tanamadana';
$responses['poderone'][] = 'Brixtooon';

$responses['santa sofia'] = array();
$responses['santa sofia'][] = 'facciamo la cena dormiamo tutti lì';
$responses['santa sofia'][] = 'che bello il poderone tanamadana';
$responses['santa sofia'][] = 'Brixtooon';

$responses['ferro'] = array();
$responses['ferro'][] = 'facciamo la cena dormiamo tutti lì';
$responses['ferro'][] = 'che bello il poderone tanamadana';
$responses['ferro'][] = 'Brixtooon';
$responses['ferro'][] = 'Mangi le aiule?';
$responses['ferro'][] = 'Bruchi l erba?';

$responses['pranzo'] = array();
$responses['pranzo'][] = 'tutti a pian del grado';
$responses['pranzo'][] = 'restate anche a cena? vi ospito ci abbiamo dormito in 53';

$responses['cena'] = array();
$responses['cena'][] = 'facciamo una cena? vi ospito, ho 12 camere ci abbiamo dormito in 57';

$text = trim($text);
$text = strtolower($text);
header("Content-Type: application/json");

$response = '';

if(strpos($text, "/start") === 0 || $text=="ciao ferruccio")
{
	$response = "$firstname, tanamadana!";
}
elseif($text=="santa")
{
	$response = "tanismadanis";
}
elseif($text=="ciao")
{
	$response = "ciao gino";
}
else
{
	foreach($responses as $key => $value){
		if(strpos(strtolower($text), $key)){
			$response = $responses[$key][rand(0, sizeof($responses[$key]) - 1)];
			break;
		}
	}
}


$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);

