<?php
if(empty($msgid)){
   $msgid = $_GET["msgid"];
}

if(!empty($msgid)){

$config = $modx->getConfig();
$user = $modx->getUser();
 
$query = "SELECT m.*, a.fullname FROM ".$config["table_prefix"]."user_messages m ";
$query .= " LEFT JOIN ".$config["table_prefix"]."user_attributes a ON m.sender = a.internalKey ";
$query .=" WHERE m.id='".$msgid."' AND m.recipient ='".$user->get("id")."'";

$result = $modx->query($query);
if (!is_object($result)) {
   return false;
}

$row = $result->fetch(PDO::FETCH_ASSOC);

if(empty($chunk)){
   $chunk = "message_details";
}

$row["hash"] = hash("sha256", $row["subject"].$row["message"]);

if($row["hash"] == $_GET["hash"]){

$sq = "UPDATE ".$config["table_prefix"]."user_messages SET `read`=1 WHERE `id`=".$row["id"];
$sr = $modx->query($sq);

//return $sq;
$output = $modx->getChunk($chunk, $row);
return $output;

}else{
 return false;
}
}else{
   return false;
}
return;
