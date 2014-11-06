<?php
if(empty($companyid)){
   return false;
}else{
$config = $modx->getConfig();
$user = $modx->getUser();


$query = "SELECT * FROM ext_support_company WHERE companyid=".$companyid." AND username != '' AND userid != '' GROUP BY userid ORDER by username";

$result = $modx->query($query);


if(is_object($result)){
   if($getCount == 1){
   return $result->rowCount();
   }else{
      $output = "";
      while($row = $result->fetch(PDO::FETCH_ASSOC)   ){
        $rowOutput["name"] = $row["username"];
        $rowOutput["id"] = $row["userid"];
        $output .= $modx->getChunk("user_name_item", $rowOutput);
      }
      return $output;
   }
   
}else{
   return false;
}

}
return;
