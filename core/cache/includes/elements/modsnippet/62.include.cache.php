<?php
if(empty($chunk)){
   $chunk = "received_message_row";
}
$config = $modx->getConfig();


$user = $modx->getUser();
$query = "SELECT * FROM ".$config["table_prefix"]."user_messages WHERE recipient ='".$user->get("id")."'";

if(!empty($msgid)){
   $query .= " AND id='".$msgid."'";
}

$query .= " ORDER BY date_sent DESC";
if(!empty($limit)){
$query .= " LIMIT 0, ".$limit;
}


$output = "";

if($getCount==1){
$output =0;
}
$result = $modx->query($query);

if (!is_object($result)) {
   return "You have no message at this moment";
}else{
   while( $row = $result->fetch(PDO::FETCH_ASSOC)){
      
      if($getCount==1 ){
          if($row["read"] != 1){
          $output++;
}
      }else{
         $o= Array();
         $o["sender_id"] = $row["sender"];
         $o["recipient_id"] = $row["recipient"];
         $o["msg_id"] = $row["id"];
         $o["message_subject"] = $row["subject"];
         $o["msg"] = $row["message"];
         $o["message_date"] = Date("Y-m-d", strtotime($row["date_sent"]));
         if($row["read"] ==1){
            $o["message_read"] = "read";
         }else{
            $o["message_read"] = "unread";
         }

         $o["hash"] = hash("sha256", $row["subject"].$row["message"]);
         
         $uq = "SELECT fullname FROM ".$config["table_prefix"]."user_attributes WHERE internalKey = '".$row["sender"]."' ";
         $ur = $modx->query($uq);
         if(is_object($ur)){
            $urow = $ur->fetch(PDO::FETCH_ASSOC);
            $o["message_sender"] = $urow["fullname"];
         }


         $rowOutput = $modx->getChunk($chunk, $o);
         $output .= $rowOutput;
      }

   }
}

return $output;
return;
