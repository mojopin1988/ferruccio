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

$responses = array();
$responses['pian del grado'] = array();
$responses['pian del grado'][] = 'ci nevica anche a ferragosto';
$responses['pian del grado'][] = 'andiamo con la campagnola';
$responses['pian del grado'][] = 'che bello pian del grado';

$responses = array();
$responses['poderone'] = array();
$responses['poderone'][] = 'facciamo la cena dormiamo tutti lì';
$responses['poderone'][] = 'che bello il poderone tanamadana';
$responses['poderone'][] = 'Brixtooon';

$responses = array();
$responses['Santa sofia'] = array();
$responses['Santa sofia'][] = 'facciamo la cena dormiamo tutti lì';
$responses['Santa sofia'][] = 'che bello il poderone tanamadana';
$responses['Santa sofia'][] = 'Brixtooon';

$responses = array();
$responses['ferro'] = array();
$responses['ferro'][] = 'facciamo la cena dormiamo tutti lì';
$responses['ferro'][] = 'che bello il poderone tanamadana';
$responses['ferro'][] = 'Brixtooon';
$responses['ferro'][] = 'Mangi le aiule?';
$responses['ferro'][] = 'Bruchi l erba?';

$text = trim($text);
$text = strtolower($text);
header("Content-Type: application/json");
$response = '';
if(strpos($text, "/start") === 0 || $text=="ciao ferruccio")
{
	$response = "$firstname, tanamadana!";
}
elseif($text=="Santa Sofia")
{
	$response = "tanismadanis";
}
elseif($text=="ciao")
{
	$response = "ciao gino";
}
elseif($text=="porca puttana")
{
	$response = "ma chi non è mai andato a puttane!?";
}
elseif($text=="porca mignotta")
{
	$response = "ma chi non è mai andato a puttane!?";
}
elseif($text=="ciao maurizio")
{
	$response = "ciao mauro vedi di salutarmi la prossima volta, sei un villano!";
}
elseif($text=="ciao")
{
	$response = "$firstname, guarda che roba!";
}
elseif($text=="soldi")
{
	$response = "i soldi che avete voi!";
}
elseif($text=="lega")
{
	$response = "Giuro che non sono leghista!";
}
elseif($text=="leghista")
{
	$response = "Giuro che non sono leghista!";
}
elseif($text=="salvini")
{
	$response = "Giuro che non sono leghista!";
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
