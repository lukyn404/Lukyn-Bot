<?php
 date_default_timezone_set("America/Sao_Paulo");
 error_reporting(0);
 require_once "./Telegram.php";
 
 $telegram = new Telegram("6142553859:AAEvhuR1dN0xzi6_F8SoUn9yJCVd9vaznhk");
 
 $update = $telegram->getData();

 $message = $update["message"];
 
 $chat_id = $message["chat"]["id"];
 
 $message_id = $update["message"]["message_id"];
 
 $tipo = $message["chat"]["type"];
 
 $texto = $message["text"];
 
 $id = $message["from"]["id"];
 
 $reply = $message["reply_to_message"];
 
 $reply_id = $reply["from"]["id"];
 
 $isbot = $message["from"]["is_bot"];
 
 if($message["from"]["is_premium"]){
   
     $ispremium = "sim";
     
 }else{
   
     $ispremium = "não";
     
 }
 $nome = $message["from"]["first_name"];
 
 $usuario = $message["from"]["username"];
 
 $data = $update["callback_query"]["data"];
 
 $query_message_id = $update["callback_query"]["message"]["message_id"];
 
 $query_chat_id = $update["callback_query"]["message"]["chat"]["id"];
 
 $query_usuario = $update["callback_query"]["from"]["username"];
 
 $query_nome = $update["callback_query"]["from"]["first_name"];
 
 $query_user_id = $update["callback_query"]["from"]["id"];
 
 $query_reply = $update["callback_query"]["message"]["reply_to_message"];
 
 $query_id_user = $query_reply["from"]["id"];
 
 $query_id = $update["callback_query"]["id"];