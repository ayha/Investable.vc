<?php
if(!empty($uid) || !is_numeric($uid)){
   $config = $modx->getConfig();
   $query = "SELECT a.*, u.username FROM ".$config["table_prefix"]."user_attributes a LEFT JOIN ".$config["table_prefix"]."users u ON a.internalKey =u.id WHERE u.active=1 AND a.internalKey=".$uid;
   $result = $modx->query($query);
   if (!is_object($result)) {
       return false;
   }
   else {
      $row = $result->fetch(PDO::FETCH_ASSOC);
     // return json_encode($row);
      
      $extended = json_decode($row["extended"]);
      $placeholders = $row;      
      
      foreach($extended as $k=>$v){
         $placeholders[$k] = $v;
      }
      
      // get user avatar - requires modAvatar snippet
      $photo = $modx->runSnippet("modAvatar", array("userid"=>$row["internalKey"]));

      $placeholders["photo"] = $photo;
       if(!empty($tpl)){
         return $modx->getChunk($tpl, $placeholders);

      }else{
         return $placeholders;

      }
     
   }

}else{
   return false;
}
return;
